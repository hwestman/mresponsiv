<?php
/*
 * Generate markup for the hero-image section
 */
?>


<?php $items = new WP_Query( array( 'post_type' => 'samarbeidspartnere', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC', 'category_name'=>get_post( $post )->post_name) ); ?>
<?php if( $items->have_posts() ) : ?>
<div id="frontpage-collaborators-container" class="frontpage-section">
	<div class="frontpage-section-heading">
		<h2>Våre samarbeidspartnere</h2>
	</div> <!-- .frontpage-section-heading -->    

    <div id="'frontpage-collaborators'">
        <ul class="frontpage-collaborators-list">
 		<?php while( $items->have_posts() ) : $items->the_post(); ?>
		<?php $collaborator_url = get_post_meta($post->ID, 'collaborator_url', true);?>
		<?php $collaborator_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'collaborator'); ?>
			<li class="frontpage-collaborators-item col-xs-12 col-sm-4">
				<a href="<?php echo $collaborator_url; ?>" class="frontpage-collaborators-item-link">
					<img src="<?php echo $collaborator_thumbnail[0] ?>" alt="<?php echo the_title(); ?>" >
				</a> <!-- .frontpage-collaborators-item-link -->  
	         </li> <!-- .frontpage-collaborators-item -->
		<?php wp_reset_query(); ?>
		<?php endwhile;?>
		
	 	</ul> <!-- .frontpage-collaborators-list -->
	</div> <!-- #frontpage-collaborators -->
</div> <!-- #frontpage-collaborators-container -->
<?php endif; ?>

	

     
