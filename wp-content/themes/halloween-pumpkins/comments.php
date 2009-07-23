<?php 
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) {
	echo '<p class="nocomments">This post is password protected. Enter the password to view comments.</p>';
	return;
}
?>

<?php if(have_comments()) : ?>
<h2 id="comments" class="total-comments"><?php comments_number('No comments', '1 Comment', '% Comments'); ?> on <?php the_title(); ?></h2>
<?php endif;?>

<ul class="comment_links">
<?php if ('open' == $post->comment_status) : ?><li><a href="#respond">Add your comment</a></li><?php endif;?>
<li><?php comments_rss_link('<abbr title="Really Simple Syndication">RSS</abbr> comments feed for this post'); ?></li>
<?php if(pings_open()) : ?><li><a href="<?php trackback_url();?>" rel="trackback">TrackBack <abbr title="Uniform Resource Identifier">URI</abbr></a></li><?php endif;?>
</ul>

<?php if(have_comments()) : ?>
<?php if(get_option('comment_order') == 'desc') {$nc = 'Older';$pc = 'Newer';}
else {$nc = 'Newer';$pc = 'Older';}?>

<ul class="prevnext comment-pagination">
<li class="prev"><?php next_comments_link($nc.' Comments'); ?></li>
<li class="next"><?php previous_comments_link($pc.' Comments');?></li>
</ul>

<ol id="commentlist">
<?php wp_list_comments('callback=my_theme_comments'); ?>
</ol>

<ul class="prevnext comment-pagination">
<li class="prev"><?php next_comments_link($nc.' Comments'); ?></li>
<li class="next"><?php previous_comments_link($pc.' Comments');?></li>
</ul>

<?php endif;?>

<?php if('open' == $post->comment_status) : ?>
<div id="respond">
<h3><?php comment_form_title( 'Leave a comment', 'Reply to %s' ); ?></h3>
<div class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></div>

<p class="comment_log_status">
<?php if (get_option('comment_registration') && !$user_ID ) : ?>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.
<?php elseif($user_ID ) : ?>You are currently logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a> - <a href="<?php echo wp_logout_url(get_permalink()); ?>">Log out</a><?php endif;?>
</p>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<fieldset>
<legend>Add Your Comment</legend>

<?php if(!$user_ID) : ?>
<p><label for="author" <?php if($req) echo 'class="req"';?>>Name <?php if($req) echo '<small>(required)</small>';?></label> <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="20" /></p>
<p><label for="email"<?php if($req) echo 'class="req"';?>>Email  <?php if($req) echo '<small>(required but will not be published)</small>'; ?></label> <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="40" /></p>
<p><label for="url">Website</label> <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="40" /></p>
<?php endif; ?>

<p><label for="comment" class="textarea"><span class="req">Comments <small>(required)</small></span><br />
<small class="allowed_markup">You can use the following <abbr title="eXtensible HyperText Markup Language">XHTML</abbr> tags: <code><?php echo allowed_tags(); ?></code></small><br /></label>
<textarea name="comment" id="comment" cols="100%" rows="10"></textarea></p>

<p class="submit_wrap"><input name="submit" type="submit" class="themed_button" value="Submit Comment" /> 
<?php do_action('comment_form', $post->ID); ?>
<?php comment_id_fields(); ?></p>
</fieldset>
</form>
</div>

<?php elseif(have_comments()) : ?>
<p class="comments-closed"><strong>Sorry, the comment form is now closed.</strong></p>
<?php endif;?>
