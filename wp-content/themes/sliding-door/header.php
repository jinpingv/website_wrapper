<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title><?php 
	 	$replacethese = array('[',']');
		$replacewith = array(' ',' ');
		echo str_replace($replacethese, $replacewith, get_bloginfo('title')); ?>

	
	
	<?php if ( !(is_404()) && (is_single()) or (is_page()) or (is_archive()) ) { ?> &raquo; <?php wp_title(''); ?><?php } ?></title>

	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
	
	
<?php $url = get_stylesheet_directory_uri()?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $url; ?>/imagemenu/imageMenu.css">
<script type="text/javascript" src="<?php echo $url; ?>/imagemenu/mootools.js"></script>
<script type="text/javascript" src="<?php echo $url; ?>/imagemenu/imageMenu.js"></script>


	
</head>

<body>

<div id="wrapper">

<div id="welcomeheading">
<h1><a href="<?php bloginfo('url'); ?>/">

<?php 	$replacethese = array('[',']');
		$replacewith = array('<span id="middleword">','</span>');
		echo str_replace($replacethese, $replacewith, get_bloginfo('title')); ?>
		</a></h1>
</div>
	<div class="description"><?php bloginfo('description'); ?></div>

<div id="imageMenu">
			<ul>
				<!-- THESE AR ETHE LINKS YOU GO TO WHEN YOU CLICK ON A SLIDING DOOR IMAGE-->
				<!-- change the href to look like this: <a href="yourlink.com">     -->
				<li class="bk1"><a href="<?php bloginfo('url'); ?>/?cat=1">Category 1</a></li>
				<li class="bk2"><a href="<?php bloginfo('url'); ?>/?cat=2">Category 2</a></li>
				<li class="bk3"><a href="<?php bloginfo('url'); ?>/?cat=3">Category 3</a></li>
				<li class="bk4"><a href="<?php bloginfo('url'); ?>/?cat=4">Category 4</a></li>
				<li class="bk5"><a href="<?php bloginfo('url'); ?>/?cat=5">Category 5</a></li>
				<li class="bk6"><a href="<?php bloginfo('url'); ?>/?cat=6">Category 6</a></li>
				<li class="bk7"><a href="<?php bloginfo('url'); ?>/?cat=7">Category 7</a></li>
			</ul>
			</div>
		
<script type="text/javascript">
			
			window.addEvent('domready', function(){
				var myMenu = new ImageMenu($$('#imageMenu a'),{openWidth:310, border:2, onOpen:function(e,i){location=(e);}});
			});
		</script>	

		
