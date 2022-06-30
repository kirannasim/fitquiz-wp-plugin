<?php
/**
* Plugin Name: Fit Quiz
* Plugin URI: https://fitsmallbusiness.com
* Description: Adds a Fit Quiz Shortcode
* Version: 0.1.6
* Author: Fit Small Business
* Author URI: https://fitsmallbusiness.com
* License: Private
*/




/**
 * Define constant for script versions
 */
define('FIT_QUIZ_PLUGIN_VERSION', '0.1.64');

if ( !function_exists( 'add_action' ) ) {
  exit;
}

define( 'FITQUIZ_DIR', plugin_dir_path( __FILE__ ) );

require_once( FITQUIZ_DIR . 'includes/class.fitquiz.php' );
require_once( FITQUIZ_DIR . 'includes/class.fitquiz.api.php' );
require_once( FITQUIZ_DIR . 'includes/class.fitquiz.show.php' );
require_once( FITQUIZ_DIR . 'includes/class.fitquiz.ajax.php' );

// load css
add_action( 'init', array( 'Fitquiz', 'init' ) );

// shortcode
add_shortcode( 'fitquiz', array( 'Fitquiz', 'quizfit_shortcode_func' ) );

// ajax
// add_action( 'init', array( 'Fitquiz_ajax', 'init' ) );


