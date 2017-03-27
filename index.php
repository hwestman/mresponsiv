<?php
/*
Template Name: Page - Fullwidth 
*/
get_header(); ?>
<div class="container">
    <!--<div class="hidden-sm hidden-md hidden-lg mship-graphic-xs">
        <img class="mship-graphic" src="<?php echo get_template_directory_uri()?>/img/mship_grafikk.png" />               
        <hr class="mship-graphic-seperator">            
    </div>-->
    <div class="row" id="new-service-container">
        
        <?php $items = new WP_Query( array( 'post_type' => 'services', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC') );
        if( $items->have_posts() ) : ?>
            <?php while( $items->have_posts() ) : $items->the_post(); ?>
                <?php $services_url = get_post_meta($post->ID, 'collaborator_url', true);?>
                <?php $services_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'square'); ?>

                <div class="col-xs-6 col-sm-4 col-lg-2  new-service-item">
                    <a class="new-service-item-link" href="<?php echo the_permalink(); ?>">
                        <div class="new-service-item">
                            <img src="<?php echo $services_thumbnail[0] ?>"/>
                            <div class="new-service-title">
                                <p><?php echo the_title(); ?></p>                        
                            </div>                                        
                        </div> <!-- .fp-service-item -->
                    </a>
                </div>
                
                <?php wp_reset_query(); // Reset the loop. ?>
            <?php endwhile;?>
        <?php endif; ?>
    </div>
    <!--<div class="hidden-xs">
        <img class="mship-graphic" src="<?php echo get_template_directory_uri()?>/img/mship_grafikk.png" />               
        <hr class="mship-graphic-seperator">            
    </div>-->
<?php get_template_part( 'template-frontpage-news'); ?>
</div>

<?php
get_footer();

