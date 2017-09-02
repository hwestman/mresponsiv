<?php
/*
Template Name: Page - Fullwidth 
*/
get_header(); ?>
<div class="container-fluid">
    <!--<div class="hidden-sm hidden-md hidden-lg mship-graphic-xs">
        <img class="mship-graphic" src="<?php echo get_template_directory_uri()?>/img/mship_grafikk.png" />               
        <hr class="mship-graphic-seperator">            
    </div>-->
    <!-- <div class="center-block"> -->
            <div id="top" class="row front-section">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                    <div class="row">
                        <div class="col-xs-12 col-md-8 col-md-offset-2 tagline">
                            <div class=" center-block">
                                <h1>
                                    <!-- <div class="m-blue">150</div> år med transporttjenester -->
                                    <?php 
                                        $tagline = explode(' ',get_bloginfo( 'description' ),2);
                                    ?>
                                    <div class="m-blue"><?php echo $tagline[0] ?></div>
                                    <?php echo $tagline[1] ?>
                                </h1> 
                            </div>  
                        </div>
                    </div>
                    <div class="row front-buttons">
                        <div class="col-xs-12 col-lg-4 col-lg-offset-4">
                            <a href="#news" class="btn btn-info">Nyheter</a>
                            <a href="#services" class="btn btn-info">Våre tjenester</a>
                        </div>
                    </div>            
                </div> 
            </div>
            <div class="row front-section middle-section" id="services" >
                <div  class="col-xs-12 col-sm-10 col-sm-offset-1 col-lg-6 col-lg-offset-3">
                
                    <div class="front-nav-icons center-block">
                        <a onClick="$(window).scrollTop(0);">
                            <span class="glyphicon glyphicon-chevron-up center-block" aria-hidden="true"></span>
                        </a>
                    </div>       
                    
                    <h2>Våre tjenester</h2>
                    
                    <?php get_template_part( 'template-frontpage-services-horizontal'); ?>        
                    <!-- <div class="row front-buttons">
                        <div class="col-xs-12 center-block">
                            <a href="#news" class="btn btn-info">Nyheter</a>
                        </div>
                    </div> -->
                </div>
            </div>
            
            <div class="row front-section middle-section" id="news">
                <div  class="col-xs-12 col-sm-10 col-sm-offset-1  col-lg-8 col-lg-offset-2">
                    
                    <div class="front-nav-icons center-block">
                        <a onClick="$(window).scrollTop(0);">
                            <span class="glyphicon glyphicon-chevron-up center-block" aria-hidden="true"></span>
                        </a>
                    </div>   
                        <h2>Nyheter</h2>
                        <?php get_template_part( 'template-frontpage-news'); ?>                                        
                </div>
            </div>
    <!-- </div> -->
    
    <!--<div class="hidden-xs">
        <img class="mship-graphic" src="<?php echo get_template_directory_uri()?>/img/mship_grafikk.png" />               
        <hr class="mship-graphic-seperator">            
    </div>-->
    
    
</div>

<?php
get_footer();

