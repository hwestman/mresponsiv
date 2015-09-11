<?php
/*
 * Generate markup for the hero-image section
 */
$post = get_post();

$theLink = get_permalink($post->ID);
?>

<div id="sidebar" class="sidebar-left" >
    <div id="sidebar-padding">
    <div class="service-navbar">

        <div class="sidebar-menu-container">
        <div class="sidebar-menu-header">
            <h3 class="sidebar-menu-title">Alternativer</h3>
            <button class="sidebar-menu-toggle">
                <span class="toggle-button-stroke"></span>
                <span class="toggle-button-stroke"></span>
                <span class="toggle-button-stroke"></span>
            </button>
        </div> <!-- .sidebar-menu-header -->

        <ul class="sidebar-menu">
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
            $categories = get_categories( $args );
            usort($categories, function($a, $b)
            {
                return strnatcmp($a->name, $b->name);
            }); ?>
                <?php foreach($categories as $cat){

                    $query = new WP_Query('category_name='.$cat->name);?>

                    <li class="submenu-toggle">
                        <h4 class="dropdown-menu-heading"><?php echo $cat->name; ?><span class="caret no-desktop"></span></h4>
                        <ul class="sidebar-dropdown-menu">

                            
                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                                <li class="sub-category-item"><a href="<?php echo $theLink."?product=".$post->post_name;?>"><?php the_title(); ?></a></li>

                            <?php endwhile;  wp_reset_query(); ?>

                        </ul></li>

                <?php } ?>
            </ul> <!-- .sidebar-menu -->
        </div> <!-- .sidebar-menu-container -->
        <?php } ?>


        </div> <!-- .service-navbar -->
    </div> <!-- #sidebar-padding -->
</div> <!-- #sidebar -->



<div id="content-sidebar" class="content-right" >
    <div id="content-padding">

        <?php if(isset($_GET['product'])){


            $args=array(
                'name'           => $_GET['product'],
                'post_type'      => 'post',
                'posts_per_page' => 1
            );
            $post = get_posts( $args )[0];

         //$post = get_post($_GET['product']);
        }

        ?>
        <div class="post-content">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <h1 class="post-heading"><?php echo $post->post_title ?></h1>


            <?php
                if(isset($_GET['product'])) { //Have to make sure this is a product and not a service, cause we allready see the service image :)
                    echo get_the_post_thumbnail($post->ID, 'sideway');
                }
            ?>

                <?php
                    //echo $post->post_content;
                    echo do_shortcode( $post->post_content );
                ?>
            </article> <!-- #post -->
            <?php get_template_part( 'template-service-collaborators'); ?>
        </div> <!-- .post-content -->
        <?php
        wp_reset_postdata();
        get_template_part( 'template-sidebar-staff'); ?>



    </div>
</div>

</div><!--Content end -->
<!--
<div id="sidebar-background" class="sidebar-background-left">
</div>
<div class="push"></div> <!-- .push must be inside #wrapper -->

