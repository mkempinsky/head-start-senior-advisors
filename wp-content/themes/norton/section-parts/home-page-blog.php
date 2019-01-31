<?php
/**
 * // To display Blog Post section on front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Norton
*/
 $norton_blog_title = get_theme_mod('norton-blog_title');
  $norton_blog_subtitle = get_theme_mod('norton-blog_subtitle');
  $norton_blog_url    = get_theme_mod( 'norton-blog_url' );
 $norton_blog_section     = get_theme_mod( 'norton_blog_section_hideshow','show');
 $norton_blog_section_column = get_theme_mod( 'norton_blog_section_columnshow','show');

 if ($norton_blog_section =='show') { 
?>
<!--
    =====================================================
      Our Blog
    =====================================================
      -->
    <div class="our-blog section-spacing">
      <div class="container">
        <div class="theme-title-one">
          <?php if($norton_blog_title != "")   {  ?>
            <h2><?php echo esc_html(get_theme_mod('norton-blog_title')); ?></h2>
            <?php }?>
          <p><?php if($norton_blog_subtitle != "")   {  ?>
            <?php echo esc_html(get_theme_mod('norton-blog_subtitle')); ?>
            <?php }?></p>
        </div> <!-- /.theme-title-one -->
        <div class="wrapper">
          <div class="row">
             <?php 
        $latest_blog_posts = new WP_Query( array( 'posts_per_page' => 3 ) );
        if ( $latest_blog_posts->have_posts() ) : 
          while ( $latest_blog_posts->have_posts() ) : $latest_blog_posts->the_post(); 
          ?>
             <div class="col-lg-<?php echo esc_attr(get_theme_mod('norton_blog_section_columnshow')); ?> col-sm-<?php echo esc_attr(get_theme_mod('norton_blog_section_columnshow')); ?> col-<?php echo esc_attr(get_theme_mod('norton_blog_section_columnshow')); ?>">
              <div class="single-blog">
                 <?php if(has_post_thumbnail()) : ?>
              <div class="image-box">
                  <img src="<?php the_post_thumbnail_url('norton-blog-front-thumbnail', array('class' => 'img-responsive')); ?>" alt="Fuel" />
                  <div class="overlay"></div>
              </div>
              <?php endif; ?>
                <div class="post-meta">
                 <h5 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                  <ul class="meta-left">
                   <li><a href="" class="date">
                <span class="fa fa-calendar" aria-hidden="true"></span><?php echo get_the_date();?></a>
            </li>
            <li><a href="" class="date">
                <span class="fa fa-user" aria-hidden="true"></span>By <?php the_author(); ?></a>
            </li>
            <li><a href="" class="date">
                <span class="fa fa-comment-o" aria-hidden="true"></span><?php comments_number( __('0', 'norton'), __('1', 'norton'), __('%', 'norton') ); ?></a>
            </li>
                  </ul>
                  <p><?php the_excerpt(); ?></p>
                  <a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_html__( 'READ MORE', 'norton' ); ?></a>
                </div> <!-- /.post-meta -->
              </div> <!-- /.single-blog -->
            </div> <!-- /.col- -->
            
            <?php 
          endwhile; 
                  endif; ?>
          </div> <!-- /.row -->
        </div> <!-- /.wrapper -->
      </div> <!-- /.container -->
    </div> <!-- /.our-team -->


    <?php } ?>