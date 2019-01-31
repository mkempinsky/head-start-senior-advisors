<?php
/**
 * // To display About Us section on front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Norton
*/
 $norton_abouts_section = get_theme_mod( 'norton_about_section_hideshow','hide');
  $about_no        = 1;
  $about_pages      = array();
  $about_icons     = array();
  for( $i = 1; $i <= $about_no; $i++ ) {
    $about_pages[]    =  get_theme_mod( "norton_about_page_$i", 1 );
  }

  $about_args  = array(
      'post_type' => 'page',
      'post__in' => array_map( 'absint', $about_pages ),
      'posts_per_page' => absint($about_no),
      'orderby' => 'post__in'
     
  ); 
  $about_query = new wp_Query( $about_args );
  if( $norton_abouts_section == "show" && $about_query->have_posts() ) :
  ?>
    <div class="about-compnay section-spacing">
      <?php
         $count = 0;
         while($about_query->have_posts()) :
         $about_query->the_post();
        ?>
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-12"><img src="<?php the_post_thumbnail_url('norton-about-thumbnail', array('class' => 'img-responsive')); ?>" alt=""></div>
          <div class="col-lg-6 col-12">
            <div class="text">
              <div class="theme-title-one">
                <h2><?php the_title(); ?></h2>
                <p><?php the_excerpt(); ?></p>
              <a href="<?php the_permalink(); ?>" class="read"><?php echo esc_html__( 'READ MORE', 'norton' ); ?></a>
              </div> <!-- /.theme-title-one -->
            </div> <!-- /.text -->
          </div> <!-- /.col- -->
        </div> <!-- /.row -->
      </div> <!-- /.container -->
       <?php
         $count = $count + 1;
         endwhile;
         wp_reset_postdata();
        ?> 
    </div> <!-- /.about-compnay -->
<?php endif; ?>
