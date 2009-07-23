<?php

if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name'=> 'Top 1',
		'id' => 'nav',
		'before_widget' => '<li id="%1$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name'=> 'Top 2',
		'id' => 'nav2',
		'before_widget' => '<li id="%1$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name'=> 'Sidebar',
		'id' => 'sidebar',
		'before_widget' => '<li id="%1$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name'=> 'Widgetised Page',
		'id' => 'page',
		'before_widget' => '<div class="widget_wrapper"><div class="widget_box">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}

// is_subpage conditional
function is_subpage() {
	global $post, $wpdb;
	if ( is_page() AND isset( $post->post_parent ) != 0 ) 	{
		$aParent = $wpdb->get_row( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE ID = %d AND post_type = 'page' LIMIT 1", $post->post_parent ) );
		if ( $aParent->ID ) return true; else return false;
	}
	else return false;
}

// show all children of a post or page
function ShowChildren($curr_post) {
	$output= '';
	if($curr_post->post_parent) $children = wp_list_pages('title_li=&child_of='.$curr_post->post_parent.'&echo=0');
	else $children = wp_list_pages('title_li=&child_of='.$curr_post->ID.'&echo=0');
	if ($children) {
		$output .= '<div id="showchildren"><h3>Pages in This Section</h3><ul>'."\n";
		$output .= $children;
		$output .= "</ul></div>\n";
	}
	return $output;
}

// create icon and text link for attachments
function my_attachment_link($id) {
	// grab file extension
	$bits = explode('.',get_attached_file($id));
	$ext = '.'.$bits[count($bits)-1].' format';
	// get the icon link
	$icon_link = wp_get_attachment_link($id,'thumbnail',false,true);
	// get the text link
	$text_link = wp_get_attachment_link($id,'',false,false);
	// get the filesize in kilobytes
	 $filesize = ceil(filesize(get_attached_file($id))/1024).'K';
	 return $icon_link. ' '.$text_link.' <small>('.$ext.' '.$filesize.')</small>';
}

// create download link based on attachment mime type
function my_download_link($my_mime_type) {
	$download='';
	switch (true) {
		case (stristr($my_mime_type,'pdf')):
		$download = '<a href="http://www.adobe.com/products/acrobat/readstep2.html">Adobe Acrobat Reader</a>';
		break;

		case (stristr($my_mime_type,'msword')):
		$download = 'Microsoft<sup>&reg;</sup> Word or <a href="http://www.microsoft.com/downloads/details.aspx?FamilyID=95e24c87-8732-48d5-8689-ab826e7b8fdf">Word Viewer 2003</a>';
		break;

		case (stristr($my_mime_type,'excel')):
		$download = 'Microsoft<sup>&reg;</sup> Excel or <a href="http://www.microsoft.com/downloads/details.aspx?FamilyID=c8378bf4-996c-4569-b547-75edbd03aaf0">Excel Viewer 2003</a>';
		break;

		case (stristr($my_mime_type,'powerpoint')):
		$download = 'Microsoft<sup>&reg;</sup> Powerpoint or <a href="http://www.microsoft.com/downloads/details.aspx?FamilyId=428D5727-43AB-4F24-90B7-A94784AF71A4">Powerpoint Reader</a>';
		break;

		case (stristr($my_mime_type,'quicktime')):
		$download = '<a href="http://www.apple.com/quicktime/download/">Quicktime</a>';
		break;
	}
	if($download !='') return 'This file requires '.$download;
}

/* customised comment template */
function my_theme_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	static $my_comment_count=0;
	$my_comment_count++;
	$li_title='';
	$post = get_post($post_id);
	if ($comment->user_id === $post->post_author) $li_title=' title="Comment by post author"';
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>"<?php echo $li_title;?>>
	<div class="comment-wrapper">

	<?php echo get_avatar($comment,$size='32'); ?><?php printf(('<cite>%s</cite>'), get_comment_author_link()) ?> - <span class="commentdata"><a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID ) ) ?>"><?php printf(('%1$s at %2$s'), get_comment_date(), get_comment_time()) ?></a></span>

	<div class="comment_text"><?php comment_text() ?></div>
	
	<?php if ($comment->comment_approved == '0') : ?>	<p class="moderated"><strong>This comment is currently in a moderation queue.</strong></p><?php endif; ?>

	<ul class="reply-edit">
	<li class="reply_to"><?php comment_reply_link(array_merge( $args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => 'Reply to comment '.$my_comment_count))) ?></li>
	<?php edit_comment_link(('Edit comment '.$my_comment_count),'<li class="edit_comment">','</li>') ?>
	</ul>
	
	</div>
	<?php
}

// add a microid to all the comments
function comment_add_microid($classes) {
	$c_email=get_comment_author_email();
	$c_url=get_comment_author_url();
	if (!empty($c_email) && !empty($c_url)) {
		$microid = 'microid-mailto+http:sha1:' . sha1(sha1('mailto:'.$c_email).sha1($c_url));
		$classes[] = $microid;
	}
	return $classes;
}
add_filter('comment_class','comment_add_microid');

// Amended Gallery shortcode
remove_shortcode('gallery');
add_shortcode('gallery', 'my_gallery_shortcode');
function my_gallery_shortcode($attr) {
	global $post;

	// Allow plugins/themes to override the default gallery template.
	$output = apply_filters('post_gallery', '', $attr);
	if ( $output != '' )  return $output;

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] ) unset( $attr['orderby'] );
	}

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'dl',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 3,
		'size'       => 'thumbnail'
	), $attr));

	$id = intval($id);
	$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

	if ( empty($attachments) ) return '';

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $id => $attachment )
			$output .= wp_get_attachment_link($id, $size, true) . "\n";
		return $output;
	}

	$itemtag = tag_escape($itemtag);
	$captiontag = tag_escape($captiontag);
	$columns = intval($columns);
	$itemwidth = $columns > 0 ? floor(100/$columns) : 100;

	$output = '<div class="gallery">'."\n";

	$i = 0;
	foreach ( $attachments as $id => $attachment ) {
		$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);
		$output .= "\n<".$itemtag.' class="gallery-item" style="width:'.$itemwidth.'%;">'."\n";
		$output .= '<'.$icontag.' class="gallery-icon">'.$link.'</'.$icontag.'>';
		if ( $captiontag && trim($attachment->post_excerpt) ) {
			$output .= '<'.$captiontag.' class="gallery-caption">'.$attachment->post_excerpt.'</'.$captiontag.'>';
		}
		$output .= '</'.$itemtag.'>'."\n";
		if ( $columns > 0 && ++$i % $columns == 0 )
			$output .= "\n".'<br class="clear" />'."\n";
	}

	$output .= "\n".'<br class="clear" />'."</div>\n";

	return $output;
}

/* Header customisation */
define('HEADER_TEXTCOLOR', 'FDBC0A');
define('HEADER_IMAGE', '%s/images/header.jpg'); // %s is theme dir uri
define('HEADER_IMAGE_WIDTH', 543);
define('HEADER_IMAGE_HEIGHT', 170);

function theme_admin_header_style() {
	?>
<style type="text/css">
@import url(<?php bloginfo('template_directory'); ?>/admin-custom-header.css);
</style>
	<?php
}

function theme_header_style() {
	?>
<style type="text/css">
#header {background:url(<?php header_image(); ?>) no-repeat;}
#header h1 {color:#<?php header_textcolor();?>;}
</style>
	<?php
}
if ( function_exists('add_custom_image_header') ) add_custom_image_header('theme_header_style', 'theme_admin_header_style');

// Admin - set front page sticky post display
add_action('admin_menu', 'theme_admin');
if (!function_exists('theme_admin')) {
    // used by the admin panel hook
    function theme_admin() {    
        if (function_exists('add_menu_page')) {
			add_theme_page(__('Sticky Post Display','halloween_sticky_onfront'), __('Sticky Post Display','halloween_sticky_onfront'),7, basename('halloween_sticky_onfront.php'),'halloween_sticky_admin');
    	}        
    }
}
function halloween_sticky_admin() {
?>
<div class="wrap">
<?php
echo '<h2>'.__('Sticky Post Display','halloween_sticky_onfront').'</h2>'."\n";
	global $wpdb;
	if(isset($_POST['submit'])) {
		if($_POST['halloween_sticky_post_display']=='1') update_option('halloween_sticky_post_display',$wpdb->escape($_POST['halloween_sticky_post_display']));
		else delete_option('halloween_sticky_post_display');

		echo'<div id="message" class="updated fade"><p>'.__('The current theme has been updated.','halloween_sticky_onfront').'</p></div>'."\n";
	}
	?>
	<p><?php _e('Select whether to display sticky posts on the front page.','halloween_sticky_onfront'); ?></p>
	<p><?php _e('Selecting "No" deletes any previous settings from the database.','halloween_sticky_onfront'); ?></p>

	<form method="post" action="" id="halloween_sticky_onfront">
	<fieldset>
	<?php wp_nonce_field('theme-options') ?>
	<p><label for="halloween_sticky_post_display"><?php _e('Display sticky posts on front page','halloween_sticky_onfront'); ?></label>
	<select name="halloween_sticky_post_display" id="halloween_sticky_post_display">
	<option value="0"<?php if (!get_option('halloween_sticky_post_display')) echo ' selected="selected"';?>>No</option>
	<option value="1"<?php if (get_option('halloween_sticky_post_display')) echo ' selected="selected"';?>>Yes</option>
	</select></p>

	<div>
	<input type="hidden" name="action" value="update" />
	</div>

	<p class="submit"><input type="submit" name="submit" class="button-primary" value="<?php _e('Update Theme') ?>" /></p>
	</fieldset>
	</form>
	</div>
	<?php
}

?>