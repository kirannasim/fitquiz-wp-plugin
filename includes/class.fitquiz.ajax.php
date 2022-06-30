<?php

add_action( 'wp_ajax_nopriv_quiz_start', 'fitquiz_ajax_quiz_start', 10, 1 );
add_action( 'wp_ajax_quiz_start', 'fitquiz_ajax_quiz_start', 10, 1 );

add_action( 'wp_ajax_nopriv_quiz_retake', 'fitquiz_ajax_quiz_retake', 10, 1 );
add_action( 'wp_ajax_quiz_retake', 'fitquiz_ajax_quiz_retake', 10, 1 );

add_action( 'wp_ajax_nopriv_quiz_submit', 'fitquiz_ajax_quiz_submit', 10, 1 );
add_action( 'wp_ajax_quiz_submit', 'fitquiz_ajax_quiz_submit', 10, 1 );

add_action( 'wp_ajax_nopriv_retirement_submit', 'fitquiz_ajax_retirement_submit', 10, 1 );
add_action( 'wp_ajax_retirement_submit', 'fitquiz_ajax_retirement_submit', 10, 1 );

add_action( 'wp_ajax_nopriv_credit_card_submit', 'fitquiz_ajax_credit_card_submit', 10, 1 );
add_action( 'wp_ajax_credit_card_submit', 'fitquiz_ajax_credit_card_submit', 10, 1 );

add_action( 'wp_ajax_nopriv_quiz_question', 'fitquiz_ajax_quiz_question', 10, 1 );
add_action( 'wp_ajax_quiz_question', 'fitquiz_ajax_quiz_question', 10, 1 );


add_action( 'wp_ajax_nopriv_quiz_submit_calculator', 'fitquiz_ajax_quiz_submit_calculator', 10, 1 );
add_action( 'wp_ajax_quiz_submit_calculator', 'fitquiz_ajax_quiz_submit_calculator', 10, 1 );


add_action( 'wp_ajax_nopriv_submit_calculator', 'fitquiz_ajax_submit_calculator', 10, 1 );
add_action( 'wp_ajax_submit_calculator', 'fitquiz_ajax_submit_calculator', 10, 1 );

function fitquiz_ajax_submit_calculator() {
	$data     = $_POST['data'];
	$api      = new Fitquiz_api();
	$response = $api->submit_calculator( $data );
	echo $response;
	die();
}

function fitquiz_ajax_quiz_submit_calculator() {
	$view_id  = $_POST['view_id'];
	$api      = new Fitquiz_api();
	$response = $api->quiz_track_calculator_submission( $view_id );
	echo $response;
	die();
}

function fitquiz_ajax_quiz_question() {
	$view_id     = $_POST['view_id'];
	$question_id = $_POST['question_id'];
	$api         = new Fitquiz_api();
	$response    = $api->quiz_question( $view_id, $question_id );
	echo $response;
	die();
}

function fitquiz_ajax_quiz_start() {
	$view_id  = $_POST['view_id'];
	$api      = new Fitquiz_api();
	$response = $api->quiz_start( $view_id );
	die( $response );
}

function fitquiz_ajax_quiz_retake() {
	$view_id  = $_POST['view_id'];
	$api      = new Fitquiz_api();
	$response = $api->quiz_retake( $view_id );
	echo $response;
	die();
}

function fitquiz_ajax_quiz_submit() {
	$data     = $_POST['data'];
	$api      = new Fitquiz_api();
	$response = $api->quiz_submit( $data );
	$show     = new Fitquiz_show();
	die( $show->show_results( $response ) );
}

function fitquiz_ajax_retirement_submit() {
	$data     = $_POST['data'];
	$api      = new Fitquiz_api();
	$response = $api->retirement_submit( $data );
	die( $response );
}

function fitquiz_ajax_credit_card_submit() {
	$data     = $_POST['data'];
	$api      = new Fitquiz_api();
	$response = $api->credit_submit( $data );
	die( $response );
}

