<?php
/*
 * Generate markup for the hero-image section
 */
$post = get_post();

$theLink = get_permalink($post->ID);
?>

<div id="sidebar" class="sidebar-left" >
    <div id="sidebar-padding">
    <div class="service-navbar">

      <div class="service-navbar-toggle">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-service-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <span class="toggle-heading">Kategorier</span>
      </div> <!-- .news-nav-toggle -->

<div class="collapse navbar-collapse navbar-service-collapse">
<ul class="nav navbar-nav">
    <li class="menu-item menu-item-has-children dropdown">
    <a title="22-fot" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">22-fot <span class="caret"></span></a>    
        <ul role="menu" class="dropdown-menu sidebar-dropdown-menu">
            <li id="menu-item-69" class="">
                <a title="24-varme" href="http://192.168.10.101/mship/left-sidebar/">24-varme</a>
            </li>        
        </ul>
    </li>
    <li class="menu-item menu-item-has-children dropdown">
    <a title="22-fot" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">22-fot <span class="caret"></span></a>    
        <ul role="menu" class="dropdown-menu sidebar-dropdown-menu">
            <li id="menu-item-69" class="">
                <a title="24-varme" href="http://192.168.10.101/mship/left-sidebar/">24-varme</a>
            </li>        
            <li id="menu-item-69" class="">
                <a title="24-varme" href="http://192.168.10.101/mship/left-sidebar/">24-varme</a>
            </li>   
        </ul>
    </li>
</ul>


      </div><!-- .navbar-collapse -->




    </div> <!-- .service-navbar -->
        <?php

        //$catid = get_cat_ID($post->post_name);
        $catObj = get_category_by_slug($post->post_name);
        $catId = $catObj->term_id;
        $args = array(
            'type'                     => 'post',
            'child_of'                 => $catId,
            'hide_empty'               => false,
            'hierarchical'             => true,
            'exclude'                  => '0,1'
        );
        if($catId){
            $categories = get_categories( $args );?>

            <ul class="categories">
                <?php foreach($categories as $cat){

                    $query = new WP_Query('category_name='.$cat->name);?>
                    <li><ul class="sub-category">

                            <li class="sub-category-header"><?php echo $cat->name; ?></li>
                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                                <li class="sub-category-item"><a href="<?php echo $theLink."?postID=".get_the_ID();?>"><?php the_title(); ?></a></li>

                            <?php endwhile;  wp_reset_query(); ?>

                        </ul></li>

                <?php } ?>
            </ul>
        <?php } ?>



    </div> <!-- #sidebar-padding -->
</div> <!-- #sidebar -->



<div id="content-sidebar" class="content-right" >
    <div id="content-padding">

        <?php if(isset($_GET['postID'])){

         $post = get_post($_GET['postID']);
        }

        ?>

            <h1 class="post-heading"><?php echo $post->post_title ?></h1>


            <?php echo get_the_post_thumbnail( $post->ID, 'sideway') ?>
            <?php echo $post->post_content;

            ?>

        <?php
        wp_reset_postdata();
        get_template_part( 'template-sidebar-staff'); ?>



    </div>
</div>

</div><!--Content end -->

<div id="sidebar-background" class="sidebar-background-left">
</div>
<div class="push"></div> <!-- .push must be inside #wrapper -->
