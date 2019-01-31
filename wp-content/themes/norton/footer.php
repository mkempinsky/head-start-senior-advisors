</div>
<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Norton
 */
$norton_footer_section = get_theme_mod('norton_footer_section_hideshow','show');
if ($norton_footer_section =='show') { 
?>
<!--
			=====================================================
				Footer
			=====================================================
			-->
		<footer class="theme-footer-one">
			<div class="top-footer">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-lg-3 col-sm-3 col-xs-6 about-widget">
							<?php dynamic_sidebar('norton-footer-widget-area-1'); ?>
						</div> <!-- /.about-widget -->
						<div class="col-md-6 col-lg-3 col-sm-3 col-xs-6 footer-recent-post">
							<?php dynamic_sidebar('norton-footer-widget-area-2'); ?>
						</div> <!-- /.footer-recent-post -->
						<div class="col-md-6 col-lg-3 col-sm-3 col-xs-6 footer-list">
							<?php dynamic_sidebar('norton-footer-widget-area-3'); ?>
						</div> <!-- /.footer-list -->
						<div class="col-md-6 col-lg-3 col-sm-3 col-xs-6 footer-gallery">
							<?php dynamic_sidebar('norton-footer-widget-area-4'); ?>
						</div> <!-- /.footer-gallery -->
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.top-footer -->
			<div class="bottom-footer">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-12" align="center">
							 <?php if( get_theme_mod('norton-footer_title') ) : ?>
                        <p><?php echo wp_kses_post( html_entity_decode(get_theme_mod('norton-footer_title'))); ?></p>
                        <?php else : 
                           /* translators: 1: poweredby, 2: link, 3: span tag closed  */
						   printf( esc_html__( ' %1$sPowered by %2$s%3$s', 'norton' ), '<span>', '<a href="'. esc_url( __( 'https://wordpress.org/', 'norton' ) ) .'" target="_blank">WordPress.</a>', '</span>' );
                           /* translators: 1: poweredby, 2: link, 3: span tag closed  */
						   printf( esc_html__( ' Theme: Norton by: %1$sDesign By %2$s%3$s', 'norton' ), '<span>', '<a href="'. esc_url( __( 'http://wordpress.org/', 'norton' ) ) .'" target="_blank">Companyname</a>', '</span>' );
						endif;  ?>
						</div>
					</div>
				</div>
			</div> <!-- /.bottom-footer -->
		</footer> <!-- /.theme-footer -->
		 <?php } ?>
<?php wp_footer(); ?>
</body>

</html>