<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 26/02/17
 * Time: 10:47 PM
 */
//@todo move to framework
add_action( 'customize_register', 'eaa_customize_eaa_ads', 100 );
function eaa_customize_eaa_ads( $wp_customize ) {


	$help_text = '
	Wan\'t to rotate ads? Just wrap them in the shortcode like below.
<pre>
[eaa_ads]
First ad &lt;!-- next_ad --&gt;
Second ad &lt;!-- next_ad --&gt;
third ad
[/eaa_ads]
</pre>

If you want to centre the ad, wrap it in
<pre>&lt;div class=&quot;aligncenter&quot;
style=&quot;width:300px&quot;&gt;&lt;/div&gt;</pre>
where width is the width of the ad.

	';
	$wp_customize->add_panel( 'eaa_ads', array(
		'title'       => __( 'Easy AdSense Ads & Scripts', 'eaa' ),
		'description' => '', // Include html tags such as <p>
		'priority'    => 999, // Mixed with top-level-section hierarchy.
	) );


	$wp_customize->add_section( 'home_page_content', array(
		'title'       => __( 'Home page', 'eaa' ),
		'panel'       => 'eaa_ads',
		'priority'    => 30,
		'description' => $help_text,
	) );

	$wp_customize->add_setting( 'eaa[home_between_posts_content_enable]', array(
		'default' => 0,
		'type'    => 'option',
	) );


	$wp_customize->add_setting( 'eaa[home_between_posts_content_align_desktop]', array(
		'default' => '',
		'type'    => 'option',
	) );


	$wp_customize->add_setting( 'eaa[home_between_posts_content_desktop]', array(
		'default' => '',
		'type'    => 'option',
	) );

	$wp_customize->add_setting( 'eaa[home_between_posts_content_mobile]', array(
		'default' => '',
		'type'    => 'option',
	) );

	$wp_customize->add_setting( 'eaa[home_between_posts_content_start_after]', array(
		'default' => 3,
		'type'    => 'option',
	) );
	$wp_customize->add_setting( 'eaa[home_between_posts_content_repeat_for]', array(
		'default' => 3,
		'type'    => 'option',
	) );
	$wp_customize->add_setting( 'eaa[home_between_posts_content_repeat_every]', array(
		'default' => 2,
		'type'    => 'option',
	) );

	$wp_customize->add_control(
		new Eaa_Customize_Control_Responsive_Content(
			$wp_customize,
			'home_eaa_ads',
			array(
				'label'    => esc_html__( 'Home page custom content/ad', 'eaa' ),
				'section'  => 'home_page_content',
				'priority' => 10,
				'type'     => 'text',
				'settings' => array(
					'eaa[home_between_posts_content_enable]',
					'eaa[home_between_posts_content_desktop]',
					'eaa[home_between_posts_content_mobile]',
					'eaa[home_between_posts_content_align_desktop]',
				),
			)
		)
	);

	$wp_customize->add_control( 'eaa[home_between_posts_content_start_after]', array(
		'label'   => __( 'Start displaying the above custom content after nth post.', 'eaa' ),
		'section' => 'home_page_content',
		'type'    => 'number',
	) );

	$wp_customize->add_control( 'eaa[home_between_posts_content_repeat_for]', array(
		'label'   => __( 'Repeat the content for n times.', 'eaa' ),
		'section' => 'home_page_content',
		'type'    => 'number',
	) );
	$wp_customize->add_control( 'eaa[home_between_posts_content_repeat_every]', array(
		'label'   => __( 'Repeat the content after every n posts.', 'eaa' ),
		'section' => 'home_page_content',
		'type'    => 'number',
	) );


	//Single post


	$wp_customize->add_section( 'post_content', array(
		'title'       => __( 'Single post/page', 'eaa' ),
		'panel'       => 'eaa_ads',
		'priority'    => 30,
		'description' => $help_text,

	) );

	$wp_customize->add_setting( 'eaa[post_below_title_enable]', array(
		'default' => 0,
		'type'    => 'option',
	) );


	$wp_customize->add_setting( 'eaa[post_below_title_align_desktop]', array(
		'default' => '',
		'type'    => 'option',
	) );

	$wp_customize->add_setting( 'eaa[post_below_title_desktop]', array(
		'default' => '',
		'type'    => 'option',

	) );

	$wp_customize->add_setting( 'eaa[post_below_title_mobile]', array(
		'default' => '',
		'type'    => 'option',

	) );


	$wp_customize->add_control(
		new Eaa_Customize_Control_Responsive_Content(
			$wp_customize,
			'post_below_title',
			array(
				'label'    => esc_html__( 'Below post title custom content/ad', 'eaa' ),
				'section'  => 'post_content',
				'priority' => 10,
				'type'     => 'text',
				'settings' => array(
					'eaa[post_below_title_enable]',
					'eaa[post_below_title_desktop]',
					'eaa[post_below_title_mobile]',
					'eaa[post_below_title_align_desktop]',
				),
			)
		)
	);

	// After first paragraph
	$wp_customize->add_setting( 'eaa[post_after_first_p_enable]', array(
		'default' => false,
		'type'    => 'option',

	) );


	$wp_customize->add_setting( 'eaa[post_after_first_p_align_desktop]', array(
		'default' => '',
		'type'    => 'option',
	) );

	$wp_customize->add_setting( 'eaa[post_after_first_p_desktop]', array(
		'default' => '',
		'type'    => 'option',

	) );

	$wp_customize->add_setting( 'eaa[post_after_first_p_mobile]', array(
		'default' => '',
		'type'    => 'option',

	) );


	$wp_customize->add_control(
		new Eaa_Customize_Control_Responsive_Content(
			$wp_customize,
			'post_after_first_p',
			array(
				'label'    => esc_html__( 'After first paragraph custom content/ad', 'eaa' ),
				'section'  => 'post_content',
				'priority' => 10,
				'type'     => 'text',
				'settings' => array(
					'eaa[post_after_first_p_enable]',
					'eaa[post_after_first_p_desktop]',
					'eaa[post_after_first_p_mobile]',
					'eaa[post_after_first_p_align_desktop]',
				),
			)
		)
	);

	// After first image
	$wp_customize->add_setting( 'eaa[post_after_first_img_enable]', array(
		'default' => 0,
		'type'    => 'option',

	) );


	$wp_customize->add_setting( 'eaa[post_after_first_img_align_desktop]', array(
		'default' => '',
		'type'    => 'option',
	) );

	$wp_customize->add_setting( 'eaa[post_after_first_img_desktop]', array(
		'default' => '',
		'type'    => 'option',

	) );

	$wp_customize->add_setting( 'eaa[post_after_first_img_mobile]', array(
		'default' => '',
		'type'    => 'option',

	) );


	$wp_customize->add_control(
		new Eaa_Customize_Control_Responsive_Content(
			$wp_customize,
			'post_after_first',
			array(
				'label'    => esc_html__( 'After first anchored image custom content/ad', 'eaa' ),
				'section'  => 'post_content',
				'priority' => 10,
				'type'     => 'text',
				'settings' => array(
					'eaa[post_after_first_img_enable]',
					'eaa[post_after_first_img_desktop]',
					'eaa[post_after_first_img_mobile]',
					'eaa[post_after_first_img_align_desktop]',
				),
			)
		)
	);


	// Between post content
	$wp_customize->add_setting( 'eaa[post_between_content_enable]', array(
		'default' => 0,
		'type'    => 'option',

	) );

	$wp_customize->add_setting( 'eaa[post_between_content_align_desktop]', array(
		'default' => '',
		'type'    => 'option',
	) );
	$wp_customize->add_setting( 'eaa[post_between_content_desktop]', array(
		'default' => '',
		'type'    => 'option',

	) );

	$wp_customize->add_setting( 'eaa[post_between_content_mobile]', array(
		'default' => '',
		'type'    => 'option',

	) );


	$wp_customize->add_control(
		new Eaa_Customize_Control_Responsive_Content(
			$wp_customize,
			'post_between_content',
			array(
				'label'    => esc_html__( 'Between post custom content/ad', 'eaa' ),
				'section'  => 'post_content',
				'priority' => 10,
				'type'     => 'text',
				'settings' => array(
					'eaa[post_between_content_enable]',
					'eaa[post_between_content_desktop]',
					'eaa[post_between_content_mobile]',
					'eaa[post_between_content_align_desktop]',
				),
			)
		)
	);

	// After post content
	$wp_customize->add_setting( 'eaa[post_after_content_enable]', array(
		'default' => 0,
		'type'    => 'option',

	) );

	$wp_customize->add_setting( 'eaa[post_after_content_align_desktop]', array(
		'default' => '',
		'type'    => 'option',
	) );
	$wp_customize->add_setting( 'eaa[post_after_content_desktop]', array(
		'default' => '',
		'type'    => 'option',

	) );

	$wp_customize->add_setting( 'eaa[post_after_content_mobile]', array(
		'default' => '',
		'type'    => 'option',
	) );


	$wp_customize->add_control(
		new Eaa_Customize_Control_Responsive_Content(
			$wp_customize,
			'after_post',
			array(
				'label'    => esc_html__( 'After post custom content/ad', 'eaa' ),
				'section'  => 'post_content',
				'priority' => 10,
				'type'     => 'text',
				'settings' => array(
					'eaa[post_after_content_enable]',
					'eaa[post_after_content_desktop]',
					'eaa[post_after_content_mobile]',
					'eaa[post_after_content_align_desktop]',
				),
			)
		)
	);


	$wp_customize->add_section( 'custom_scripts', array(
		'title'    => __( 'Header & Footer Scripts', 'eaa' ),
		'panel'    => 'eaa_ads',
		'priority' => 30,
	) );


	$wp_customize->add_setting( 'eaa[header_scripts]', array(
		'default' => '',
		'type'    => 'option',
	) );
	$wp_customize->add_setting( 'eaa[footer_scripts]', array(
		'default' => '',
		'type'    => 'option',
	) );


	$wp_customize->add_control( 'eaa[header_scripts]', array(
		'label'       => __( 'Header scripts', 'eaa' ),
		'description' => __( 'Add your analytics code, meta tags for website ownership verification and any thing else that should go in the head tag of your website.', 'eaa' ),
		'section'     => 'custom_scripts',
		'type'        => 'textarea',
	) );

	$wp_customize->add_control( 'eaa[footer_scripts]', array(
		'label'       => __( 'Footer scripts', 'eaa' ),
		'description' => __( 'Any scripts and tags that should be added to your website footer.', 'eaa' ),
		'section'     => 'custom_scripts',
		'type'        => 'textarea',
	) );
}