### Galleries

Create a collection of selected images to reuse them for portfolios etc.

![Edit gallery](images/gallery.edit.png)

#### Access gallery data (array of images) on your site:

    <?php $images = cockpit("galleries")->gallery('galleryname'); ?>

Or use the shortcut function:

    <?php $images = gallery('galleryname'); ?>


#### Loop through images:

    <?php foreach(gallery('galleryname') as $image): ?>

        <?php thumbnail($image["path"], 100, 100) ?>

    <?php endforeach;?>
