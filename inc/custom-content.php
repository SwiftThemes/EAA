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


	$help_text = __( 'Wan\'t to rotate ads? Just wrap them in the shortcode like below.', 'eaa' ) . '
<pre>
[eaa_ads]
' . __( '
First ad &lt;!-- next_ad --&gt;
Second ad &lt;!-- next_ad --&gt;
third ad', 'eaa' ) . '
[/eaa_ads]
</pre>
' . __( '
If you want to centre the ad, wrap it in
<pre>&lt;div class=&quot;aligncenter&quot;
style=&quot;width:300px&quot;&gt;&lt;/div&gt;</pre>
where width is the width of the ad.', 'eaa' );


	$wp_customize->add_panel( 'eaa_ads', array(
		'title'       => __( 'Easy AdSense Ads & Scripts', 'eaa' ),
		'description' => '', // Include html tags such as <p>
		'priority'    => 999, // Mixed with top-level-section hierarchy.
	) );


	$wp_customize->add_section( 'home_page_content', array(
		'title'       => __( 'Home & Archive Pages', 'eaa' ),
		'panel'       => 'eaa_ads',
		'priority'    => 30,
		'description' => $help_text,
	) );

	$wp_customize->add_section( 'post_content', array(
		'title'       => __( 'Single Post & Page', 'eaa' ),
		'panel'       => 'eaa_ads',
		'priority'    => 30,
		'description' => $help_text,
	) );

	$wp_customize->add_section( 'sticky_ads', array(
		'title'       => __( 'Sticky ads', 'eaa' ),
		'panel'       => 'eaa_ads',
		'priority'    => 40,
		'description' => $help_text,
	) );

	$wp_customize->add_section( 'user_locations', array(
		'title'       => __( 'My Custom Locations', 'eaa' ),
		'panel'       => 'eaa_ads',
		'priority'    => 50,
		'description' => $help_text,
	) );

	$wp_customize->add_section( 'eaa_theme_locations', array(
		'title'       => __( 'Theme Locations', 'eaa' ),
		'panel'       => 'eaa_ads',
		'priority'    => 60,
		'description' => $help_text,
	) );


	$wp_customize->add_section( 'eaa_advanced_locations', array(
		'title'       => __( 'Advanced Locations', 'eaa' ),
		'panel'       => 'eaa_ads',
		'priority'    => 70,
		'description' => $help_text,
	) );

	$wp_customize->add_section( 'custom_scripts', array(
		'title'    => __( 'Header & Footer Scripts', 'eaa' ),
		'panel'    => 'eaa_ads',
		'priority' => 90,
	) );


	eaa_add_ad_unit( $wp_customize, 'home_between_posts_content',
		array(
			'label'   => esc_html__( 'Home page ad', 'eaa' ),
			'section' => 'home_page_content',
		) );


	$wp_customize->add_setting( 'eaa[disable_ads_between_posts_on_home_page]', array(
		'default' => false,
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


	$wp_customize->add_control( 'eaa[disable_ads_between_posts_on_home_page]', array(
		'label'       => __( 'Disable ads between posts on home page.', 'eaa' ),
		'description' => __( 'Check this option if you wan\'t to keep the home page clean without any ads while continuing to show ads on other archive pages.
', 'eaa' ),
		'section'     => 'home_page_content',
		'type'        => 'checkbox',
		'priority'    => 30
	) );

	$wp_customize->add_control( 'eaa[home_between_posts_content_start_after]', array(
		'label'   => __( 'Start displaying the above ad after nth post.', 'eaa' ),
		'section' => 'home_page_content',
		'type'    => 'number',
	) );

	$wp_customize->add_control( 'eaa[home_between_posts_content_repeat_for]', array(
		'label'   => __( 'Repeat the ad for n times.', 'eaa' ),
		'section' => 'home_page_content',
		'type'    => 'number',
	) );
	$wp_customize->add_control( 'eaa[home_between_posts_content_repeat_every]', array(
		'label'   => __( 'Repeat the ad after every n posts.', 'eaa' ),
		'section' => 'home_page_content',
		'type'    => 'number',
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


	$ad_locations = array();


	//Single post

	$ad_locations['post_below_title'] = array(
		'label'   => esc_html__( 'Below post title ad', 'eaa' ),
		'section' => 'post_content',
	);

	$ad_locations['post_after_first_p'] = array(
		'label'   => esc_html__( 'After first paragraph ad', 'eaa' ),
		'section' => 'post_content',
	);

	$ad_locations['post_after_first_img']  = array(
		'label'       => esc_html__( 'After first image ad', 'eaa' ),
		'section'     => 'post_content',
		'description' => __( 'If there are no anchored images in the post, then the ad will be shown after first image.', 'eaa' )
	);
	$ad_locations['post_after_second_img'] = array(
		'label'   => esc_html__( 'After second anchored image ad', 'eaa' ),
		'section' => 'eaa_advanced_locations',
	);

	$ad_locations['post_between_content'] = array(
		'label'   => esc_html__( 'Between post ad', 'eaa' ),
		'section' => 'post_content',

	);

	$ad_locations['post_after_content'] = array(
		'label'   => esc_html__( 'After post ad', 'eaa' ),
		'section' => 'post_content',
	);


	//Sticky Ads
	$ad_locations['sticky_ad_top']    = array(
		'label'   => esc_html__( 'Sticky ad at the top of the page', 'eaa' ),
		'section' => 'sticky_ads',
	);
	$ad_locations['sticky_ad_bottom'] = array(
		'label'   => esc_html__( 'Sticky ad at the bottom of the page', 'eaa' ),
		'section' => 'sticky_ads',
	);

	$ad_locations = apply_filters( 'eaa_ad_locations', $ad_locations );


	foreach ( $ad_locations as $name => $args ) {
		eaa_add_ad_unit( $wp_customize, $name, $args );
	}


	/* Advanced Ad locations */
	$wp_customize->add_setting( 'eaa[show_after_nth_p]', array(
		'default' => 2,
		'type'    => 'option',
	) );


	$wp_customize->add_control( 'eaa[show_after_nth_p]', array(
		'label'       => __( 'Show the below ad after nth paragraph #1', 'eaa' ),
		'section'     => 'eaa_advanced_locations',
		'type'        => 'number',
		'input_attrs' => array( 'min' => 0, 'max' => 200 ),
	) );


	$wp_customize->add_setting( 'eaa[show_after_nth_at_the_end]', array(
		'default' => 1,
		'type'    => 'option',
	) );

	$wp_customize->add_control( 'eaa[show_after_nth_at_the_end]', array(
		'label'   => __( 'Show this after end of post if fewer paragraphs are found. Note: Only this ad unit has this option.', 'eaa' ),
		'section' => 'eaa_advanced_locations',
		'type'    => 'checkbox',
	) );

	eaa_add_ad_unit( $wp_customize, 'after_nth_p', array(
		'label'   => esc_html__( 'Ad code', 'eaa' ),
		'section' => 'eaa_advanced_locations',
	) );


	//1
	$wp_customize->add_setting( 'eaa[show_after_nth_p_1]', array(
		'default' => 5,
		'type'    => 'option',
	) );

	$wp_customize->add_control( 'eaa[show_after_nth_p_1]', array(
		'label'   => __( 'Show the below ad after nth paragraph #2', 'eaa' ),
		'section' => 'eaa_advanced_locations',
		'type'    => 'number',
	) );

	eaa_add_ad_unit( $wp_customize, 'after_nth_p_1', array(
		'label'   => esc_html__( 'Ad code', 'eaa' ),
		'section' => 'eaa_advanced_locations',
	) );


	//2
	$wp_customize->add_setting( 'eaa[show_after_nth_p_2]', array(
		'default' => 6,
		'type'    => 'option',
	) );

	$wp_customize->add_control( 'eaa[show_after_nth_p_2]', array(
		'label'   => __( 'Show the below ad after nth paragraph #3', 'eaa' ),
		'section' => 'eaa_advanced_locations',
		'type'    => 'number',
	) );

	eaa_add_ad_unit( $wp_customize, 'after_nth_p_2', array(
		'label'   => esc_html__( 'Ad code', 'eaa' ),
		'section' => 'eaa_advanced_locations',
	) );


}


function eaa_add_ad_unit( $wp_customize, $name, $args = array() ) {
	$defaults = array(
		'label'    => esc_html__( 'Your custom location', 'eaa' ),
		'section'  => 'eaa_theme_locations',
		'priority' => 10,
		'type'     => 'text',
		'settings' => array(
			'eaa[' . $name . '_enable]',
			'eaa[' . $name . '_desktop]',
			'eaa[' . $name . '_mobile]',
			'eaa[' . $name . '_align_desktop]',
			'eaa[' . $name . '_margin_desktop]',
			'eaa[' . $name . '_style_desktop]',
			'eaa[' . $name . '_amp]',

		)
	);

	$args = wp_parse_args( $args, $defaults );


	$wp_customize->add_setting( 'eaa[' . $name . '_enable]', array(
		'default' => 0,
		'type'    => 'option',

	) );


	$wp_customize->add_setting( 'eaa[' . $name . '_desktop]', array(
		'default' => '',
		'type'    => 'option',

	) );

	$wp_customize->add_setting( 'eaa[' . $name . '_mobile]', array(
		'default' => '',
		'type'    => 'option',
	) );

	$wp_customize->add_setting( 'eaa[' . $name . '_align_desktop]', array(
		'default' => '',
		'type'    => 'option',
	) );
	$wp_customize->add_setting( 'eaa[' . $name . '_margin_desktop]', array(
		'default' => '',
		'type'    => 'option',
	) );
	$wp_customize->add_setting( 'eaa[' . $name . '_style_desktop]', array(
		'default' => '',
		'type'    => 'option',
	) );
	$wp_customize->add_setting( 'eaa[' . $name . '_amp]', array(
		'default' => '',
		'type'    => 'option',
	) );

	$wp_customize->add_control(
		new Eaa_Customize_Control_Responsive_Content(
			$wp_customize,
			$name,
			$args
		)
	);
}