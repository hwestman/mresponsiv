<?php
/**
 * The template for displaying all pages
 *
 */
get_header(); ?>


<div id="wrapper" class="container">

    <?php get_template_part( 'template-content-header-big'); ?> 

    <div id="content-wrapper">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div id="normal-content" class="col-xs-12">
            <div class="contact-form-widget col-xs-12 col-md-4">

                <?php echo do_shortcode(get_post_meta(get_the_ID(), 'contact_form_shortcode', true)) ?>

            </div>

            <?php $items = new WP_Query( array( 'post_type' => 'contact') );
            if( $items->have_posts() ) : ?>
                <div class="contact-first-column col-xs-12 col-sm-6 col-md-4">

                        <?php


                        echo apply_filters('the_content',get_post_meta(get_the_ID(), 'first_column', true));

                        ?>


                </div>
                <div class="contact-second-column col-xs-12 col-sm-6 col-md-4">
                    <?php echo apply_filters('the_content',get_post_meta(get_the_ID(), 'second_column', true)); ?>
                </div>


                <?php wp_reset_query(); // Reset the loop.
            endif; ?>

            </div> <!-- #normal-content -->
        </div> <!-- .side-by-side-fill-height -->


            
    
    </div> <!-- #content-wrapper -->
    </div> <!-- #wrapper -->


<?php
get_footer();
