<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>


<?php get_template_part( 'template-content-header-normal'); ?> 


<div id="content-no-sidebar" >
    <div id="content-padding">
		<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'content', get_post_format() );
			endwhile; 
		?>
		<?php wp_reset_query(); ?>
    </div> <!-- .content-padding -->
</div> <!-- #content-no-sidebar -->


			
    	
</div> <!-- #content -->

    <div class="push"></div> <!-- .push must be inside #wrapper -->
</div> <!-- #wrapper -->


<?php
get_footer();
