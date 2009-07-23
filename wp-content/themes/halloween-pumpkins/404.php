<?php ob_start(); ?>
<?php header("HTTP/1.1 404 Not Found"); ?>
<?php header("Status: 404 Not Found"); ?>

<?php $requested = 'http';
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on') $requested .= 's';
$requested .= '://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$bits = explode('/',$requested);
$poss_slug = $bits[count($bits)-2];
if(get_posts('name='.$poss_slug)) $poss_posts = get_posts('name='.$poss_slug);
?>

<?php get_header(); ?>
<div id="content">

<div <?php post_class('page');?>>
<h2 class="post-title">Error!</h2>
<p>I can't find:</p><p><strong><?php echo $requested;?></strong></p>

<?php if(count($poss_posts) > 0) :?>
<p>But I did find:</p><ul>
<?php foreach($poss_posts as $post ) : ?>
<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<?php endforeach; ?>
</ul>

<?php else:?>
<p>Perhaps you:</p>
<ul>
<li>tried to access a page or entry which has been removed?</li>
<li>followed a bad link?</li>
<li>mis-typed something?</li>
</ul>
<p>Try locating the page you need using the navigation menus or the Search facility.</p>
<?php endif;?>

<p class="backtohome"><a href="<?php bloginfo('url');?>">Home</a></p>
</div>

</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>

<?php
function poss_links($arry) {
	
}

?>