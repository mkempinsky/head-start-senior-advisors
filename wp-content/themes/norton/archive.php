<?php 
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Norton
*/
 get_header(); 
 ?>
<!-- 
            =============================================
                Theme Inner Banner
            ============================================== 
            -->
        <div class="theme-inner-banner section-spacing" <?php if ( get_header_image() ){ ?> style="background-image:url('<?php header_image(); ?>')"  <?php } ?>>
            <div class="overlay">
                <div class="container">
            <h2 class="title"><?php wp_title(''); ?></h2>
            </div> <!-- /.overlay -->
        </div> <!-- /.theme-inner-banner -->
</div>

        <!-- 
            =============================================
                Our Blog
            ============================================== 
            -->
        <div class="our-blog section-spacing">
            <div class="container">
                <div class="wrapper">
                    <div class="row">
                        
                        <div class="col-lg-9 col-sm-9">
                            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                            <div class="single-blog">
                                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <?php get_template_part('content-parts/content', get_post_format()); ?>
                                </div>
                            </div> <!-- /.single-blog -->
                            <?php 
                        endwhile;
                        else :
                            get_template_part( 'content-parts/content', 'none' );
                        endif; ?>
                        <div class="theme-pagination text-center">
                                <ul>
                                    <?php the_posts_pagination(
                                      array(
                                            'prev_text' =>esc_html__('&laquo;','norton'),
                                            'next_text' =>esc_html__('&raquo;','norton')
                                        )
                                    ); ?>                                   
                                </ul>
                            </div>
                        </div> <!-- /.col- -->
                        <!-- Sidebar -->
                <div class="col-lg-3 col-sm-3 sidebar">
                    <?php get_sidebar(); ?>
                </div>
                            
                        
                    </div> <!-- /.row -->
                </div> <!-- /.wrapper -->
            </div> <!-- /.container -->
        </div> <!-- /.our-team -->


 <?php get_footer(); ?>