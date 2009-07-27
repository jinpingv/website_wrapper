    //    "contentready" event handler for the "menubuttonsfrommarkup" <fieldset>
 
    YAHOO.util.Event.onContentReady("menubuttonsfrommarkup", function () {
        var theme = [ "Electric-Acid", "Paint-Splash", "popdellic" ];
        var site = [    { name: "facebook",            URL: "http://facebook.com",            icon: "facebook-logo.png" },
                                    { name: "flickr",            URL: "http://flickr.com",            icon: "flickr-logo.png" }];
        var tbcolor = [ { name: "pink", color: "rgb(255, 0, 204)" },
                                    { name: "red", color: "rgb(236, 32, 36)" },
                                    { name: "purple", color: "rgb(102, 0, 153)" },
                                    { name: "blue", color: "rgb(51, 102, 255)" },
                                    { name: "light_blue", color: "rgb(0, 0, 127)" },
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
        for(var i = 0; i < 2; i++) {
            document.getElementById('siteBox' + i).src = 'url(logos/)' + site[i].icon;
            YAHOO.util.Event.addListener('siteBox' + i, 'click', function(p_oEvent, idx) { setSite(idx); }, i);
        }
        setSite(0);
        
        // init theme
        setTheme = function(idx) {
                for(var j = 1; j <= 5; j++) {
                    YAHOO.util.Dom.setStyle('div' + j, 'backgroundImage', 'url(themes/' + theme[idx] + '/' + theme[idx] + '_0' + j + '.png)');
                }
        };

        // init theme menu
        for(var i = 0; i < 3; i++) {
            YAHOO.util.Dom.setStyle('themeBox' + i, 'backgroundImage', 'url(themes/' + theme[i] + '/' + theme[i] + '.png)')
            YAHOO.util.Event.addListener('themeBox' + i, 'click', function(p_oEvent, idx) {
                        setTheme(idx);
                    }, i);
        }        
        setTheme(skineeData.theme);
        
        // init toolbar color
        setTBColor = function(idx) {
            document.getElementById('skinee-logo').src = 'assets/toolbar/' + tbcolor[idx].name + '_03.png';
            YAHOO.util.Dom.setStyle("toolbar", "backgroundImage", 'url(assets/toolbar/' + tbcolor[idx].name + '_02.png)' );
        }
        
        for(var i = 0; i < 9; i++) {
            YAHOO.util.Dom.setStyle('colorBox' + i, 'backgroundColor', tbcolor[i].color);
            YAHOO.util.Event.addListener('colorBox' + i, 'click', function(p_oEvent, idx) { setTBColor(idx); }, i);
        }
        
        setTBColor(skineeData.toolbarColor);
 
        //    Create a Button using an existing <input> and <select> element.
        //    Because the "type" attribute of the <input> element was set to 
        //    "submit" - clicking on any MenuItem in the Button's Menu will
        //    automatically submit the Button's parent <form>.
 
        
 
        //    "submit" event handler for the <form>
 
        var onExampleSubmit = function(p_oEvent) {
 
            var bSubmit = 
                    window.confirm("Are you sure you want to submit the form?");
 
            if(!bSubmit) {
                YAHOO.util.Event.preventDefault(p_oEvent);
            }
 
        };
 
 
        //    Add a "submit" event handler to the <form> to confirm that 
        //    clicking on one of the MenuItems in the Button's Menu 
        //    submits the <form>.
 
        YAHOO.util.Event.on("button-example-form", "submit", onExampleSubmit);
 
 
 
 
        //    Create a Button using an existing <input> element and a 
        //    YAHOO.widget.Overlay instance as its menu
 
        var oMenuButton3 = new YAHOO.widget.Button("btnURL", 
                                { type: "menu", menu: "menuURL" });

        var oBtnTheme = new YAHOO.widget.Button("btnTheme",
                    { type: "menu", menu: "menuTheme" });
        var oBtnTBColor = new YAHOO.widget.Button("btnTBColor",
                    { type: "menu", menu: "menuTBColor" });

        // use pre defined colors                    
        //var oColorPicker = new YAHOO.widget.ColorPicker("ColorPicker",
        //            { showhexcontrols: false,
        //                images : {
        //                    PICKER_THUMB: "assets/picker_thumb.png",
        //                    HUE_THUMB: "assets/hue_thumb.png" }});
                            
        //oColorPicker.on("rgbChange", function (p_oEvent) {
        //    var sColor = "#" + this.get("hex");
        //    YAHOO.util.Dom.setStyle("toolbar", "backgroundColor", sColor);
        //})
        
        var oBtnSave = new YAHOO.widget.Button("btnSave");
        var oBtnCancel = new YAHOO.widget.Button("btnCancel");
        
        onBtnSaveClick = function(evt) {
            alert('clicked');
        };
        
        oBtnSave.on('click', onBtnSaveClick);
        
        resize_all();
    });
 
 function resize_all() {
     //alert("resize");
  var winWidth = 0, winHeight = 0;
  if( typeof( window.innerWidth ) == 'number' ) {
    //Non-IE
    winWidth = window.innerWidth;
    winHeight = window.innerHeight;
  } else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
    //IE 6+ in 'standards compliant mode'
    winWidth = document.documentElement.clientWidth;
    winHeight = document.documentElement.clientHeight;
  } else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
    //IE 4 compatible
    winWidth = document.body.clientWidth;
    winHeight = document.body.clientHeight;
  }
  //window.alert( 'Width = ' + winWidth );
  //window.alert( 'Height = ' + winHeight );

    var iframeWidth = 1024;
    var sideWidth = (winWidth - iframeWidth)/2;
    if(sideWidth <= 50) {
        sideWidth = 50;
    }
    var toolbarMargin = (winWidth - 1200) / 2;
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
 