<?php get_header(); ?>
<div id="content">

<?php if (have_posts()) : ?>
<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<h2 class="post-title">Archives
if (is_author()) echo ' by ';
else echo ' for ';
if (is_day()) the_time('F jS, Y');
elseif (is_month()) the_time('F, Y');
elseif (is_year()) the_time('Y');
elseif (is_author()) the_author();
?></h2>

<?php while (have_posts()) : the_post(); ?>
<div class="post">
<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
<ul class="meta">
<li><?php the_time("F j, Y"); ?> <?php the_time(); ?></li>
<li><?php edit_post_link('Edit', '', ''); ?></li>
</ul>

<?php the_excerpt() ?>

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