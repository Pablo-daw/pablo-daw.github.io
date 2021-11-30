<?php

/**
 * Set a constant that holds the theme's minimum supported PHP version.
 */
define( 'JEWELRIFY_MIN_PHP_VERSION', '5.6' );

/**
 * Immediately after theme switch is fired we we want to check php version and
 * revert to previously active theme if version is below our minimum.
 */
add_action( 'after_switch_theme', 'jewelrify_test_for_min_php' );

/**
 * Switches back to the previous theme if the minimum PHP version is not met.
 */
function jewelrify_test_for_min_php() {

	// Compare versions.
	if ( version_compare( PHP_VERSION, JEWELRIFY_MIN_PHP_VERSION, '<' ) ) {
		// Site doesn't meet themes min php requirements, add notice...
		add_action( 'admin_notices', 'jewelrify_min_php_not_met_notice' );
		// ... and switch back to previous theme.
		switch_theme( get_option( 'theme_switched' ) );
		return false;

	};
}

if ( ! function_exists( 'wp_body_open' ) ) {
        function wp_body_open() {
                do_action( 'wp_body_open' );
        }
}

/**
 * An error notice that can be displayed if the Minimum PHP version is not met.
 */
function jewelrify_min_php_not_met_notice() {
	?>
	<div class="notice notice-error is_dismissable">
		<p>
			<?php esc_html_e( 'You need to update your PHP version to run this theme.', 'jewelrify' ); ?> <br />
			<?php
			printf(
				/* translators: 1 is the current PHP version string, 2 is the minmum supported php version string of the theme */
				esc_html__( 'Actual version is: %1$s, required version is: %2$s.', 'jewelrify' ),
				PHP_VERSION,
				JEWELRIFY_MIN_PHP_VERSION
			); // phpcs: XSS ok.
			?>
		</p>
	</div>
	<?php
}

if ( ! function_exists( 'jewelrify_widgets_init' ) ) :
	/**
	 *	widgets-init action handler. Used to register widgets and register widget areas
	 */
	function jewelrify_widgets_init() {
		
		// Register Header Widget
		register_sidebar( array (
						'name'	 		 =>	 __( 'Header Widget Area', 'jewelrify' ),
						'id'		 	 =>	 'header-widget-area',
						'description'	 =>  __( 'The header widget area', 'jewelrify' ),
						'before_widget'	 =>  '',
						'after_widget'	 =>  '',
						'before_title'	 =>  '<h3>',
						'after_title'	 =>  '</h3>',
					) );
	}
endif; // jewelrify_widgets_init
add_action( 'widgets_init', 'jewelrify_widgets_init' );

if ( ! function_exists( 'jewelrify_fonts_url' ) ) :
	/**
	 *	Load google font url used in the jewelrify theme
	 */
	function jewelrify_fonts_url() {

	    $fonts_url = '';
	 
	    /* Translators: If there are characters in your language that are not
	    * supported by Rubik, translate this to 'off'. Do not translate
	    * into your own language.
	    */
	    $fontname = _x( 'on', 'Rubik font: on or off', 'jewelrify' );

	    if ( 'off' !== $fontname ) {
	        $font_families = array();
	 
	        $font_families[] = 'Rubik';
	 
	        $query_args = array(
	            'family' => urlencode( implode( '|', $font_families ) ),
	            'subset' => urlencode( 'latin,latin-ext' ),
	        );
	 
	        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	    }
	 
	    return $fonts_url;
	}
endif; // jewelrify_fonts_url

if ( ! function_exists( 'jewelrify_load_css_and_scripts' ) ) :

	function jewelrify_load_css_and_scripts() {

		wp_enqueue_style( 'jewelrify-stylesheet', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'jewelrify-child-style', get_stylesheet_uri(), array( 'jewelrify-stylesheet' ) );

		wp_enqueue_style( 'jewelrify-fonts', jewelrify_fonts_url(), array(), null );

		// Load Slider JS Scripts
		wp_enqueue_script( 'pgwslideshow',
			get_stylesheet_directory_uri() . '/assets/js/pgwslideshow.js', array( 'jquery' ) );

		wp_enqueue_script( 'jewelrify-utilities-js',
			get_stylesheet_directory_uri() . '/assets/js/utilities.js',
			array( 'jquery', 'pgwslideshow' ) );
	}

endif; // jewelrify_load_css_and_scripts
add_action( 'wp_enqueue_scripts', 'jewelrify_load_css_and_scripts' );

if ( ! function_exists( 'jewelrify_display_slider' ) ) :
	/**
	 * Displays the slider
	 */
	function jewelrify_display_slider() {
?>
		<ul class="pgwSlideshow">
			<?php
					// display slides
					for ( $i = 1; $i <= 5; ++$i ) {
						
						$defaultSlideImage = get_stylesheet_directory_uri().'/assets/img/' . $i .'.jpg';

						$slideImage = get_theme_mod( 'jewelrify_slide'.$i.'_image', $defaultSlideImage );
			?>
								<li>
									<img src="<?php echo esc_attr( $slideImage ); ?>" />
								</li>
			<?php
					} // end of for
?>
		</ul><!-- .pgwSlideshow -->
<?php 
	}
endif; // jewelrify_display_slider

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function jewelrify_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'jewelrify_skip_link_focus_fix' );

if ( ! function_exists( 'jewelrify_sanitize_checkbox' ) ) :
	/**
	 * Checkbox sanitization callback example.
	 * 
	 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
	 * as a boolean value, either TRUE or FALSE.
	 *
	 * @param bool $checked Whether the checkbox is checked.
	 * @return bool Whether the checkbox is checked.
	 */
	function jewelrify_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
endif; // End of jewelrify_sanitize_checkbox

if ( ! function_exists( 'jewelrify_show_social_sites' ) ) :

	function jewelrify_show_social_sites() {

		$socialURL = get_theme_mod('jewelrify_social_facebook');
		if ( !empty($socialURL) ) {

			echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . esc_attr( __('Follow us on Facebook', 'jewelrify') ) . '" class="facebook32"></a>';
		}

		$socialURL = get_theme_mod('jewelrify_social_twitter');
		if ( !empty($socialURL) ) {

			echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . esc_attr( __('Follow us on Twitter', 'jewelrify') ) . '" class="twitter32"></a>';
		}

		$socialURL = get_theme_mod('jewelrify_social_instagram');
		if ( !empty($socialURL) ) {

			echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . esc_attr( __('Follow us on Instagram', 'jewelrify') ) . '" class="instagram32"></a>';
		}

		$socialURL = get_theme_mod('jewelrify_social_rss');
		if ( !empty($socialURL) ) {

			echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . esc_attr( __('Follow our RSS Feeds', 'jewelrify') ) . '" class="rss32"></a>';
		}
	}
endif; // jewelrify_show_social_sites

if ( ! function_exists( 'jewelrify_customize_register' ) ) :

	/**
	 * Register theme settings in the customizer
	 */
	function jewelrify_customize_register( $wp_customize ) {

		/**
		 * Add Slider Section
		 */
		$wp_customize->add_section(
			'jewelrify_slider_section',
			array(
				'title'       => __( 'Slider', 'jewelrify' ),
				'capability'  => 'edit_theme_options',
			)
		);
		
		// Add display slider option
		$wp_customize->add_setting(
				'jewelrify_slider_display',
				array(
						'default'           => 0,
						'sanitize_callback' => 'jewelrify_sanitize_checkbox',
				)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'jewelrify_slider_display',
								array(
									'label'          => __( 'Display Slider on a Static Front Page', 'jewelrify' ),
									'section'        => 'jewelrify_slider_section',
									'settings'       => 'jewelrify_slider_display',
									'type'           => 'checkbox',
								)
							)
		);

		for ($i = 1; $i <= 5; ++$i) {
		
			$slideImageId = 'jewelrify_slide'.$i.'_image';
			$defaultSliderImagePath = get_stylesheet_directory_uri().'/assets/img/'.$i.'.jpg';
			
			// Add Slide Background Image
			$wp_customize->add_setting( $slideImageId,
				array(
					'default' => $defaultSliderImagePath,
					'sanitize_callback' => 'esc_url_raw'
				)
			);

			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $slideImageId,
					array(
						'label'   	 => sprintf( esc_html__( 'Slide #%s Image', 'jewelrify' ), $i ),
						'section' 	 => 'jewelrify_slider_section',
						'settings'   => $slideImageId,
					) 
				)
			);
		}

		/**
		 * Add Social Sites Section
		 */
		$wp_customize->add_section(
			'jewelrify_social_section',
			array(
				'title'       => __( 'Social Sites', 'jewelrify' ),
				'capability'  => 'edit_theme_options',
			)
		);
		
		// Add facebook url
		$wp_customize->add_setting(
			'jewelrify_social_facebook',
			array(
			    'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'jewelrify_social_facebook',
	        array(
	            'label'          => __( 'Facebook Page URL', 'jewelrify' ),
	            'section'        => 'jewelrify_social_section',
	            'settings'       => 'jewelrify_social_facebook',
	            'type'           => 'text',
	            )
	        )
		);

		// Add Twitter url
		$wp_customize->add_setting(
			'jewelrify_social_twitter',
			array(
			    'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'jewelrify_social_twitter',
	        array(
	            'label'          => __( 'Twitter URL', 'jewelrify' ),
	            'section'        => 'jewelrify_social_section',
	            'settings'       => 'jewelrify_social_twitter',
	            'type'           => 'text',
	            )
	        )
		);

		// Add Instagram url
		$wp_customize->add_setting(
			'jewelrify_social_instagram',
			array(
			    'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'jewelrify_social_instagram',
	        array(
	            'label'          => __( 'LinkedIn URL', 'jewelrify' ),
	            'section'        => 'jewelrify_social_section',
	            'settings'       => 'jewelrify_social_instagram',
	            'type'           => 'text',
	            )
	        )
		);

		// Add RSS Feeds url
		$wp_customize->add_setting(
			'jewelrify_social_rss',
			array(
			    'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'jewelrify_social_rss',
	        array(
	            'label'          => __( 'RSS Feeds URL', 'jewelrify' ),
	            'section'        => 'jewelrify_social_section',
	            'settings'       => 'jewelrify_social_rss',
	            'type'           => 'text',
	            )
	        )
		);
	}
endif; // jewelrify_customize_register
add_action('customize_register', 'jewelrify_customize_register');

if ( ! class_exists( 'jewelrify_Customize' ) ) :
	/**
	 * Singleton class for handling the theme's customizer integration.
	 */
	final class jewelrify_Customize {

		// Returns the instance.
		public static function get_instance() {

			static $instance = null;

			if ( is_null( $instance ) ) {
				$instance = new self;
				$instance->setup_actions();
			}

			return $instance;
		}

		// Constructor method.
		private function __construct() {}

		// Sets up initial actions.
		private function setup_actions() {

			// Register panels, sections, settings, controls, and partials.
			add_action( 'customize_register', array( $this, 'sections' ) );

			// Register scripts and styles for the controls.
			add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
		}

		// Sets up the customizer sections.
		public function sections( $manager ) {

			// Load custom sections.

			// Register custom section types.
			$manager->register_section_type( 'hospitallight_Customize_Section_Pro' );

			// Register sections.
			$manager->add_section(
				new hospitallight_Customize_Section_Pro(
					$manager,
					'jewelrify',
					array(
						'title'    => esc_html__( 'JewelrifyPro', 'jewelrify' ),
						'pro_text' => esc_html__( 'Upgrade', 'jewelrify' ),
						'pro_url'  => esc_url( 'https://customizablethemes.com/product/jewelrifypro' )
					)
				)
			);
		}

		// Loads theme customizer CSS.
		public function enqueue_control_scripts() {

			wp_enqueue_script( 'hospitallight-customize-controls', trailingslashit( get_template_directory_uri() ) . 'assets/js/customize-controls.js', array( 'customize-controls' ) );

			wp_enqueue_style( 'hospitallight-customize-controls', trailingslashit( get_template_directory_uri() ) . 'assets/css/customize-controls.css' );
		}
	}
endif; // jewelrify_Customize

// Doing this customizer thang!
jewelrify_Customize::get_instance();

/**
 * Remove Parent theme Customize Up-Selling Section
 */
if ( ! function_exists( 'jewelrify_remove_parent_theme_upsell_section' ) ) :

	function jewelrify_remove_parent_theme_upsell_section( $wp_customize ) {

		// Remove Parent-Theme Upsell section
		$wp_customize->remove_section('hospitallight');
	}

endif; // jewelrify_remove_parent_theme_upsell_section
add_action( 'customize_register', 'jewelrify_remove_parent_theme_upsell_section', 100 );

if ( ! function_exists( 'jewelrify_setup' ) ) :
	/**
	 * jewelrify setup.
	 *
	 * Set up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support post thumbnails.
	 *
	 */
	function jewelrify_setup() {

		// Define and register starter content to showcase the theme on new sites.
		$starter_content = array(

			'widgets' => array(
				'sidebar-widget-area' => array(
					'search',
					'recent-posts',
					'categories',
					'archives',
				),

				'header-widget-area' => array(
					'text_about'
				),


			),

			'posts' => array(
				'home',
				'blog',
				'about',
				'contact'
			),

			// Default to a static front page and assign the front and posts pages.
			'options' => array(
				'show_on_front' => 'page',
				'page_on_front' => '{{home}}',
				'page_for_posts' => '{{blog}}',
			),

			// Set the front page section theme mods to the IDs of the core-registered pages.
			'theme_mods' => array(
				'jewelrify_slider_display' => 1,
				'jewelrify_slide1_image' => esc_url( get_stylesheet_directory_uri() . '/assets/img/1.jpg' ),
				'jewelrify_slide2_image' => esc_url( get_stylesheet_directory_uri() . '/assets/img/2.jpg' ),
				'jewelrify_slide3_image' => esc_url( get_stylesheet_directory_uri() . '/assets/img/3.jpg' ),
				'jewelrify_slide4_image' => esc_url( get_stylesheet_directory_uri() . '/assets/img/4.jpg' ),
				'jewelrify_slide5_image' => esc_url( get_stylesheet_directory_uri() . '/assets/img/5.jpg' ),
				'jewelrify_social_facebook' => _x( '#', 'Theme starter content', 'jewelrify' ),
				'jewelrify_social_twitter' => _x( '#', 'Theme starter content', 'jewelrify' ),
				'jewelrify_social_instagram' => _x( '#', 'Theme starter content', 'jewelrify' ),
				'jewelrify_social_rss' => _x( '#', 'Theme starter content', 'jewelrify' ),
			),

			'nav_menus' => array(

				// Assign a menu to the "primary" location.
				'primary' => array(
					'name' => __( 'Primary Menu', 'jewelrify' ),
					'items' => array(
						'link_home',
						'page_blog',
						'page_contact',
						'page_about',
					),
				),

				// Assign a menu to the "footer" location.
				'footer' => array(
					'name' => __( 'Footer Menu', 'jewelrify' ),
					'items' => array(
						'link_home',
						'page_blog',
						'page_contact',
						'page_about',
					),
				),
			),
		);

		$starter_content = apply_filters( 'jewelrify_starter_content', $starter_content );
		add_theme_support( 'starter-content', $starter_content );	
	}
endif; // jewelrify_setup
add_action( 'after_setup_theme', 'jewelrify_setup' );