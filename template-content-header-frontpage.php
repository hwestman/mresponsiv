<?php
/*
 * Generate markup for the hero-image section
 */
?>

<?php
	if ( have_posts() ) : the_post(); // Starting the loop.
	?>

        <div id="content-header">
            <div id="content-header-big">
                <h2 id="content-frontpage-header-heading">
                    <?php bloginfo('description'); ?>
                </h2>
            </div>
        </div>

<?php 		
wp_reset_query(); // Reset the loop.
 endif;  // Ending the loop.
?>