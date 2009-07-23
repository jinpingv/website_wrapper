<?php get_header(); ?>
<div id="content">
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
			
			<p><?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
				
				<p><?php the_tags();Ê?></p>

	<div class="post-details"> <h3>Posted in <?php the_category(' and ','');Ê?> <?php $elixir->timesince() ?> ago at <?php the_time() ?>. </p><a href="<?php the_permalink() ?>#comments"><?php comments_number('Add a comment','1 comment','% comments'); ?></a></h3></div>
			<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
			<div class="prevnext">
<?php previous_post_link('Previous Post: %link','%title',TRUE);Ê?> &nbsp <?php next_post_link('Next Post: %link','%title',TRUE);Ê?></p></div>


			<?php edit_post_link('Edit Post', '<p>', '</p>'); ?></p>
		</div>
	<?php endwhile; ?>
	<?php else : ?>
	<div class="post" id="post-<?php the_ID(); ?>">
		<h2>Nothing to see here</h2>
		<p>You seemed to have found a mislinked file, page, or search query with zero results. If you feel that you've reached this page in error, double check the URL and or search string and try again.</p>
		<p>Alternatively, a more personalized method of tracking down and searching for content can be found <a href="#bottom_box">below</a>.</p>
	</div>
	<?php endif; ?>


	
	
	<?php comments_template(); ?>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>