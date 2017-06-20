<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ekiline
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <meta name="description" content="<?php ekiline_description(); ?>" />
        <link href="<?php echo get_template_directory_uri() . '/css/bootstrap.min.css'; ?>" rel="stylesheet" type="text/css">   
        <link href="<?php echo get_template_directory_uri() . '/css/font-awesome.min.css'; ?>" rel="stylesheet" type="text/css">    
        <link href="<?php echo get_template_directory_uri() . '/css/ekiline.min.css'; ?>" rel="stylesheet" type="text/css">  
        <link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet" type="text/css">  
        <?php ekiline_csscolors(); ?>
    </head> 
    <body class="page-maintenance"> 
        <header id="masthead"  class="cover-wrapper">
            <div class="cover-wrapper-inner">
                <div class="cover-container">
                    <div class="cover-header clearfix">
                        <div class="inner">
                            <nav class="nav cover-header-nav">
                                <?php echo do_shortcode("[socialmenu]"); ?>
                            </nav>              
                            <img class="cover-header-brand" src="<?php echo get_theme_mod( 'ekiline_logo_min' ); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>"/>
                        </div>
                    </div>
                    
                    <div class="inner cover">
                        <h1 class="cover-title"><?php echo get_bloginfo( 'name' ); ?></h1>
                        <p class="cover-description"><?php echo __( 'We are over maintenance, sorry.', 'ekiline' ) ?></p>
                    </div>
                    
                    <div class="cover-footer text-right ">
                        <div class="inner">                            
                            <small><?php printf( esc_html__( '&copy; Copyright %1$s', 'ekiline' ), esc_attr( date('Y') . ' ' . get_bloginfo( 'name', 'display' )) );?></small>
                        </div>
                    </div>
                </div>
            </div>
        </header>       
        <a style="color:#ddd;position:fixed;left:4px;bottom:4px;" href="<?php echo wp_login_url(); ?>" title="login"><i class="fa fa-key"></i></a>     
    </body>
</html> 