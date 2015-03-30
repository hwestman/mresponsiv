<?php
/*
Template Name: Page - Fullwidth 
*/  
get_header(); ?>



<?php get_template_part( 'template-content-header-normal'); ?> 

        <div id="content-sidebar" class="content-left" >
          <div id="content-padding">
            Main<br />


      </div>
        </div>

        <div id="sidebar" class="sidebar-right" >
          <div id="sidebar-padding">
                <?php get_template_part( 'template-sidebar-staff'); ?> 
          </div> <!-- #sidebar-padding -->
        </div> <!-- #sidebar -->

</div>

<div id="sidebar-background" class="sidebar-background-right">
  
</div> <!-- #content -->


    <div class="push"></div> <!-- .push must be inside #wrapper -->

</div> <!-- #wrapper -->

<?php
get_footer();
