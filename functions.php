<?php



/**
 * 0.0 Enqueue Resources
 * ----------------------------------------------------------------------------
 */

function add_resources() {

/******  Styles/CSS  ******/

// Adding the bootstrap CSS (minified)colla
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

wp_enqueue_script( 'jquery-js', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js');

wp_enqueue_script( 'functions-js', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ));



// Adding a javascript file to be used for misc
wp_enqueue_script( 'onload-js', get_template_directory_uri() . '/js/onload.js');

}


// This add alle the recourses to the theme header.
add_action( 'wp_enqueue_scripts', 'add_resources' );

// This add alle the recourses to the theme header.
add_action( 'wp_enqueue_scripts', 'add_resources' );



/**
 * 2.0 After theme setup. 
 * ----------------------------------------------------------------------------
 */


add_action( 'after_setup_theme', 'm_res_wpt_setup' );
if( ! function_exists( 'wpt_setup' ) ):
        function m_res_wpt_setup() {

            //Registrer nav-menus
            register_nav_menu( 'main_menu', __( 'Main - Menu', 'm_res' ) );
            register_nav_menu( 'footer_menu', __( 'Footer - Menu', 'm_res' ) );

            //Allowing post-thumbnails
            add_theme_support( 'post-thumbnails' );
            
            //Setup custom thumbnail size 
            add_image_size( 'square', 400, 400, true ); // 400px x 400px (Width x Height, Crop = true)
            add_image_size( 'page-full-width', 1170, 320, true ); // 1170x x 650px (Width x Height, Crop = true)
            add_image_size( 'collaborator', 300, 216, true ); // 300x x 216px (Width x Height, Crop = true)
            add_image_size( 'news', 560, 400, true ); // 560px x 400px (Width x Height, Crop = true)
            add_image_size( 'polaroid', 720, 540, true ); // 720px x 540px (Width x Height, Crop = true)
            add_image_size( 'sideway', 650, 300, true ); // 650px x 300px (Width x Height, Crop = true)

            //Load text domaion
            load_theme_textdomain('m_res_ls', get_template_directory() . '/languages');
        }
endif;


/**
 * 3.0 Bootstrap menu
 * ----------------------------------------------------------------------------
 * Require the bootstrap navigation
 * Source: https://github.com/twittem/wp-bootstrap-navwalker
 *
 */

require('wp_bootstrap_navwalker.php');




/**
 * 4.0 Push down Navigation 
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
 * 5.0 Collaborators (Costume post type)
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
        'taxonomies' => array("post_tag","category"),
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
    wp_set_object_terms( $post->ID, 'Uncategorized','category');
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
 * 6.0 Services (Custom post type)
 * ----------------------------------------------------------------------------
 */

//Add custom post type for collaborators

function register_services_custom_post(){

    register_post_type('services', array(
        'label' => __('Tjenester'),
        'singular_label' => __('Tjenester'),
        'public' => true,
        'show_ui' => true, // UI in admin panel
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array("slug" => "tjenester"), // Permalinks format
        'supports' => array('title','editor', 'thumbnail','custom-fields'),
        'taxonomies' => array('category')
    ));
}

add_action('init', 'register_services_custom_post'); // Enable Collaborators post

function register_services_meta_boxes() {
    add_meta_box("services_meta_product", "Product", "services_add_options_product", "services", "normal", "high");
    add_meta_box("services_meta", "Meta", "services_add_options", "services", "normal", "low");
}

add_action( 'admin_init', 'register_services_meta_boxes' ); // Add to admin panel


function services_add_options_product() {

global $post;
    $isProduct = get_post_meta($post->ID, 'isProduct', true);
?>
    <p>
        <label>Service is a product</label>
        <input type="checkbox" class="is-product" name="isProduct" value="" style="margin-left: 2px"
            <?php if($isProduct){
                echo "checked";
            }
        ?> />
    </p>
<?php
}
function update_services_add_options_product(){
    global $post;

    $var = $_POST["isProduct"];

    if ( $post ){
        if( isset($_POST["isProduct"])){

            update_post_meta($post->ID, "isProduct",1);
        }else{
            update_post_meta($post->ID, "isProduct",0);
        }
    }
}
add_action( 'save_post', 'update_services_add_options_product' );
/*
* Function for adding the options tab.
*/
function services_add_options() {

    global $post;
    $custom = get_post_custom( $post->ID );

    $contactpersons = get_post_meta($post->ID, 'contactpersons', true);
    if(!$contactpersons){
        $contactpersons = array();
    }
    ?>
    <p>
        <label for="my_meta_box_select">Kontaktperson</label></br>

        <input type="hidden" name="contactpersons[]" value="ferryman"/>
       <?php
        $users = get_users();
        // Array of WP_User objects.

        foreach ( $users as $user ) { ?>
            <input type="checkbox" class="contactperson" name="contactpersons[]" value="<?php echo esc_html($user->ID) ?>"
                <?php if(in_array($user->ID,$contactpersons)){
                        echo "checked";
                    }
                ?> />
            <?php echo '<span>' . esc_html( $user->display_name ) . '</span>';?>
            </br>
        <?php } ?>

    </p>

    <?php
}
function update_services_add_options(){
  global $post;

  if ( $post ){
    if( $_POST["contactpersons"]  != "" AND ($key = array_search("ferryman", $_POST["contactpersons"])) !== false){
         unset($_POST["contactpersons"][$key]);
         update_post_meta($post->ID, "contactpersons", $_POST["contactpersons"]);
    }
  }
}


add_action( 'save_post', 'update_services_add_options' );



/**
 * Attempting to refactor out the custom post type for contact-page and replacing it with a meta box and template :)
 */

function register_page_meta_boxes() {

    add_meta_box("sidebarShortcode", "Shortcode for Sidebar", "sidebarShortcodeMarkup","page", "normal", "high");
    add_meta_box("wysiwyg-editor-2", "Kolonne 2", "secondColumn","page", "normal", "high");

}

add_action( 'admin_init', 'register_page_meta_boxes' ); // Add to admin panel

function sidebarShortcodeMarkup(){
    global $post;
    $custom = get_post_custom( $post->ID );

    ?><p>
    <label>Shortcode for page with the template: Page - Sidebar with shortcode</label><br />
    <input type="text" name="sidebarShortcode" value="<?= esc_html__($custom["sidebarShortcode"][0])?>" style="width:99%;"/>
    </p><?php
}

function update_sidebarShortcode(){
    global $post;

    if ( $post ){

        if( $_POST["sidebarShortcode"]  != "" ){
            update_post_meta($post->ID, "sidebarShortcode", $_POST["sidebarShortcode"]);
        }
        if( $_POST["secondColumn"]  != "" ){
            update_post_meta($post->ID, "secondColumn", $_POST["secondColumn"]);
        }
    }

}
function secondColumn() {

    global $post;
    $custom = get_post_custom( $post->ID );

    $content = get_post_meta($post->ID, 'secondColumn', true); ?>

    <label>Content for another column, use with template: one column sidebar right and two column sidebar right..</label><br />

    <?php $args = array(
        'textarea_rows' => 15,
        'textarea_name'=>"secondColumn",
        'quicktags'=>"true",
        'media-buttons'=>false
    );

    wp_editor( $content, "secondColumn",$args);
}


add_action( 'save_post', 'update_sidebarShortcode' );

/**
 * 7.0 Theme Appearance Options (Logo etc..)
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
        'default-image' => get_template_directory_uri() . '/img/logo_fallback.png',
    ) ) );

}
add_action('customize_register', 'add_custom_logo');

/**
 * 8.0 contact fields
 * ----------------------------------------------------------------------------
 */

function modify_contact_fields( $contactmethods ) {

    $contactmethods['number'] = 'Telefonnummer';
    $contactmethods['hiredate'] = 'Ansatt siden';
    $contactmethods['position'] = 'Stilling';
    $contactmethods['mobile'] = 'Mobil';

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
 * 9.0 Mail
 * ----------------------------------------------------------------------------
 */

function author_email()  {

    $user = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));


    return $user->user_email;
}
add_shortcode('authormail', 'author_email');


add_action('admin_init', 'cf7_users_general_section');

function cf7_users_general_section()
{
    add_settings_section(
        'cf7_users', // Section ID
        'Contactform7 for users', // Section Title
        'cf7_users_options_callback', // Callback
        'general' // What Page?  This makes the section show up on the General Settings Page
    );

    add_settings_field( // Option 1
        'cf7_users_shortcode', // Option ID
        'Form ID', // Label
        'cf7_users_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'cf7_users', // Name of our section
        array( // The $args
            'cf7_users_shortcode' // Should match Option ID
        )
    );
    register_setting('general', 'cf7_users_shortcode', 'esc_attr');
}



    function cf7_users_options_callback()
    { // Section Callback
        echo '<p>Contactform7 ID for the form to be used for users</p>';
    }
//[contact-form-7 id="83" title="user-form"]
    function cf7_users_callback($args)
    {  // Textbox Callback
        $option = get_option($args[0]);

        ?>
        <input type="text" id="<?php echo $args[0]?>" name="<?php echo $args[0] ?>" value="<?php echo $option; ?>"style="width:400px;" />
        <?php
    }


/**
 * 10.0 Widget Areas
 * ----------------------------------------------------------------------------
 */

function m_res_add_widget() {
    if (function_exists('register_sidebar')) {

        register_sidebar(array(
            'name' => 'Page - Sidebar',
            'id'   => 'm_res_page',
            'description'   => 'Appears in the sidebar of page.',
            'before_widget' => '<div class="mb-m"><div id="%1$s" class="singel-widget %2$s">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<div class="widget-title-container mb-s">
                                <div class="widget-title-stroke">
                                <h4  class="widget-title-text-color widget-title-text-bg widget-title-size">',
            'after_title'   => '</h4></div></div>'
        ));

        register_sidebar(array(
            'name' => 'Post',
            'id'   => 'm_res_post',
            'description'   => 'Appears in the sidebar of post',
            'before_widget' => '<div class="mb-m"><div id="%1$s" class="singel-widget %2$s">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<div class="widget-title-container mb-s">
                                <div class="widget-title-stroke">
                                <h4  class="widget-title-text-color widget-title-text-bg widget-title-size">',
            'after_title'   => '</h4></div></div>'
        ));

    }
}
add_action( 'widgets_init', 'm_res_add_widget' );

add_filter('widget_text', 'do_shortcode');



/**
 * 11.0 Header image
 * ----------------------------------------------------------------------------
 */

$headerArgs = array(
    'width' => 2000,
    'height' => 563,
    'default-image' => get_stylesheet_directory_uri() . '/img/background-fallback-full-width.jpg',
    'uploads' => true,
);
add_theme_support( 'custom-header', $headerArgs);

?>
