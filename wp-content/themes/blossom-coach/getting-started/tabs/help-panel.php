<?php
/**
 * Help Panel.
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
<!-- Help file panel -->
<div id="help-panel" class="panel-left">

    <div class="panel-aside">
        <h4><?php _e( 'View Our Documentation Link', 'blossom-coach' ); ?></h4>
        <p><?php _e( 'New to the WordPress world? Our documentation has step by step procedure to create a beautiful website.', 'blossom-coach' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( 'https://blossomthemes.com/' . $doc_link . '-documentation/' ); ?>" title="<?php esc_attr_e( 'Visit the Documentation', 'blossom-coach' ); ?>" target="_blank"><?php _e( 'View Documentation', 'blossom-coach' ); ?></a>
    </div><!-- .panel-aside -->
    
    <div class="panel-aside">
        <h4><?php _e( 'Support Ticket', 'blossom-coach' ); ?></h4>
        <p><?php printf( __( 'It\'s always a good idea to visit our %1$sKnowledge Base%2$s before you send us a support ticket.', 'blossom-coach' ), '<a href="'. esc_url( 'https://blossomthemes.com/' . $doc_link . '-documentation/' ) .'" target="_blank">', '</a>' ); ?></p>
        <p><?php _e( 'If the Knowledge Base didn\'t answer your queries, submit us a support ticket here. Our response time usually is less than a business day, except on the weekends.', 'blossom-coach' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( 'https://blossomthemes.com/support-ticket/' ); ?>" title="<?php esc_attr_e( 'Visit the Support', 'blossom-coach' ); ?>" target="_blank"><?php _e( 'Contact Support', 'blossom-coach' ); ?></a>
    </div><!-- .panel-aside -->

    <div class="panel-aside">
        <h4><?php _e( 'View Our Demo', 'blossom-coach' ); ?></h4>
        <p><?php _e( 'Vist the demo to get more ideas about out theme design.', 'blossom-coach' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( 'https://demo.blossomthemes.com/' . $theme_active . '/' ); ?>" title="<?php esc_attr_e( 'Visit the Demo', 'blossom-coach' ); ?>" target="_blank"><?php _e( 'View Demo', 'blossom-coach' ); ?></a>
    </div><!-- .panel-aside -->
</div>
