<div class="sidebar">
<ul>

<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?>

<li id="categories">
<ul><?php wp_list_categories('title_li=&orderby=name');?></ul>
</li>

<li id="archives"><h2>Archives</h2>
<ul><?php wp_get_archives(); ?></ul>
</li>

<li id="links">
<ul><?php wp_list_bookmarks('title_li=&orderby=name&show_images=0&show_description=1');?></ul>
</li>

<?php endif; ?>

</ul>

</div>
