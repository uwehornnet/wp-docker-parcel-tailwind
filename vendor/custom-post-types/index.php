<?php

add_action('init', 'cpt_register');
function cpt_register()
{
    register_post_type('custom_post_type', [
        'exclude_from_search' => true,
        'labels' => [
            'name' => _x('Custom Post Type', 'post type general name'),
            'singular_name' => _x('Custom Post Type', 'post type singular name'),
            'add_new' => _x('Neue Custom Post Type', 'Newsletter'),
            'add_new_item' => __('Neue Custom Post Type'),
            'edit_item' => __('Bewertung Custom Post Type'),
            'new_item' => __('Neue Custom Post Type'),
            'view_item' => __('Custom Post Type ansehen'),
            'search_items' => __('Custom Post Type suchen'),
            'not_found' => __('Keine Custom Post Type gefunden'),
            'not_found_in_trash' => __('Keine Custom Post Type im Papierkorb'),
            'parent_item_colon' => '',
        ],
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'page',
        'hierarchical' => true,
        'has_archive' => true,
        'menu_position' => 4,
        'menu_icon' => 'dashicons-clipboard',
        'supports' => ['title', 'editor', 'excerpt', 'page-attributes', 'thumbnail'],
    ]);

    register_taxonomy(
        'custom_post_type',
        'custom-taxonomy',
        array(
            'hierarchical' => true,
            'label' => 'Customtaxonomy',
            'query_var' => true,
            'show_in_nav_menus' => true,
            'rewrite' => array(
                'slug' => 'custom-taxonomy',
                'with_front' => true  
            )
        )
    );

    flush_rewrite_rules();
}
