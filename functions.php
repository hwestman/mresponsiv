<?php



/**
 * 1.0 Thumbnails 
 * ----------------------------------------------------------------------------
 */

// Adding support for post/page thumbnails
add_theme_support( 'post-thumbnails' );

function register_costume_thumbnail_sizes (){
    add_image_size( 'square', 400, 400, true ); // 400px x 400px (H x W Crop = true)
    add_image_size( 'page-full-width', 1170, 320, true ); // 1170x x 650px (H x W , Crop = true)
    add_image_size( 'collaborator', 300, 216, true ); // 300x x 216px (H x W , Crop = true)
    add_image_size( 'news', 560, 400, true ); // 560x x 400px (H x W , Crop = true)
}

add_action( 'after_setup_theme', 'register_costume_thumbnail_sizes' ); // Enable the costume sizes



/**
 * 2.0 Menus 
 * ----------------------------------------------------------------------------
 */


//Adding support for costume menus 
function register_costume_menus () {
  register_nav_menus(
    array(
      'footer-partners' => __( 'Footer - Partners' )
    )
  );
}

add_action( 'init', 'register_costume_menus' ); // Enable costume menus


/**
 * 3.0 Collaborators (Costume post type)
 * ----------------------------------------------------------------------------
 */

//Add custom post type for collaborators

function register_collaborators_custom_post(){
    register_post_type('samarbeidspartnere', array(
        'label' => __('Add item'),
        'singular_label' => __('Samarbeidspartnere'),
        'public' => true,
        'show_ui' => true, // UI in admin panel
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array("slug" => "samarbeidspartnere"), // Permalinks format
        'taxonomies' => array("post_tag"),
        'supports' => array('title', 'thumbnail', 'editor')
    )); 
}

add_action('init', 'register_collaborators_custom_post'); // Enable Collaborators 





?>