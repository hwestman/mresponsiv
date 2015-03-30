<?php
/*
 * Generate markup for the hero-image section
 */
?>

<?php if ( have_posts() ) : the_post(); // Starting the loop. ?>



<div id="wrapper">

	<div id="content-header">
        <div id="fixed-menu-spacer"></div>
        <div id="content-header-inner">
        	<h2 id="content-header-heading"><?php the_title(); ?></h2>	
        </div>
    </div>

    <div id="content">

<?php 		
wp_reset_query(); // Reset the loop.
endif;  // Ending the loop.
?>