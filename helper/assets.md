### API - Cockpit

#### Assets

Do you have some assets you want to combine to speed up your site's response time?<br>


    cockpit("cockpit")->assets([
        "script1.js",
        "script2.js",
        "style1.css",
        "style.less",  // less file
        "style.scss"   // sass file
    ], 'my.assets' [, $cachetime=0]);

<div class="uk-alert">
    All .less and .scss files will be auto parsed and converted to css.
</div>

Shortcut version:

    <?php assets([...], 'my.assets' [, $cachetime=0]); ?>


The result are two files, each with all css and js files combined:

```
<script src="{path/to/cockpit}/cache/assets/my.assets.js" type="text/javascript"></script>
<link href="{path/to/cockpit}/cache/assets/my.assets.css" type="text/css" rel="stylesheet" />
```