<?php
if (!defined('ABSPATH')) {
    exit;
}

// Load Setup Utilitas Tema
require_once get_template_directory() . '/inc/setup.php';

// Load Custom Post Types
require_once get_template_directory() . '/inc/custom-post-types.php';

// Register Custom Post Type: Our Team
function register_adjuster_cpt() {
    $labels = [
        'name'               => 'Our Team',
        'singular_name'      => 'Our Team',
        'menu_name'          => 'Our Team',
        'add_new'            => 'Add New Team',
        'add_new_item'       => 'Add New Team Profile',
        'edit_item'          => 'Edit Team Profile',
        'new_item'           => 'New Team',
        'view_item'          => 'View Profile',
        'search_items'       => 'Search Our Team',
        'not_found'          => 'No Our Team found',
    ];

    $args = [
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => ['slug' => 'profile'], 
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-id-alt', 
        'supports'            => ['title', 'editor', 'thumbnail'],
    ];

    register_post_type('adjuster', $args);
}
add_action('init', 'register_adjuster_cpt');

function custom_adjuster_template($template) {
    if (is_singular('adjuster')) {
        $custom_template = get_stylesheet_directory() . '/single-profile.php';
        if (file_exists($custom_template)) {
            return $custom_template;
        }
    }
    return $template;
}
add_filter('single_template', 'custom_adjuster_template');


// Register Custom Post Type: Case Study
function register_case_study_cpt() {
    $labels = [
        'name'               => 'Case Studies',
        'singular_name'      => 'Case Study',
        'menu_name'          => 'Case Studies',
        'add_new'            => 'Add New Case Study',
        'add_new_item'       => 'Add New Case Study',
        'edit_item'          => 'Edit Case Study',
        'new_item'           => 'New Case Study',
        'view_item'          => 'View Case Study',
        'search_items'       => 'Search Case Studies',
        'taxonomies'         => ['category'],
        'not_found'          => 'No case studies found',
    ];

    $args = [
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => false,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => ['slug' => 'case-study', 'with_front' => false],
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'menu_position'       => 6,
        'menu_icon'           => 'dashicons-portfolio',
        'supports'            => ['title', 'editor', 'thumbnail'],
    ];

    register_post_type('case_study', $args);
}
add_action('init', 'register_case_study_cpt');

// Force WP membaca file single-case-study.php
function load_case_study_single_template($template) {
    if (is_singular('case_study')) {
        $custom_template = get_template_directory() . '/single-case-study.php';
        
        if (file_exists($custom_template)) {
            return $custom_template;
        }
    }
    return $template;
}
add_filter('template_include', 'load_case_study_single_template', 99);


function register_event_cpt() {
    $labels = [
        'name'               => 'Events',
        'singular_name'      => 'Event',
        'menu_name'          => 'Events',
        'add_new'            => 'Add New Event',
        'add_new_item'       => 'Add New Event',
        'edit_item'          => 'Edit Event',
        'new_item'           => 'New Event',
        'view_item'          => 'View Event',
        'search_items'       => 'Search Events',
        'not_found'          => 'No Event found',
    ];

    $args = [
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => ['slug' => 'event'], 
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-calendar', 
        'supports'            => ['title', 'editor', 'thumbnail'],
    ];

    register_post_type('event', $args);
}
add_action('init', 'register_event_cpt');

function custom_event_template($template) {
    if (is_singular('event')) {
        $custom_template = get_stylesheet_directory() . '/single-event.php';
        if (file_exists($custom_template)) {
            return $custom_template;
        }
    }
    return $template;
}
add_filter('single_template', 'custom_adjuster_template');