### Nginx setup


A sample nginx config setup:

````

server {
    listen 80;
    server_name _;
    root /var/www;
    index index.php index.html index.htm;

    # Add additional types
    include mime.types;

    location / {
        index index.php index.html index.htm;
    }

    # Change "cockpit" to the folder name containing cockpit files.
    location /cockpit {
        try_files $uri $uri/ /cockpit/index.php;
        index index.php index.html index.htm;
    }

    location ~ \.php(/|\?|$) {
        fastcgi_pass unix:/var/run/php5-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_param COCKPIT_URL_REWRITE On;
        include fastcgi_params;
    }

    location ~ .sqlite$ {
        deny all;
    }
}
````
