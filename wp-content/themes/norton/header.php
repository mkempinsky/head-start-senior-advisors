<?php 
/**
 * The header for our theme.
 *
 * Displays all of the <head> section 
 *
 * @package nortn
 */
?>
 <!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head> 
<body <?php body_class(); ?>>
	<div class="main-page-wrapper">

		<!-- ===================================================
				Loading Transition
			==================================================== -->
		<div id="loader-wrapper">
			<div id="loader">
				<div id="loader1" class="fa fa-cog loader"></div>
				<div id="loader2" class="fa fa-cog loader"></div>
				<div id="loader3" class="fa fa-cog loader"></div>
			</div>
		</div>



		<!-- 
			=============================================
				Theme Header One
			============================================== 
			-->
		<header class="header-one">
			<div class="top-header">
				<div class="container clearfix">
					<div class="logo float-left"><a href="index.html"><?php   
                         if (has_custom_logo()) :
                        ?> 
                            <span><?php the_custom_logo(); ?></span>
                         <?php  
                        else : ?>
                             <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="">
                            <span class="site-title"><?php bloginfo( 'title' ); ?></span></a>
                           
                            
                        <?php 
                        endif;?></div>
					<div class="address-wrapper float-right">
						<?php
                    $norton_header_section = get_theme_mod('norton_header_section_hideshow' , 'show');
                    if ($norton_header_section =='show') {  
                    $norton_header_address_value = get_theme_mod('norton_header_address_value');  
                    $norton_header_email_value = get_theme_mod('norton_header_email_value');
                    $norton_header_button_value = get_theme_mod('norton_header_button_value');
                    $norton_header_btnurl = get_theme_mod('norton_header_btnurl');
                    $norton_header_social_link_1 = get_theme_mod('norton_header_social_link_1');
                    $norton_header_social_link_2 = get_theme_mod('norton_header_social_link_2');
                    $norton_header_social_link_3 = get_theme_mod('norton_header_social_link_3');
                    $norton_header_social_link_4 = get_theme_mod('norton_header_social_link_4');
            
            ?>
						<ul>
							<li class="address"><?php if (!empty($norton_header_address_value)) { ?>
								<i class="fa fa-map-marker"></i>
								<h6><?php echo esc_html__( 'Address:', 'norton' ); ?></h6>
								<p><?php echo esc_html($norton_header_address_value);  ?></p>
							<?php } ?>
							</li>
							<li class="address"><?php if (!empty($norton_header_email_value)) { ?>
								<i class="fa fa-envelope"></i>
								<h6><?php echo esc_html__( 'Mail us:', 'norton' ); ?></h6>
								<p><?php echo esc_html($norton_header_email_value);  ?></p>
								<?php } ?>
							</li>
							<li class="quotes">
								<?php if (!empty($norton_header_button_value)) { ?>
								<a href="<?php echo esc_url($norton_header_btnurl); ?>"><?php echo esc_html($norton_header_button_value); ?></a>
							<?php } ?>
						</li>
						</ul>
						<?php }else{ echo ""; } ?>
					</div> <!-- /.address-wrapper -->
				</div> <!-- /.container -->
			</div> <!-- /.top-header -->

			<div class="theme-menu-wrapper">
				<div class="container">
					<div class="bg-wrapper clearfix">
						<!-- ============== Menu Warpper ================ -->
						<div class="menu-wrapper float-left">
							<nav id="mega-menu-holder" class="clearfix">
								<?php wp_nav_menu( array
                                (
								'menu'              => 'primary',
								'container'        => 'ul', 
                                'theme_location'    => 'primary', 
                                'menu_class'        => 'menu', 
                                'items_wrap'        => '<ul class="clearfix" data-in="fadeInDown" data-out="fadeOutUp">%3$s</ul>',
                                'fallback_cb'       => 'norton_wp_bootstrap_navwalker::fallback',
                                'walker'            => new norton_wp_bootstrap_navwalker()
                                )); 
                            ?>         
							</nav> <!-- /#mega-menu-holder -->
						</div> <!-- /.menu-wrapper -->

						<div class="right-widget float-right">
							<ul>
								<li class="social-icon">
									<ul>
										<?php if (!empty($norton_header_social_link_1)) { ?>
									<li><a href="<?php echo esc_url(get_theme_mod('norton_header_social_link_1')); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                 <?php }
                                if (!empty($norton_header_social_link_2)) { ?> 
									<li><a href="<?php echo esc_url(get_theme_mod('norton_header_social_link_2')); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                 <?php }
                                if (!empty($norton_header_social_link_3)) { ?>
									<li><a href="<?php echo esc_url(get_theme_mod('norton_header_social_link_3')); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                               <?php }
							   if (!empty($norton_header_social_link_4)) { ?>
									<li><a href="<?php echo esc_url(get_theme_mod('norton_header_social_link_4')); ?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                               <?php } ?>
									</ul>
								</li>
							</ul>
						</div> <!-- /.right-widget -->
					</div> <!-- /.bg-wrapper -->
				</div> <!-- /.container -->
			</div> <!-- /.theme-menu-wrapper -->
		</header> <!-- /.header-one -->