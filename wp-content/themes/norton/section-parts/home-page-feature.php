<?php
/**
 * Template part - HomePage Feature
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Norton
*/
 $norton_features_section = get_theme_mod( 'norton_features_section_hideshow','hide');
  $feature_no        = 6;
  $feature_pages      = array();
  $feature_icons     = array();
  for( $i = 1; $i <= $feature_no; $i++ ) {
    $feature_pages[]    =  get_theme_mod( "norton_feature_page_$i", 1 );
    $features_icons[]    = get_theme_mod( "norton_page_feature_icon_$i", '' );
  }

  $feature_args  = array(
      'post_type' => 'page',
      'post__in' => array_map( 'absint', $feature_pages ),
      'posts_per_page' => absint($feature_no),
      'orderby' => 'post__in'
     
  ); 
  $feature_query = new wp_Query( $feature_args );
  if( $norton_features_section == "show" && $feature_query->have_posts() ) :
  ?>
    <div class="top-feature section-spacing">
      <div class="top-features-slide">
        <?php
         $count = 0;
         while($feature_query->have_posts()) :
         $feature_query->the_post();
        ?>
        <div class="item">
          <div class="main-content" style="background:#fafafa;">
            <?php if($features_icons[$count] !="")
            {?>
            <i class="top-feature-icon fa <?php echo esc_html($features_icons[$count]); ?>" aria-hidden="true"></i>
            <?php } ?>
            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <p><?php the_excerpt(); ?></p>
          </div> <!-- /.main-content -->
        </div> <!-- /.item -->
        <?php
         $count = $count + 1;
         endwhile;
         wp_reset_postdata();
        ?> 
      </div> <!-- /.top-features-slide -->
    </div> <!-- /.top-feature -->
<?php endif; ?>
