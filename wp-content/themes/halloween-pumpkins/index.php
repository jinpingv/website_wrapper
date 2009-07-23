<?php get_header(); ?>

<div id="content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php if(!get_option('halloween_sticky_post_display') && is_sticky()) continue;?>

<div <?php post_class();?>>
<h2 class="post-title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
<ul class="meta">
<li><?php the_time("F j, Y"); ?> <?php the_time(); ?></li>
<li><?php edit_post_link('Edit', '', ''); ?></li>
</ul>

<?php the_content('Continue reading ' . the_title('', '', false)); ?>

<?php 
if(function_exists('enhanced_link_pages')) enhanced_link_pages(array('blink'=>'<li>','alink'=>'</li>','before' => '<div class="pagelist">Pages:<ul>', 'after' => '</ul></div>', 'next_or_number' => 'number'));
else wp_link_pages('before=<div class="pagelist">Pages:&after=</div>&link_before=&link_after=&pagelink=%');
?>

<ul class="meta postfoot">
<li>Filed under: <ul><li><?php the_category(',</li> <li>') ?></li></ul></li>
<?php if(get_the_tag_list()) :?>
<li>Tags: <?php the_tags('<ul><li>',',</li> <li>','</li></ul>');?></li>
<?php endif;?>
</ul>

</div>

<?php endwhile; ?>

<ul class="prevnext">
<li class="prev"><?php previous_posts_link('Newer Entries');?></li>
<li class="next"><?php next_posts_link('Older Entries'); ?></li>
</ul>

<?php else : ?>

<?php endif; ?>

</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>