// JavaScript Document


/*Maxx Scroll2Fixed;
//Author Manh
//Email:manh.dinh@me.com
//Date Created: 08/12/2011
*/
(function($)
{
    $.fn.scroll2Fixed = function(options){
		var defaults = 
        {
			fixTop:0, /*top position*/
		   	stopAt:""/*id of the tag you to stop at*/
        };
		var options = $.extend(defaults, options);
		
		return this.each(function(){
			
			var opts = options,
			obj = $(this);
			
			var currentHeight = obj.outerHeight(),
				currentWidth = obj.outerWidth(),
				offsetStart = obj.offset().top,
				offsetStop = $("#" + opts.stopAt).offset().top;
			
				
			$(window).scroll(function(){
				var ScrollerPosition= $(window).scrollTop();
				
				if(ScrollerPosition >= offsetStart){
					obj.css({position:"fixed",top:opts.fixTop,width:currentWidth});
				};		
				
				/*Check when sroll to offsetStar*/
				if(ScrollerPosition >= (offsetStop - currentHeight) ){
					obj.css({top:offsetStop - currentHeight,position:"absolute"});
				};		
				
				if(ScrollerPosition <= offsetStart){
					obj.css({top:offsetStart,position:"static"});
		
				};
			});
		});
	}
})(jQuery);




// JavaScript Document
jQuery(document).ready(function($) {
 
	$("#side-nav li a").each(function(index, element) {
       $(this).click(function(event){		
		event.preventDefault();
		$('html,body').animate({scrollTop:$(this.hash).offset().top}, 800);
	});
    });
	
	$("#side-nav li").click(function(){
		$("#side-nav li").removeClass('active');	
		$(this).addClass('active');	
	})
});
