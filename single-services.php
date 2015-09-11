<?php

get_header(); ?>



<?php get_template_part( 'template-content-header-normal');


$post = get_post();

$isProduct = get_post_meta($post->ID, 'isProduct', true);


if($isProduct){
    get_template_part('template-product');
}else{
    get_template_part('template-service');
}
get_template_part( 'template-service-collaborators');
?>

<div id="sidebar-background" class="sidebar-background-right"></div>

<div class="push"></div> <!-- .push must be inside #wrapper -->


</div> <!-- #wrapper -->

<?php

get_footer();
