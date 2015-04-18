<?php
/*
Template Name: Page - Nyheter
*/  

get_header(); ?>


<?php get_template_part( 'template-content-header-normal'); ?> 

<div id="sidebar" class="sidebar-left">
  <div id="sidebar-padding">
  
    <div class="news-navbar">


        <div class="sidebar-menu-container">


        <div class="sidebar-menu-header">
            <h3 class="sidebar-menu-title">Alternativer</h3>
            <button class="sidebar-menu-toggle">
                <span class="toggle-button-stroke"></span>
                <span class="toggle-button-stroke"></span>
                <span class="toggle-button-stroke"></span>
            </button>
        </div> <!-- .sidebar-menu-header -->
            <?php



            $years = $wpdb->get_results( "SELECT YEAR(post_date) AS year FROM wp_posts WHERE post_type = 'post' AND post_status = 'publish' GROUP BY year DESC");
            ?>

            <ul class="sidebar-menu">
                <!--<li class="submenu-toggle">-->

                    <?php

                    foreach ( $years as $year ) {?>
                        <li class="news-nav-item">
                            <a href="<?php echo site_url(); ?>/news/<?php echo $year->year; ?>" class="news-nav-item-link"><?php echo $year->year; ?></a>
                        </li>

                   <?php  } ?>

            </ul> <!-- .sidebar-menu -->
        </div> <!-- .sidebar-menu-container -->


    </div> <!-- #news-navbar-->
  </div> <!-- #sidebar-padding -->
</div> <!-- #sidebar -->


        <div id="content-sidebar" class="content-right" >

            <?php
            query_posts( array ( 'category_name' => 'news', 'posts_per_page' => 3, 'year' => get_query_var( 'year') ));
            //query_posts( 'posts_per_page=3' );
            if (have_posts()){ ?>

                <?php while (have_posts()) : the_post(); ?>





                    <div id="content-padding">
                      <div class="news-archive-single-container">
                        <a class="news-archive-thumbnail-link" href="<?php the_permalink(); ?>">
                          <?php the_post_thumbnail('news'); ?>
                        </a>
                        <div class="news-archive-single-content">
                          <a class="news-archive-heading-link" href="<?php the_permalink(); ?>">
                            <h2><?php the_title(); ?></h2>
                          </a>
                          <span class="news-archive-meta"><?php echo get_the_date( 'd. M Y'); ?></span>
                          <a class="news-archive-excerpt-link" href="<?php the_permalink(); ?>">
                              <?php echo get_the_excerpt(); ?>
                          </a>
                        </div>
                      </div>
                    </div>

                <?php  	endwhile; }	?>
            <?php wp_reset_query(); ?>


        </div> <!-- #content-sidebar -->



</div>

<div id="sidebar-background" class="sidebar-background-left">
  
</div> <!-- #content -->


  <div class="push"></div> <!-- .push must be inside #wrapper -->

</div> <!-- #wrapper -->

<?php
get_footer();
