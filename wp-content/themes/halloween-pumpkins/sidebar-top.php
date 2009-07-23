<div class="navwrap">
<ul id="nav">
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Top 1') ) : ?>

<?php if(get_option('show_on_front') !='page') :?>
<li<?php if(is_home()) echo ' class="current_page_item"';?>><a href="<?php bloginfo('url');?>">Home</a></li>
<?php endif;?>
<?php wp_list_pages('title_li&sort_column=menu_order&depth=1'); ?>
<li><?php get_search_form();?></li>

<?php endif; ?>
</ul>
</div>
