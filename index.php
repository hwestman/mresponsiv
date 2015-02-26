<?php
/**
 * The main template file
 *
 */

get_header(); ?>

    <div id="wrapper" class="container">





	<?php get_template_part( 'template-content-header-big'); ?> 

        <div id="content-wrapper">
        <div id="content-full-width" class="no-padding"> 
           
		<?php get_template_part( 'template-frontpage-news'); ?> 
           <?php get_template_part( 'template-services'); ?> 
			<?php get_template_part( 'template-collaborators'); ?> 


	    </div> <!-- .content-full-width -->
	</div> <!-- #content-wrapper -->
</div> <!-- #wrapper -->

<?php
get_footer();
