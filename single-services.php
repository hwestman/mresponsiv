<?php
/**
 * The template for displaying all pages
 *
 */
get_header(); ?>


<div id="wrapper" class="container">

    <?php get_template_part( 'template-content-header-big'); ?> 

    <div id="content-wrapper">

        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 side-by-side-fill-height">
            <div id="normal-content" class="col-xs-12">
            <?php $items = new WP_Query( array( 'post_type' => 'services') ); ?>
            <?php if( $items->have_posts() ) : ?>

                <h1 class="post-heading"><?php echo the_title(); ?></h1>

                <?php echo the_content(); ?>

                <p>Written by: 
<?php the_author_posts_link(); ?></p>

             <?php wp_reset_query(); // Reset the loop. ?>
            <?php endif; ?>

            </div> <!-- #normal-content -->
        </div> <!-- .side-by-side-fill-height -->

        <div id="sidebar-right" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 side-by-side-fill-height">
            <div class="sidebar">
                <div class="sidebar-person-heading">
                    <h2>Kontaktpersoner</h2>
                </div>

                <?php
                global $post;
                $custom = get_post_custom( $post->ID );

                $contactpersons = get_post_meta($post->ID, 'contactpersons', true);

                if(!$contactpersons){$contactpersons=array();}

                foreach($contactpersons as $contactperson){
                    $user = get_userdata($contactperson);

                    ?>
                    <ul class="sidebar-person">
                        <a class="person-sidebar-link" href="<?php get_bloginfo('url') ?>?author=<?php echo $user->ID; ?>">
                            <li class="sidebar-person-visual">
                        <span class="sidebar-person-thumbnail-crop">

                            <?php

                            //just a function to get the url instead of img element
                            preg_match("/src='(.*?)'/i", get_avatar($user->ID), $matches);
                            $contactperson_photo =  $matches[1];
                            ?>

                            <img class="sidebar-person-thumbnail" src="<?php echo $contactperson_photo ?>">
                        </span>
                            </li>
                            <li class="sidebar-person-content">
                                <h4 class="sidebar-person-name"><?php echo $user->user_firstname." ".$user->user_lastname; ?></h4>
                                <p class="sidebar-person-title"><?php echo get_user_meta($user->ID,'position',true);  ?></p>
                            </li>
                        </a>
                    </ul>

                <?php }
                ?>
            </div> <!-- .sidebar -->   
        </div> <!-- #sidebar-right -->
            
    
    </div> <!-- #content-wrapper -->
    </div> <!-- #wrapper -->


<?php
get_footer();
