<?php get_header(); ?>
<div id="content">			

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="post" id="post-<?php the_ID(); ?>">

<h2 class="post-title"><?php the_title(); ?></h2>
<ul class="meta">
<li><?php the_time("F j, Y"); ?> <?php the_time(); ?></li>
<li><?php edit_post_link('Edit', '', ''); ?></li>
</ul>


<?php the_content(); ?>

<?php if ('open' == $post-> comment_status):?>
<p><a href="#postcomment">Care to leave a comment?</a></p>
<?php endif;?>

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

<ul id="tiplets">
<li class="email-friend"><a href="mailto:blank?body=I thought you might be interested in <?php the_title(); ?>. You can view it at: <?php the_permalink() ?>">Send to a friend</a></li>
</ul>

<?php if ('open' == $post-> comment_status) comments_template();?>

<?php endwhile; else: ?>

<?php endif; ?>

</div>
</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
