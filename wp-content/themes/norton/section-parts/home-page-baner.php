<?php
/**
 * Template part - Intro Section of FrontPage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package norton
 */


$norton_image_section_hideshow = get_theme_mod("norton_image_section_hideshow",'hide');
$norton_image_more = get_theme_mod("norton_image_more",'');
$norton_image_contact = get_theme_mod("norton_image_contact",''); 
$norton_b_image = get_theme_mod("norton_b_image",''); 
$norton_image_heading = get_theme_mod("norton_image_heading",'');

if( $norton_image_section_hideshow == "show") :
?>

<div class="banner-three" style="background: url('<?php echo esc_url($norton_b_image); ?>') no-repeat center center; ">
                
                    <div class="container">
                            <div class="fixed-content">
                        <p class="wow fadeInUp animated"><?php echo esc_html(get_theme_mod('norton_image_subheading')); ?></p>
                        <?php if ($norton_image_heading !=""){ ?>
                            <h1 class="wow fadeInUp animated" data-wow-delay="0.2s">
                                <?php echo esc_html($norton_image_heading); ?>
                            </h1>
                        <?php } ?>
                        <?php if (!empty($norton_image_more)) { ?>
                        <a href="<?php echo esc_url(get_theme_mod('norton_image_more_url')); ?>" class="theme-button-one theme-bg mr-10 wow fadeInUp animated" data-wow-delay="0.39s"><?php echo esc_html($norton_image_more); ?></a>
                        <?php }
                                if (!empty($norton_image_contact)) { ?>  
                        <a href="<?php the_permalink(); ?>" class="theme-button-one wow fadeInUp animated" data-wow-delay="0.39s"><?php echo esc_html($norton_image_contact); ?></a>
                        <?php } ?>
                    </div> <!-- /.container -->
                </div> <!-- /.camera_caption -->
    
            
            
        </div> <!-- /#theme-main-banner -->

       
    <?php
    endif;
?>