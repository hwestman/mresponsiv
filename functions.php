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











?>