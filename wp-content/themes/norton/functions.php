<?php

/**
 * Norton functions and definitions
  @package Norton
 *
*/

/* Set the content width in pixels, based on the theme's design and stylesheet.
*/

function norton_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'norton_content_width', 980 );
}
add_action( 'after_setup_theme', 'norton_content_width', 0 );

function new_excerpt_more( $more ) {
    return '.';
}
add_filter('excerpt_more', 'new_excerpt_more');

if( ! function_exists( 'norton_theme_setup' ) ) {	
	
	function norton_theme_setup() {
		load_theme_textdomain( 'norton', get_template_directory() . '/languages' );
		
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		
		// Add title tag 
		add_theme_support( 'title-tag' );
		
		// Add default logo support		
        add_theme_support( 'custom-logo');

        add_theme_support('post-thumbnails');
        add_image_size('norton-page-thumbnail',738,423, true);
        add_image_size('norton-about-thumbnail',540,410, true);
        add_image_size('norton-blog-front-thumbnail',370,225, true);
        add_image_size('norton-service-thumbnail',370,250, true);
        add_image_size('norton-projects-thumbnail',500,400, true);
        add_image_size('norton-callout-thumbnail',1350,410, true);

        
        
		
         // Add theme support for Semantic Markup
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		) ); 

		$defaults = array(
			'default-image'          => get_template_directory_uri() .'/assets/images/header.jpg',
			'width'                  => 1920,
			'height'                 => 600,
			'uploads'                => true,
			'default-text-color'     => "#3f51b5",
			'wp-head-callback'       => 'norton_header_style',
		);
		add_theme_support( 'custom-header', $defaults );

		// Menus
		register_nav_menus(array(
			'primary' => esc_html__('Primary Menu', 'norton'),
		));
		// add excerpt support for pages
        add_post_type_support( 'page', 'excerpt' );
		
        if ( is_singular() && comments_open() ) {
			wp_enqueue_script( 'comment-reply' );
        }
		// Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );
		
		// Custom Backgrounds
   		add_theme_support( 'custom-background', array(
  			'default-color' => 'ffffff',
    	) );

    	// To use additional css
 	    add_editor_style( 'assets/css/editor-style.css' );
	}
	add_action( 'after_setup_theme', 'norton_theme_setup' );
}

// Register Nav Walker class_alias
require get_template_directory(). '/lib/class-wp-bootstrap-navwalker.php';
require get_template_directory(). '/lib/extras.php';

/**
 * Enqueue CSS stylesheets
 */		
if( ! function_exists( 'norton_enqueue_styles' ) ) {
	function norton_enqueue_styles() {	
	
	    wp_enqueue_style('norton-font', 'https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800,900|Source+Sans+Pro:300,400,600,700,900','');
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css','');
		wp_enqueue_style('responsive', get_template_directory_uri() . '/assets/css/responsive.css','');
		wp_enqueue_style('slimmenu', get_template_directory_uri() .'/assets/css/slimmenu.css','');
		wp_enqueue_style('font-awesome', get_template_directory_uri() .'/assets/css/font-awesome/css/font-awesome.css','');
		wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css','');
		wp_enqueue_style('owl.theme', get_template_directory_uri() .'/assets/css/owl.theme.css','');		
		// main style
		wp_enqueue_style( 'norton-style', get_stylesheet_uri() );
		
	}
	add_action( 'wp_enqueue_scripts', 'norton_enqueue_styles' );
}

function norton_header_style()
{
	$header_text_color = get_header_textcolor();
	?>
		<style type="text/css">
			<?php
				//Check if user has defined any header image.
				if ( get_header_image() ) :
			?>
				.site-title{
					color: #<?php echo esc_attr($header_text_color); ?>;
					
				}
			<?php endif; ?>	
		</style>
	<?php

}

/**
 * Enqueue JS scripts
 */

if( ! function_exists( 'norton_enqueue_scripts' ) ) {
	function norton_enqueue_scripts() {   
		wp_enqueue_script('jquery');
		
		wp_enqueue_script('slimmenu.js', get_template_directory_uri() . '/assets/js/jquery.slimmenu.js',array(),'', true);
		wp_enqueue_script('owl.carousel', get_template_directory_uri() . '/assets/js/owl.carousel.js',array(),'', true);
		wp_enqueue_script('theme.js', get_template_directory_uri() . '/assets/js/theme.js',array(),'', true);
		wp_enqueue_script('norton-main', get_template_directory_uri() . '/assets/js/main.js',array(),'', true);
	}
	add_action( 'wp_enqueue_scripts', 'norton_enqueue_scripts' );
}

/**
 * Register sidebars for norton
*/
function norton_sidebars() {

	// Blog Sidebar
	
	register_sidebar(array(
		'name' => esc_html__( 'Blog Sidebar', "norton"),
		'id' => 'blog-sidebar',
		'description' => esc_html__( 'Sidebar on the blog layout.', "norton"),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="sidebar-title">',
		'after_title' => '</h5>',
	));
  	

	// Footer Sidebar
	
	register_sidebar(array(
		'name' => esc_html__( 'Footer Widget Area 1', "norton"),
		'id' => 'norton-footer-widget-area-1',
		'description' => esc_html__( 'The footer widget area 1', "norton"),
		'before_widget' => ' <div class="widget %2$s">',
		'after_widget' => '</div> ',
		'before_title' => '<h6 class="widget-title ">',
		'after_title' => '</h6>',
	));	
	
	register_sidebar(array(
		'name' => esc_html__( 'Footer Widget Area 2', "norton"),
		'id' => 'norton-footer-widget-area-2',
		'description' => esc_html__( 'The footer widget area 2', "norton"),
		'before_widget' => '<div class="widget %2$s"> ',
		'after_widget' => ' </div>',
		'before_title' => '<h6 class="widget-title">',
		'after_title' => '</h6>',
	));	
	
	register_sidebar(array(
		'name' => esc_html__( 'Footer Widget Area 3', "norton"),
		'id' => 'norton-footer-widget-area-3',
		'description' => esc_html__( 'The footer widget area 3', "norton"),
		'before_widget' => '<div class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h6 class="widget-title">',
		'after_title' => '</h6>',
	));	
	
	register_sidebar(array(
		'name' => esc_html__( 'Footer Widget Area 4', "norton"),
		'id' => 'norton-footer-widget-area-4',
		'description' => esc_html__( 'The footer widget area 4', "norton"),
		'before_widget' => '<div class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h6 class="widget-title">',
		'after_title' => '</h6>',
	));		
}

add_action( 'widgets_init', 'norton_sidebars' );

/**
 * Comment layout
 */
function norton_comments( $comment, $args, $depth ) { ?>
	<div <?php comment_class('comments'); ?> id="<?php comment_ID() ?>">
		<?php if ($comment->comment_approved == '0') : ?>
			<div class="alert alert-info">
			  <p><?php esc_html_e( 'Your comment is awaiting moderation.', 'norton' ) ?></p>
			</div>
		<?php endif; ?>
		<div class="single-comment clearfix">
			<?php echo get_avatar( $comment,'88', null,'User', array( 'class' => array( 'media-object','' ) )); ?>
			<div class="comment float-left">
			<h6>
				<?php 
						/* translators: '%1$s %2$s: edit term */
				printf(esc_html__( '%1$s %2$s', 'norton' ), get_comment_author_link(), edit_comment_link(esc_html__( '(Edit)', 'norton' ),'  ','') ) ?>
				<span class="fw-600"><?php echo get_the_date(); ?></span>
			</h6>
			<?php comment_text() ;?>
			<a class="reply-link"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></a>
		</div>
	</div>
</div>
<?php
}


/**
 * Customizer additions.
 */
  require get_template_directory(). '/lib/customizer.php';