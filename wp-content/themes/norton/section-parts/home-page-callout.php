<?php
/**
 * // To display Footer Call Out section on front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Norton
*/
 $norton_callouts_section = get_theme_mod( 'norton_callout_section_hideshow','hide');
  $callout_text_value[]= get_theme_mod( "norton_callout_text_value", 1 );
  $callout_button_value[]= get_theme_mod( "norton_callout_button_text", 1 );
  

  
  if( $norton_callouts_section == "show" ) :
  ?>

  <div class="feature-banner section-spacing" <?php if ( get_header_image() ){ ?> style="background-image:url('<?php header_image(); ?>')"  <?php } ?>>
    
      <div class="opacity">
        <div class="container">
          <?php if($callout_text_value !="")
          {?>
          <h2><?php echo esc_html(get_theme_mod('norton_callout_text_value')); ?></h2>
          <?php } ?>
         <?php if($callout_button_value !="")
          {?>
          <a href="<?php echo esc_url(get_theme_mod('button_url')); ?>" class="theme-button-one"><?php echo esc_html(get_theme_mod('norton_callout_button_text')); ?></a>
      <?php } ?>
        </div> <!-- /.container -->
      </div> <!-- /.opacity -->
      
    </div> <!-- /.callout-banner -->
<?php endif; ?>
