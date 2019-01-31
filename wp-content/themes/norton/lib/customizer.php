<?php
/**
 * Norton Theme Customizer
 *
 * @package Norton
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */


function norton_customize_register( $wp_customize ) {	
	 
	// Norton theme choice options
	if (!function_exists('norton_section_choice_option')) :
		function norton_section_choice_option()
		{
			$norton_section_choice_option = array(
				'show' => esc_html__('Show', 'norton'),
				'hide' => esc_html__('Hide', 'norton')
			);
			return apply_filters('norton_section_choice_option', $norton_section_choice_option);
		}
	endif;

	//// Norton service column choice options
	if (!function_exists('norton_services_section_columnshow')) :
		function norton_services_section_columnshow()
		{
			$norton_services_section_columnshow = array(
				'6' => esc_html__('2 COLUMN', 'norton'),
				'4' => esc_html__('3 COLUMN', 'norton'),
				'3' => esc_html__('4 COLUMN', 'norton')
			);
			return apply_filters('norton_services_section_columnshow', $norton_services_section_columnshow);
		}
	endif;

	//// Norton blog column choice options
	if (!function_exists('norton_blog_section_columnshow')) :
		function norton_blog_section_columnshow()
		{
			$norton_blog_section_columnshow = array(
				'6' => esc_html__('2 COLUMN', 'norton'),
				'4' => esc_html__('3 COLUMN', 'norton'),
				'3' => esc_html__('4 COLUMN', 'norton')
			);
			return apply_filters('norton_blog_section_columnshow', $norton_blog_section_columnshow);
		}
	endif;


	/**
	 * Sanitizing the select callback example
	 *
	 */
	if ( !function_exists('norton_sanitize_select') ) :
		function norton_sanitize_select( $input, $setting ) {

			// Ensure input is a slug.
			$input = sanitize_text_field( $input );

			// Get list of choices from the control associated with the setting.
			$choices = $setting->manager->get_control( $setting->id )->choices;

			// If the input is a valid key, return it; otherwise, return the default.
			return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
		}
	endif;

	/**
	 * Drop-down Pages sanitization callback example.
	 *
	 * - Sanitization: dropdown-pages
	 * - Control: dropdown-pages
	 * 
	 * Sanitization callback for 'dropdown-pages' type controls. This callback sanitizes `$page_id`
	 * as an absolute integer, and then validates that $input is the ID of a published page.
	 * 
	 * @see absint() https://developer.wordpress.org/reference/functions/absint/
	 * @see get_post_status() https://developer.wordpress.org/reference/functions/get_post_status/
	 *
	 * @param int                  $page    Page ID.
	 * @param WP_Customize_Setting $setting Setting instance.
	 * @return int|string Page ID if the page is published; otherwise, the setting default.
	 */
	function norton_sanitize_dropdown_pages( $page_id, $setting ) {
		// Ensure $input is an absolute integer.
		$page_id = absint( $page_id );
		
		// If $page_id is an ID of a published page, return it; otherwise, return the default.
		return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}
	
	
	/** Front Page Section Settings starts **/	

	$wp_customize->add_panel(
		'frontpage', 
		array(
			'title' => esc_html__('Norton Options', 'norton'),        
			'description' => '',                                        
			'priority' => 3,
		)
	);
	
	// Image Info
	
    $wp_customize->add_section('norton_image_info', array(
      'title'   => esc_html__('Home Intro', 'norton'),
      'description' => '',
	  'panel' => 'frontpage',
      'priority'    => 151
    ));
	
	$wp_customize->add_setting(
    'norton_image_section_hideshow',
    array(
        'default' => 'hide',
        'sanitize_callback' => 'norton_sanitize_select',
    )
    );
    $norton_section_choice_option = norton_section_choice_option();
    $wp_customize->add_control(
    'norton_image_section_hideshow',
    array(
        'type' => 'radio',
        'label' => esc_html__('Show/hide option for Image Section.', 'norton'),
        'description' => '',
        'section' => 'norton_image_info',
        'choices' => $norton_section_choice_option,
        'priority' => 1
    )
    );
	
	$wp_customize->add_setting('norton_b_image', array(     
	'default'   => '',
    'type'      => 'theme_mod',
	'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'norton_b_image', array(
      'label'   => esc_html__('Image', 'norton'),
      'section' => 'norton_image_info',
      'settings' => 'norton_b_image',
      'priority'  => 2
    )));
	
	$wp_customize->add_setting('norton_image_heading', array(
     'default'   => '',
      'type'      => 'theme_mod',
	  'sanitize_callback'	=> 'sanitize_text_field'
    ));

    $wp_customize->add_control('norton_image_heading', array(
      'label'   => esc_html__('Heading', 'norton'),
      'section' => 'norton_image_info',
      'priority'  => 4
    ));	
	
	$wp_customize->add_setting('norton_image_subheading', array(
     'default'   => '',
      'type'      => 'theme_mod',
	  'sanitize_callback'	=> 'sanitize_text_field'
    ));

    $wp_customize->add_control('norton_image_subheading', array(
      'label'   => esc_html__('Sub Heading', 'norton'),
      'section' => 'norton_image_info',
      'priority'  => 4
    ));
	
	$wp_customize->add_setting('norton_image_more', array(
      'default'   =>'',
      'type'      => 'theme_mod',
	  'sanitize_callback'	=> 'sanitize_text_field'
    ));

    $wp_customize->add_control('norton_image_more', array(
      'label'   => esc_html__('Button 1 - Text', 'norton'),
      'section' => 'norton_image_info',
      'priority'  => 7
    ));
	
	$wp_customize->add_setting('norton_image_more_url', array(
     'default'   =>  '',
      'type'      => 'theme_mod',
	'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('norton_image_more_url', array(
      'label'   => esc_html__('Button 1 - URL', 'norton'),
      'section' => 'norton_image_info',
      'priority'  => 8
    ));
	
	$wp_customize->add_setting('norton_image_contact', array(
      'default'   => '',
      'type'      => 'theme_mod',
	  'sanitize_callback'	=> 'sanitize_text_field'
    ));

    $wp_customize->add_control('norton_image_contact', array(
      'label'   => esc_html__('Button 2 - Text', 'norton'),
      'section' => 'norton_image_info',
      'priority'  => 9
    ));
	
	$wp_customize->add_setting('norton_image_contact_url', array(
    'default'   => '',
      'type'      => 'theme_mod',
	'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('norton_image_contact_url', array(
      'label'   => esc_html__('Button 2 - URL', 'norton'),
      'section' => 'norton_image_info',
      'priority'  => 10
    ));

	// Header info
	$wp_customize->add_section(
		'norton_header_section', 
		array(
			'title'   => esc_html__('Top Header Info Section', 'norton'),
			'description' => '',
			'panel' => 'frontpage',
			'priority'    => 130
		)
	);

	$wp_customize->add_setting(
		'norton_header_section_hideshow',
		array(
			'default' => 'show',
			'sanitize_callback' => 'norton_sanitize_select',
		)
	);

	$norton_section_choice_option = norton_section_choice_option();
	$wp_customize->add_control(
		'norton_header_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Header Info Option', 'norton'),
			'description' => esc_html__('Show/hide option for Header Section.', 'norton'),
			'section' => 'norton_header_section',
			'choices' => $norton_section_choice_option,
			'priority' => 1
		)
	);

	$wp_customize->add_setting(
		'norton_header_address_value', 
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'norton_header_address_value', 
		array(
			'label'   => esc_html__('Address', 'norton'),
			'section' => 'norton_header_section',
			'priority'  => 3
		)
	);

	$wp_customize->add_setting(
		'norton_header_email_value', 
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'norton_header_email_value', 
		array(
			'label'   => esc_html__('E-mail', 'norton'),
			'section' => 'norton_header_section',
			'priority'  => 3
		)
	);

	$wp_customize->add_setting(
		'norton_header_button_value',
			array(
				'default'           => '',
				'type'      		=> 'theme_mod',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'norton_header_button_value',
			array(
				'label'    			=> esc_html__( 'Header Button Text','norton' ),
				'section'  			=> 'norton_header_section',
				'priority' 			=> 3
			)
		);

		$wp_customize->add_setting( 
			'norton_header_btnurl',
			array(
				'default'           => '',
				'type'      		=> 'theme_mod',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( 
			'norton_header_btnurl',
			array(
				'label'    			=> esc_html__( 'Header Button URL', 'norton' ),
				'section'  			=> 'norton_header_section',
				'priority' 			=> 3,
			)
		);

		$wp_customize->add_setting(
		'norton_header_social_link_1',
		array(
			'default'   =>  '',
			'type'      => 'theme_mod',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		'norton_header_social_link_1',
		array(
			'label'   => esc_html__('Facebook URL', 'norton'),
			'section' => 'norton_header_section',
			'priority'  => 7
		)
	);

	$wp_customize->add_setting(
		'norton_header_social_link_2',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		'norton_header_social_link_2',
		array(
			'label'   => esc_html__('Twitter URL', 'norton'),
			'section' => 'norton_header_section',
			'priority'  => 9
		)
	);

	$wp_customize->add_setting(
		'norton_header_social_link_3',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		'norton_header_social_link_3',
		array(
			'label'   => esc_html__('Linkedin URL', 'norton'),
			'section' => 'norton_header_section',
			'priority'  => 11
		)
	);

	$wp_customize->add_setting(
		'norton_header_social_link_4',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		'norton_header_social_link_4',
		array(
			'label'   => esc_html__('Pinrest URL', 'norton'),
			'section' => 'norton_header_section',
			'priority'  => 11
		)
	);

		////End Header info Section

		//start feature section
		$wp_customize->add_section(
		'features', 
		array(
			'title'   => esc_html__('Feature Section', 'norton'),
			'description' => '',
			'panel' => 'frontpage',
			'priority'    => 180
		)
	);

	$wp_customize->add_setting(
		'norton_features_section_hideshow',
		array(
			'default' => 'hide',
			'sanitize_callback' => 'norton_sanitize_select',
		)
	);

	$norton_section_choice_option = norton_section_choice_option();
	$wp_customize->add_control(
		'norton_features_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Section Option', 'norton'),
			'description' => esc_html__('Show/hide option for Header Section.', 'norton'),
			'section' => 'features',
			'choices' => $norton_section_choice_option,
			'priority' => 1
		)
	);

    $feature_no = 6;
	for( $i = 1; $i <= $feature_no; $i++ ) {
		$norton_featurepage = 'norton_feature_page_' . $i;
		$norton_featureicon = 'norton_page_feature_icon_' . $i;
		
		//Setting Feature Icon
		$wp_customize->add_setting( 
			$norton_featureicon,
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( 
			$norton_featureicon,
			array(
				'label'    			=> esc_html__( 'Feature Icon ', 'norton' ).$i,
				'description' 		=>  esc_html__('Select a icon in this list <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">Font Awesome icons</a> and enter the class name','norton'),
				'section'  			=> 'features',
				'type'     			=> 'text',
				'priority' 			=> 100,
			)
		);

	// Setting - Feature page
	$wp_customize->add_setting( 
			$norton_featurepage,
			array(
				'default'           => 1,
				'sanitize_callback' => 'norton_sanitize_dropdown_pages',
			)
		);

		$wp_customize->add_control( 
			$norton_featurepage,
			array(
				'label'    			=> esc_html__( 'Feature Page ', 'norton' ) .$i,
				'section'  			=> 'features',
				'type'     			=> 'dropdown-pages',
				'priority' 			=> 100,
			)
		);
	}
	////End feature info Section

	////Start About info Section
	$wp_customize->add_section(
		'about', 
		array(
			'title'   => esc_html__('About Section', 'norton'),
			'description' => '',
			'panel' => 'frontpage',
			'priority'    => 180
		)
	);

	$wp_customize->add_setting(
		'norton_about_section_hideshow',
		array(
			'default' => 'hide',
			'sanitize_callback' => 'norton_sanitize_select',
		)
	);

	$norton_section_choice_option = norton_section_choice_option();
	$wp_customize->add_control(
		'norton_about_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Section Option', 'norton'),
			'description' => esc_html__('Show/hide option for Header Section.', 'norton'),
			'section' => 'about',
			'choices' => $norton_section_choice_option,
			'priority' => 1
		)
	);

    $about_no = 1;
	for( $i = 1; $i <= $about_no; $i++ ) {
		$norton_aboutpage = 'norton_about_page_' . $i;
	// Setting - About page
	$wp_customize->add_setting( 
			$norton_aboutpage,
			array(
				'default'           => 1,
				'sanitize_callback' => 'norton_sanitize_dropdown_pages',
			)
		);

		$wp_customize->add_control( 
			$norton_aboutpage,
			array(
				'label'    			=> esc_html__( 'Feature Page ', 'norton' ) .$i,
				'section'  			=> 'about',
				'type'     			=> 'dropdown-pages',
				'priority' 			=> 100,
			)
		);
	}
	////End about info Section

	////Start callout info Section
	$wp_customize->add_section(
		'callout', 
		array(
			'title'   => esc_html__('Callout Section', 'norton'),
			'description' => '',
			'panel' => 'frontpage',
			'priority'    => 180
		)
	);

	$wp_customize->add_setting(
		'norton_callout_section_hideshow',
		array(
			'default' => 'hide',
			'sanitize_callback' => 'norton_sanitize_select',
		)
	);

	$norton_section_choice_option = norton_section_choice_option();
	$wp_customize->add_control(
		'norton_callout_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Section Option', 'norton'),
			'description' => esc_html__('Show/hide option for Header Section.', 'norton'),
			'section' => 'callout',
			'choices' => $norton_section_choice_option,
			'priority' => 1
		)
	);



		$wp_customize->add_setting(
		'norton_callout_text_value', 
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'norton_callout_text_value', 
		array(
			'label'   => esc_html__('Callout Text', 'norton'),
			'section' => 'callout',
			'priority'  => 3
		)
	);

	$wp_customize->add_setting(
		'norton_callout_button_text',
			array(
				'default'           => '',
				'type'      		=> 'theme_mod',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'norton_callout_button_text',
			array(
				'label'    			=> esc_html__( 'Callout Button Text','norton' ),
				'section'  			=> 'callout',
				'priority' 			=> 3
			)
		);

		$wp_customize->add_setting( 
			'norton_callout_button_url',
			array(
				'default'           => '',
				'type'      		=> 'theme_mod',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( 
			'norton_callout_button_url',
			array(
				'label'    			=> esc_html__( 'Button URL', 'norton' ),
				'section'  			=> 'callout',
				'priority' 			=> 3,
			)
		);
	
	////End callout info Section

	////Start Service info Section
		$wp_customize->add_section(
		'services', 
		array(
			'title'   => esc_html__('Service Section', 'norton'),
			'description' => '',
			'panel' => 'frontpage',
			'priority'    => 180
		)
	);

	$wp_customize->add_setting(
		'norton_services_section_hideshow',
		array(
			'default' => 'hide',
			'sanitize_callback' => 'norton_sanitize_select',
		)
	);

	$norton_section_choice_option = norton_section_choice_option();
	$wp_customize->add_control(
		'norton_services_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Section Option', 'norton'),
			'description' => esc_html__('Show/hide option for Header Section.', 'norton'),
			'section' => 'services',
			'choices' => $norton_section_choice_option,
			'priority' => 1
		)
	);

	$wp_customize->add_setting(
		'norton_services_section_columnshow',
		array(
			'default' => '4',
			'sanitize_callback' => 'norton_sanitize_select',
		)
	);

	$norton_services_section_columnshow = norton_services_section_columnshow();
    $wp_customize->add_control(
    'norton_services_section_columnshow',
    array(
        'type' => 'radio',
        'label' => esc_html__('Select Column', 'norton'),
        'description' => esc_html__('Select Service Column option for Service.', 'norton'),
        'section' => 'services',
        'choices' => $norton_services_section_columnshow,
        'priority' => 3
    )
    );

	$wp_customize->add_setting(
		'norton-services_title',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

    $wp_customize->add_control(
		'norton-services_title',
		array(
			'label'   => esc_html__('Services Section Title', 'norton'),
			'section' => 'services',
			'priority'  => 3
		)
	);

	$wp_customize->add_setting(
		'norton-services_subtitle',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

    $wp_customize->add_control(
		'norton-services_subtitle',
		array(
			'label'   => esc_html__('Services Section Sub Title', 'norton'),
			'section' => 'services',
			'priority'  => 3
		)
	);

    $service_no = 6;
	for( $i = 1; $i <= $service_no; $i++ ) {
		$norton_servicepage = 'norton_service_page_' . $i;
		$norton_serviceicon = 'norton_page_service_icon_' . $i;
		$norton_servicepage_btntext = 'norton_service_page_btntext_' . $i;

	// Setting - Service page
	$wp_customize->add_setting( 
			$norton_servicepage,
			array(
				'default'           => 1,
				'sanitize_callback' => 'norton_sanitize_dropdown_pages',
			)
		);

		$wp_customize->add_control( 
			$norton_servicepage,
			array(
				'label'    			=> esc_html__( 'Service Page ', 'norton' ) .$i,
				'section'  			=> 'services',
				'type'     			=> 'dropdown-pages',
				'priority' 			=> 100,
			)
		);
	}
	////End Service info Section

	////Start Blog info Section
		$wp_customize->add_section(
		'blog', 
		array(
			'title'   => esc_html__('Blog Section', 'norton'),
			'description' => '',
			'panel' => 'frontpage',
			'priority'    => 180
		)
	);

	$wp_customize->add_setting(
		'norton_blog_section_hideshow',
		array(
			'default' => 'show',
			'sanitize_callback' => 'norton_sanitize_select',
		)
	);

	$norton_section_choice_option = norton_section_choice_option();
	$wp_customize->add_control(
		'norton_blog_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Section Option', 'norton'),
			'description' => esc_html__('Show/hide option for Blog Section.', 'norton'),
			'section' => 'blog',
			'choices' => $norton_section_choice_option,
			'priority' => 1
		)
	);

	$wp_customize->add_setting(
		'norton_blog_section_columnshow',
		array(
			'default' => '4',
			'sanitize_callback' => 'norton_sanitize_select',
		)
	);

	$norton_blog_section_columnshow = norton_blog_section_columnshow();
    $wp_customize->add_control(
    'norton_blog_section_columnshow',
    array(
        'type' => 'radio',
        'label' => esc_html__('Select Column', 'norton'),
        'description' => esc_html__('Select Service Column option for Service.', 'norton'),
        'section' => 'blog',
        'choices' => $norton_blog_section_columnshow,
        'priority' => 3
    )
    );

    $wp_customize->add_setting(
		'norton-blog_title',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

    $wp_customize->add_control(
		'norton-blog_title',
		array(
			'label'   => esc_html__('Blog Section Title', 'norton'),
			'section' => 'blog',
			'priority'  => 3
		)
	);

	$wp_customize->add_setting(
		'norton-blog_subtitle',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

    $wp_customize->add_control(
		'norton-blog_subtitle',
		array(
			'label'   => esc_html__('Blog Section Sub Title', 'norton'),
			'section' => 'blog',
			'priority'  => 3
		)
	);

	

    ////Start footer Section
	
	$wp_customize->add_section(
		'footer',
		array(
			'title'   => esc_html__('Footer Section', 'norton'),
			'description' => '',
			'panel' => 'frontpage',
			'priority'    => 180
		)
	);

	$wp_customize->add_setting(
		'norton_footer_section_hideshow',
		array(
			'default' => 'show',
			'sanitize_callback' => 'norton_sanitize_select',
		)
	);
	$norton_section_choice_option = norton_section_choice_option();
	$wp_customize->add_control(
		'norton_footer_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Footer Option', 'norton'),
			'description' => esc_html__('Show/hide option for Footer Section.', 'norton'),
			'section' => 'footer',
			'choices' => $norton_section_choice_option,
			'priority' => 1
		)
	);

	$wp_customize->add_setting(
		'norton-footer_title',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'wp_kses_post'
		)
	);

	$wp_customize->add_control(
		'norton-footer_title',
		array(
			'label'   => esc_html__('Copyright', 'norton'),
			'section' => 'footer',
			'type'      => 'textarea',
			'priority'  => 1
		)
	);
}
add_action( 'customize_register', 'norton_customize_register' );
