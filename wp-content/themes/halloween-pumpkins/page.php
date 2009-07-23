<?php get_header(); ?>
<div id="content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div <?php post_class();?>>
<h2 class="post-title"><?php the_title(); ?></h2>
<ul class="meta">
<li><?php edit_post_link('Edit', '', ''); ?></li>
</ul>
<?php if (function_exists('ShowChildren') && ShowChildren($post)) echo ShowChildren($post);?>

<?php the_content('Continue reading ' . the_title('', '', false)); ?>

<?php 
if(function_exists('enhanced_link_pages')) enhanced_link_pages(array('blink'=>'<li>','alink'=>'</li>','before' => '<div class="pagelist">Pages:<ul>', 'after' => '</ul></div>', 'next_or_number' => 'number'));
else wp_link_pages('before=<div class="pagelist">Pages:&after=</div>&link_before=&link_after=&pagelink=%');
?>

</div>
<?php endwhile;endif; ?>

</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>