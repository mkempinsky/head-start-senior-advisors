<?php
/**
 * Right Buttons Panel.
 *
 * @package Blossom Coach
 */

if( $theme_active == 'blossom-coach' ){
    $doc_link    = 'blossom-coach';
}elseif( $theme_active == 'blossom-consulting' ){
    $doc_link    = 'blossom-consulting';
}else{
    $doc_link    = $theme_active . '-free-theme';
}

?>
<div class="panel-right">
	<div class="panel-aside">
		<h4><?php _e( 'Upgrade To Pro', 'blossom-coach' ); ?></h4>
		<p><?php _e( 'With the Pro version, you can change the look and feel of your website in seconds. You can change color, choose from background patterns, and change the fonts with ease. You will also get more homepage sections that you can reorder and hide as per your needs. Furthermore, the pro version comes with multiple predefined pages like contact page, gallery page, team page, service page, and pricing page.', 'blossom-coach' ); ?></p>
		<p><?php _e( 'You will also get more frequent updates and quicker support with the Pro version.', 'blossom-coach' ); ?></p>
		<a class="button button-primary" href="<?php echo esc_url( 'https://blossomthemes.com/downloads/blossom-coach-pro/' ); ?>" title="<?php esc_attr_e( 'View Premium Version', 'blossom-coach' ); ?>" target="_blank"><?php _e( 'Read More About the Pro Theme', 'blossom-coach' ); ?></a>
	</div><!-- .panel-aside Theme Support -->
	<!-- Knowledge base -->
	<div class="panel-aside">
		<h4><?php _e( 'Visit the Knowledge Base', 'blossom-coach' ); ?></h4>
		<p><?php _e( 'Need help with using the WordPress as quickly as possible? Visit our well-organized Knowledge Base!', 'blossom-coach' ); ?></p>
		<p><?php _e( 'Our Knowledge Base has step-by-step video and text tutorials, from installing the WordPress to working with themes and more.', 'blossom-coach' ); ?></p>

		<a class="button button-primary" href="<?php echo esc_url( 'https://blossomthemes.com/' . $doc_link . '-documentation/' ); ?>" title="<?php esc_attr_e( 'Visit the knowledge base', 'blossom-coach' ); ?>" target="_blank"><?php _e( 'Visit the Knowledge Base', 'blossom-coach' ); ?></a>
	</div><!-- .panel-aside knowledge base -->
</div><!-- .panel-right -->