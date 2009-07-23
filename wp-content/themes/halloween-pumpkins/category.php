<?php get_header(); ?>

<?php
$this_category = get_category($cat);
$this_feed = get_category_feed_link($this_category->cat_ID,'');
?>

<div id="content">
<div <?php post_class();?>>

<?php if (have_posts()) : ?>
<h1><a class="rss" title="Subscribe to this category's news feed" href="<?php echo $this_feed;?>"><span>RSS Feed for  <?php echo single_cat_title(); ?></span></a> <?php echo single_cat_title(); ?></h1>

<?php echo category_description(); ?>

<?php while (have_posts()) : the_post(); ?>

<div <?php post_class();?>>

<h2 class="post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>

<ul class="meta">
<li><?php the_time('F j, Y'); ?> <?php the_time(); ?></li>
<li><?php edit_post_link('Edit','<span class="edit">','</span>'); ?></li>
</ul>

<div class="postcontent">
<?php the_content('<span class="readmore">'.the_title('', '', false).' - Read more</span>');?>
</div>

<?php 
if(function_exists('enhanced_link_pages')) enhanced_link_pages(array('blink'=>'<li>','alink'=>'</li>','before' => '<div class="pagelist">Pages:<ul>', 'after' => '</ul></div>', 'next_or_number' => 'number'));
else wp_link_pages('before=<div class="pagelist">Pages:&after=</div>&link_before=&link_after=&pagelink=%');
?>

<?php if('open' == $post->comment_status) : ?><p class="comment_link"><?php comments_popup_link('Comment on '.$post->post_title, '1 Comment on '.$post->post_title, '% Comments on '.$post->post_title,'postcomment','Comments are off for '.$post->post_title); ?></p><?php endif;?>

<?php if(get_the_tag_list()) :?>
<ul class="meta postfoot">
<li>Tags: <?php the_tags('<ul><li>',',</li> <li>','</li></ul>');?></li>
</ul>
<?php endif;?>

<!-- end post -->
</div>
<?php endwhile; ?>

<ul class="prevnext">
<li class="prev"><?php previous_posts_link('Newer Entries');?></li>
<li class="next"><?php next_posts_link('Older Entries'); ?></li>
</ul>

<?php endif; ?>

<br class="clear-left" />

<!-- end post -->
</div>

<!-- end content -->
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>