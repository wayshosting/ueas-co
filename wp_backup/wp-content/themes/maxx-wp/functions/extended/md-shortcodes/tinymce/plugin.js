(function ()
{
	// create zillaShortcodes plugin
	tinymce.create("tinymce.plugins.zillaShortcodes",
	{
		init: function ( ed, url )
		{
			ed.addCommand("zillaPopup", function ( a, params )
			{
				var popup = params.identifier;
				
				// load thickbox
				tb_show("Insert Theme Shortcode", url + "/popup.php?popup=" + popup + "&width=" + 800);
			});
		},
		createControl: function ( btn, e )
		{
			if ( btn == "zilla_button" )
			{	
				var a = this;
				
				var btn = e.createSplitButton('zilla_button', {
                    title: "Insert Shortcode",
					image: ZillaShortcodes.plugin_folder +"/tinymce/images/icon.png",
					icons: false
                });
				

                btn.onRenderMenu.add(function (c, b)
				{					
					
					a.addWithPopup( b, "1. Buttons", "button" );
					a.addWithPopup( b, "2. Border Frame", "borderframe" );
					a.addImmediate( b, "3. Blockquote", "[blockquote]Replace your content[/blockquote]" );
					a.addWithPopup( b, "4. Columns", "columns" );
					a.addWithPopup( b, "5. Contact form", "contactform" );
					c=b.addMenu({title:"6. Divider"});
						a.addImmediate( c,"Default","[divider]" );
						a.addImmediate( c,"Default (no margin top)","[divider type=\"nomargintop\"]" );
						a.addImmediate( c,"Default (small margin)","[divider type=\"smallmargin\"]" );
						a.addImmediate( c,"Default (small margin & no margin top)","[divider type=\"smallmargin nomargintop\"]" );
						a.addImmediate( c,"Default (large margin)","[divider type=\"largemargin\"]" );
						a.addImmediate( c,"Default (large margin & no margin top)","[divider type=\"largemargin nomargintop\"]" );
						a.addImmediate( c,"Clear (no image)","[divider type=\"clear\"]" );
						a.addImmediate( c,"Heading","[divider type=\"heading\"]" );
						a.addImmediate( c,"Heading (no margin top)","[divider type=\"heading nomargintop\"]" );
						a.addImmediate( c,"Shadow","[divider type=\"shadow\"]" );
						a.addImmediate( c,"Back to top","[divider type=\"back-top\"]" )
					c=b.addMenu({title:"7. Dropcap"});
						a.addImmediate( c,"Default Dropcap","[dropcap]1[/dropcap]" );
						a.addImmediate( c,"Dropcap color (default by theme)","[dropcap type=\"primary\"]1[/dropcap]" );
						a.addImmediate( c,"First letter (no background)","[dropcap type=\"letter\"]C[/dropcap]" );
						a.addImmediate( c,"Circle Dropcap","[dropcap type=\"circle\"]1[/dropcap]" );
						a.addImmediate( c,"Circle Dropcap color (default by theme)","[dropcap type=\"circleprimary\"]1[/dropcap]" );
						a.addImmediate( c,"Quote mark","[dropcap type=\"quote\"]1[/dropcap]" );
					a.addWithPopup( b, "8. Google Map", "gmap" );					
					c=b.addMenu({title:"9. Icon Boxes"});
						a.addWithPopup( c, "Icon Boxes 1", "iconboxes" );
						a.addWithPopup( c, "Icon Boxes 2", "iconboxes2" );
					a.addWithPopup( b, "10. Image Lightbox", "lightbox" );
					a.addWithPopup( b, "11. List", "list" );
					a.addWithPopup( b, "12. Notification", "notification" );
					c=b.addMenu({title:"13. Pricing Table"});
						a.addWithPopup( c, "Add new Table", "pricingtable" );	
						a.addWithPopup( c, "Add Features Column", "pricingfeatures" );	
						a.addWithPopup( c, "Add Plan Column", "pricingplan" );				
						a.addImmediate( c, "Icon check","[pt_icon_check]" );
						a.addImmediate( c, "Icon cross","[pt_icon_cross]" );
					a.addWithPopup( b, "14. Recent/Popular Posts", "posts" );
					a.addWithPopup( b, "15. Recent Porfolio", "cportfolio" );
					a.addWithPopup( b, "16. Slider", "slider" );
					c=b.addMenu({title:"17. Table"});
						a.addImmediate( c, "Table (table)","[table][/table]" );
						a.addImmediate( c, "Group header (thead)","[thead][/thead]" );
						a.addImmediate( c, "Group body (tbody)","[tbody][/tbody]" );
						a.addImmediate( c, "Rows (tr)","[tr][/tr]" );
						a.addImmediate( c, "Header cell (th)","[th][/th]" );
						a.addImmediate( c, "Standard cell (td)","[td][/td]" );
					a.addWithPopup( b, "18. Tabs, toggle, accordion", "att" );
					a.addWithPopup( b, "19. Typography", "headings" );
					a.addWithPopup( b, "20. Testimonial", "testimonial" );
					a.addWithPopup( b, "21. Video", "video" );
				});
                
                return btn;
			}
			
			return null;
		},
		addWithPopup: function ( ed, title, id ) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand("zillaPopup", false, {
						title: title,
						identifier: id
					})
				}
			})
		},
		addImmediate: function ( ed, title, sc) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand( "mceInsertContent", false, sc )
				}
			})
		},
		getInfo: function () {
			return {
				longname: 'Zilla Shortcodes',
				author: 'Orman Clark',
				authorurl: 'http://themeforest.net/user/ormanclark/',
				infourl: 'http://wiki.moxiecode.com/',
				version: "1.0"
			}
		}
	});
	
	// add zillaShortcodes plugin
	tinymce.PluginManager.add("zillaShortcodes", tinymce.plugins.zillaShortcodes);
})();