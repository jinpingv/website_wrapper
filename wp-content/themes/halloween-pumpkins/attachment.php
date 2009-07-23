<?php get_header(); ?>
<div id="content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div <?php post_class();?>>

<h2 class="post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>

<p><small><?php echo my_download_link($post->post_mime_type);?></small></p>

<?php echo my_attachment_link($post->ID); ?>
<div class="attachment_description"><?php the_content();?></div>

<p class="postdate">Posted under <a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php echo get_the_title($post->post_parent); ?></a></p>

</div>
<?php endwhile; endif; ?>

</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>