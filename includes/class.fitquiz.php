<?php
class Fitquiz {

	private static $initiated = false;

	public static function init() {
		if ( ! self::$initiated ) {
			self::init_hooks();
		}
	}

	private static function init_hooks() {
		self::$initiated = true;

		add_action( 'wp_enqueue_scripts', array( 'Fitquiz', 'quizfit_load_styles' ) );
		add_action( 'wp_enqueue_scripts', array( 'Fitquiz', 'quizfit_enqueue_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( 'Fitquiz', 'quizfit_load_scripts' ) );

		add_action( 'admin_init', array( 'Fitquiz', 'fitquiz_register_settings' ) );
		add_action( 'admin_menu', array( 'Fitquiz', 'fitquiz_register_options_page' ) );
	}

	/**
	 * plugin settings
	 *
	 * @return void
	 */
	public static function fitquiz_register_settings() {
		add_option( 'fitquiz_url', 'API URL' );
		register_setting( 'fitquiz_options_group', 'fitquiz_url', 'myplugin_callback' );
	}

	public static function fitquiz_register_options_page() {
		add_options_page( 'Page Title', 'FitQuiz', 'manage_options', 'myplugin', array( 'Fitquiz', 'fitquiz_options_page' ) );
	}

	public static function fitquiz_options_page() {
		?>
		<div>
			<h2>FitQuiz Options</h2>
			<form method="post" action="options.php">
				<?php settings_fields( 'fitquiz_options_group' ); ?>

				<table>
				<tr valign="top">
				<th scope="row"><label for="fitquiz_url">Label</label></th>
				<td><input style="width: 350px;" type="text" id="fitquiz_url" name="fitquiz_url" value="<?php echo get_option( 'fitquiz_url' ); ?>" /></td>
				</tr>
				</table>
				<?php submit_button(); ?>
			</form>
		</div>
		<?php
	}

	public static function quizfit_load_styles() {
		if ( ! is_admin() ) {
			wp_register_style( 'quiz-css', plugin_dir_url( dirname( __FILE__ ) ) . 'css/layout/stylesheets/screen.css', array(), FIT_QUIZ_PLUGIN_VERSION );
		}
	}

	public static function quizfit_enqueue_scripts() {
		wp_register_script( 'quizfit-script', plugin_dir_url( dirname( __FILE__ ) ) . 'js/fitquiz.min.js', array( 'jquery' ), FIT_QUIZ_PLUGIN_VERSION );
		wp_register_script( 'fit_quiz_feedback_js', plugin_dir_url( __DIR__ ) . 'js/feedback-quiz.js', false, FIT_QUIZ_PLUGIN_VERSION, true );
	}

	/**
	 * LOCALIZE SCRIPTS
	 *
	 * @return void
	 */
	public static function quizfit_load_scripts() {
		global $post;
		$load_styles = false;

		// Confirm is single post has shortcode.
		if ( is_singular() && isset( $post->post_content ) && has_shortcode( $post->post_content, 'fitquiz' ) ) {
			$load_styles = true;
		}

		// Confirm if reviews category landing has shortcode.
		if ( is_category() && has_shortcode( get_term_meta( get_query_var( 'cat' ), 'review_category_subheadline', true ), 'fitquiz' ) ) {
			$load_styles = true;
		}


		wp_localize_script(
			'fit_quiz_feedback_js',
			'custom_vars',
			array(
				'admin_url' => admin_url(),
				'plugin_url' => plugin_dir_url( dirname( __FILE__ ) )
			)
		);

		if ( $load_styles ) {
			wp_localize_script(
				'quizfit-script',
				'custom_vars',
				array(
					'admin_url' => admin_url(),
					'plugin_url' => plugin_dir_url( dirname( __FILE__ ) )
				)
			);
			wp_enqueue_style( 'quiz-css' );
			wp_enqueue_style( 'quiz-css1' );
			// wp_enqueue_script( 'quizfit-script' );

			
		}
	}


	/**
	 * Function to create the shortcode
	 * [fitquiz quiz=quiz_slug]
	 *
	 * @param [type] $atts
	 * @return void
	 */
	public static function quizfit_shortcode_func( $atts ) {
		global $post;
		$quiz_id_shortcode = false;

		if ( isset( $atts['quiz'] ) || ! empty( $atts['quiz'] ) ) {
			$quiz_id_shortcode = $atts['quiz'];
		}

		if ( isset( $atts['quiz_id'] ) || ! empty( $atts['quiz_id'] ) ) {
			$quiz_id_shortcode = $atts['quiz_id'];
		}

		if ( $quiz_id_shortcode ) {

			$a = shortcode_atts(
				array(
					'quiz_id'      => $quiz_id_shortcode,
					'extradata'    => ( isset( $atts['extradata'] ) ? $atts['extradata'] : '' ),
					'border'       => null,
					'border_color' => null,
					'border_size'  => '4',
					'display'      => null,
				),
				$atts
			);

			if ( ! empty( $a['display'] ) ) {
				$display = $a['display'];
			} else {
				$display = null;
			}

			$quiz_id = $a['quiz_id'];

			if ( $a['extradata'] ) {
				$extradata = $a['extradata'];
			} else {
				$extradata = null;
			}

			$border = $a['border'];

			if ( is_numeric( $a['border_size'] ) ) {
				$border_size = $a['border_size'];
			}

			switch ( $a['border_color'] ) {
				case 'blue':
					$border_color = '#0049E5';
					break;
				case 'orange':
					$border_color = '#EA8700';
					break;
				default:
					$border_color = '#666666';
					break;
			}

			$api = new Fitquiz_api();

			$t = $api->get_quiz_by_id( $quiz_id, $border, $border_color, $border_size, $display );

			$quiz = json_decode( $api->get_quiz_by_id( $quiz_id, $border, $border_color, $border_size, $display ) );
			if ( !is_object($quiz) ) {
				if ( current_user_can('edit_post', $post->ID) ) {
					$html  = '<div class="alert alert-danger" role="alert">Quiz not found! Please check quiz_id or quiz application settings.</div>';
					return $html;
				}
			}
			// create the view for analytics
			$view_id = json_decode( $api->add_view( $quiz->quiz_id, $extradata ) )->view_id;

			$show = new Fitquiz_show();
			return $show->quiz( $quiz, $view_id, $quiz_id, $extradata, $border, $border_color, $border_size, $display );

		} else {
			return;
		}
	}

}
