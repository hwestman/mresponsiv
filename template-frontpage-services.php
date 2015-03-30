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
	<?php $services_thumbnail2 = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'page-full-width'); ?>

		

		<div class="frontpage-services-single col-xs-12">
			<div class="frontpage-services-single-visual" style="background-image: url('<?php echo $services_thumbnail2[0] ?>');">
			</div>
			<a class="frontpage-services-content-link" href="<?php echo the_permalink(); ?>">
				<h2 class="frontpage-services-single-heading"><?php echo the_title(); ?></h2>
			</a>	
		</div>

	<?php wp_reset_query(); // Reset the loop. ?>
	<?php endwhile;?>
	<?php endif; ?>

      </div>
	</div>
</div> <!-- #frontpage-collaborators-container -->