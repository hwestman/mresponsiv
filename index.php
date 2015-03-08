<?php
/**
 * The main template file
 *
 */

get_header(); ?>

    <div id="wrapper" class="container">





	<?php get_template_part( 'template-content-header-frontpage'); ?> 

    <div id="content-wrapper">
    	<div id="cntent-full-width" class="no-padding"> 
        <div id="normal-content">
           
		<?php //not ready yet get_template_part( 'template-frontpage-news'); ?>
           <?php get_template_part( 'template-services'); ?> 
			<?php get_template_part( 'template-collaborators'); ?> 

		</div> <!-- #normal-content -->
	    </div> <!-- .content-full-width -->
	</div> <!-- #content-wrapper -->
</div> <!-- #wrapper -->

<?php
get_footer();
