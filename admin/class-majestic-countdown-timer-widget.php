<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://hassan-raza.com/
 * @since      1.0.0
 *
 * @package    Majestic_Countdown_Timer
 * @subpackage Majestic_Countdown_Timer/admin
 */

/**
 * Majestic Countdown Timer Widget Class
 *
 * @package    Majestic_Countdown_Timer
 * @subpackage Majestic_Countdown_Timer/admin
 * @author     M Hassan Raza <hassanazmy@gmail.com>
 */
class Majestic_Countdown_Timer_Widget extends WP_Widget {
	public $widget_name;

	/**
	 * public constructor function.
	 *
	 * @since   1.0.0
	 */
	public function __construct() {
		$this->widget_name = 'countdown-timer';
		parent::__construct(
			'Majestic_Countdown_Timer_Widget', // Base ID
			esc_html__( 'Majestic Countdown Timer', 'majestic-countdown-timer' ), // Name
			array(
				'description' => esc_html__( 'This widget displays countdown timer in sidebar.', 'majestic-countdown-timer' )
			) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 * @see WP_Widget::widget()
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {

		extract( $args );
		extract( $instance );

		$title = apply_filters( 'widget_title', $title );

		//echo $before_widget;
		?>
		<?php
		echo ( $title ) ? $before_title . $title . $after_title : false;
		?>

		<div class="countdown-wrap">

			<div class="clock"></div>

			<form action="" id="countdown-settings">
				<div class="countdown-labels">
					<label class="selection-label"
					       for="hours"><?php esc_html_e( 'Hours', 'majestic-countdown-timer' ); ?></label>
					<label class="selection-label"
					       for="minutes"><?php esc_html_e( 'Minutes', 'majestic-countdown-timer' ); ?></label>
					<label class="selection-label"
					       for="seconds"><?php esc_html_e( 'Seconds', 'majestic-countdown-timer' ); ?></label>
				</div>
				<div class="countdown-inputs">
					<input type="number" name="hours" class="selection-input" id="hours" value="0" min="0" max="24">
					<input type="number" name="minutes" class="selection-input" id="minutes" value="0" min="0" max="60">
					<input type="number" name="seconds" class="selection-input" id="seconds" value="0" min="0" max="60">
				</div>

				<button id="countdown-start"
				        class="green-color mid-button default-btn countdown-start"><?php esc_html_e( 'Start Clock', 'majestic-countdown-timer' ); ?></button>
				<div class="ticking-control">
					<label><?php esc_html_e( 'Ticking', 'majestic-countdown-timer' ); ?></label>
			        <span class="ticking-wrap">
			            <span class="ticking-btn"><?php esc_html_e( 'On', 'majestic-countdown-timer' ); ?></span>
		            </span>
				</div>
			</form>

		</div>
		<?php
		//echo $after_widget;
	}

	/**
	 * Back-end widget form.
	 * @see     WP_Widget::form()
	 *
	 * @param   array $instance Previously saved values from database.
	 *
	 * @return  null
	 * @since   1.0.0
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array(
				'title' => ''
			)
		);

		extract( $instance );
		?>
		<p>
			<label
				for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title', 'majestic-countdown-timer' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
			       name="<?php echo $this->get_field_name( 'title' );
			       ?>" type="text" value="<?php echo $instance[ 'title' ]; ?>"/>
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 * @see     WP_Widget::update()
	 *
	 * @param   array $new_instance Values just sent to be saved.
	 * @param   array $old_instance Previously saved values from database.
	 *
	 * @return  array Updated safe values to be saved.
	 * @since   1.0.0
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance[ 'title' ] = $new_instance[ 'title' ];

		return $instance;
	}
}

/* register widget */
if ( ! function_exists( 'register_majestic_countdown_timer_widgets' ) ) {
	function register_majestic_countdown_timer_widgets() {
		register_widget( 'Majestic_Countdown_Timer_Widget' );
	}
}
add_action( 'widgets_init', 'register_majestic_countdown_timer_widgets' );