<?php
/*
Template Name: Page - Fullwidth 
*/	
get_header(); ?>


<?php get_template_part( 'template-content-header-frontpage'); ?> 



<div id="content-no-sidebar" >
    <div id="content-padding">
        <?php
        $postsWithCat = new WP_Query( array( 'post_type' => 'services', 'category_name'=>'bedrift,privat') );

        if($postsWithCat->post_count > 0){
            get_template_part( 'template-frontpage-services-inCategory');
        }else{
            get_template_part( 'template-frontpage-services');
        }


        ?>

        <?php get_template_part( 'template-frontpage-news'); ?>
        <?php get_template_part( 'template-frontpage-collaborators'); ?> 

    </div> <!-- #content-padding -->
</div> <!-- #content-no-sidebar -->

    <div id="no-sidebar" ></div> <!-- #sidebar -->

</div> <!-- .content -->
    
	<div class="push"></div> <!-- .push must be inside #wrapper -->

</div> <!-- #wrapper -->

<?php
get_footer();