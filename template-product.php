<?php
/*
 * Generate markup for the hero-image section
 */
$post = get_post();

$theLink = get_permalink($post->ID);
?>

<div id="sidebar" class="sidebar-left" >
    <div id="sidebar-padding">

        <?php

        //$catid = get_cat_ID($post->post_name);
        $catObj = get_category_by_slug($post->post_name);
        $catId = $catObj->term_id;
        $args = array(
            'type'                     => 'post',
            'child_of'                 => $catId,
            'hide_empty'               => false,
            'hierarchical'             => true,
            'exclude'                  => '0,1'
        );
        if($catId){
            $categories = get_categories( $args );?>

            <ul class="categories">
                <?php foreach($categories as $cat){

                    $query = new WP_Query('category_name='.$cat->name);?>
                    <li><ul class="sub-category">

                            <li class="sub-category-header"><?php echo $cat->name; ?></li>
                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                                <li class="sub-category-item"><a href="<?php echo $theLink."?postID=".get_the_ID();?>"><?php the_title(); ?></a></li>

                            <?php endwhile;  wp_reset_query(); ?>

                        </ul></li>

                <?php } ?>
            </ul>
        <?php } ?>



    </div> <!-- #sidebar-padding -->
</div> <!-- #sidebar -->



<div id="content-sidebar" class="content-right" >
    <div id="content-padding">

        <?php if(isset($_GET['postID'])){

         $post = get_post($_GET['postID']);
        }

        ?>

            <h1 class="post-heading"><?php echo $post->post_title ?></h1>


            <?php echo get_the_post_thumbnail( $post->ID, 'sideway') ?>
            <?php echo $post->post_content;

            ?>

        <?php
        wp_reset_postdata();
        get_template_part( 'template-sidebar-staff'); ?>



    </div>
</div>

</div><!--Content end -->

<div id="sidebar-background" class="sidebar-background-left">
</div>
<div class="push"></div> <!-- .push must be inside #wrapper -->
