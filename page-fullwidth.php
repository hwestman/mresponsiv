<?php
/*
Template Name: Page - Fullwidth 
*/	
get_header(); ?>


<?php  get_template_part( 'template-content-header-normal'); ?>
        <div id="full-width-content">
            <div id="content-padding">

                <?php
                while ( have_posts() ) : the_post();
                    get_template_part( 'content', get_post_format() );
                endwhile;
                ?>
                <?php wp_reset_query(); ?>

            </div> <!-- #content-padding -->
        </div>
    </div>
    <div class="push"></div> <!-- .push must be inside #wrapper -->

</div> <!-- #wrapper -->

<?php
get_footer();