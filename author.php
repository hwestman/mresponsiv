<?php
/*
Template Name: Page - Nyheter
*/  

get_header(); ?>


<?php get_template_part( 'template-content-header-normal'); ?> 


<div id="content-sidebar" class="content-left" >
    <div id="content-padding">

            <?php
            $user = (isset($_GET['author_name'])) ? get_user_by('slug', $_GET['author_name']) : get_userdata($_GET['author']); ?>

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
                    <ul class="person-info-list">
                        <li class="person-info-list-item">
                            <a class="person-info-list-item-link icon-email" href="" >
                                <h4 class="person-info-list-item-heading">
                                    E-post
                                </h4>
                                <p class="person-info-list-item-text ">
                                    <?php echo $user->user_email; ?>
                                </p>
                            </a>
                        </li>
                    </ul>
                    <ul class="person-info-list">
                        <li class="person-info-list-item">
                            <a class="person-info-list-item-link icon-phone" href="" >
                                <h4 class="person-info-list-item-heading">
                                    Mobil
                                </h4>
                                <p class="person-info-list-item-text ">
                                    <?php echo $user->mobile; ?>
                                </p>
                            </a>
                        </li>
                    </ul>
                    <ul class="person-info-list">
                        <li class="person-info-list-item">
                            <a class="person-info-list-item-link icon-phone" href="" >
                                <h4 class="person-info-list-item-heading">
                                    Telefon
                                </h4>
                                <p class="person-info-list-item-text ">
                                    <?php echo $user->number; ?>
                                </p>
                            </a>
                        </li>
                    </ul>
                    <ul class="person-info-list">
                        <li class="person-info-list-item">
                            <a class="person-info-list-item-link" href="" >
                                <h4 class="person-info-list-item-heading">
                                    Ansatt siden
                                </h4>
                                <p class="person-info-list-item-text ">
                                    <?php echo $user->hiredate; ?>
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
    </div>  <!-- #content-padding-->
</div> <!-- #content-sidebar -->

<div id="sidebar" class="sidebar-right" >
  <div id="sidebar-padding">
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