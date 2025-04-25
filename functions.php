<?php

function osmi_theme_support() {

// Add Theme Support
add_theme_support( 'post-thumbnails' );
add_theme_support( 'menus' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'title-tag' );
add_theme_support('custom-logo');
add_theme_support( 'html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
) );
}

add_action( 'after_setup_theme', 'osmi_theme_support' );


function osmi_theme_menus() {

    $locations = array(
        'primary' => "Desktop Primary Menu",
        'footer' => "Footer Menu"
    );

    register_nav_menus( $locations );   
}

add_action( 'init', 'osmi_theme_menus' );






function osmi_register_styles() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' , array(), '4.4.1', 'all' );

    wp_enqueue_style( 'fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css' , array(), '5.13.0', 'all' );

    // wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.min.css' );

    wp_enqueue_style( 'osmi', get_template_directory_uri() . '/style.css', array('bootstrap'), $version, 'all' );
}

add_action( 'wp_enqueue_scripts', 'osmi_register_styles' );

 
function osmi_register_scripts() {

    wp_enqueue_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(), '4.4.1', true);  
    wp_enqueue_script('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js', array('jquery'), '5.13.0', true);
    wp_enqueue_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), '1.16.0', true);   
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', array(), '3.4.1', true);
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true);
       
      
}

add_action( 'wp_enqueue_scripts', 'osmi_register_scripts' );



function us_county_map_shortcode() {
    // Add the map container HTML
    $html = '
    <div id="map" style="height:60vh; width:80%;"></div>
    <div id="infoBox" style="position:absolute; top:10px; right:10px; background:white; padding:10px; z-index:1000;">Hover over a county</div>
    ';

    // Load CSS & JS
    // wp_enqueue_style('leaflet-css', 'https://unpkg.com/leaflet@1.9.3/dist/leaflet.css');
    // wp_enqueue_script('leaflet-js', 'https://unpkg.com/leaflet@1.9.3/dist/leaflet.js', [], null, true);
    // wp_enqueue_script('jquery');

    // Enqueue your custom files
    wp_enqueue_script('map-data', get_template_directory_uri() . '/assets/us-map/mapdata.js', [], null, true);
    wp_enqueue_script('us-map', get_template_directory_uri() . '/assets/us-map/usmap.js', [], null, true);

    return $html;
}
add_shortcode('us_county_map', 'us_county_map_shortcode');



?>