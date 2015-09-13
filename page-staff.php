<?php
/*
Template Name: Page - Staff
*/  
get_header(); ?>


<?php get_template_part( 'template-content-header-normal'); ?> 
            


        <div id="content-no-sidebar" >
            <div id="content-padding">






    <div class="staff-page-heading">
        <h1>Ansatte</h1>
    </div>


    <?php

    //$contactpersons = get_post_meta($post->ID, 'contactpersons', true);


    //foreach($user_order as $key => $value){

    $args= array(
        'order'=>'ASC',
        'role'=>'administrasjon'
    );


    $administrasjonUserIDs = sortUsers(get_users($args));
    //wp_reset_postdata();

    if($administrasjonUserIDs != null && count($administrasjonUserIDs) > 0){ ?>
        <div class="staff-page-heading">
            <h2>Administrasjon</h2>
        </div>
        <div class="staff-container">
            <?php displayUsers($administrasjonUserIDs); ?>
        </div> <!-- .staff-container -->
    <?php }

    $args= array(
        'order'=>'ASC',
        'role'=>'subscriber'
    );
    $userIDs = sortUsers(get_users($args)); ?>

    <?php if($administrasjonUserIDs != null && count($administrasjonUsers) > 0){?>
    <div class="staff-page-heading">
     <h2>Personell</h2>
    </div>
    <?php } ?>
    <div class="staff-container">
        <?php displayUsers($userIDs); ?>
    </div> <!-- .staff-container -->

</div> <!-- #content-padding -->
</div> <!-- #content-no-sidebar --> 
</div> <!-- .content -->
    



    <div class="push"></div> <!-- .push must be inside #wrapper -->

</div> <!-- #wrapper -->

<?php

function displayUsers($userIDs){

    foreach($userIDs as $key => $value){

        $user = get_userdata($key);

        if(isset($user->user_firstname) && $user->user_firstname != ""){

            $authorUrl = get_author_posts_url($user->ID);

            ?>
            <ul class="staff-list">
                <a class="staff-list-link" href="<?php echo $authorUrl;?>">
                    <li class="staff-list-visual">
                <span class="staff-list-thumbnail-crop">
                    <?php

                    //just a function to get the url instead of img element
                    preg_match("/src='(.*?)'/i", get_avatar($user->ID,200), $matches);
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
                <a class="staff-list-fixed-link" href="<?php echo $authorUrl;?>">
                <span class="staff-list-fixed-link-inner">
                    Kontakt
                </span>
                </a>
            </ul>

        <?php }

    }

}

/**
 * @param $users actual user-objects
 * @return array RETURNS An assosiative array of userids, so its not user-objects!
 */
function sortUsers($users){


    $user_order = array();
    foreach($users as $user){
        $index = get_user_meta($user->ID,'sortOrder',true);

        if($index == "" || $index == null){
            $index = 10;
        }
        $user_order[$user->ID] = $index;
    }
    asort($user_order);
    return $user_order;
}

get_footer();