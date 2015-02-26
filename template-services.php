<?php
/*
 * Generate markup for the hero-image section
 */
?>

<div id="frontpage-collaborators-container" class="col-xs-12 frontpage-section">
	<div class="frontpage-section-heading col-xs-12">
		<h2>Tjenester</h2>
	</div>   
    <div class="col-xs-push-1 col-xs-10">
        <div class="frontpage-services">

<?php $items = new WP_Query( array( 'post_type' => 'services', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC') ); ?>
<?php if( $items->have_posts() ) : ?>
 <?php while( $items->have_posts() ) : $items->the_post(); ?>
	
	<?php $services_url = get_post_meta($post->ID, 'collaborator_url', true);?></p>
	<?php $services_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'square'); ?>

		<div class="frontpage-services-single">
			<div class="frontpage-services-single-visual">
			<a class="frontpage-services-thumbnail-link" href="<?php echo $services_url; ?>">
				<img src="<?php echo $services_thumbnail[0] ?>" alt="<?php echo the_title(); ?>" >
			</a>			
			</div>
			<div class="frontpage-services-content">
				<a class="frontpage-services-content-link" href="<?php echo $services_url; ?>">
				<h2 class="frontpage-services-single-heading"><?php echo the_title(); ?></h2>
				<?php echo the_excerpt(); ?>
				</a>	
			</div>
		</div>

	<?php wp_reset_query(); // Reset the loop. ?>
	<?php endwhile;?>
	<?php endif; ?>

      </div>
	</div>
</div> <!-- #frontpage-collaborators-container -->