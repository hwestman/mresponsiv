<?php
/**
 * The template for displaying the footer
 */
?>



<div id="footer" class="fluid-container footer-bg">

	<div id="footer-inner" class="container">
		<div id="footer-content" >
			<div id="footer-partner-heading" class="mb-m">
				<div class="col-xs-12">
				<h3>I Meyership konsernet</h3>
				</div>
			</div>

			<div class="col-xs-12">
                <div id="footer-partner-links" class="mb-s">
					<?php
					wp_nav_menu(
					    array(
						'menu' => 'Footer',
						// do not fall back to first non-empty menu
						'theme_location' => 'footer_menu',
					  )
					);
					?>		
                </div>
			</div>
			<div id="footer-copyright" class="mb-s">
				<p>Meyership © 2015</p>
			</div>

		</div> <!-- footer-content -->     
	</div> <!-- #footer-inner -->
</div> <!-- #footer-outer -->

</div><!-- #main --> 




<?php wp_footer(); ?>
</body>
</html>