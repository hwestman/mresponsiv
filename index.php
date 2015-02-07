<?php
/**
 * The main template file
 *
 */

get_header(); ?>


<?php get_template_part( 'hero-image'); ?> 

<div id="main">
    <div id="wrapper" class="container">

        <div id="content-header">
            <div id="content-header-big">
                <div id="content-header-frontpage-heading">
                    <h1>Varetransport<br/>
                    Enkelt og greit
                    </h1> 
                </div>
            </div>
        </div>
	

        <div id="content-wrapper">
        <div id="content-full-width" class="no-padding"> 
            <div id="frontpage-news-container" class="col-xs-12 frontpage-section">
				<?php
					if ( have_posts() ) :
						// Start the Loop.
						while ( have_posts() ) : the_post();

							/*
							 * Include the post format-specific template for the content. If you want to
							 * use this in a child theme, then include a file called called content-___.php
							 * (where ___ is the post format) and that will be used instead.
							 */
							get_template_part( 'content', get_post_format() );

						endwhile;
						// Previous/next post navigation.

					else :
						// If no content, include the "No posts found" template.
						get_template_part( 'content', 'none' );

					endif;
				?>
	    </div> <!-- .content-full-width -->
	</div> <!-- #content-wrapper -->
</div> <!-- #wrapper -->

<?php
get_footer();
