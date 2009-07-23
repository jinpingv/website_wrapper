<?php get_header(); ?>

<div id="content">

<?php wp_tag_cloud('format=list&unit=em&largest=2&smallest=1&number=0'); ?>

<h2>Currently browsing '<?php single_tag_title(); ?>'</h2>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div <?php post_class();?> id="post-<?php the_ID();?>">
<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h2>

<ul class="meta">
<li><?php the_time("F j, Y"); ?> <?php the_time(); ?></li>
<li><?php edit_post_link('Edit', '', ''); ?></li>
</ul>

<div class="postcontent">
<?php the_content(the_title('', '', false)." - continue reading&hellip;"); ?>
</div>

<?php 
if(function_exists('enhanced_link_pages')) enhanced_link_pages(array('blink'=>'<li>','alink'=>'</li>','before' => '<div class="pagelist">Pages:<ul>', 'after' => '</ul></div>', 'next_or_number' => 'number'));
else wp_link_pages('before=<div class="pagelist">Pages:&after=</div>&link_before=&link_after=&pagelink=%');
?>

<?php if('open' == $post->comment_status) : ?><p class="comment_link"><?php comments_popup_link('Comment on '.$post->post_title, '1 Comment on '.$post->post_title, '% Comments on '.$post->post_title,'postcomment','Comments are off for '.$post->post_title); ?></p><?php endif;?>

<ul class="meta postfoot">
<li>Filed under: <ul><li><?php the_category(',</li> <li>') ?></li></ul></li>
</ul>

<?php endwhile; ?>

<ul class="prevnext">
<li class="prev"><?php previous_posts_link('Newer Posts');?></li>
<li class="next"><?php next_posts_link('Older Posts'); ?></li>
</ul>

<?php endif; ?>

</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>