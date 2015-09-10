<?php
/*
 * Generate markup for the hero-image section
 */
?>

<div id="frontpage-services-container" class="frontpage-section">
	<div class="frontpage-section-heading">
		<h2>Tjenester</h2>
	</div> <!-- .frontpage-section-heading -->   


    <div class="frontpage-services">

	<?php

    $bedriftItems = new WP_Query( array( 'post_type' => 'services', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC','category_name'=>'bedrift') );
    $privatItems = new WP_Query( array( 'post_type' => 'services', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC','category_name'=>'privat') );



    ?>

      <div class="fp-privat-services col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <h3 >Privat</h3>
          <?php printServices($privatItems);     ?>

      </div>

        <div class="fp-bedrift-services col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <h3 >Bedrift</h3>
            <?php printServices($bedriftItems);     ?>

        </div>



	</div> <!-- .frontpage-services -->
</div> <!-- #frontpage-services-container -->


    <?php

    function printServices($items){

        $index = 1;

        if( $items->have_posts() ) :?>
            <?php while( $items->have_posts() ) : $items->the_post(); ?>

            <?php $services_url = get_post_meta($post->ID, 'collaborator_url', true);?>
            <?php $services_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'square'); ?>


                <!-- IF 3 x per linje -->

                <?php if($index > 2){ ?>
                    <div class="fp-seperated-service-item col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 30px;">

                <?php } else { ?>

                    <div class="fp-seperated-service-item col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <?php } ?>

                <a class="fp-service-item-link" href="<?php echo the_permalink(); ?>">
                    <div class="fp-service-visual">
                        <img src="<?php echo $services_thumbnail[0] ?>">
                    </div>
                    <div class="fp-service-content">
                        <h2><?php echo the_title(); ?></h2>
                    </div>
                </a>
            </div> <!-- .fp-service-item -->



                    <?php wp_reset_query(); // Reset the loop. ?>
                <?php
            $index++;
            endwhile;?>
            <?php endif;
    }


?>