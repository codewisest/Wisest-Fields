<?php
/*
 * Plugin Name: Recipe Post Type
 * Description: Custom post type for recipes
 * Version: 1.0
 * Text Domain: wisest_fields_recipe
 */

// Register text domain
add_action('plugins_loaded', function() {
    load_plugin_textdomain('wisest_fields_recipe', false, dirname(plugin_basename(__FILE__)));
});

// Flush rewrite rules on plugin activation
register_activation_hook(__FILE__, 'wisest_fields_recipe_flush_rules');
function wisest_fields_recipe_flush_rules() {
    wisest_fields_recipe_pt(); // Register the post type
    flush_rewrite_rules(); // Flush rewrite rules
}

add_action('init', 'wisest_fields_recipe_pt');

function wisest_fields_recipe_pt() {
    $labels = array(
        'name'                     => __('Recipes', 'wisest_fields_recipe'),
        'singular_name'            => __('Recipe', 'wisest_fields_recipe'),
        'add_new'                  => __('Add New', 'wisest_fields_recipe'),
        'add_new_item'             => __('Add New Recipe', 'wisest_fields_recipe'),
        'edit_item'                => __('Edit Recipe', 'wisest_fields_recipe'),
        'new_item'                 => __('New Recipe', 'wisest_fields_recipe'),
        'view_item'                => __('View Recipe', 'wisest_fields_recipe'),
        'view_items'               => __('View Recipes', 'wisest_fields_recipe'),
        'search_items'             => __('Search Recipes', 'wisest_fields_recipe'),
        'not_found'                => __('No Recipes found.', 'wisest_fields_recipe'),
        'not_found_in_trash'       => __('No Recipes found in Trash.', 'wisest_fields_recipe'),
        'parent_item_colon'        => __('Parent Recipes:', 'wisest_fields_recipe'),
        'all_items'                => __('All Recipes', 'wisest_fields_recipe'),
        'archives'                 => __('Recipe Archives', 'wisest_fields_recipe'),
        'attributes'               => __('Recipe Attributes', 'wisest_fields_recipe'),
        'insert_into_item'         => __('Insert into Recipe', 'wisest_fields_recipe'),
        'uploaded_to_this_item'    => __('Uploaded to this Recipe', 'wisest_fields_recipe'),
        'menu_name'                => __('Recipes', 'wisest_fields_recipe'),
    );

    $args = array(
        'labels'                => $labels,
        'description'           => __('Organize and manage recipes', 'wisest_fields_recipe'),
        'public'                => true,
        'hierarchical'          => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'show_ui'              => true,
        'show_in_menu'         => true,
        'show_in_nav_menus'    => true,
        'show_in_admin_bar'    => true,
        'show_in_rest'         => true,
        'menu_position'        => 5,
        'menu_icon'            => 'dashicons-food',
        'capability_type'      => 'post',
        'supports'             => array('title', 'editor', 'thumbnail', 'excerpt', 'revisions'),
        'has_archive'          => true,
        'rewrite'             => array('slug' => 'recipes'),
        'query_var'           => true
    );

    register_post_type('recipe', $args);
}