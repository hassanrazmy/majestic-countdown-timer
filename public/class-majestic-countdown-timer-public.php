<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://hassan-raza.com/
 * @since      1.0.0
 *
 * @package    Majestic_Countdown_Timer
 * @subpackage Majestic_Countdown_Timer/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Majestic_Countdown_Timer
 * @subpackage Majestic_Countdown_Timer/public
 * @author     M Hassan Raza <hassanazmy@gmail.com>
 */
class Majestic_Countdown_Timer_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/majestic-countdown-timer-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script(
			$this->plugin_name,
			plugin_dir_url( __FILE__ ) . 'js/majestic-countdown-timer-public.js',
			array( 'jquery' ),
			$this->version,
			false
		);

		wp_localize_script(
			$this->plugin_name,
			'majesticStrings',
			array(
				'MW_URL' => plugin_dir_url( __FILE__ ),
				'tickingOnText' => esc_html__( 'On', 'majestic-countdown-timer' ),
				'tickingOffText' => esc_html__( 'Off', 'majestic-countdown-timer' )
			)
		);

	}

    /**
     * Register countdown timer shortcodes
     *
     * @since   1.0.0
     */
    public function majesic_countdown_timer_shortcodes() {
        add_shortcode( 'countdown-timer', array( $this, 'majesic_countdown_timer_contents') );
    }

    /**
     * Display timer in post or pages content
     *
     * @since   1.0.0
     * @param   array   $attributes     Array of attributes
     * @return  string  generated html by shortcode
     */
    public function majestic_countdown_timer_contents( $attributes ) {

	    // TODO: Work in progress
	    ////////////////////////////////////
        extract( shortcode_atts( array(
            'count' => -1,
            'filter' => null,
            'id' => null,
        ), $attributes ) );

        $filter_array = array();

        if ( ! empty ( $filter ) ) {
            $filter_array = explode( ',', $filter );
        }

        ob_start();

        return ob_get_clean();
		/////////////////////////////////////
    }

}
