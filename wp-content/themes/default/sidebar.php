<div id="sidebar">
	
    <?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar('sidebar1') ) : ?>
    <!--<?php wp_list_pages('title_li=' . __('Pages:')); ?>-->
	<!--<?php wp_list_bookmarks('title_after=&title_before='); ?>-->
	<!--<?php wp_list_categories('title_li=' . __('Categories:')); ?>-->
                <ul>
                    <?php wp_register(); ?>
                    <li><?php wp_loginout('index.php'); ?></li>
                </ul>   
	<?php endif; ?>

	<div id="footer">
		<p>Powered by <a href="http://wordpress.org/">Wordpress </a> </p><p><a href="http://mac-host.com/slidingdoor/">Slidingdoor</a> theme by <a href="http://macintoshhowto.com/">PJin</a></p>	
	</div>
		
</div>