<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 26/02/17
 * Time: 10:47 PM
 */
//@todo move to framework
add_action( 'customize_register', 'rcc_customize_custom_content', 600 );
function rcc_customize_custom_content( $wp_customize ) {
	$wp_customize->add_panel( 'custom_content', array(
		'title'       => __( 'Easy AdSense Ads & Scripts', 'rcc' ),
		'description' => '', // Include html tags such as <p>
		'priority'    => 60, // Mixed with top-level-section hierarchy.
	) );


	$wp_customize->add_section( 'home_page_content', array(
		'title'    => __( 'Home page', 'rcc' ),
		'panel'    => 'custom_content',
		'priority' => 30,
	) );

	$wp_customize->add_setting( 'rcc[home_between_posts_content_enable]', array(
		'default' => flase,
		'type'    => 'option',
	) );
	$wp_customize->add_setting( 'rcc[home_between_posts_content_desktop]', array(
		'default' => '',
		'type'    => 'option',
	) );

	$wp_customize->add_setting( 'rcc[home_between_posts_content_mobile]', array(
		'default' => '',
		'type'    => 'option',
	) );

	$wp_customize->add_setting( 'rcc[home_between_posts_content_start_after]', array(
		'default' => 3,
		'type'    => 'option',
	) );
	$wp_customize->add_setting( 'rcc[home_between_posts_content_repeat_for]', array(
		'default' => 3,
		'type'    => 'option',
	) );
	$wp_customize->add_setting( 'rcc[home_between_posts_content_repeat_every]', array(
		'default' => 2,
		'type'    => 'option',
	) );

	$wp_customize->add_control(
		new Swift_Customize_Control_Responsive_Content(
			$wp_customize,
			'home_custom_content',
			array(
				'label'    => esc_html__( 'Home page custom content/ad', 'rcc' ),
				'section'  => 'home_page_content',
				'priority' => 10,
				'type'     => 'text',
				'settings' => array(
					'rcc[home_between_posts_content_enable]',
					'rcc[home_between_posts_content_desktop]',
					'rcc[home_between_posts_content_mobile]',
				),
			)
		)
	);

	$wp_customize->add_control( 'rcc[home_between_posts_content_start_after]', array(
		'label'   => __( 'Start displaying the above custom content after nth post.', 'rcc' ),
		'section' => 'home_page_content',
		'type'    => 'number',
	) );

	$wp_customize->add_control( 'rcc[home_between_posts_content_repeat_for]', array(
		'label'   => __( 'Repeat the content for n times.', 'rcc' ),
		'section' => 'home_page_content',
		'type'    => 'number',
	) );
	$wp_customize->add_control( 'rcc[home_between_posts_content_repeat_every]', array(
		'label'   => __( 'Repeat the content after every n posts.', 'rcc' ),
		'section' => 'home_page_content',
		'type'    => 'number',
	) );


	//Single post


	$wp_customize->add_section( 'post_content', array(
		'title'    => __( 'Single post/page', 'rcc' ),
		'panel'    => 'custom_content',
		'priority' => 30,
	) );

	$wp_customize->add_setting( 'rcc[post_below_title_enable]', array(
		'default' => flase,
		'type'    => 'option',

	) );
	$wp_customize->add_setting( 'rcc[post_below_title_desktop]', array(
		'default' => '',
		'type'    => 'option',

	) );

	$wp_customize->add_setting( 'rcc[post_below_title_mobile]', array(
		'default' => '',
		'type'    => 'option',

	) );


	$wp_customize->add_control(
		new Swift_Customize_Control_Responsive_Content(
			$wp_customize,
			'post_below_title',
			array(
				'label'    => esc_html__( 'Below post title custom content/ad', 'rcc' ),
				'section'  => 'post_content',
				'priority' => 10,
				'type'     => 'text',
				'settings' => array(
					'rcc[post_below_title_enable]',
					'rcc[post_below_title_desktop]',
					'rcc[post_below_title_mobile]',
				),
			)
		)
	);

	// After first paragraph
	$wp_customize->add_setting( 'rcc[post_after_first_p_enable]', array(
		'default' => flase,
		'type'    => 'option',

	) );
	$wp_customize->add_setting( 'rcc[post_after_first_p_desktop]', array(
		'default' => '',
		'type'    => 'option',

	) );

	$wp_customize->add_setting( 'rcc[post_after_first_p_mobile]', array(
		'default' => '',
		'type'    => 'option',

	) );


	$wp_customize->add_control(
		new Swift_Customize_Control_Responsive_Content(
			$wp_customize,
			'post_after_first_p',
			array(
				'label'    => esc_html__( 'After first paragraph custom content/ad', 'rcc' ),
				'section'  => 'post_content',
				'priority' => 10,
				'type'     => 'text',
				'settings' => array(
					'rcc[post_after_first_p_enable]',
					'rcc[post_after_first_p_desktop]',
					'rcc[post_after_first_p_mobile]',
				),
			)
		)
	);

	// After first image
	$wp_customize->add_setting( 'rcc[post_after_first_img_enable]', array(
		'default' => flase,
		'type'    => 'option',

	) );
	$wp_customize->add_setting( 'rcc[post_after_first_img_desktop]', array(
		'default' => '',
		'type'    => 'option',

	) );

	$wp_customize->add_setting( 'rcc[post_after_first_img_mobile]', array(
		'default' => '',
		'type'    => 'option',

	) );


	$wp_customize->add_control(
		new Swift_Customize_Control_Responsive_Content(
			$wp_customize,
			'post_after_first',
			array(
				'label'    => esc_html__( 'After first image custom content/ad', 'rcc' ),
				'section'  => 'post_content',
				'priority' => 10,
				'type'     => 'text',
				'settings' => array(
					'rcc[post_after_first_img_enable]',
					'rcc[post_after_first_img_desktop]',
					'rcc[post_after_first_img_mobile]',
				),
			)
		)
	);


	// Between post content
	$wp_customize->add_setting( 'rcc[post_between_content_enable]', array(
		'default' => flase,
		'type'    => 'option',

	) );
	$wp_customize->add_setting( 'rcc[post_between_content_desktop]', array(
		'default' => '',
		'type'    => 'option',

	) );

	$wp_customize->add_setting( 'rcc[post_between_content_mobile]', array(
		'default' => '',
		'type'    => 'option',

	) );


	$wp_customize->add_control(
		new Swift_Customize_Control_Responsive_Content(
			$wp_customize,
			'post_between_content',
			array(
				'label'    => esc_html__( 'Between post custom content/ad', 'rcc' ),
				'section'  => 'post_content',
				'priority' => 10,
				'type'     => 'text',
				'settings' => array(
					'rcc[post_between_content_enable]',
					'rcc[post_between_content_desktop]',
					'rcc[post_between_content_mobile]',
				),
			)
		)
	);

	// After post content
	$wp_customize->add_setting( 'rcc[post_after_content_enable]', array(
		'default' => flase,
		'type'    => 'option',

	) );
	$wp_customize->add_setting( 'rcc[post_after_content_desktop]', array(
		'default' => '',
		'type'    => 'option',

	) );

	$wp_customize->add_setting( 'rcc[post_after_content_mobile]', array(
		'default' => '',
		'type'    => 'option',
	) );


	$wp_customize->add_control(
		new Swift_Customize_Control_Responsive_Content(
			$wp_customize,
			'after_post',
			array(
				'label'    => esc_html__( 'After post custom content/ad', 'rcc' ),
				'section'  => 'post_content',
				'priority' => 10,
				'type'     => 'text',
				'settings' => array(
					'rcc[post_after_content_enable]',
					'rcc[post_after_content_desktop]',
					'rcc[post_after_content_mobile]',
				),
			)
		)
	);


	$wp_customize->add_section( 'custom_scripts', array(
		'title'    => __( 'Header & Footer Scripts', 'rcc' ),
		'panel'    => 'custom_content',
		'priority' => 30,
	) );


	$wp_customize->add_setting( 'rcc[header_scripts]', array(
		'default' => '',
		'type'    => 'option',
	) );
	$wp_customize->add_setting( 'rcc[footer_scripts]', array(
		'default' => '',
		'type'    => 'option',
	) );


	$wp_customize->add_control( 'rcc[header_scripts]', array(
		'label'       => __( 'Header scripts', 'rcc' ),
		'description' => __( 'Add your analytics code, meta tags for website ownership verification and any thing else that should go in the head tag of your website.', 'rcc' ),
		'section'     => 'custom_scripts',
		'type'        => 'textarea',
	) );

	$wp_customize->add_control( 'rcc[footer_scripts]', array(
		'label'       => __( 'Footer scripts', 'rcc' ),
		'description' => __( 'Any scripts and tags that should be added to your website footer.', 'rcc' ),
		'section'     => 'custom_scripts',
		'type'        => 'textarea',
	) );
}