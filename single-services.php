<?php
/**
 * The template for displaying all pages
 *
 */
get_header(); ?>


    <div id="wrapper" class="container">

        <?php get_template_part( 'template-content-header-big'); ?> 

        <div id="content-wrapper">

            <div class="col-sm-12 col-md-8 side-by-side-fill-height">
            <div id="normal-content" class="col-xs-12">
            <h1>test</h1>
            <?php
                // Start the Loop.
                while ( have_posts() ) : the_post();


                    echo "<h1>" . the_title() . "</h1>";
                    
                    echo the_content();

                endwhile;
            ?>
            </div> <!-- #normal-content -->
            </div>

        <div id="sidebar-right" class="col-sm-12 col-md-4 side-by-side-fill-height">
            <div class="sidebar"> 
                <h2>sidebar</h2>
                <?php get_sidebar( 'content' ); ?>
            </div> <!-- .sidebar -->   
        </div> <!-- #sidebar-right -->
            
    
    </div> <!-- #content-wrapper -->
    </div> <!-- #wrapper -->


<?php
get_footer();
