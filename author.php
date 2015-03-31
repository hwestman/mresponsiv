<?php
/*
Template Name: Page - Nyheter
*/  

get_header(); ?>


<?php get_template_part( 'template-content-header-normal'); ?> 


<div id="content-sidebar" class="content-left" >
    <div id="content-padding">

            <?php
            $user = wp_get_current_user(); ?>

        <div class="person-info-container">
            <ul class="person-list">
                <li class="person-list-visual">
                    <span class="person-image">
                        <?php

                        //just a function to get the url instead of img element
                        preg_match("/src='(.*?)'/i", get_avatar($user->ID,200), $matches);
                        $contactperson_photo =  $matches[1];
                        ?>
                        <img class="sidebar-person-thumbnail" src="<?php echo $contactperson_photo ?>">
                    </span>
                </li>
                <li class="person-list-content">
                    <span class="person-list-content-person">
                        <h1 class="person-list-content-person-heading"><?php echo $user->user_firstname." ".$user->user_lastname; ?></h1>
                        <p class="person-list-content-person-text"><?php echo get_user_meta($user->ID,'position',true);  ?></p>
                    </span>

                    <?php if ($user->user_email != "") {  ?>
                    <ul class="person-info-list">
                        <li class="person-info-list-item">
                            <a class="person-info-list-item-link" 
                            href="mailto:<?php echo $user->user_email; ?>?Subject=Hei!" target="_top">
                                <h4 class="person-info-list-item-heading">
                                    E-post
                                </h4>
                                <p class="person-info-list-item-text ">
                                    <?php echo $user->user_email; ?>
                                </p>
                            </a>
                            <a class="person-info-list-item-fixed-link"
                            href="mailto:<?php echo $user->user_email; ?>?Subject=Hei!" target="_top">
                                Skriv
                            </a>
                        </li>
                    </ul>
                    <?php } ?>

                    <?php if ($user->mobile != "") {  ?>
                    <ul class="person-info-list">
                        <li class="person-info-list-item">
                            <a class="person-info-list-item-link" href="tel:<?php echo $user->mobile; ?>" >
                                <h4 class="person-info-list-item-heading">
                                    Mobil
                                </h4>
                                <p class="person-info-list-item-text ">
                                    <?php echo $user->mobile; ?>
                                </p>
                            </a>
                            <a class="person-info-list-item-fixed-link" href="tel:<?php echo $user->mobile; ?>" >
                                Ring
                            </a>
                        </li>
                    </ul>
                    <?php } ?>


                    <?php if ($user->number != "") {  ?>
                    <ul class="person-info-list">
                        <li class="person-info-list-item">
                            <a class="person-info-list-item-link" href="tel:<?php echo $user->number; ?>" >
                                <h4 class="person-info-list-item-heading">
                                    Telefon
                                </h4>
                                <p class="person-info-list-item-text ">
                                    <?php echo $user->number; ?>
                                </p>
                            </a>
                            <a class="person-info-list-item-fixed-link" href="tel:<?php echo $user->number; ?>" >
                                Ring
                            </a>
                        </li>
                    </ul>
                    <?php } ?>

                    <?php if ($user->hiredate != "") {  ?>
                    <ul class="person-info-list">
                        <li class="person-info-list-item">
                            <span class="person-info-list-item-no-link" href="" >
                                <h4 class="person-info-list-item-heading">
                                    Ansatt siden
                                </h4>
                                <p class="person-info-list-item-text ">
                                    <?php echo $user->hiredate; ?>
                                </p>
                            </span>
                        </li>
                    </ul>
                    <?php } ?>

                </li>

            </ul>
        </div> <!-- .person-info-container -->
    </div>  <!-- #content-padding-->
</div> <!-- #content-sidebar -->

<div id="sidebar" class="sidebar-right" >
  <div id="sidebar-padding">
        <div class="author-sidebar">
            <h3>Send en melding!</h3>
            <p>Her kan du kontakte <?php echo $user->user_firstname; ?> direkte.</p>         
        </div>


        <?php
            $opt =  get_option('cf7_users_shortcode');
            echo do_shortcode('[contact-form-7 id="'.$opt.'" title="user-form"]');

        ?>
  </div>
</div> <!-- #sidebar -->

</div>

<div id="sidebar-background" class="sidebar-background-right">
  
</div> <!-- #content -->


  <div class="push"></div> <!-- .push must be inside #wrapper -->

</div> <!-- #wrapper -->

<?php
get_footer();