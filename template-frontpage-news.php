<?php
/*
 * Generate markup for the frontpage news section
 */
?>

<div id="frontpage-news-section" class="frontpage-section">

    <?php
    query_posts( array ( 'category_name' => 'news', 'posts_per_page' => 3 ) );
	
    if (have_posts()){ ?>

    <div class="frontpage-section-heading">
        <a href="<?php echo get_site_url() ?>/news"><h2>Nyheter</h2></a>
    </div>
    <?php while (have_posts()) : the_post(); ?>
        <?php
	$cats = get_the_category();
	$cat_name = $cats[0]->name;

	$shouldSkip = false;
	foreach($cats as $cat){
		if($cat->name == "archived"){
			$shouldSkip = true;
		}
	}
	if($shouldSkip){
		continue;
	}
	
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
			
		<?php  	endwhile; }	?>
		<?php wp_reset_query(); ?>

</div> <!-- #frontpage-news-section -->
