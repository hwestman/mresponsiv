
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
       
            <li class="sidebar-person-visual">
        <a class="sidebar-person-thumbnail-crop" href="<?php get_bloginfo('url') ?>?author=<?php echo $user->ID; ?>">

            <?php

            //just a function to get the url instead of img element
            preg_match("/src='(.*?)'/i", get_avatar($user->ID), $matches);
            $contactperson_photo =  $matches[1];
            ?>

            
            <img class="sidebar-person-thumbnail" src="<?php echo $contactperson_photo ?>">
        </a>
            </li>
            <li class="sidebar-person-content">
                <a class="sidebar-person-name-link" href="<?php get_bloginfo('url') ?>?author=<?php echo $user->ID; ?>">
                <h4 class="sidebar-person-name"><?php echo $user->user_firstname." ".$user->user_lastname; ?></h4>
                </a>
                <p class="sidebar-person-title"><?php echo get_user_meta($user->ID,'position',true);  ?></p>
            </li>
        <a class="person-sidebar-color-link" href="<?php get_bloginfo('url') ?>?author=<?php echo $user->ID; ?>">
        Kontakt
        </a>
    </ul>

<?php }
?>