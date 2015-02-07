<?php
/**
 * The template for displaying the footer
 */
?>



<div id="footer-outer" class="fluid-container footer-bg">
	<div id="footer-inner" class="container">
		<div id="footer-content" >
			<div id="footer-partner-heading" class="mb-m">
				<h3>I Meyership konsernet</h3>
			</div>

			<div class="col-xs-12">
				<div id="footer-partner-links" class="mb-m">

					<?php wp_nav_menu( array( 'footer-partners' => 'Footer - Partners' ) ); ?>
					
				</div>
			</div>
			<div id="footer-copyright" class="mb-s">
				<p>Is og brus © 2015</p>
			</div>

		</div> <!-- footer-content -->     
	</div> <!-- #footer-inner -->
</div> <!-- #footer-outer -->

</div><!-- #main --> 




<?php wp_footer(); ?>
</body>
</html>