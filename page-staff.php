<?php
/*
Template Name: Page - Staff
*/	
get_header(); ?>


    <div id="wrapper" class="container">

		<?php get_template_part( 'template-content-header-small'); ?> 

        <div id="content-wrapper">

            <div class="col-sm-12 col-md-8 side-by-side-fill-height">
			<div id="normal-content" class="col-xs-12">
			<h1>Ansatte</h1>
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

			</div> <!-- #normal-content -->
			</div>

    
    </div> <!-- #content-wrapper -->
    </div> <!-- #wrapper -->


<?php
get_footer();
