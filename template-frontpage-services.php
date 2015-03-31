<?php
/*
 * Generate markup for the hero-image section
 */
?>

<div id="frontpage-collaborators-container" class="frontpage-section">
	<div class="frontpage-section-heading ">
		<h2>Tjenester</h2>
	</div>   

    <div>
        <div class="frontpage-services">
  
<?php $items = new WP_Query( array( 'post_type' => 'services', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC') ); ?>
<?php if( $items->have_posts() ) : ?>
 <?php while( $items->have_posts() ) : $items->the_post(); ?>
	
	<?php $services_url = get_post_meta($post->ID, 'collaborator_url', true);?></p>
	<?php $services_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'square'); ?>
	<?php $services_thumbnail2 = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'sideway'); ?>

<?php 

	$i++;
	if ($i % 2) {
	?>

	<div class="fp-service-item">
		<div class="fp-servic-col col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<div class="fp-service-visual">
				<a class="fp-service-thumbnail-link" href="<?php echo the_permalink(); ?>">
					<img src="<?php echo $services_thumbnail2[0] ?>">
				</a>
			</div>
		</div>	
		<div class="fp-servic-col col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<div class="fp-service-text fp-service-text-left">
				<a class="fp-service-heading-link" href="<?php echo the_permalink(); ?>">
					<h2><?php echo the_title(); ?></h2>
				</a>
				<a class="fp-service-excerpt-link" href="<?php echo the_permalink(); ?>">
					<?php echo the_excerpt(); ?>
				</a>
			</div>
		</div>
	</div>

	<?php 
	} else {
	?>

	<div class="fp-service-item">
		<div class="fp-servic-col col-xs-12 col-sm-6 col-md-push-6 col-md-6 col-lg-6">
			<div class="fp-service-visual">
				<a class="fp-service-thumbnail-link" href="<?php echo the_permalink(); ?>">
					<img src="<?php echo $services_thumbnail2[0] ?>">
				</a>
			</div>
		</div>	
		<div class="fp-servic-col col-xs-12 col-sm-6 col-md-pull-6 col-md-6 col-lg-6">
			<div class="fp-service-text fp-service-text-left">
				<a class="fp-service-heading-link" href="<?php echo the_permalink(); ?>">
					<h2><?php echo the_title(); ?></h2>
				</a>
				<a class="fp-service-excerpt-link" href="<?php echo the_permalink(); ?>">
					<?php echo the_excerpt(); ?>
				</a>
			</div>
		</div>
	</div>


	<?php 
	}
	?>


	<?php wp_reset_query(); // Reset the loop. ?>
	<?php endwhile;?>
	<?php endif; ?>

      </div>
	</div>
</div> <!-- #frontpage-collaborators-container -->