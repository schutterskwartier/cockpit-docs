### Regions

Regions are editable content snippets that you can reuse everywhere on your website.


![Edit region](images/region.edit.png)


It even comes with a powerful template language called <span class="uk-badge">Lexy</span> (inspired by Blade) to be even more flexible:


    <strong>Colors:</strong>
    <ul>
        @foreach(["Red", "Green", "Blue"] as $item)
            <li>{{$item}}</li>
        @endforeach
    </ul>


<div class="uk-alert">
    Lexy is a superset of PHP. You can also use just plain PHP.
</div>

#### Region fields

Create region fields and reuse them in the region template. Region fields are great to hide code complexity from customers.


#### Render your regions at any position on your site:

    <?php echo cockpit("regions")->render(regionname); ?>

Or use the shortcut function:

    <?php region(regionname);?>
