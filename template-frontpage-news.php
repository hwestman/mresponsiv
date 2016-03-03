<?php
/*
 * Generate markup for the frontpage news section
 */
?>

<div id="frontpage-news-section" class="frontpage-section">

    <?php
    $idObj = get_category_by_slug('archived'); 
    $id = $idObj->term_id;
    $the_query = new WP_Query( array( 'category_name' => 'news','category__not_in'=>array($id),'posts_per_page'=>3 ) ); 
    if ( $the_query->have_posts() ) : ?>

    <div class="frontpage-section-heading">
        <a href="<?php echo get_site_url() ?>/news"><h2>Nyheter</h2></a>
    </div>
    <?php 

	while ( $the_query->have_posts() ) : $the_query->the_post(); 
	?>
        <div class="frontpage-news-item-container col-xs-12 col-md-4">
            <ul class="frontpage-news-item">

                <li class="frontpage-news-item-visual">
                    <a class="frontpage-news-thumbnail-link" href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('news'); ?>
                    </a> <!-- .frontpage-news-thumbnail-link -->
                </li> <!-- .frontpage-news-item-visual-->

                <li class="frontpage-news-item-content">
                    <a class="frontpage-news-content-link" href="<?php the_permalink(); ?>">
                        <h3 class="frontpage-news-heading"><?php the_title(); ?></h3>
                        <p class="frontpage-news-excerpt"><?php echo get_the_excerpt(); ?></p>
                    </a> <!-- .frontpage-news-content-link -->
                    <span class="frontpage-news-date">
                        <?php echo get_the_date( 'd. M Y'); ?>
                    </span> <!-- .frontpage-news-date -->
                </li> <!-- .frontpage-news-item-content -->

            </ul> <!-- .frontpage-news-item -->
        </div> <!-- .frontpage-news-item-container -->
			
	<?php  	endwhile; 
		wp_reset_query(); 
	endif; ?>
</div> <!-- #frontpage-news-section -->
