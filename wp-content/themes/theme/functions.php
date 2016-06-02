<?php

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

add_theme_support( 'post-thumbnails' );

function wpdocs_excerpt_more( $more ) {
    return;
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more');

function wpdocs_custom_excerpt_length( $length ) {
    return 8;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 8 );

// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'vlas' ),
    'about-holding' => __( 'About Holding', 'vlas' ),
    'press-center' => __( 'Press center', 'vlas' ),
    'assets' => __( 'Assets', 'vlas' ),
) );

function register_my_menus() {
    register_nav_menus(
        array(
            'new-menu' => __( 'New Menu' ),
            'another-menu' => __( 'Another Menu' ),
            'an-extra-menu' => __( 'An Extra Menu' )
        )
    );
}
?>