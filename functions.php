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
        'label' => __('Samarbeid'),
        'singular_label' => __('Samarbeidspartnere'),
        'public' => true,
        'show_ui' => true, // UI in admin panel
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array("slug" => "samarbeidspartnere"), // Permalinks format
        'taxonomies' => array("post_tag"),
        'supports' => array('title', 'thumbnail')
    )); 
}

add_action('init', 'register_collaborators_custom_post'); // Enable Collaborators post 

function register_collaborators_meta_boxes() {
    add_meta_box("collaborators_meta", "Feauters", "collaborators_add_options", "samarbeidspartnere", "normal", "low");
}

add_action( 'admin_init', 'register_collaborators_meta_boxes' ); // Add to admin panel 

/*
* Function for adding the options tab. 
*/
function collaborators_add_options() {

    global $post;
    $custom = get_post_custom( $post->ID );
 
    ?>
    <style>.width99 {width:99%;}</style>
    <p>
        <label>Link til samarbeidspartner</label><br />
        <input type="text" name="collaborator_url" value="<?= @$custom["collaborator_url"][0] ?>" class="width99" />
    </p>

    <?php
}

/**
 * Save custom field data when creating/updating posts
 */
function update_collaborators_add_options(){
  global $post;
 
  if ( $post )
  {
    if( $_POST["collaborator_url"]  != "" ){update_post_meta($post->ID, "collaborator_url", @$_POST["collaborator_url"]);}
  }
}

add_action( 'save_post', 'update_collaborators_add_options' );

/**
 * 4.0 Services (Custom post type)
 * ----------------------------------------------------------------------------
 */

//Add custom post type for collaborators

function register_services_custom_post(){

    register_post_type('tjenester', array(
        'label' => __('Tjenester'),
        'singular_label' => __('Tjenester'),
        'public' => true,
        'show_ui' => true, // UI in admin panel
        'capability_type' => 'page',
        'hierarchical' => false,
        'rewrite' => array("slug" => "tjenester"), // Permalinks format
        'supports' => array('title', 'thumbnail')
    ));
}

add_action('init', 'register_services_custom_post'); // Enable Collaborators post

function register_services_meta_boxes() {
    add_meta_box("services_meta", "Kontaktpersoner", "services_add_options", "tjenester", "normal", "low");
}

add_action( 'admin_init', 'register_services_meta_boxes' ); // Add to admin panel

/*
* Function for adding the options tab.
*/
function services_add_options() {

    global $post;
    $custom = get_post_custom( $post->ID );

    ?>
    <style>.width99 {width:99%;}</style>
    <p>
        <label>Link til samarbeidspartner</label><br />
        <input type="text" name="collaborator_url" value="<?= @$custom["collaborator_url"][0] ?>" class="width99" />
    </p>

    <?php
}

/**
 * Save custom field data when creating/updating posts
 */
function update_collaborators_add_options(){
  global $post;

  if ( $post )
  {
    if( $_POST["collaborator_url"]  != "" ){update_post_meta($post->ID, "collaborator_url", @$_POST["collaborator_url"]);}
  }
}

add_action( 'save_post', 'update_collaborators_add_options' );

/**
 * 5.0 contact fields
 * ----------------------------------------------------------------------------
 */

function modify_contact_fields( $contactmethods ) {

    $contactmethods['number'] = 'Telefonnummer';
    $contactmethods['hiredate'] = 'Ansatt siden';
    $contactmethods['position'] = 'Stilling';

    return $contactmethods;
}
add_filter('user_contactmethods','modify_contact_fields',10,1);

//Remove color picker for users
remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );








?>
