<?php
/*
 * Generate markup for the frontpage news section
 */
?>

<div class="row" id="frontpage-news-section" class="frontpage-section">
    <div class="col-md-12">
        

    <?php
    $idObj = get_category_by_slug('archived'); 
    $id = $idObj->term_id;
    $the_query = new WP_Query( array( 'category_name' => 'news','category__not_in'=>array($id),'posts_per_page'=>3 ) ); 
    if ( $the_query->have_posts() ) : ?>

    
    <?php 

	while ( $the_query->have_posts() ) : $the_query->the_post(); 
	?>
        
        <div class="row">
            
                <div class="col-md-4">
                    <a href="<?php the_permalink(); ?>">
			<img class="img-responsive" src="<?php the_post_thumbnail_url('news'); ?>"/>
			</a>
                </div>
                <div class="col-md-8">
                    <div class="row news-header">
                        <a href="<?php the_permalink(); ?>">
                        <div class="col-xs-8">
                            <h2 class="pull-left"><?php the_title(); ?></h2>
                        </div>
                        <div class="col-xs-4">
                            <h3 class="pull-right"><?php echo get_the_date( 'd. M Y'); ?></h3>
                        </div>
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="frontpage-news-excerpt"><?php echo get_the_excerpt(); ?></p>    
                        </div>                    
                    </div>
                </div>
            
        </div>
        <hr class="new-services-separator">            
        
	<?php  	endwhile; 
		wp_reset_query(); 
	endif; ?>
    <div class="row">
        <div class="col-md-12">
            <a class="pull-right" href="<?php echo get_site_url() ?>/news"><h2>Arkiv</h2></a>
            
        </div>
    </div>

    </div>
</div> <!-- #frontpage-news-section -->
