<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Norton
*/
 get_header(); ?>
  <!-- Main Content Section -->
<main class="main">
    <!-- Page Title -->
     <div class="theme-inner-banner section-spacing" <?php if ( get_header_image() ){ ?> style="background-image:url('<?php header_image(); ?>')"  <?php } ?>>
            <div class="overlay">
                <div class="container">
            <h2 class="title"><?php wp_title(''); ?></h2>
            </div> <!-- /.overlay -->
        </div> <!-- /.theme-inner-banner -->
</div>
    <!-- Page Title -->
    
	<section>
        <div class="container">
            <div class="row ">
                <div class="col-md-9">
                    <div class="page trm">
                        <?php if(have_posts()) : ?>
                            <?php while(have_posts()) : the_post(); ?>
                                <div class="page-img-box">
                                    <div class="hover-effect">
                                       <?php if(has_post_thumbnail()) : ?>
                                       <?php the_post_thumbnail('norton-page-thumbnail', array('class' => 'img-responsive')); ?>
                                       <?php endif; ?>
                                    </div>
                                </div>
                              
                                <?php the_content(); ?>
                                
                                
                            <?php endwhile; ?>
                        <?php else :  
                           get_template_part( 'content-parts/content', 'none' );
                          endif; ?>
                        <!-- Comments -->
                        <div class="spacer-80"></div>
                        <?php 
                            if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                            endif; 
                        ?> 
                        <!--End Comments -->
                    </div>
                </div>
                <!-- Sidebar -->
                <div class="col-md-3 sidebar">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- Main Content Section -->
<?php get_footer(); ?>