### Simple blog implementation with a router


In general you can utilize any known routers e.g. Silex, Slim, ... or just use [Lime](https://github.com/aheinze/Lime) which is shipped with cockpit.

Let's say your project folder looks like this:

    cockpit
    views
       index.php
       article.php
    index.php
    .htaccess

The **.htaccess** rewrites all requests to _index.php_:

    <IfModule mod_rewrite.c>
      RewriteEngine On
      RewriteCond %{REQUEST_FILENAME} !-d
      RewriteCond %{REQUEST_FILENAME} !-f
      RewriteRule ^(.*)$ index.php/$1 [QSA,L]
    </IfModule>


Now let's edit index.php:

```php
<?php

//include cockpit
include_once('cockpit/bootstrap.php');
```

So now you've loaded the Cockpit API but also registered its autoloader. We can now create our Lime app.

```php
<?php

//include cockpit
include_once('cockpit/bootstrap.php');

$app = new Lime\App();

$app->bind("/", function() {
    return "Hello World!";
});

$app->run();
```


for a simple blog a setup could look like this:

```php
<?php

//include cockpit
include_once('cockpit/bootstrap.php');

$app = new Lime\App();

// bind routes

$app->bind("/", function() use($app) {

    $posts = collection('blog')->find(["public"=>true])->sort(["created"=>1])->toArray();

    return $app->render('views/index.php', ['posts' => $posts]);
});


$app->bind("/article/:id", function($params) use($app) {

    $post = collection('blog')->findOne(["_id"=>$params['id']]);

    return $app->render('views/article.php', ['post' => $post]);
});

$app->run();
```  

####Views:

**views/index.php**

```php

...

<?php foreach ($posts as $post): ?>
    <h2><a href="<?php $this->route('/article/'.$post['_id']);?>"><?php=$post['title'];?></a></h2>
<?php endforeach; ?>

...

```

**views/article.php**

```php

...

<h1><?php=$post['title'];?></h1>

<p>
    <?php=$post['content'];?>
</p>

...

```

But this is just one possible way. You can use whatever you want to create/render your frontend.


### Extras

Add pagination to the blog index

```php
$app->bind("/", function() use($app) {

    $limit = 5;
    $page  = $app->param("page", 1);
    $count = collection('blog')->count(["public"=>true]);
    $pages = ceil($count/$limit);

    // get posts
    $posts = collection('blog')->find(["public"=>true]);

    // apply pagination
    $posts->limit($limit)->skip(($page-1) * $limit);

    // apply sorting
    $posts->sort(["created"=>1]);

    return $app->render('views/index.php', ['posts'=>$posts->toArray(), 'page'=>$page, 'pages'=>$pages]);
});
```

**views/index.php**

```html

...

<?php foreach ($posts as $post): ?>
    <h2><a href="<?php $this->route('/article/'.$post['_id']);?>"><?php=$post['title'];?></a></h2>
<?php endforeach; ?>

...

<div class="pagination">
    <?php for($i=1;$i<=$pages;$i++): ?>

        <?php if($page==$i): ?>
            <span><?=$i;?></span>
        <?php else: ?>
            <a href="<?=$this->route("/?page={$i}");?>"><?=$i;?></a>
        <?php endif; ?>

    <?php endfor; ?>
</div>

```
