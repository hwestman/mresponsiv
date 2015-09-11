<?php
/*
 * Generate markup for the hero-image section
 */


$post = get_post();
?>
<div id="content-sidebar" class="content-left" >
    <div id="content-padding">
        <div class="post-content">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1 class="post-heading"><?php echo $post->post_title ?></h1>
                <?php echo do_shortcode( $post->post_content ); ?>
            </article>
            
            <?php get_template_part( 'template-service-collaborators'); ?>
        </div>

    </div>
</div>

<div id="sidebar" class="sidebar-right" >
    <div id="sidebar-padding">
        <?php get_template_part( 'template-sidebar-staff'); ?>
    </div> <!-- #sidebar-padding -->
</div> <!-- #sidebar -->

</div> <!-- #content -->
<!--
<div id="sidebar-background" class="sidebar-background-right"></div>

<div class="push"></div> <!-- .push must be inside #wrapper -->

