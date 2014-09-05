### API - Media


#### Thumbnails


Cockpit provides a handy function to generate thumbnails for you on the fly.


    $thumburl = cockpit("mediamanager")->thumbnail("path/To/Image.png", $width, $height [, $options]);


Or use the shortcut function:

    $thumburl = thumbnail_url("path/To/Image.png", $width, $height [, $options]);


##### Genrate thumbnail and echo image tag:

    <?php thumbnail("myimage.jpg", 200, 120 [, $options]);?>

##### Options

```
$options = [
    "rebuild"     => false,
    "cachefolder" => "cache:thumbs",
    "quality"     => 100,
    "base64"      => false,
    "mode"        => "crop" // 'crop', 'best_fit', 'resize'
];
```
