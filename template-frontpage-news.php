<?php
/*
 * Generate markup for the hero-image section
 */
?>

            <?php
            query_posts( array ( 'category_name' => 'news', 'posts_per_page' => 3 ) );
            //query_posts( 'posts_per_page=3' );
			 if (have_posts()){ ?>

            <div class="frontpage-section-heading">
                <a href="<?php echo get_site_url() ?>/news"><h2>Nyheter</h2></a>
            </div>
               <?php while (have_posts()) : the_post(); ?>
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
			
			
			<?php  	endwhile; }	?>
			<?php wp_reset_query(); ?>

</div>
</div> <!-- #frontpage-collaborators-container -->