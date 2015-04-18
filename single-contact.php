<?php
/**
 * The template for displaying a post in contact info costum post.
 *
 */
get_header(); ?>


<?php get_template_part( 'template-content-header-normal'); ?> 


<div id="content-no-sidebar" >
    <div id="content-padding">

    <?php get_template_part( 'template-content-header-big'); ?> 

        <?php $items = new WP_Query( array( 'post_type' => 'contact') );
        if( $items->have_posts() ) : ?>

        <div class="contact-first-column col-xs-12 col-sm-6 col-md-4">
            <?php echo apply_filters('the_content',get_post_meta(get_the_ID(), 'first_column', true)); ?>
        </div> <!-- .contact-first-column -->

        <div class="contact-second-column col-xs-12 col-sm-6 col-md-4">
            <?php echo apply_filters('the_content',get_post_meta(get_the_ID(), 'second_column', true)); ?>
        </div> <!-- .contact-second-column -->

    <?php endif; wp_reset_query(); // Reset the loop. ?>  

    <div class="contact-form-widget col-xs-12 col-md-4">
        <?php echo do_shortcode(get_post_meta(get_the_ID(), 'contact_form_shortcode', true)) ?>
    </div> <!-- .contact-form-widget -->

    </div> <!-- .content-padding -->
</div> <!-- #content-no-sidebar -->



</div> <!-- #content -->

    <div class="push"></div> <!-- .push must be inside #wrapper -->
</div> <!-- #wrapper -->


<?php
get_footer();

