<?php
/**
 * Los menus preestablecidos
 * Default menus top and primary
 *
 * @package ekiline
 */


/**
 * Agregar logotipo a menu
 * Adding logo image to navbar-brand:
 **/
 
function logoTheme() {
    //variables de logotipo
    $logoHor = get_theme_mod( 'ekiline_logo_max' );
    $logoIcono = get_site_icon_url();
    
    if ( $logoHor && !$logoIcono ) {
        echo '<img class="img-fluid" src="' . $logoHor . '" alt="' . get_bloginfo( 'name' ) . '"/>';
    } elseif ( !$logoHor && $logoIcono ) {
        echo '<img class="brand-icon" src="' . $logoIcono . '" alt="' . get_bloginfo( 'name' ) . '"/>' . get_bloginfo( 'name' );
    } elseif ( $logoHor && $logoIcono ) {
        echo '<img class="img-fluid d-none d-md-block" src="' . $logoHor . '" alt="' . get_bloginfo( 'name' ) . '"/>
        <span class="d-block d-md-none"><img class="brand-icon" src="' . $logoIcono . '" alt="' . get_bloginfo( 'name' ) . '"/>' . get_bloginfo( 'name' ) . '</span>';
    } else {
        echo get_bloginfo( 'name' );
    } 
}

/**
 * Top menu
 * Se complementa con acciones preestablecidas en customizer.php
 * Works with customizer.php
 **/

function topNavbar(){

	$navSet = get_theme_mod('ekiline_topmenuSettings');
	
	if ($navSet == '0') {
	    $navAction = ' static-top';
    } else if ($navSet == '1') {
        $navAction = ' fixed-top'; 
    } else if ($navSet == '2') {
        $navAction = ' fixed-bottom'; 
    } else if ($navSet == '3') {
        $navAction = ' navbar-sticky'; 
    }	
    
	if( true === get_theme_mod('ekiline_inversemenu') ){
	    $inverseMenu = 'navbar-dark bg-dark'; 
    } else {
        $inverseMenu = 'navbar-light bg-light';
    }
	
	$navStyle = get_theme_mod('ekiline_topmenuStyles');
	
	if ($navStyle == '0') {
	    $navAlign = ' mr-auto';
		$navHelper = '';
    } else if ($navStyle == '1') {
        $navAlign = ''; 
		$navHelper = ' justify-content-md-center';
    } else if ($navStyle == '2') {
        $navAlign = ' ml-auto'; 
		$navHelper = '';
    } 		
	
		
	if ( has_nav_menu( 'top' ) ) : ?>
	
	<nav id="site-navigation-top"  class="navbar <?php echo $inverseMenu;?> navbar-expand-md top-navbar<?php echo $navAction;?>" role="navigation">
	    <div class="container">

            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php logoTheme(); ?></a>
                        
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target=".navbar-collapse.top">
      			<!--span class="navbar-toggler-icon"></span--><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>

	        
	        <div id="navbar-collapse-out" class="collapse navbar-collapse top<?php echo $navHelper;?>">

			<span class="navbar-text d-none d-sm-block"><?php echo get_bloginfo( 'description' ); ?></span>        	
	        
    	        <?php wp_nav_menu( 
                        array(
        	                'menu'              => 'top',
        	                'theme_location'    => 'top',
        	                'depth'             => 2,
        	                'container'         => '',
        	                'menu_class'        => 'navbar-nav'.$navAlign,
        	                'menu_id'           => 'top-menu',
                            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
        	                'walker'            => new WP_Bootstrap_Navwalker()
    	                )
    	              ); ?>
    	
    			<?php dynamic_sidebar( 'navwidget-nw1' ); ?>     
	        
	        </div>
	    </div><!-- .container -->         
	</nav><!-- .site-navigation -->         
	<?php endif;

} 



/**
 * Primary menu (wordpress default)
 * Este se activa dentro del contenedor general (#page)
 * This is wp default menu position, it appears inside general container (#page)
 **/

function primaryNavbar(){
        
    $navSet = get_theme_mod('ekiline_primarymenuSettings');
    
	if ($navSet == '0') {
	    $navAction = ' static-top';
    } else if ($navSet == '1') {
        $navAction = ' fixed-top'; 
    } else if ($navSet == '2') {
        $navAction = ' fixed-bottom'; 
    } else if ($navSet == '3') {
        $navAction = ' navbar-sticky'; 
    } 

    if( true === get_theme_mod('ekiline_inversemenu') ){
         $inverseMenu = 'navbar-dark bg-dark'; 
    } else {
         $inverseMenu = 'navbar-light bg-light';
    }
	
	$navStyle = get_theme_mod('ekiline_primarymenuStyles');
	
	if ($navStyle == '0') {
	    $navAlign = ' mr-auto';
		$navHelper = '';
    } else if ($navStyle == '1') {
        $navAlign = ''; 
		$navHelper = ' justify-content-md-center';
    } else if ($navStyle == '2') {
        $navAlign = ' ml-auto'; 
		$navHelper = '';
    } 		
    	
    if ( has_nav_menu( 'primary' ) ) : ?>
    
            <nav id="site-navigation-primary"  class="navbar <?php echo $inverseMenu;?> navbar-expand-md primary-navbar<?php echo $navAction;?>" role="navigation">
                <div class="container">

		            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php logoTheme(); ?></a>

		            <span class="navbar-text d-none d-sm-block"><?php echo get_bloginfo( 'description' ); ?></span>
		            
		            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target=".navbar-collapse.primary">
		      			<!--span class="navbar-toggler-icon"></span--><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
		            </button>
		                                       
                    <!-- The WordPress Menu goes here -->
                    <?php wp_nav_menu( array(
                            'menu'              => 'primary',
                            'theme_location'    => 'primary',
                            'depth'             => 2,
                            'container'         => 'div',
                                'container_class'   => 'collapse navbar-collapse primary'.$navHelper,
                                'container_id'      => 'navbar-collapse-in',
                            'menu_class'        => 'navbar-nav'.$navAlign,
                            'menu_id'           => 'main-menu',
                            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'            => new WP_Bootstrap_Navwalker()
                            )
                          ); ?>                           
                    
            		<?php dynamic_sidebar( 'navwidget-nw2' ); ?>     
            		
                </div><!-- .container -->  
            </nav><!-- .site-navigation -->		
            
    <?php endif;
}

function modalNavbar(){

    $navSet = get_theme_mod('ekiline_modalNavSettings');
        
	if ($navSet == '0') {
	    $navAction = ' static-top';
    } else if ($navSet == '1') {
        $navAction = ' fixed-top'; 
    } else if ($navSet == '2') {
        $navAction = ' fixed-bottom'; 
    } else if ($navSet == '3') {
        $navAction = ' navbar-sticky'; 
    }
        
    
    if( true === get_theme_mod('ekiline_inversemenu') ){
        $inverseMenu = 'navbar-dark bg-dark'; 
    } else {
        $inverseMenu = 'navbar-light bg-light';
    }
    
	$navStyle = get_theme_mod('ekiline_modalNavStyles');
	
	if ($navStyle == '0') {
	    $showModal = '';
    } else if ($navStyle == '1') {
        $showModal = 'move-from-bottom'; 
    } else if ($navStyle == '2') {
        $showModal = 'left-aside'; 
    } else if ($navStyle == '3') {
        $showModal = 'right-aside'; 
    } 
        
    if ( has_nav_menu( 'modal' ) ) : ?>
    
    <div id="site-navigation-modal"  class="navbar <?php echo $inverseMenu;?> modal-navbar<?php echo $navAction;?>" role="navigation">
        
        <div class="container">
        	
        	
	        <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php logoTheme(); ?></a>
	        
	        <button class="navbar-toggler collapsed" type="button" data-toggle="modal" data-target="#navModal">
      			<!--span class="navbar-toggler-icon"></span--><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
	        </button>
            
        </div><!-- .container -->      
           
    </div><!-- .site-navigation -->     

	<!-- tipos de animacion: .zoom, .newspaper, .move-horizontal, .move-from-bottom, .unfold-3d, .zoom-out, .left-aside, .right-aside-->
    <div id="navModal" class="modal fade <?php echo $showModal;?>" tabindex="-1" role="dialog" aria-labelledby="navModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="modal-title text-center" id="navModalLabel"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></h5>
          </div>


            <?php wp_nav_menu( 
                    array(
                        'menu'              => 'modal',
                        'theme_location'    => 'modal',
                        'depth'             => 2,
                        'container'         => 'nav',
                        'container_class'   => 'modal-body',
                        'menu_class'        => 'navbar-nav mr-auto',
                        'menu_id'           => 'modal-menu',
                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'            => new WP_Bootstrap_Navwalker()
                    )
                  ); ?>
        

          <!--div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div-->
        </div>
      </div>
    </div>
    
        
    <?php endif;

} 
