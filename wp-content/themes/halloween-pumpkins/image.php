<?php get_header(); ?>
<div id="content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div <?php post_class('image');?>>

<h2 class="post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
<ul class="meta">
<li><?php the_time("F j, Y"); ?> <?php the_time(); ?></li>
<li><?php edit_post_link('Edit', '', ''); ?></li>
</ul>

<a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo wp_get_attachment_image( $post->ID, 'medium' ); ?></a>
<?php the_content(); ?>

</div>
<?php endwhile; endif; ?>

</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>