
<?php get_header();  ?>



<div id="content">


		
	<?php /* If this is a category archive */  if (is_category()) { ?>
	<div class="notice"><p>You are currently browsing the <?php single_cat_title(''); ?> category.</p></div>

	<?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
	<div class="notice"><p>You are currently browsing the archives for the day <?php the_time('l, F jS, Y'); ?>.</p></div>

	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
	<div class="notice"><p>You are currently browsing the archives for <?php the_time('F, Y'); ?>.</p></div>

	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
	<div class="notice"><p>You are currently browsing the archives for the year <?php the_time('Y'); ?>.</p></div>

	<?php /* If this is a monthly archive */ } elseif (is_search()) { ?>
	<div class="notice"><p>You searched for <strong><?php the_search_query(); ?></strong>, here are your results: </p></div>

	<?php } ?> 
<!-- 
	<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
			    <p><?php the_content('Continue Reading...'); ?> 
            <div class="post-details"> <h3>Posted <?php $elixir->timesince() ?> ago at <?php the_time() ?>. </p><a href="<?php the_permalink() ?>#comments"><?php comments_number('Add a comment','1 comment','% comments'); ?></a></h3></div>
			</p>
		</div>
	<?php endwhile; ?>
    
	<?php else : ?>
	<div class="post" id="post-<?php the_ID(); ?>">
		<h2>Dress up your web!</h2>
		<p>Personalize the look of any webpage. Share your custom designs with anyone. Connect to all your favorite websites in one place. Free</p>
	</div>
	<?php endif; ?>
-->

    <div class="post" id="post-<?php the_ID(); ?>">
        <h2>Dress up your web!</h2>
        <p>Personalize the look of any webpage. Share your custom designs with anyone. Connect to all your favorite websites in one place. Free</p>
    </div>
    
	<div class="nextprevious">
		<div class="left"><?php next_posts_link('&laquo; Older Entries') ?></div>
		<div class="right"><?php previous_posts_link('Recent Entries &raquo;') ?></div>
	</div>
	<div class="clear"></div>
</div>
                     
<?php get_sidebar(); ?>

<?php get_footer(); ?>