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
 * Hero Carousel — Dashboard Admin Page
 * Dashboard > Hero Carousel
 */
function westflush_carousel_menu() {
    add_menu_page(
        __( 'Hero Carousel', 'westflush' ),
        __( 'Hero Carousel', 'westflush' ),
        'manage_options',
        'westflush-carousel',
        'westflush_carousel_admin_page',
        'dashicons-format-gallery',
        25
    );
}
add_action( 'admin_menu', 'westflush_carousel_menu' );

function westflush_carousel_settings_init() {
    register_setting( 'westflush_carousel_group', 'westflush_hero_slides', array(
        'sanitize_callback' => 'westflush_sanitize_slides',
    ) );
}
add_action( 'admin_init', 'westflush_carousel_settings_init' );

function westflush_sanitize_slides( $input ) {
    $clean = array();
    if ( is_array( $input ) ) {
        foreach ( $input as $key => $val ) {
            $clean[ (int) $key ] = absint( $val );
        }
    }
    return $clean;
}

function westflush_carousel_enqueue( $hook ) {
    if ( 'toplevel_page_westflush-carousel' !== $hook ) return;
    wp_enqueue_media();
    wp_enqueue_script(
        'westflush-carousel-admin',
        get_stylesheet_directory_uri() . '/js/carousel-admin.js',
        array( 'jquery' ),
        wp_get_theme()->get( 'Version' ),
        true
    );
}
add_action( 'admin_enqueue_scripts', 'westflush_carousel_enqueue' );

function westflush_carousel_admin_page() {
    if ( ! current_user_can( 'manage_options' ) ) return;

    $saved  = get_option( 'westflush_hero_slides', array() );
    $labels = array(
        1 => 'Slide 1 — Professional Cleaning',
        2 => 'Slide 2 — Certified Fumigation',
        3 => 'Slide 3 — Same-Day Booking',
    );
    ?>
    <div class="wrap">
        <h1><?php esc_html_e( 'Hero Carousel Images', 'westflush' ); ?></h1>
        <p style="color:#555;">Upload photos for the homepage hero carousel. Recommended: <strong>800 × 420 px</strong> or larger (landscape).</p>

        <?php if ( isset( $_GET['settings-updated'] ) ) : ?>
            <div class="notice notice-success is-dismissible"><p><strong>Carousel images saved successfully!</strong></p></div>
        <?php endif; ?>

        <form method="post" action="options.php">
            <?php settings_fields( 'westflush_carousel_group' ); ?>
            <table class="form-table" style="max-width:720px;">
                <?php foreach ( $labels as $i => $label ) :
                    $img_id  = isset( $saved[ $i ] ) ? (int) $saved[ $i ] : 0;
                    $img_src = $img_id ? wp_get_attachment_image_url( $img_id, 'medium' ) : '';
                ?>
                <tr style="border-bottom:1px solid #eee;">
                    <th scope="row" style="width:210px;vertical-align:top;padding-top:18px;">
                        <?php echo esc_html( $label ); ?>
                    </th>
                    <td style="padding-bottom:20px;">
                        <div class="wf-slide-row" style="display:flex;align-items:flex-start;gap:20px;">
                            <div class="wf-preview" style="width:190px;height:115px;background:#f0f0f0;border:2px dashed #bbb;border-radius:8px;overflow:hidden;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <?php if ( $img_src ) : ?>
                                    <img src="<?php echo esc_url( $img_src ); ?>" style="width:100%;height:100%;object-fit:cover;">
                                <?php else : ?>
                                    <span style="color:#999;font-size:11px;text-align:center;line-height:1.6;">No image<br>selected</span>
                                <?php endif; ?>
                            </div>
                            <div style="display:flex;flex-direction:column;gap:10px;padding-top:10px;">
                                <input type="hidden"
                                    name="westflush_hero_slides[<?php echo $i; ?>]"
                                    value="<?php echo esc_attr( $img_id ? $img_id : '' ); ?>"
                                    class="wf-img-id">
                                <button type="button" class="button button-primary wf-upload">
                                    <?php echo $img_id ? 'Change Image' : 'Upload / Select Image'; ?>
                                </button>
                                <button type="button" class="button wf-remove"
                                    style="color:#cc0000;<?php echo $img_id ? '' : 'display:none;'; ?>">
                                    &#10005; Remove Image
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php submit_button( 'Save Carousel Images' ); ?>
        </form>
    </div>
    <?php
}


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
