<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
<style type="text/css"> 
/*margin and padding on body element
  can introduce errors in determining
  element position and are not recommended;
  we turn them off as a foundation for YUI
  CSS treatments. */
body {
	margin:0;
	padding:0;
}
</style> 
 
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/fonts/fonts-min.css" /> 
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/menu/assets/skins/sam/menu.css" /> 
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/button/assets/skins/sam/button.css" /> 


<script src="http://yui.yahooapis.com/2.7.0/build/yahoo/yahoo-min.js"></script> 
<script src="http://yui.yahooapis.com/2.7.0/build/dom/dom-min.js"></script> 
<script type="text/javascript" src="http://yui.yahooapis.com/2.7.0/build/yahoo-dom-event/yahoo-dom-event.js"></script> 
<script type="text/javascript" src="http://yui.yahooapis.com/2.7.0/build/container/container_core-min.js"></script> 
<script type="text/javascript" src="http://yui.yahooapis.com/2.7.0/build/menu/menu-min.js"></script> 
<script type="text/javascript" src="http://yui.yahooapis.com/2.7.0/build/element/element-min.js"></script> 
<script type="text/javascript" src="http://yui.yahooapis.com/2.7.0/build/button/button-min.js"></script> 

<script type="text/javascript" src="http://yui.yahooapis.com/2.7.0/build/utilities/utilities.js" ></script> 
<script type="text/javascript" src="http://yui.yahooapis.com/2.7.0/build/slider/slider-min.js" ></script> 

<?php $url = get_stylesheet_directory_uri()?>

<?php
    if (have_posts()) {
        the_post();
    }
    $post_id=get_the_ID();
    
    $theme_str = get_post($post_id)->post_content;
    sscanf($theme_str,"%s %d %d %d",$site_url, $tbcl,$site_id,$theme_id);

?> 


<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $url; ?>/skinee_single.css">
        <title>Skinee</title>
    </head>
    <body class="yui-skin-sam" onresize="resize_all();">
<script type="text/javascript"> 
 
	//	"contentready" event handler for the "menubuttonsfrommarkup" <fieldset>
 
	YAHOO.util.Event.onContentReady("menubuttonsfrommarkup", function () {
		var theme = [ { name: "Electric Acid", prefix: "Electric-Acid" },
									{ name: "Paint Splash", prefix: "Paint-Splash" },
									{ name: "popdellic", prefix: "popdellic" } ];
									
		var site = [	{ name: "facebook",			URL: "http://facebook.com",			icon: "facebook-logo.png" },
									{ name: "flickr",			URL: "http://flickr.com",			icon: "flickr-logo.png" },
									{ name: "ebay",				URL: "http://ebay.com",			icon: "ebay-logo.png" },
									{ name: "cnn", 				URL: "http://cnn.com",			icon: "cnn-logo.png"},
									{ name: "wikipedia",		URL: "http://wikipedia.org", icon: "wikipedia-logo.png"},
									{ name: "google",			URL: "http://google.com", 		icon: "google_logo.png"} ];
									
		var tbcolor = [ { name: "pink", color: "rgb(255, 0, 204)" },
									{ name: "Red", color: "rgb(236, 32, 36)" },
									{ name: "purple", color: "rgb(102, 0, 153)" },
									{ name: "blue", color: "rgb(51, 102, 255)" },
									{ name: "light-blue", color: "rgb(238, 249, 251)" },
									{ name: "green", color: "rgb(0, 204, 51)" },
									{ name: "yellow", color: "rgb(255, 204, 0)" },
									{ name: "grey", color: "rgb(153, 153, 153)" },
									{ name: "black", color: "rgb(35, 31, 32)" }];
									  
		var skineeData = {
			toolbarColor : 0,
			site : 0,
			theme : 0
		};
		
		// init site
		setSite = function(idx) {
			document.getElementById("iframeMain").src=site[idx].URL;
		}
		
		// init site menu
		for(var i = 0; i < site.length; i++) {
            document.getElementById('siteBox' + i).src = '<?php echo $url; ?>/logos/' + site[i].icon;
			YAHOO.util.Event.addListener('siteBox' + i, 'click', function(p_oEvent, idx) { setSite(idx); }, i);
		}
		setSite(0);
		
		// init theme
		setTheme = function(idx) {
				for(var j = 1; j <= 5; j++) {
                    YAHOO.util.Dom.setStyle('div' + j, 'backgroundImage', 'url(<?php echo $url; ?>/themes/' + theme[idx].prefix + '/' + theme[idx].prefix + '_0' + j + '.png)');
				}
		};

		// init theme menu
		for(var i = 0; i < theme.length; i++) {
            YAHOO.util.Dom.setStyle('themeBox' + i, 'backgroundImage', 'url(<?php echo $url; ?>/themes/' + theme[i] + '/' + theme[i] + '.png)')
			document.getElementById('themeBoxImg' + i).src = '<?php echo $url; ?>/themes/' + theme[i].prefix + '/' + theme[i].prefix + '.png';
			document.getElementById('themeBoxLabel' + i).innerHTML = theme[i].name;
			YAHOO.util.Event.addListener('themeBox' + i, 'click', function(p_oEvent, idx) {
						setTheme(idx);
					}, i);
		}		
		setTheme(skineeData.theme);
		
		// init toolbar color
		setTBColor = function(idx) {
            document.getElementById('skinee-logo').src = '<?php echo $url; ?>/assets/toolbar/' + tbcolor[idx].name + '_04.png';
            YAHOO.util.Dom.setStyle("toolbar", "backgroundImage", 'url(<?php echo $url; ?>/assets/toolbar/' + tbcolor[idx].name + '_02.png)' );
		}
		
		for(var i = 0; i < 9; i++) {
			YAHOO.util.Dom.setStyle('colorBox' + i, 'backgroundColor', tbcolor[i].color);
			YAHOO.util.Event.addListener('colorBox' + i, 'click', function(p_oEvent, idx) { setTBColor(idx); }, i);
		}
		
		setTBColor(skineeData.toolbarColor);
 
		//	Create a Button using an existing <input> and <select> element.
		//	Because the "type" attribute of the <input> element was set to 
		//	"submit" - clicking on any MenuItem in the Button's Menu will
		//	automatically submit the Button's parent <form>.
 
		
 
		//	"submit" event handler for the <form>
 
		var onExampleSubmit = function(p_oEvent) {
 
			var bSubmit = 
					window.confirm("Are you sure you want to submit the form?");
 
			if(!bSubmit) {
				YAHOO.util.Event.preventDefault(p_oEvent);
			}
 
		};
 
 
		//	Add a "submit" event handler to the <form> to confirm that 
		//	clicking on one of the MenuItems in the Button's Menu 
		//	submits the <form>.
 
		YAHOO.util.Event.on("button-example-form", "submit", onExampleSubmit);
 
 
 
 
		//	Create a Button using an existing <input> element and a 
		//	YAHOO.widget.Overlay instance as its menu
 
		var oMenuButton3 = new YAHOO.widget.Button("btnURL", 
								{ type: "menu", menu: "menuURL" });

		var oBtnTheme = new YAHOO.widget.Button("btnTheme",
					{ type: "menu", menu: "menuTheme" });
		var oBtnTBColor = new YAHOO.widget.Button("btnTBColor",
					{ type: "menu", menu: "menuTBColor" });

		// use pre defined colors					
		//var oColorPicker = new YAHOO.widget.ColorPicker("ColorPicker",
		//			{ showhexcontrols: false,
		//				images : {
		//					PICKER_THUMB: "assets/picker_thumb.png",
		//					HUE_THUMB: "assets/hue_thumb.png" }});
							
		//oColorPicker.on("rgbChange", function (p_oEvent) {
		//	var sColor = "#" + this.get("hex");
		//	YAHOO.util.Dom.setStyle("toolbar", "backgroundColor", sColor);
		//})
		
		var oBtnSave = new YAHOO.widget.Button("btnSave");
		var oBtnCancel = new YAHOO.widget.Button("btnCancel");
		
		onBtnSaveClick = function(evt) {
			alert('clicked');
            <?php 
                // Update post
                    
                //  $my_post = array();
                //  $my_post['ID'] = $post_id;
                //  $my_post['post_content'] = $site_url." ".$tbcl." ".$site_id." ".$theme_id;

                // Update the post into the database
                //  wp_update_post( $my_post );
            ?>
            
            alert('New theme for site ' + document.getElementById("iframeMain").src + ' saved');
		};
		
		oBtnSave.on('click', onBtnSaveClick);
		
		resize_all();
	});
 
 function resize_all() {
 	//alert("resize");
  var winWidth = 0, winHeight = 0;
	if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
    //IE 6+ in 'standards compliant mode'
    winWidth = document.documentElement.clientWidth;
    winHeight = document.documentElement.clientHeight;
  } else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
    //IE 4 compatible
    winWidth = document.body.clientWidth;
    winHeight = document.body.clientHeight;
  }  else if( typeof( window.innerWidth ) == 'number' ) {
    //Non-IE
    winWidth = window.innerWidth;
    winHeight = window.innerHeight;
  }
  //window.alert( 'Width = ' + winWidth );
  //window.alert( 'Height = ' + winHeight );

	if(winWidth < 1180)
		winWidth = 1180;
		
	var iframeWidth = 1024;
	var sideWidth = (winWidth - iframeWidth)/2;
	if(sideWidth <= 50) {
		sideWidth = 50;
	}
	var toolbarMargin = (winWidth - 1024) / 2;
	if(toolbarMargin < 0)
		toolbarMargin = 0;
		
	YAHOO.util.Dom.setStyle('wholepage', 'width', winWidth.toString() + "px");
	YAHOO.util.Dom.setStyle('toolbar', 'width', winWidth.toString() + "px");
	YAHOO.util.Dom.setStyle('divframe', 'width', winWidth.toString() + "px");
	YAHOO.util.Dom.setStyle('div1', 'width', sideWidth.toString() + "px");
	YAHOO.util.Dom.setStyle('divIframe', 'left', sideWidth.toString() + "px");
	YAHOO.util.Dom.setStyle('div5', 'width', sideWidth.toString() + "px");
	YAHOO.util.Dom.setStyle('div5', 'left', (iframeWidth + sideWidth).toString() + "px");
	YAHOO.util.Dom.setStyle('skinee-logo', 'margin-left', toolbarMargin.toString() + "px");
}
 
</script> 
<div id="wholepage"> 
<div id="toolbar">
<form id="button-example-form" name="button-example-form" method="post"> 
	<div style="float:left"><img id="skinee-logo"></div>
	<div id="menubuttonsfrommarkup" style="background-color:transparent">
		<span id="left_buttons" style="float:left">
		<input type="button" id="btnURL" name="btnURL_button" value="URL"> 
		<div id="menuURL" class="yui-overlay"> 
		    <div class="bd">
		    	<div>
		    		<div class="siteBox"><img id="siteBox0"></div>
		    		<div class="siteBox"><img id="siteBox1"></div>
		    	</div>
		    	<div>
		    		<div class="siteBox"><img id="siteBox2"></div>
		    		<div class="siteBox"><img id="siteBox3"></div>
		    	</div>	
		    	<div>
		    		<div class="siteBox"><img id="siteBox4"></div>
		    		<div class="siteBox"><img id="siteBox5"></div>
		    	</div>			    		    	
		    </div> 
		</div>

		<input type="button" id="btnTheme" name="btnTheme_button" value="Theme">
		<div id="menuTheme" class="yui-overlay">
			<div>
				<div class="themeBox" id="themeBox0"><img id="themeBoxImg0"><div id="themeBoxLabel0"></div></div>
				<div class="themeBox" id="themeBox1"><img id="themeBoxImg1"><div id="themeBoxLabel1"></div></div>
			</div>
			<div>
				<div class="themeBox" id="themeBox2"><img id="themeBoxImg2"><div id="themeBoxLabel2"></div></div>
				<div class="themeBox" id="themeBox3" style="background-color:#FF0000"></div>
			</div>
		</div>
		
		<input type="button" id="btnTBColor" name="btnTBColor" value="Toolbar Color">
		<div id="menuTBColor" class="yui-overlay">
			<div class="bd">
				<div>
					<div class="colorBox" id="colorBox0"></div>
					<div class="colorBox" id="colorBox1"></div>
					<div class="colorBox" id="colorBox2"></div>
				</div>
				<div>
					<div class="colorBox" id="colorBox3"></div>
					<div class="colorBox" id="colorBox4"></div>
					<div class="colorBox" id="colorBox5"></div>
				</div>
				<div>
					<div class="colorBox" id="colorBox6"></div>
					<div class="colorBox" id="colorBox7"></div>
					<div class="colorBox" id="colorBox8"></div>
				</div>								
			</div>
		</div></span>	
		
		<span style="float:left">
		<input type="button" id="btnSave" name="btnSave" value="">
		<input type="button" id="btnCancel" name="btnCancel" value="">
		</span>

	</div>       
</form> 
</div>

<div id="divframe">
	<div id="div1"></div>
	<div id="divIframe">
		<div id="div2"></div>
		<div id="div3"></div>
		<div id="div4"></div>		
		<iframe id="iframeMain" src=""></iframe>
	</div>
	<div id="div5"></div>
</div>

</div>
    </body>
</html>
