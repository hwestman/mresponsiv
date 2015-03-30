<?php
/*
Template Name: Page - Fullwidth 
*/	
get_header(); ?>


<?php get_template_part( 'template-content-header-frontpage'); ?> 



        <div id="content-no-sidebar" >
        	<div id="content-padding">

			<?php //not ready yet get_template_part( 'template-frontpage-news'); ?>
            <?php get_template_part( 'template-frontpage-services'); ?> 
			<?php get_template_part( 'template-frontpage-collaborators'); ?> 

			</div>
        </div>

       	<div id="no-sidebar" >
          
        </div> <!-- #sidebar -->

    </div> <!-- .content -->
    



	<div class="push"></div> <!-- .push must be inside #wrapper -->

</div> <!-- #wrapper -->

<?php
get_footer();