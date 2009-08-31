
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
 </div>   
 
<?php $url = get_stylesheet_directory_uri()?>


<div id="login-box">
    <div class="label">Email Address</div>
    <input class="login-input" type="text">
    <div class="label">Password</div>
    <input class="login-input" type="text">
    <div class="label">URL</div>
        <div class="login-input mimic-input">
            <span style="color:#CCCCCC">www.skinee.com/</span>
            <input id="real-url" type="text" maxlength="24" size="26">
        </div>
        <div style="text-align:center">
            <input id="loginbutton" type="button" value="">
        </div>           
    </div>
    <?php get_sidebar(); ?>  
</div>
                     

<?php get_footer(); ?>