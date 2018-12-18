<?php
/*
 * Plugin Name:     Heers Admin
 * Plugin URI:      https://www.heers.nl
 * Description:     Heers.nl support plugin
 * Version:         1.0.0
 * Author:          Koen de Wilde
 * Author URI:      https://koendewilde.com
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

  
function kdw_admin_support_button( $wp_admin_bar ) {
	$args = array(
		'id'    => 'heers-button-support',
		'title' => 'Support',
        'parent' => 'top-secondary',
		'href'  => 'http://support.heers.nl/',
		'meta'  => array( 
            'class' => 'heers-button-support',
            'target'=> '_blank',  
            'title' => 'support.heers.nl',  
        )
	);
	$wp_admin_bar->add_node( $args );
}
add_action( 'admin_bar_menu', 'kdw_admin_support_button', 999 );


add_action( 'admin_enqueue_scripts', 'custom_wp_toolbar_css_admin' );
add_action( 'wp_enqueue_scripts', 'custom_wp_toolbar_css_admin' );
 
function custom_wp_toolbar_css_admin() {
    
    if ( is_admin_bar_showing() ) {
         
        $css = '#wpadminbar .heers-button-support a.ab-item:before { content: \'\\f242\'; top: 2px;}';

        wp_register_style( 'toolbar-css', false );
        wp_enqueue_style( 'toolbar-css' );
        wp_add_inline_style( 'toolbar-css', $css );
        
    }
}


// change footer text
function kdw_change_admin_footer(){
	 echo '<span id="footer-note">WordPress <a href="https://www.heers.nl/" target="_blank">Heerst</a>.</span>';
	}
add_filter('admin_footer_text', 'kdw_change_admin_footer');

?>
