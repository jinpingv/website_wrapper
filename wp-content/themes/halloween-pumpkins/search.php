<?php get_header(); ?>
<div id="content">

<div <?php post_class('search-results');?>>
<h2 class="post-title">Search Results</h2>

<?php 
$my_tot_pages = $wp_query->max_num_pages;
if($my_tot_pages ==1) $my_tot_pages.=' page';
else $my_tot_pages .= ' pages';
$my_curr_page = $paged;
if($my_curr_page =='') $my_curr_page = 1;
$my_searchterm = trim(wp_specialchars($s,1));
if($my_searchterm !='') : ?>
<p>You searched for <span class="searchterm">'<?php echo $my_searchterm;?>'</span>. 
<?php if (have_posts()) : ?>
Displaying page <?php echo $my_curr_page;?> of <?php echo $my_tot_pages;?> of results:</p>
<ul>

<?php while (have_posts()) : the_post(); ?>	
<li class="search-result"><h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>

<ul class="meta postfoot">
<li><?php the_time('F j, Y'); ?> <?php the_time(); ?></li>
<?php if($post->post_type == 'post') :?>
<li>Filed under: <ul><li><?php the_category(',</li> <li>') ?></li></ul></li>
<?php if(get_the_tag_list()) :?>
<li>Tags: <?php the_tags('<ul><li>',',</li> <li>','</li></ul>');?></li>
<?php endif;?>
<?php endif;?>
</ul></li>

<?php endwhile; ?>
</ul>

<ul class="prevnext">
<li class="prev"><?php previous_posts_link('Newer Entries');?></li>
<li class="next"><?php next_posts_link('Older Entries'); ?></li>
</ul>

<?php else : ?>
Sorry - I couldn't find anything on <span class="searchterm">'<?php echo trim(wp_specialchars($s,1)); ?>'</span>.</p>
<?php endif;else : ?>
<p><strong class="error">You forgot to enter a search term!</strong></p>
<?php endif; ?>

<br class="clear-left" />

<!-- end post -->
</div>

<!-- end content -->
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>