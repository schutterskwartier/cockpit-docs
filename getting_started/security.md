### Security

By default Cockpit uses SQLite as its default storage engine. All ***.sqlite** db files are stored in ```storage/data```. SQLite stores its data in a binary file format directly on the disk which are accessible / downloadable like any other resource on the internet if you know the direct url. What a horrible idea, right?

Here are some tips how to secure your data:

If you're using Apache as your webserver then you should be pretty save because Cockpit comes already with some
precautions to prevent SQLite files to be downloaded by setting some protection rules via ```.htaccess``` files. So please make that overrides via ```.htaccess``` files are enabled.

If you're using **nginx** just add the following rule to your server configuration:

```
location ~ .sqlite$ {
    deny all;
}
```

If you feel completely uncomfortable having your database files inside the webroot then just override the default Cockpit configuration by defining a custom storage path:

```
// custom/config.php

return [
    'paths' => [
        'data' => '/my/custom/storage/path'
    ]
];
```
