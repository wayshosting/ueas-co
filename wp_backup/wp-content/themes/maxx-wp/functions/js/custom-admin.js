jQuery(document).ready(function() {
    
	//Portfolio Metabox Hide/Show
	
    var portfolioType = jQuery('#md_portfolio_type'),
        portfolioImage = jQuery('#md-meta-box-portfolio-image'),
        portfolioVideo = jQuery('#md-meta-box-portfolio-video'),
        currentType = portfolioType.val();
        
    portfolioTypeSwitcher(currentType);

    portfolioType.change( function() {
       currentType = jQuery(this).val();
       
       portfolioTypeSwitcher(currentType);
    });
    
    function portfolioTypeSwitcher(currentType) {
        if( currentType === 'image' ) {
            hideAll(portfolioImage);
        } else {
            hideAll(portfolioVideo);
        }
    }
    
    function hideAll(notHide) {		
		portfolioImage.css('display', 'none');
		portfolioVideo.css('display', 'none');
		notHide.css('display', 'block');
	}
});