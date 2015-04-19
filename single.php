<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>


<?php get_template_part( 'template-content-header-normal'); ?>


        <div id="sidebar" class="sidebar-left">
            <div id="sidebar-padding">

                <div class="news-navbar">


                    <div class="sidebar-menu-container">


                        <div class="sidebar-menu-header">
                            <h3 class="sidebar-menu-title"><a href="<?php echo site_url(); ?>/news">Arkiv</a></h3>
                            <button class="sidebar-menu-toggle">
                                <span class="toggle-button-stroke"></span>
                                <span class="toggle-button-stroke"></span>
                                <span class="toggle-button-stroke"></span>
                            </button>
                        </div> <!-- .sidebar-menu-header -->
                        <?php



                        //$years = $wpdb->get_results( "SELECT YEAR(post_date) AS year FROM wp_posts WHERE post_type = 'post' AND post_status = 'publish' GROUP BY year DESC");

                        $category = get_term_by('name', 'news', 'category');

                        $id = $category->term_id;
                        $years = $wpdb->get_results( "SELECT YEAR(post_date) as 'year' FROM $wpdb->posts
                                            LEFT JOIN $wpdb->term_relationships ON
                                            ($wpdb->posts.ID = $wpdb->term_relationships.object_id)
                                            LEFT JOIN $wpdb->term_taxonomy ON
                                            ($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)
                                            WHERE $wpdb->posts.post_status = 'publish'
                                            AND $wpdb->term_taxonomy.taxonomy = 'category'
                                            AND $wpdb->term_taxonomy.term_id = $id
                                            GROUP BY year ORDER BY post_date DESC");

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
            <div id="content-padding">
                <?php
                    while ( have_posts() ) : the_post();
                        get_template_part( 'content', get_post_format() );
                    endwhile;
                ?>
                <?php wp_reset_query(); ?>
            </div> <!-- .content-padding -->
        </div> <!-- #content-sidebar -->

    </div>
    <div id="sidebar-background" class="sidebar-background-left"></div>
    <div class="push"></div> <!-- .push must be inside #wrapper -->
</div> <!-- #wrapper -->


<?php
get_footer();
