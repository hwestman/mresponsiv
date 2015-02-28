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
			for ($x = 0; $x <= 10; $x++) {
			?>

			<ul class="staff-list">
				<a class="staff-list-link">
				<li class="staff-list-visual">
					<span class="staff-list-thumbnail-crop">
						<img class="staff-list-thumbnail" src="<?php echo get_template_directory_uri(); ?>/img/mann_square.jpg">
					</span>
				</li>
				<li class="staff-list-content">
	            	<h4 class="staff-list-person-heading">Kåre Gunnar Pettersen</h4>
            		<p class="staff-list-person-text">Shippingansvarlig</p>
				</li>
				</a>
			</ul>
			    



			<?php 
			} 
			?>
			</div> <!-- #normal-content -->
			</div>

    
    </div> <!-- #content-wrapper -->
    </div> <!-- #wrapper -->


<?php
get_footer();
