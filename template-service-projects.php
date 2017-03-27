<?php
/*
 * Generate markup for the hero-image section
 */
?>


<?php $items = new WP_Query( array( 'post_type' => 'projects', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC', 'category_name'=>get_post( $post )->post_name) ); ?>
<?php if( $items->have_posts() ) : ?>
<div id="frontpage-projects-container" class="frontpage-section">
	<div class="frontpage-section-heading">
		<h2>Våre prosjekter</h2>
	</div> <!-- .frontpage-section-heading -->    

    <div id="'frontpage-collaborators'">
        <ul class="frontpage-collaborators-list">
 		<?php while( $items->have_posts() ) : $items->the_post(); ?>
		 	
			<li class="frontpage-collaborators-item col-xs-12 col-sm-4">
				<a href="<?php the_permalink(); ?>" class="project-link">
					<h3><?php the_title(); ?></h3>
					<?php the_post_thumbnail('news'); ?>
					
				</a>
	         </li> <!-- .frontpage-collaborators-item -->
		<?php wp_reset_query(); ?>
		<?php endwhile;?>
		
	 	</ul> <!-- .frontpage-collaborators-list -->
	</div> <!-- #frontpage-collaborators -->
</div> <!-- #frontpage-collaborators-container -->
<?php endif; ?>

	

     
