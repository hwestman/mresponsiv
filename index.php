<?php
/*
Template Name: Page - Fullwidth 
*/
get_header(); ?>
<div class="container">
    <!--<div class="hidden-sm hidden-md hidden-lg mship-graphic-xs">
        <img class="mship-graphic" src="<?php echo get_template_directory_uri()?>/img/mship_grafikk.png" />               
        <hr class="mship-graphic-seperator">            
    </div>-->

     <div class="row front-section" >
        <div class="col-xs-12">
            <div class="row ">
                <div class="col-xs-12 col-md-8 col-md-offset-2 tagline">
                    <div class=" center-block">
                        <h1>
                            <div class="m-blue">150</div> år med transporttjenester
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
        <div  class="col-xs-12">
            <div class="center-block">
                <h2>Våre tjenester</h2>
            </div>       
            <?php get_template_part( 'template-frontpage-services-horizontal'); ?>        
            <div class="row front-buttons">
                <div class="col-xs-12 center-block">
                    <a href="#news" class="btn btn-info">Nyheter</a>
                </div>
            </div>       
        </div>
    </div>
    
    <div class="row front-section middle-section" id="news">
        <div  class="col-xs-12 ">
            <div class="center-block">
                <h2>Nyheter</h2>
            </div>   
            <?php get_template_part( 'template-frontpage-news'); ?>        
                          
        </div>
    </div>
          
    
    <!--<div class="hidden-xs">
        <img class="mship-graphic" src="<?php echo get_template_directory_uri()?>/img/mship_grafikk.png" />               
        <hr class="mship-graphic-seperator">            
    </div>-->
    
    
</div>

<?php
get_footer();

