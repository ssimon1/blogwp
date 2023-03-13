<?php

define( 'blogita_CUSTOMIZER_CONFIG_ID', 'blogita_customizer_settings' );
define( 'blogita_CUSTOMIZER_PANEL_ID', 'blogita_customizer_panel' );

if( class_exists( 'Kirki' ) ) {
  Kirki::add_config( blogita_CUSTOMIZER_CONFIG_ID, array(
    'capability'    => 'edit_theme_options',
    'option_type'   => 'theme_mod',
  ) );

  new \Kirki\Panel(
    blogita_CUSTOMIZER_PANEL_ID,
    [
      'priority'    => 140,
      'title'       => esc_html__( 'blogita Theme Settings', 'blogita' ),
    ]
  );

  // Home Page Settings
  new \Kirki\Section(
    'blogita_home_settings',
    [
      'title'       => esc_html__( 'Home Settings', 'blogita' ),
      'panel'       => blogita_CUSTOMIZER_PANEL_ID,
      'priority'    => 160,
    ]
  );

  // Hero Slider
  new \Kirki\Field\Checkbox_Switch(
    [
      'settings'    => 'blogita_hero_slider_switch',
      'label'       => esc_html__( 'Display Hero Slider', 'blogita' ),
      'section'     => 'blogita_home_settings',
      'default'     => 'on',
      'choices'     => [
        'on'  => esc_html__( 'Enable', 'blogita' ),
        'off' => esc_html__( 'Disable', 'blogita' ),
      ],
    ]
  );

  // Popular Post Slider
  new \Kirki\Field\Checkbox_Switch(
    [
      'settings'    => 'blogita_popular_post_switch',
      'label'       => esc_html__( 'Display Popular Posts', 'blogita' ),
      'section'     => 'blogita_home_settings',
      'default'     => 'on',
      'choices'     => [
        'on'  => esc_html__( 'Enable', 'blogita' ),
        'off' => esc_html__( 'Disable', 'blogita' ),
      ],
    ]
  );
  new \Kirki\Field\Text(
    [
      'settings' => 'blogita_popular_post_section_title',
      'label'    => esc_html__( 'Popular Posts Section Title', 'blogita' ),
      'section'  => 'blogita_home_settings',
      'default'  => esc_html__( 'Popular Posts', 'blogita' ),
      'priority' => 10,
      'active_callback' => [
        [
          'setting'  => 'blogita_popular_post_switch',
          'operator' => '==',
          'value'    => true,
        ]
      ]
    ]
  );

  // Post Categories
  new \Kirki\Field\Checkbox_Switch(
    [
      'settings'    => 'blogita_post_category_switch',
      'label'       => esc_html__( 'Display Post Categories', 'blogita' ),
      'section'     => 'blogita_home_settings',
      'default'     => 'on',
      'choices'     => [
        'on'  => esc_html__( 'Enable', 'blogita' ),
        'off' => esc_html__( 'Disable', 'blogita' ),
      ],
    ]
  );
  new \Kirki\Field\Text(
    [
      'settings' => 'blogita_post_category_section_title',
      'label'    => esc_html__( 'Post Category Section Title', 'blogita' ),
      'section'  => 'blogita_home_settings',
      'default'  => esc_html__( 'Post Categories', 'blogita' ),
      'priority' => 10,
      'active_callback' => [
        [
          'setting'  => 'blogita_post_category_switch',
          'operator' => '==',
          'value'    => true,
        ]
      ]
    ]
  );

  // Recent Posts
  new \Kirki\Field\Checkbox_Switch(
    [
      'settings'    => 'blogita_recent_post_switch',
      'label'       => esc_html__( 'Display Recent Posts', 'blogita' ),
      'section'     => 'blogita_home_settings',
      'default'     => 'on',
      'choices'     => [
        'on'  => esc_html__( 'Enable', 'blogita' ),
        'off' => esc_html__( 'Disable', 'blogita' ),
      ],
    ]
  );
  new \Kirki\Field\Text(
    [
      'settings' => 'blogita_recent_post_section_title',
      'label'    => esc_html__( 'Recent Post Section Title', 'blogita' ),
      'section'  => 'blogita_home_settings',
      'default'  => esc_html__( 'Recent Posts', 'blogita' ),
      'priority' => 10,
      'active_callback' => [
        [
          'setting'  => 'blogita_recent_post_switch',
          'operator' => '==',
          'value'    => true,
        ]
      ]
    ]
  );


  // 
  // Footer Settings
  // 
  new \Kirki\Section(
    'blogita_footer_settings',
    [
      'title'       => esc_html__( 'Footer Settings', 'blogita' ),
      'panel'       => blogita_CUSTOMIZER_PANEL_ID,
      'priority'    => 165,
    ]
  );

  // Footer after logo text
  new \Kirki\Field\Textarea(
    [
      'settings' => 'blogita_footer_after_logo_text',
      'label'    => esc_html__( 'After Logo Text', 'blogita' ),
      'section'  => 'blogita_footer_settings',
      'priority' => 10,
    ]
  );

  // Footer Phone Number
  new \Kirki\Field\Text(
    [
      'settings' => 'blogita_footer_phone_number',
      'label'    => esc_html__( 'Phone Number', 'blogita' ),
      'section'  => 'blogita_footer_settings',
      'priority' => 10,
    ]
  );

  // Footer Email Address
  new \Kirki\Field\Text(
    [
      'settings' => 'blogita_footer_email',
      'label'    => esc_html__( 'Email Address', 'blogita' ),
      'section'  => 'blogita_footer_settings',
      'priority' => 10,
    ]
  );

  // Footer Location
  new \Kirki\Field\Text(
    [
      'settings' => 'blogita_footer_location',
      'label'    => esc_html__( 'Locateion', 'blogita' ),
      'section'  => 'blogita_footer_settings',
      'priority' => 10,
    ]
  );

  // Social Media
  new \Kirki\Field\URL(
    [
      'settings' => 'blogita_facebook_url',
      'label'    => esc_html__( 'Facebook URL', 'blogita' ),
      'section'  => 'blogita_footer_settings',
      'priority' => 10,
    ]
  );
  new \Kirki\Field\URL(
    [
      'settings' => 'blogita_twitter_url',
      'label'    => esc_html__( 'Twitter URL', 'blogita' ),
      'section'  => 'blogita_footer_settings',
      'priority' => 10,
    ]
  );
  new \Kirki\Field\URL(
    [
      'settings' => 'blogita_linkedin_url',
      'label'    => esc_html__( 'LinkedIn URL', 'blogita' ),
      'section'  => 'blogita_footer_settings',
      'priority' => 10,
    ]
  );
  new \Kirki\Field\URL(
    [
      'settings' => 'blogita_pinterest_url',
      'label'    => esc_html__( 'Pinterest URL', 'blogita' ),
      'section'  => 'blogita_footer_settings',
      'priority' => 10,
    ]
  );
  new \Kirki\Field\URL(
    [
      'settings' => 'blogita_youtube_url',
      'label'    => esc_html__( 'Youtube URL', 'blogita' ),
      'section'  => 'blogita_footer_settings',
      'priority' => 10,
    ]
  );
  new \Kirki\Field\URL(
    [
      'settings' => 'blogita_instagram_url',
      'label'    => esc_html__( 'Instagram URL', 'blogita' ),
      'section'  => 'blogita_footer_settings',
      'priority' => 10,
    ]
  );
  new \Kirki\Field\URL(
    [
      'settings' => 'blogita_github_url',
      'label'    => esc_html__( 'Github URL', 'blogita' ),
      'section'  => 'blogita_footer_settings',
      'priority' => 10,
    ]
  );

  // Footer Copyright text
  new \Kirki\Field\Editor(
    [
      'settings' => 'blogita_footer_copyright_text',
      'label'    => esc_html__( 'Copyright Text', 'blogita' ),
      'section'  => 'blogita_footer_settings',
      'priority' => 10,
    ]
  );

}

