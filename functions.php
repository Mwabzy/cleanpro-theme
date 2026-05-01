<?php
/**
 * WestFlush Services — functions.php
 */

function westflush_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ] );
    add_theme_support( 'custom-logo', array(
        'height'      => 80,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    register_nav_menus( [
        'primary' => __( 'Primary Menu', 'westflush' ),
        'footer'  => __( 'Footer Menu', 'westflush' ),
    ] );
}
add_action( 'after_setup_theme', 'westflush_setup' );


function westflush_enqueue() {
    $ver = wp_get_theme()->get( 'Version' );
    $uri = get_stylesheet_directory_uri();

    // Google Fonts
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap', [], null );

    // Main CSS
    wp_enqueue_style( 'westflush-main', $uri . '/css/main.css', [ 'google-fonts' ], $ver );
    wp_enqueue_style( 'westflush-style', get_stylesheet_uri(), [ 'westflush-main' ], $ver );

    // Main JS
    wp_enqueue_script( 'westflush-main', $uri . '/js/main.js', [], $ver, true );
}
add_action( 'wp_enqueue_scripts', 'westflush_enqueue' );


/**
 * Custom Post Type: Testimonials
 */
function westflush_register_cpts() {
    register_post_type( 'testimonial', [
        'labels'      => [
            'name'          => __( 'Testimonials', 'westflush' ),
            'singular_name' => __( 'Testimonial', 'westflush' ),
        ],
        'public'      => false,
        'show_ui'     => true,
        'menu_icon'   => 'dashicons-format-quote',
        'supports'    => [ 'title', 'editor', 'thumbnail' ],
    ] );
}
add_action( 'init', 'westflush_register_cpts' );


/**
 * Hero Carousel — Customizer Settings
 * Dashboard > Appearance > Customize > Hero Carousel Images
 */
function westflush_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'westflush_hero_slides', array(
        'title'    => 'Hero Carousel Images',
        'priority' => 30,
    ) );

    $slides = array(
        1 => 'Slide 1 — Professional Cleaning',
        2 => 'Slide 2 — Fumigation Services',
        3 => 'Slide 3 — Same-Day Booking',
    );

    foreach ( $slides as $i => $label ) {
        $wp_customize->add_setting( "hero_slide_{$i}_image", array(
            'default'           => 0,
            'transport'         => 'refresh',
            'sanitize_callback' => 'absint',
        ) );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, "hero_slide_{$i}_image", array(
            'label'     => $label,
            'section'   => 'westflush_hero_slides',
            'mime_type' => 'image',
        ) ) );
    }
}
add_action( 'customize_register', 'westflush_customize_register' );


/**
 * Video Showcase — Customizer Settings
 * Dashboard > Appearance > Customize > Video Showcase
 */
function westflush_video_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'westflush_videos', array(
        'title'    => 'Video Showcase',
        'priority' => 35,
    ) );

    for ( $i = 1; $i <= 3; $i++ ) {
        $wp_customize->add_setting( "video_{$i}_url", array(
            'default'           => '',
            'transport'         => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( "video_{$i}_url", array(
            'label'       => "Video {$i} — YouTube URL",
            'description' => 'Paste a YouTube video link (e.g. https://www.youtube.com/watch?v=XXXXX)',
            'section'     => 'westflush_videos',
            'type'        => 'url',
        ) );
    }
}
add_action( 'customize_register', 'westflush_video_customize_register' );


/**
 * Helper: format KES price
 */
function westflush_price( $amount ) {
    return 'KES ' . number_format( (int) $amount );
}
