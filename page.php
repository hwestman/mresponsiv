
<?php
get_header(); ?>


<?php  get_template_part( 'template-content-header-normal'); ?> 

<div id="content-sidebar" class="content-left" >
  <div id="content-padding">

      <?php
        while ( have_posts() ) : the_post();
          get_template_part( 'content', get_post_format() );
        endwhile; 
      ?>
      <?php wp_reset_query(); ?>

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

<div id="sidebar-background" class="sidebar-background-right"></div>
  
</div> <!-- #content -->


    <div class="push"></div> <!-- .push must be inside #wrapper -->

</div> <!-- #wrapper -->

<?php
get_footer();
