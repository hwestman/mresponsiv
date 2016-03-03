<?php
/*
Template Name: Page - One column - Sidebar right with second column content
*/	
?>

<?php

get_header();
get_template_part( 'template-content-header-normal'); ?>

        <div id="content-sidebar" class="content-left" >
            <div id="content-padding">
                <?php
                while ( have_posts() ) : the_post(); ?>
                    <div class="content-one-column col-md-12">
                            <?php the_content(); ?>
                    </div> <!-- .contact-first-column -->

                <?php endwhile;
                 wp_reset_query(); ?>
            </div> <!-- .content-padding -->
        </div> <!-- #content-sidebar -->

        <div id="sidebar" class="sidebar-right">
            <div id="sidebar-padding">
                <div class="sidebar-shortcode">

                        <?php echo apply_filters('the_content',get_post_meta(get_the_ID(), 'secondColumn', true)); ?>

                </div> <!-- .contact-form-widget -->

            </div> <!-- #sidebar-padding -->
        </div> <!-- #sidebar -->

    </div>

    <div id="sidebar-background" class="sidebar-background-right"></div>
    <div class="push"></div> <!-- .push must be inside #wrapper -->
</div> <!-- #wrapper -->

<?php
get_footer();