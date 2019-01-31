<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package nORTON
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
            
    <!-- 
            =============================================
                Error Page 
            ============================================== 
            -->
            <div class="container error-page">
                <h2><?php echo esc_html__( '404', 'norton' ); ?></h2>
                <h3><?php echo esc_html__( 'Oops! That page can&rsquo;t be found', 'norton' ); ?></h3>
                <p><?php echo esc_html__( 'The page you are looking for was moved, removed, renamed or might never existed.', 'norton' ); ?></p>
                <div>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="theme-button-one"><?php echo esc_html__( 'Go Home', 'norton' ); ?></a>
                    <span class="or"><?php echo esc_html__( 'Or', 'norton' ); ?></span>
                    <input type="text" placeholder="Search...">
                </div>
            </div> <!-- /.error-page -->
            <!-- Content Section -->
            <section class="page-not-found">
                <div class="container">
                    <div class="row error-page">
                        <div class="col-md-12 text-center">
                            <h1><?php echo esc_html__( '404', 'norton' ); ?></h1>
                            <h2><?php echo esc_html__( 'Oops! That page can&rsquo;t be found', 'norton' ); ?></h2>
                            <h4><?php echo esc_html__( 'Sorry, but the page you are looking for does not exist', 'norton' ); ?></h4>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-default"> <?php echo esc_html__( 'Back to HomePage', 'norton' ); ?></a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Content Section -->
        </main>
        <!-- Main Content Section -->
        <?php get_footer(); ?>	