<?php
/*
 * Generate markup for the hero-image section
 */
$post = get_post();
?>

<div id="sidebar" class="sidebar-left" >
    <div id="sidebar-padding">
        <ul>
        <?php
        //query_posts('category_name='.$post->post_name);

        $args = array(
            'category_name=' => $post->post_name,
            'orderby' => 'title',
            'order'   => 'DESC',
        );

        $query = new WP_Query($args);

         while ( $query->have_posts() ) : $query->the_post(); ?>
            <li><?php the_title(); ?></li>
        <?php endwhile; ?>
        </ul>

    </div> <!-- #sidebar-padding -->
</div> <!-- #sidebar -->



<div id="content-sidebar" class="content-right" >
    <div id="content-padding">

        <h1 class="post-heading"><?php echo $post->post_title ?></h1>
        <?php echo $post->post_content; ?>

        <?php get_template_part( 'template-sidebar-staff'); ?>



    </div>
</div>

</div><!--Content end -->

<div id="sidebar-background" class="sidebar-background-left">
</div>
<div class="push"></div> <!-- .push must be inside #wrapper -->
