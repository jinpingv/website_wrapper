<!-- end wrapper -->
</div>
<?php $theme_data = get_theme_data(get_stylesheet_directory() . '/style.css');?>

<div id="footer">
<ul>
<li>Copyright &copy; <a href="<?php bloginfo('url');?>"></a><?php bloginfo('name');?></li>
<li>Powered by the <a href="<?php echo $theme_data['URI'];?>"><?php echo get_current_theme();?> Theme</a></li>
<?php wp_register('<li id="admin">', '</li>'); ?>
</ul>

<?php wp_footer(); ?>
</div>

</body>
</html>