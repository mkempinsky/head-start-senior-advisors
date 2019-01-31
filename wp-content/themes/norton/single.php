<?php
/**
 * The template for displaying all single posts.
 *
 * @package Norton
*/
 get_header(); 
 if ( get_header_image() ){      
    $overlay = "bg-opacity-black-80";
    $title =  "banner-wrapper";
}
else{
    $overlay = "noverlay";
    $title = "no-banner";
}
 ?>

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
    	<div class="our-blog section-spacing">
			<div class="container">
				<div class="wrapper">
					<div class="row">
						
						<div class="col-lg-9 col-sm-9">
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<div class="single-blog">
								
								<?php  get_template_part( 'content-parts/content', 'single' ); ?>
								</div>
								<?php endwhile; ?>
                        <?php else :  
                            get_template_part( 'content-parts/content', 'none' );
                        endif; ?>
                        <?php 
                            if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                            endif; 
                        ?> 
							</div> <!-- /.single-blog -->
							
							
							<div class="col-md-3 sidebar">
				                <?php get_sidebar(); ?>					
				            	</div>
						</div> <!-- /.col- -->
			
						
					</div> <!-- /.row -->
				</div> <!-- /.wrapper -->
			</div> <!-- /.container -->
</main>
<?php get_footer(); ?>