
<?php
get_header(); ?>


<?php  get_template_part( 'template-content-header-normal'); ?> 

<div id="content-sidebar" class="content-left" >
  <div id="content-padding">

    <article>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php  get_template_part( 'content-normal'); ?> 
      <?php endwhile; else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
      <?php endif; ?>
    </article>
 
  </div> <!-- #content-padding -->
</div> <!-- #content-sidebar -->

        <div id="sidebar" class="sidebar-right" >
          <div id="sidebar-padding">
            Main<br />
                    Main<br />            Main<br />          Main<br />
            Main<br />            Main<br /> Main<br />
            Main<br />            Main<br /> Main<br />
            Main<br />            Main<br /> Main<br />
            Main<br />            Main<br /> Main<br />
            Main<br />            Main<br />
          </div>
        </div> <!-- #sidebar -->

</div>

<div id="sidebar-background" class="sidebar-background-right">
  
</div> <!-- #content -->


    <div class="push"></div> <!-- .push must be inside #wrapper -->

</div> <!-- #wrapper -->

<?php
get_footer();
