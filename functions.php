<?php



/**
 * 0.0 Enqueue Resources
 * ----------------------------------------------------------------------------
 */

function add_resources() {

/******  Styles/CSS  ******/

// Adding the bootstrap CSS (minified)
// Bootstrap @grid-float-breakpoint costumized to “@screen-md-min” from getbootstrap.com


wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/bootstrap/bootstrap.min.css');

// Adding Theme specific styles
wp_enqueue_style( 'theme-css', get_template_directory_uri() . '/style.css', false);

wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/bootstrap/bootstrap.min.css');

// Adding Theme specific styles
wp_enqueue_style( 'theme-css', get_template_directory_uri() . '/style.css', false);



/******  JavaScript ******/

// Adding the bootstrap v3.3.1 JavaScript (minified)
wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/bootstrap/bootstrap.min.js', array( 'jquery' ));

}


// This add alle the recourses to the theme header.
add_action( 'wp_enqueue_scripts', 'add_resources' );

// This add alle the recourses to the theme header.
add_action( 'wp_enqueue_scripts', 'add_resources' );




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
 * 3.0 Push down Navigation 
 * Fixe issue for admin users navbar.
 * ----------------------------------------------------------------------------
 */

add_filter('body_class', 'mbe_body_class');
function mbe_body_class($classes){
    if(is_user_logged_in()){
        $classes[] = 'body-logged-in';
    } else{
        $classes[] = 'body-logged-out';
    }
    return $classes;
}

//Add the CSS to push down body on wadmin view
add_action('wp_head', 'mbe_wp_head');
function mbe_wp_head(){
    echo '<style>'.PHP_EOL;

    echo 'body{ padding-top: 0px !important; }'.PHP_EOL;
    // Using custom CSS class name.
    echo 'body.body-logged-in .navbar { top: 28px !important; }'.PHP_EOL;
    // Using WordPress default CSS class name.
    echo 'body.logged-in .navbar-fixed-top{ top: 28px !important; }'.PHP_EOL;
    echo '</style>'.PHP_EOL;
}



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
    add_meta_box("services_meta", "Tjenester", "services_add_options", "tjenester", "normal", "low");
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
        <label>Navn på tjeneste</label><br />
        <input type="text" name="service_name" value="<?= @$custom["service_name"][0] ?>" class="width99" />
    </p>
    <p>
        <label>Beskrivelse av tjeneste</label><br />
        <input type="text" name="service_description" value="<?= @$custom["service_description"][0] ?>" class="width99 height99" />
    </p>

    <?php
}

/**
 * 4.0 Theme Appearance Options (Logo etc..)
 * ----------------------------------------------------------------------------
 */

/**
 * Enable costume logo from the Theme Appearence panel.
 */

function add_custom_logo( $wp_customize ) {

$wp_customize->add_section( 'theme_custom_logo_section' , array(
    'title'       => __( 'Logo', 'themeslug' ),
    'priority'    => 30,
    'description' => 'To change the Logo, upload a new image. Optimal image size for this template is 10 x 10 pixels',
) );

$wp_customize->add_setting( 'theme_custom_logo_setting' );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_custom_logo', array(
    'label'    => __( 'Logo', 'themeslug' ),
    'section'  => 'theme_custom_logo_section',
    'settings' => 'theme_custom_logo_setting',
    'default-image' => get_template_directory_uri() . '/img/fallback-image-logo.jpg',
) ) );

}
add_action('customize_register', 'add_custom_logo');

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
/**
 * 4.0 Theme Appearance Options (Logo etc..)
 * ----------------------------------------------------------------------------
 */

//Remove color picker for users
remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );





/**
 * 5.0 Bootstrap menu
 * ----------------------------------------------------------------------------
 */

/*************
Require the bootstrap navigation
Source: https://github.com/twittem/wp-bootstrap-navwalker
*************/

require('wp_bootstrap_navwalker.php');

/**
 * Adding new costume main menu.
 */

add_action( 'after_setup_theme', 'wpt_setup' );
if( ! function_exists( 'wpt_setup' ) ):
        function wpt_setup() {
           register_nav_menu( 'main_menu', __( 'Main Menu', 'wptuts' ) );
        }
endif;





?>
