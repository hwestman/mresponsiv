<?php
/*
 * Generate markup for the hero-image section
 */
?>

<?php


    $background_image = null;
    if (is_home()){

        $background_image = get_header_image();

    }else if ( has_post_thumbnail() ) { // Checking the loop if the thumbnail is available.
		
		$url_background = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'page-full-width');
		$background_image = htmlentities($url_background[0]);

    }
    //Fallback
    if($background_image == null){
        //Fallback 1
        $background_image = get_header_image();

        //Fallback 2
        if(!$background_image){
            $background_image = get_stylesheet_directory_uri() . "/img/background-fallback-full-width.jpg";
        }

    } ?>
    <?php if (is_home()){ ?>
        
    <?php }else{ ?>
        <div id="hero-image" style="background-image: url('<?php echo $background_image; ?>');">
            
        </div>
    <?php } ?>
