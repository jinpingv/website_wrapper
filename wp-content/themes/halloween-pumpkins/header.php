<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head profile="http://gmpg.org/xfn/11">
<meta name="generator" content="WordPress" />
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="robots" content="index, follow" />
								  
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<!--[if IE]>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/ie.css" media="screen" type="text/css" />
<![endif]-->
<!--[if lte IE 7]><script src="<?php bloginfo('stylesheet_directory'); ?>/focus.js" type="text/javascript"></script><![endif]-->

<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/addPrintPage.js"></script>

<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_get_archives('type=monthly&format=link'); ?>

<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" type="image/x-icon" />

<title><?php if(is_home()) bloginfo('name'); 
elseif (is_search()) {echo 'Search Results for &#39;'.wp_specialchars($s,1).'&#39; on ';bloginfo('name');}
elseif (is_404()) {bloginfo('name');echo':Page not found!';}
elseif (is_tag()) {echo 'Entries listed under &#39;'.single_tag_title('',false). '&#39; on '.get_bloginfo('name');}
elseif (have_posts()) {wp_title('',true);if(wp_title('',false)) {echo ':';}	bloginfo('name');}
else {bloginfo('name');}?>
</title>

<?php if(is_singular()) wp_enqueue_script( 'comment-reply' );?>
<?php wp_head(); ?>
</head>

<body id="top">
<ul class="jumplinks">
<li><a href="#content">Jump to page content</a></li>
<li><a href="#sidebar">Jump to side navigation</a></li>
<li><a href="#footer">Jump to footer</a></li>
</ul>

<div id="header"><span id="logo"></span>
<h1><?php bloginfo('name'); ?><br /><small><?php bloginfo('description'); ?></small></h1>
</div>

<?php get_sidebar('top'); ?>
<?php get_sidebar('top2'); ?>


<div id="wrapper">
