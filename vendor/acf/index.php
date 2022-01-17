<?php

if( !class_exists('Acf') ):
    
    define( 'THEME_ACF_PATH', get_stylesheet_directory() . '/vendor/acf/' );
    define( 'THEME_ACF_URL', get_stylesheet_directory_uri() . '/vendor/acf/' );

    include_once( THEME_ACF_PATH . 'acf.php' );

    // Customize the url setting to fix incorrect asset URLs.
    add_filter('acf/settings/url', 'my_acf_settings_url');
    function my_acf_settings_url( $url ) {
        return THEME_ACF_URL;
    }

    // (Optional) Hide the ACF admin menu item.
    add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
    function my_acf_settings_show_admin( $show_admin ) {
        return true;
    }
endif;


if( function_exists('acf_add_local_field_group') ):
    /**
     * Register Fields -> exported
     */

    
endif;