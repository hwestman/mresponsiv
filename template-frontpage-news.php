<?php
/*
 * Generate markup for the hero-image section
 */
?>

<div id="frontpage-collaborators-container" class="col-xs-12 frontpage-section">
	<div class="frontpage-section-heading col-xs-12">
		<h2>Nyheter</h2>
	</div>   
<div class="col-xs-12" >



			<?php
			query_posts( 'posts_per_page=3' );
			 if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="col-xs-12 col-md-4">


	<ul class="frontpage-news-item">
		<li class="frontpage-news-item-visual">
			<a class="frontpage-news-thumbnail-link" href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail('news'); ?>
			</a>
		</li>
		<li class="frontpage-news-item-content">
			<a class="frontpage-news-content-link" href="<?php the_permalink(); ?>">
				<h3 class="frontpage-news-heading"><?php the_title(); ?></h3>
				<p class="frontpage-news-excerpt"><?php echo get_the_excerpt(); ?></p>
			</a>
			<span class="frontpage-news-date"><?php echo get_the_date( 'd. M Y'); ?></span>

		</li>

	</ul> <!-- .frontpage-news-item -->
			</div>
			
			
			<?php  	endwhile;	endif;	?>
			<?php wp_reset_query(); ?>

</div>
</div> <!-- #frontpage-collaborators-container -->