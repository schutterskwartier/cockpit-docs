### API - Cockpit.js

Sometimes you need to access content via JavaScript / Ajax. Cockpit provides a simple JavaScript api for that.


<div class="uk-alert uk-alert-warning">
    Please generate an api token first in the Cockpit settings (Settings > General > Api).
</div>


**Embed JavaScript api:**

Add the following snippet to your page:

    <head>
        ...
        <?php cockpit_js_lib() ?>
        ...
    </head>

Or define a script tag

    <head>
        ...
        <script src="/cockpit/index.php/rest/api-js?token={api_token}"></script>﻿
        ...
    </head>


Now you can request regions, collections and galleries;

    <script>

        // get region

        Cockpit.request('/regions/get/{regionname}').success(function(content){
            // update the dom with region content
        });

        // get gallery images
        Cockpit.request('/galleries/get/{galleryname}').success(function(images){
            // array of images
        });

        // get thumbnail urls
        Cockpit.request('/mediamanager/thumbnails', {
            images: ['site:image1.jpg', 'image2.png'],
            w: 50, h:50,
            options: {
                quality : 80,
                mode    : 'crop'
            }
        }).success(function(items){
            // array of thumbnail urls
        });


        // get collection items
        Cockpit.request('/collections/get/{collectionname}').success(function(items){
            // array of collection items
        });

        // filter and sort collection items
        Cockpit.request('/collections/get/{collectionname}', { filter: {title: {$regex: 'Word'}}, sort:{'created':-1} }).success(function(items){
            // array of collection items
        });

    </script>

#### Direct REST calls

    GET /cockpit/index.php/rest/api/regions/get/{regionname}?token={yourtoken}

    GET /cockpit/index.php/rest/api/galleries/get/{galleryname}?token={yourtoken}

    GET /cockpit/index.php/rest/api/collections/get/{collectionname}?token={yourtoken}
