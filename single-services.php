<?php
/**
 * The template for displaying all pages
 *
 */
get_header(); ?>


    <div id="wrapper" class="container">

        <?php get_template_part( 'template-content-header-big'); ?> 

        <div id="content-wrapper">

            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 side-by-side-fill-height">
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

        <div id="sidebar-right" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 side-by-side-fill-height">
            <div class="sidebar">
                <div class="sidebar-person-heading">
                    <h2>Kontaktpersoner</h2>
                </div>
                
                

                  <ul class="sidebar-person">
                    <a class="person-sidebar-link">
                    <li class="sidebar-person-visual">
                        <span class="sidebar-person-thumbnail-crop">
                            <img class="sidebar-person-thumbnail" src="<?php echo get_template_directory_uri(); ?>/img/mann_square.jpg">
                        </span>
                    </li>
                    <li class="sidebar-person-content">
                        <h4 class="sidebar-person-name">Geir Gunnar Johansen</h4>
                        <p class="sidebar-person-title">Docking ansvarlig</p>
                    </li>
                    </a>
                </ul>  
                
                  <ul class="sidebar-person">
                    <a class="person-sidebar-link">
                    <li class="sidebar-person-visual">
                        <span class="sidebar-person-thumbnail-crop">
                            <img class="sidebar-person-thumbnail" src="<?php echo get_template_directory_uri(); ?>/img/mann_square.jpg">
                        </span>
                    </li>
                    <li class="sidebar-person-content">
                        <h4 class="sidebar-person-name">Anders Henriksen Sten</h4>
                        <p class="sidebar-person-title">Docking ansvarlig</p>
                    </li>
                    </a>
                </ul>              
                
            </div> <!-- .sidebar -->   
        </div> <!-- #sidebar-right -->
            
    
    </div> <!-- #content-wrapper -->
    </div> <!-- #wrapper -->


<?php
get_footer();
