		<!--Sidebar-->
        
        <div id="sidebar">
            <div class="sidebar-top"></div>
            
            <div class="sidebar-bottom"></div>
            <div class="sidebar-content eqh">
            <div class="sidebar-content-wrapper">

            <?php 
				if(is_page() || is_single()){
					/* Page & Post */
					generated_dynamic_sidebar(); 
				} else {
					/* Blog*/
					if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Main Sidebar') );
				}
			?>

            </div>
            </div>
        </div>
        <!--/Sidebar-->