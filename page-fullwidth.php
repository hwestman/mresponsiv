<?php
/*
Template Name: Page - Fullwidth 
*/	
get_header(); ?>


<?php  get_template_part( 'template-content-header-normal'); ?>

    <div id="content-sidebar" class="content-left" >
        <div id="content-padding">

            <?php
            while ( have_posts() ) : the_post();
                get_template_part( 'content', get_post_format() );
            endwhile;
            ?>
            <?php wp_reset_query(); ?>

        </div> <!-- #content-padding -->
    </div> <!-- #content-sidebar -->

</div> <!-- #wrapper -->

<?php
get_footer();