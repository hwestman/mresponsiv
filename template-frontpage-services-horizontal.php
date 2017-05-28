<div class="row" id="new-service-container">
        
        <?php $items = new WP_Query( array( 'post_type' => 'services', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC') );
        
        if( $items->have_posts() ) : ?>
            <?php while( $items->have_posts() ) : $items->the_post(); ?>
                <?php $services_url = get_post_meta($post->ID, 'collaborator_url', true);?>
                <?php $services_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'square'); ?>
                
                <?php
                // $colLg = "col-lg-2"; 
                // $colOffset = "";
                
                // switch ($items->post_count) {
                //     case 1:
                //         $colLg = "col-lg-2";
                //         $colOffset = " col-lg-offset-5";
                //         break;
                //     case 2:
                //         $colLg = "col-lg-2";
                //         $colOffset = " col-lg-offset-4";
                //         break;
                //     case 3:
                //         $colLg = "col-lg-2";
                //         $colOffset = " col-lg-offset-3";
                //         break;
                //     case 4:
                //         $colLg = "col-lg-2";
                //         $colOffset = " col-lg-offset-2";
                //         break;
                //     case 5:
                //         $colLg = "col-lg-2";
                //         $colOffset = " col-lg-offset-1";
                //         break;
                //     case 7:
                //         $colLg = "col-lg-1";
                        
                //         break;
                //     default:
                //         # code...
                //         break;
                // }
                ?>

            <div class="col-xs-6 col-sm-4 col-lg-4  <?php echo $colLg; if($items->current_post+1 == 1)echo $colOffset  ?>   new-service-item">
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