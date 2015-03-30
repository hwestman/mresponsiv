<?php
/*
 * Generate markup for the hero-image section
 */
?>

<div id="frontpage-collaborators-container" class="col-xs-12 frontpage-section">
	<div class="frontpage-section-heading col-xs-12">
		<h2>Samarbeidspartnere</h2>
	</div>   
    <div class="col-xs-push-1 col-xs-10">
        <ul class="frontpage-collaborators-list">

<?php $items = new WP_Query( array( 'post_type' => 'samarbeidspartnere', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC') ); ?>
<?php if( $items->have_posts() ) : ?>
 <?php while( $items->have_posts() ) : $items->the_post(); ?>
	
	<?php $collaborator_url = get_post_meta($post->ID, 'collaborator_url', true);?></p>
	<?php $collaborator_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'collaborator'); ?>

		<li class="frontpage-collaborators-item col-xs-12 col-sm-4">
			<a href="<?php echo $collaborator_url; ?>" class="frontpage-collaborators-item-link">
				<img src="<?php echo $collaborator_thumbnail[0] ?>" alt="<?php echo the_title(); ?>" >
			</a>
         </li>   
	<?php wp_reset_query(); // Reset the loop. ?>
	<?php endwhile;?>
	<?php endif; ?>

      </ul>
	</div>
</div> <!-- #frontpage-collaborators-container -->