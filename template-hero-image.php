<?php
/*
 * Generate markup for the hero-image section
 */
?>

<?php
if ( have_posts() ) : while ( have_posts() ) : the_post(); // Starting the loop.

    /*This is ugly, but roy you painted me up in this corner!, :P https://www.youtube.com/watch?v=wzqXggZU3eE*/
    if(get_post_meta(get_the_ID(), 'maps_url', true)){

        ?><div id="hero-image">
            <iframe id="gmapsiframe" width="100%" height="100%" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/view?key=AIzaSyCom8hD56nB6LI9MnJNXLbXmGu7970IbOU&center=<?php echo get_post_meta(get_the_ID(), 'maps_url', true);?>&zoom=14"></iframe>
		</div>

        <?php

    }
	else if ( has_post_thumbnail() ) { // Checking the loop if the thumbnail is available.
		
		$url_background = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'page-full-width');
		$background_image = htmlentities($url_background[0]);


	?>

		<div id="hero-image" style="background-image: url('<?php echo $background_image; ?>');">

		</div> 
	<?php 
	} // end if 

	else{

		$background_fallback = get_stylesheet_directory_uri() . "/img/background-fallback-full-width.jpg";

	?>	

	<div id="hero-image" style="background-image: url('<?php echo $background_fallback; ?>');">
	</div> 	

	<?php 		
	} //end else 

wp_reset_query(); // Reset the loop.
endwhile; endif;  // Ending the loop.