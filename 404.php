
<?php
get_header(); ?>


<?php  get_template_part( 'template-content-header-normal'); ?> 

<div id="content-sidebar" class="content-left" >
  <div id="content-padding">
	
	<h1 class="success-text-heading">Har du gått deg bort?</h1>
	<p>Vi fant dessverre ikke siden du leter etter (404). <br>For å gå tilbake til forsiden, kan du klikke på linken under.</p>
	<a  href="<?php echo site_url(); ?>" class="not-found-button">&#8592; Tilbake til forsiden</a>

  </div> <!-- #content-padding -->
</div> <!-- #content-sidebar -->

        <div id="sidebar" class="sidebar-right" >
          <div id="sidebar-padding">
            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('m_res_page')) : else : ?>

              <!-- Do nothing if dont exist-->

              <?php endif; ?>
          </div>
        </div> <!-- #sidebar -->

</div>

<div id="sidebar-background" class="sidebar-background-right">
  
</div> <!-- #sidebar-background -->


    <div class="push"></div> <!-- .push must be inside #wrapper -->

</div> <!-- #wrapper -->

<?php
get_footer();
