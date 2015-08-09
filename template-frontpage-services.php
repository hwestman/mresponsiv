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
  
	<?php $items = new WP_Query( array( 'post_type' => 'services', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC') ); ?>
	<?php if( $items->have_posts() ) : ?>
 	<?php while( $items->have_posts() ) : $items->the_post(); ?>

	<?php $services_url = get_post_meta($post->ID, 'collaborator_url', true);?>
	<?php $services_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'square'); ?>


	<!-- IF 3 x per linje -->
	
	<?php 

	if($items->post_count == 4){ ?>
	<div class="fp-service-item col-xs-12 col-sm-6 col-md-3 col-lg-3">

	<?php } else { ?>
	
	<div class="fp-service-item col-xs-12 col-sm-6 col-md-4 col-lg-4">
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
	<?php endwhile;?>
	<?php endif; ?>

     
	</div> <!-- .frontpage-services -->
</div> <!-- #frontpage-services-container -->