<?php
/*
Template Name: Links
*/
?>
<?php get_header(); ?>

<div id="content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div <?php post_class();?>>
<h2 class="post-title"><?php the_title(); ?></h2>
<ul class="meta">
<li><?php edit_post_link('Edit', '', ''); ?></li>
</ul>

<ul class="linklist">
<?php wp_list_bookmarks('title_li=&show_description=1&between=<br />'); ?>
</ul>

<?php the_content(); ?>

</div>
<?php endwhile; endif; ?>

</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>