<?php
/*
Template Name: Page - Fullwidth 
*/	
get_header(); ?>


    <div id="wrapper" class="container">

		<?php get_template_part( 'template-content-header-frontpage'); ?> 

        <div id="content-wrapper">

            <div class="col-sm-12 col-md-8 side-by-side-fill-height">
            <div id="full-width-content" class="col-xs-12">
			<?php

				// Start the Loop.
				while ( have_posts() ) : the_post();

					echo "<h1>" . get_the_title() . "</h1>";
					
					echo the_content();

				endwhile;
			?>
			
			</div> <!-- #ull-width-content -->
            </div>
    
    </div> <!-- #content-wrapper -->
    </div> <!-- #wrapper -->


<?php
get_footer();
