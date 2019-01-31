<?php
/**
 * Template part - Service Section of HomePage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Norton
*/
 $norton_services_title = get_theme_mod('norton-services_title');
  $norton_services_subtitle    = get_theme_mod( 'norton-services_subtitle' );
 $norton_services_section     = get_theme_mod( 'norton_services_section_hideshow','hide');
 $norton_services_section_column = get_theme_mod( 'norton_services_section_columnshow','hide');

  $services_no        = 6;
  $services_pages      = array();
  $services_icons     = array();
  for( $i = 1; $i <= $services_no; $i++ ) {
    $services_pages[]    =  get_theme_mod( "norton_service_page_$i", 1 );
    $services_btntext[]    = get_theme_mod( "norton_service_page_btntext_$i", '' );
  }

  $services_args  = array(
      'post_type' => 'page',
      'post__in' => array_map( 'absint', $services_pages ),
      'posts_per_page' => absint($services_no),
      'orderby' => 'post__in'
     
  ); 
  $services_query = new   wp_Query( $services_args );
  if( $norton_services_section == "show" && $services_query->have_posts() ) :
  ?>
  
           <!-- 
      =============================================
        Service Style One
      ============================================== 
      -->
    <div class="service-style-one section-spacing">
      <div class="container">
        <div class="theme-title-one">
          <?php if($norton_services_title != "")   {  ?>
            <h2><?php echo esc_html(get_theme_mod('norton-services_title')); ?></h2>
            <?php }?>
           <p><?php if($norton_services_subtitle != "")   {  ?>
            <?php echo esc_html(get_theme_mod('norton-services_subtitle')); ?>
            <?php }?></p>
        </div> <!-- /.theme-title-one -->
        <div class="wrapper">
          <div class="row">
             <?php
             $count = 0;
             while($services_query->have_posts()) :
             $services_query->the_post();
            ?>
             <div class="col-xl-<?php echo esc_attr(get_theme_mod('norton_services_section_columnshow')); ?> col-md-<?php echo esc_attr(get_theme_mod('norton_services_section_columnshow')); ?> col-<?php echo esc_attr(get_theme_mod('norton_services_section_columnshow')); ?>">
              <div class="single-service">
                <div class="img-box"> <img src="<?php the_post_thumbnail_url('norton-service-thumbnail', array('class' => 'img-responsive')); ?>" alt=""></div>
                <div class="text">
                  <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                  <p><?php echo wp_trim_words( get_the_excerpt(), 4 ); ?></p>
                  <a href="<?php the_permalink() ?>" class="read-more"><?php echo esc_html__( 'READ MORE', 'norton' ); ?><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div> <!-- /.text -->
              </div> <!-- /.single-service -->
            </div> <!-- /.col- -->
             <?php
             $count = $count + 1;
             endwhile;
             wp_reset_postdata();
            ?> 
          </div> <!-- /.row -->
        </div> <!-- /.wrapper -->
      </div> <!-- /.container -->
    </div> <!-- /.service-style-one -->
<?php endif; ?>
