<?php
/*
 * Generate markup for the hero-image section
 */
?>

<?php
//if ( have_posts() ) : while ( have_posts() ) : the_post(); // Starting the loop.

    /*This is ugly, but roy you painted me up in this corner!, :P https://www.youtube.com/watch?v=wzqXggZU3eE

    I leave this here in case we need to implement a map later, and I did a  fucklot of work with this.

    look for the tag //#implementgooglemaps in functions.php to implement

    if(get_post_meta(get_the_ID(), 'maps_url', true)){

        ?>
        <!--<div id="hero-image">
            <div class="iframecontainer" style="">
                <iframe id="gmapsiframe" width="100%" height="600px" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCom8hD56nB6LI9MnJNXLbXmGu7970IbOU&q=Meyership&zoom=14" style="border:0; margin-top: -150px;" ></iframe>
            </div>
		</div> -->

        <?php

    }
	else
    */


    $background_image = null;
    if (is_home()){

        $background_image = get_header_image();

    }else if ( has_post_thumbnail() ) { // Checking the loop if the thumbnail is available.
		
		$url_background = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'page-full-width');
		$background_image = htmlentities($url_background[0]);

    }

    if($background_image == null){
        $background_image = get_stylesheet_directory_uri() . "/img/background-fallback-full-width.jpg";
    } ?>

    <div id="hero-image" style="background-image: url('<?php echo $background_image; ?>');"></div>

//wp_reset_query(); // Reset the loop.
//endwhile; endif;  // Ending the loop.