<?php
/*
Template Name: Page - Two column - Sidebar right with shortcode
*/	
?>

<?php

get_header();
get_template_part( 'template-content-header-normal'); ?>

        <div id="content-sidebar" class="content-left" >
            <div id="content-padding">
                <?php
                while ( have_posts() ) : the_post(); ?>
                    <div class="contact-first-column col-xs-12 col-sm-6 col-md-6">
                            <?php the_content(); ?>
                    </div> <!-- .contact-first-column -->

                    <div class="contact-second-column col-xs-12 col-sm-6 col-md-6">
                        <?php echo apply_filters('the_content',get_post_meta(get_the_ID(), 'secondColumn', true)); ?>
                    </div> <!-- .contact-second-column -->
                <?php endwhile;
                 wp_reset_query(); ?>
            </div> <!-- .content-padding -->
        </div> <!-- #content-sidebar -->

        <div id="sidebar" class="sidebar-right">
            <div id="sidebar-padding">
                <div class="">
                    <?php echo do_shortcode(get_post_meta(get_the_ID(), 'sidebarShortcode', true)) ?>
                </div> <!-- .contact-form-widget -->

            </div> <!-- #sidebar-padding -->
        </div> <!-- #sidebar -->

    </div>

    <div id="sidebar-background" class="sidebar-background-right"></div>
    <div class="push"></div> <!-- .push must be inside #wrapper -->
</div> <!-- #wrapper -->

<?php
get_footer();