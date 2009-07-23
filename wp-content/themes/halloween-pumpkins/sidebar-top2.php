<div class="navwrap nav">
<ul id="nav2">
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Top 2') ) : ?>

<?php 
$sticky_posts = get_posts(array('post__in'=>get_option('sticky_posts')));
foreach ($sticky_posts as $sticky) {
	echo '<li';
	if(is_single($sticky->ID)) echo ' class="current_sticky"';
	echo '><a href="'.get_permalink($sticky->ID).'">'.$sticky->post_title."</a></li>\n";
}
?>

<?php endif; ?>
</ul>
</div>

