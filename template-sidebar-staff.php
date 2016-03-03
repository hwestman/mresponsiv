
<div class="sidebar-person-heading">
    <h2>Kontaktpersoner</h2>
</div>

<?php
$post = get_post();

$contactpersons = get_post_meta($post->ID, 'contactpersons', true);

$user_query = new WP_User_Query( array( 'include' => $contactpersons ) );

$user_order = array();
foreach($user_query->get_results() as $user){

    $index = get_user_meta($user->ID,'sortOrder',true);

    if($index == "" || $index == null){
        $index = 10;
    }
    $user_order[$user->ID] = $index;
}
wp_reset_postdata();

asort($user_order);


foreach($user_order as $key => $value){

$user = get_userdata($key);

$authorUrl = get_author_posts_url($user->ID);

?>
<ul class="sidebar-person">

    <li class="sidebar-person-visual">
        <a class="sidebar-person-thumbnail-crop" href="<?php echo $authorUrl;?>">

            <?php

            //just a function to get the url instead of img element
            preg_match("/src='(.*?)'/i", get_avatar($user->ID,200), $matches);
            $contactperson_photo =  $matches[1];
            ?>


            <img class="sidebar-person-thumbnail" src="<?php echo $contactperson_photo ?>">
        </a>
    </li>
    <li class="sidebar-person-content">
        <a class="sidebar-person-name-link" href="<?php echo $authorUrl?>">
            <h4 class="sidebar-person-name"><?php echo $user->user_firstname." ".$user->user_lastname; ?></h4>
        </a>
        <p class="sidebar-person-title"><?php echo get_user_meta($user->ID,'position',true);  ?></p>
    </li>
    <a class="person-sidebar-color-link" href="<?php echo $authorUrl ?>">
        Kontakt
    </a>
</ul>
<?php }


wp_reset_postdata();
?>