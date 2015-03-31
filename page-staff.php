<?php
/*
Template Name: Page - Staff
*/  
get_header(); ?>


<?php get_template_part( 'template-content-header-normal'); ?> 
            


        <div id="content-no-sidebar" >
            <div id="content-padding">


<?php if ( have_posts() ) : ?>
  <?php while ( have_posts() ) : the_post(); ?>    
   <?php the_content(); ?>
  <?php endwhile; ?>
<?php endif; ?>




    <div class="staff-page-heading">
        <h1>Ansatte</h1>
    </div>
    <?php

    $args= array(
        'order'=>'ASC'
    );
    $users = get_users($args);

    foreach($users as $user){ ?>

        <ul class="staff-list">
            <a class="staff-list-link" href="<?php get_bloginfo('url') ?>?author=<?php echo $user->ID; ?>">
            <li class="staff-list-visual">
                <span class="staff-list-thumbnail-crop">
                    <?php

                    //just a function to get the url instead of img element
                    preg_match("/src='(.*?)'/i", get_avatar($user->ID), $matches);
                    $contactperson_photo =  $matches[1];
                    ?>
                    <img class="staff-list-thumbnail" src="<?php echo $contactperson_photo ?>">
                </span>
            </li>
            <li class="staff-list-content">
                <h4 class="staff-list-person-heading"><?php echo $user->user_firstname." ".$user->user_lastname; ?></h4>
                <p class="staff-list-person-text"><?php echo get_user_meta($user->ID,'position',true);  ?></p>
            </li>
            </a>
        </ul>
    <?php } ?>

</div> <!-- #content-padding -->
</div> <!-- #content-no-sidebar --> 
</div> <!-- .content -->
    



    <div class="push"></div> <!-- .push must be inside #wrapper -->

</div> <!-- #wrapper -->

<?php
get_footer();