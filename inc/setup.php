<?php
if (!defined('ABSPATH')) {
    exit;
}

// Fitur Bawaan Tema
function atlas_hq_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    
    register_nav_menus(array(
        'primary_menu' => __('Primary Navigation', 'atlas-hq'),
        'footer_menu'  => __('Footer Navigation', 'atlas-hq'),
    ));
}
add_action('after_setup_theme', 'atlas_hq_theme_setup');

function atlas_hq_enqueue_assets() {
    wp_enqueue_style('atlas-theme-meta', get_stylesheet_uri(), array(), '1.0.0');

    // Swiper.js CSS CDN
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0');

    // Compiled Tailwind CSS
    $css_file = get_template_directory() . '/assets/css/build/style.css';
    if (file_exists($css_file)) {
        wp_enqueue_style('atlas-tailwind', get_template_directory_uri() . '/assets/css/build/style.css', array(), filemtime($css_file));
    }

    // Lucide Icons CDN
    wp_enqueue_script('lucide-icons', 'https://unpkg.com/lucide@latest', array(), 'latest', true);

    // Swiper.js JS CDN
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true);

    // Custom JS Theme
    wp_enqueue_script('atlas-main-js', get_template_directory_uri() . '/assets/js/main.js', array('swiper-js', 'lucide-icons'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'atlas_hq_enqueue_assets');

