<?php
/*
Template Name: Page - Fullwidth 
*/	
get_header(); ?>


    <div id="wrapper" class="container">

		<?php get_template_part( 'template-content-header-small'); ?> 

        <div id="content-wrapper">

			<div id="normal-content">
			<div class="col-xs-12">


            <div class="col-sm-12 col-md-8 side-by-side-fill-height">

            <ul class="person-list">
            	<li class="person-list-visual">
            		<span class="person-image">
            			<img class="sidebar-person-thumbnail" src="<?php echo get_template_directory_uri(); ?>/img/mann_square.jpg">
            		</span>
            	</li>
            	<li class="person-list-content">
            		<span class="person-list-content-person">
            			<h1 class="person-list-content-person-heading">Kåre Gunnar Pettersen</h1>
            			<p class="person-list-content-person-text">Shippingansvarlig</p>
					</span>
					<ul class="person-info-list">
						<li class="person-info-list-item">
							<a class="person-info-list-item-link icon-email" href="" >
								<h4 class="person-info-list-item-heading">
									E-post
								</h4>
								<p class="person-info-list-item-text ">
									jens@meyership.no
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
									15252512
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
									15252512
								</p>
							</a>
						</li>
					</ul>					
            	</li>

            </ul>

            


            


			</div> <!-- #full-width-content -->
            </div>
    		</div> <!-- #normal-content -->
    </div> <!-- #content-wrapper -->
    </div> <!-- #wrapper -->


<?php
get_footer();
