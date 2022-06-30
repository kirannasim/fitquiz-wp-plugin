<?php

/**
 *  Fit Quiz Show Template
 */
class Fitquiz_show {

	public function quiz( $quiz, $view_id, $quiz_id, $extradata = null, $border, $border_color, $border_size, $display = null ) {

		// print_r($quiz);exit();
		$quiz_id          = $quiz->quiz_id;
		$quiz_show_header = $quiz->quiz_show_header;
		$quiz_header      = $quiz->quiz_header;
		$display_title    = $quiz->display_title;
		$description      = $quiz->description;

		if ( $quiz->calculator == 1 ) {

			if ( $this->get_file_extension( $quiz->slug ) == 'php' ) {
				$tpl = 'templates/' . $quiz->slug;
				$script = plugin_dir_url( __DIR__ ) . 'js/' . str_replace( '.php', '', $quiz->slug) . '.js';
			} else {
				$tpl = 'templates/' . $quiz->slug . '.php';
				$script = plugin_dir_url( __DIR__ ) . 'js/' . $quiz->slug . '.js';
			}

			if ( in_array( 
					$quiz->slug, 
					array( 
						'pto-calculator', 
						'equipment-lease-calculator', 
						'fte-calculator', 
						'hourly-pay-calculator', 
						'mortgage-calculator-with-amortization', 
						'overtime-pay-calculator', 
						'overtime-calculator', 
						'section-179-calculator' 
					) 
				) 
			) {
				wp_enqueue_script( 'jquery-ui-core' );
				wp_enqueue_script( 'jquery-ui-slider' );
				wp_enqueue_script( 'jquery-ui-datepicker' );
				wp_enqueue_style( 'jquery-ui-slider', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css', false, '1.12.1' );				
			}
			
			wp_enqueue_script( 'fit_quiz_calc_js', $script, array( 'jquery' ), FIT_QUIZ_PLUGIN_VERSION, true );
		} else {

		

			$tpl       = 'templates/quiz.php';
			$questions = $quiz->questions;

			// Unserialize Question Options array and setup variables.
			$i = 0;
			if ( $questions ) {
				foreach ( $questions as $question ) {
					$options       = unserialize( $question->options );
					$question_type = $question->type;
					if ( 'n' == $question_type ) {
						$questions[ $i ]->numeric_options_min = $options['min'];
						$questions[ $i ]->numeric_options_max = $options['max'];
					} elseif ( 'r' == $question_type ) {
						$questions[ $i ]->radio_button_options = explode( PHP_EOL, $options['radio_button_options'] );
					} elseif ("f" == $question_type || "w" == $question_type ) {
						$questions[ $i ]->feedback_options = explode( PHP_EOL, $options['feedback_options'] );
						$questions[ $i ]->feedback_option_correct = explode( PHP_EOL, $options['feedback_option_correct'] );
						$questions[ $i ]->feedback_explain = explode( PHP_EOL, $options['feedback_explain'] );
					}elseif ( 's' == $question_type ) {
						$questions[ $i ]->select_options = explode( PHP_EOL, $options['select_options'] );
					} elseif ( 'u' == $question_type ) {
						$questions[ $i ]->select_options = explode( PHP_EOL, $options['select_options'] );
					} elseif ( 't' == $question_type ) {
						$questions[ $i ]->text_input_placeholder = $options['placeholder'];
						$questions[ $i ]->text_input_max_length  = $options['max_length'];
					} elseif ( 'b' == $question_type ) {
						$questions[ $i ]->checkbox_button_options = explode( PHP_EOL, $options['checkbox_button_options'] );
					} elseif ( 'k' == $question_type ) {
						$questions[ $i ]->rank_button_options = explode( PHP_EOL, $options['rank_button_options'] );
					}

					// retirement calculator options
					if ( isset( $options['rc_placeholder'] ) ) {
						$questions[ $i ]->rc_placeholder = $options['rc_placeholder'];
					}
					if ( isset( $options['rc_default'] ) ) {
						  $questions[ $i ]->rc_default = $options['rc_default'];
					}

					$i++;
				}
				// jumper here
				$jumper = '';
				$rules  = array();
				$has_feedback = false;
				foreach ($questions as $question) {

					if ( 'f' === $question->type || 'w' === $question->type ) {
						$has_feedback = true;						
					} 
				}
				$jumper = $jumper;

			}
		}

		if ( $has_feedback ) {

			wp_enqueue_script( 'fit_quiz_feedback_js' );
		} else {
			wp_enqueue_script( 'fit_quiz_js', plugin_dir_url( __DIR__ ) . 'js/quiz.min.js', false, FIT_QUIZ_PLUGIN_VERSION, true );
			wp_enqueue_script( 'quizfit-script' );
		}
		ob_start();
		// Modal View
		if ( $display == 'modal' ) {
			include FITQUIZ_DIR . 'templates/modal/modal_header.php';
			include FITQUIZ_DIR . $tpl;
			include FITQUIZ_DIR . 'templates/modal/modal_footer.php';
		} else {
			include FITQUIZ_DIR . $tpl;
		}
		$content = ob_get_clean();
		return $content;
	}

	public function show_results( $response ) {
		$results = json_decode( $response, true );

		$data = $results['message'];

		$quiz          = $data['quiz'];
		$questions     = $data['questions'];
		$html          = $data['html'];
		$result				 = $data['result'];
		$score				 = isset($data['score']) ? $data['score'] : [];
		$gotolinklabel = $data['gotolinklabel'];
		$gotolink      = $data['gotolink'];
		$productlogo   = $data['productlogo'];
		$nomatch       = $data['nomatch'];
		$has_feedback  = $data['has_feedback'];
		$rf_answers_score = isset($data['rf_answers_score']) ? $data['rf_answers_score'] : '';
		$rf_score_class = isset($data['rf_score_class']) ? $data['rf_score_class'] : '';
		
		ob_start();
		include FITQUIZ_DIR . 'templates/submit.php';
		$content = ob_get_clean();

		return $content;
	}

	protected function get_file_extension( $file_name ) {
		return substr( strrchr( $file_name, '.' ), 1 );
	}
}


