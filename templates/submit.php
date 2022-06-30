<?php
	$url = get_option( 'fitquiz_url' );
	$img_url = rtrim( $url, "api/" );
?>
<?php if ( isset( $questions ) ) : ?>

	<div id="quiz_6GJBtT47">

		<div id="result_wrapper" class="q-page-wrapper<?php echo $questions[0]['type'] == 'k' ? ' quiz-page-wrapper' : ''; ?>">

			<!-- header -->
			<?php if ( $quiz['header'] && !$nomatch ) : ?>
				<?php if ( is_array( $html ) && count( $html ) > 1 ) : ?>
					<div class="header" id="result_header">
						<h3><?php echo $quiz['header'] ?></h3>
					</div><!-- #result_header -->
				<?php else: ?>
					<?php if ( $has_feedback ) : ?>
						<div class="header">
							<h2 style="color:#0085c8"><?php echo str_replace("{n}","",$quiz['header']);?></h2>
						</div><!-- .header -->
       		<?php else: ?> 
						<div class="header">
							<h3><?php echo str_replace("{n}","",$quiz['header']);?></h3>
						</div><!-- .header -->
					<?php endif; ?>
				<?php endif; ?>
			<?php endif; ?>
			<!-- header -->

			<!-- if the question type is feedback display feedback results -->
			<?php if ( $has_feedback ) : ?>
				<div class="feedback-result__wrapper">
					<h3 class="feedback-result__score">
						You scored
						<span class="feedback-result__score-number <?php echo $rf_score_class; ?>">
							<?php echo $rf_answers_score; ?>%
						</span>
					</h3>
				</div><!-- .feedback-result__wrapper -->
			<?php endif;  ?>
			<!-- if the question type is feedback display feedback results -->

			<?php if ( is_array( $html ) && count( $html ) > 1 && !$nomatch && ! $has_feedback ) : ?>
				<div class="nav_result prev disabled" id="prev">
					<button type="button" onclick="change_result('prev')"> <i class="arrow left"></i> </button>
				</div>
				<div class="congratulation">
					<h4>We found <?php echo count( $html ) ?> <?php echo( count( $html ) > 1 ? 'matches' : 'match' ) ?></h4>
				</div>
			<?php endif; ?>
			
			<!-- results -->
			<?php if ( is_array( $html ) && count( $html ) > 1 ) : ?>

				<div id="results" class="results_wrapper">

					<?php if ( $questions[0]['type'] == 'k' ) : ?>
						<p style="text-align: center; margin: 0;">
							<img src="<?php echo plugin_dir_url( dirname(__FILE__) ); ?>/images/done.svg" class="well-done-icon">
						</p>
						<p class="ranking-result-tips" style="text-align: center;"><strong>Thanks for submitting!</strong> Check your results below.</p>				
					<?php endif; ?>

					<?php foreach ( $html as $inx => $content ) : ?>
						<?php if ( $questions[0]['type'] == 'k' ) : ?>				
							<div class="ranking-result">
								<div class="ranking-result-body">
									<h4>RECOMMENDATION #<?php echo $inx + 1; ?></h4>
									<div class="ranking-result-body-content">		
										<?php if ( isset( $productlogo[$inx] ) && $productlogo[$inx] != "" ) : ?>	
											<img src="<?php echo $productlogo[$inx]; ?>">
										<?php else : ?>									
											<h3><?php echo $result[$inx]['name']; ?></h3>	
										<?php endif; ?>
										
										<?php if ( isset( $score[$inx] ) && $score[$inx] != "" ) : ?>
											<div class="ratings-row">
												<div class="ratings-icon">
													<svg id="Briefcase_Icon" data-name="Briefcase Icon" xmlns="http://www.w3.org/2000/svg" width="62.477" height="52.015" viewBox="0 0 62.477 52.015">
														<path id="Fill-2_00000156586870029177340990000000107699873098618026_" d="M15,29.4,66,17a2,2,0,0,1,2.3,1.4l1.6,6.7a10.591,10.591,0,0,0-1.2,1c-5.4,4.2-13.3,8-22.4,10.5L46,35.4l-4.9,1.2.3,1.2c-9.3,1.9-17.9,2.1-24.7.9l-1.5-.3-1.6-6.7A1.9,1.9,0,0,1,15,29.4Zm55.3-2.9L76,50.3a2,2,0,0,1-1.4,2.3l-51,12.3a2,2,0,0,1-2.3-1.4L15.6,39.8c.3.1.6.1.9.2,6.9,1.3,15.8,1.1,25.3-.9l.2,1,4.9-1.2-.2-1C56,35.4,64,31.5,69.5,27.1c.3-.2.5-.4.8-.6Z" transform="translate(-13.562 -12.924)" fill="#155f86"/>
														<path id="Fill-3_00000156574808678977763130000001066589582955509913_" d="M29.7,17.4l17.7-4.3a5.841,5.841,0,0,1,4.5.7,6.057,6.057,0,0,1,2.7,3.7L55,19l-2.2.5L52.4,18a3.1,3.1,0,0,0-1.6-2.2,3.4,3.4,0,0,0-2.8-.4L30.3,19.7a3.1,3.1,0,0,0-2.2,1.6,3.4,3.4,0,0,0-.4,2.8l.4,1.6-2.2.5-.4-1.6a5.841,5.841,0,0,1,.7-4.5,5.393,5.393,0,0,1,3.5-2.7" transform="translate(-13.562 -12.924)" fill="#155f86"/>
													</svg>
												</div>
												<div class="ratings-body">
													<div class="ratings-rate"><div class="ratings-rate-hightlight"><?php echo $score[$inx]; ?></div><div class="ratings-rate-dash">/</div> 10</div>
													<div class="ratings-rate ratings-rate-points mb-0">Points</div>
												</div>
											</div>
										<?php endif; ?>
									</div>
									<div class="ranking-result-bottom">
										<?php if ( isset( $gotolink[$inx] ) && $gotolink[$inx] != "" ) : ?>
											<div class="goto_btn">
												<a href="<?php echo $gotolink[$inx]; ?>"><?php echo $gotolinklabel[$inx]; ?></a>
											</div>
										<?php endif; ?>	
										
										<?php if ( $content != "" ) : ?>
											<?php echo $content; ?>
										<?php endif; ?>
										<!-- <a href="#" target="_blank">Read full review</a> -->
									</div>
								</div>					
							</div>


						<?php else : ?>							
							<h3>Result</h3>
							<div class="result_row">
								<?php echo $content ?>
								<div class="action_retake_btn">
									<a class="" href="javascript:void(0)" id="retake_quiz">Retake The Quiz</a>
								</div>						
							</div>
						<?php endif; ?>
					<?php endforeach; ?>		
					<?php if ( $questions[0]['type'] == 'k' ) : ?>
						<div class="action_retake_btn" style="margin-top: 22px">
							<!-- <i class="fa fa-refresh"></i> -->
							<a class="" href="javascript:window.location.reload()" id="retake_quiz">Retake The Quiz</a>
						</div>
						<?php endif; ?>

				</div><!-- #results -->				
				
				<?php if ( $questions[0]['type'] != 'k' ) : ?>
					<div class="nav_result next" id="next">
						<button type="button"onclick="change_result('next')"> <i class="arrow right"></i> </button>
					</div><!-- #next -->
				<?php endif; ?>

			<?php else : ?>

				<div class="row result_row submit_result_final">

					<?php if ( $questions[0]['type'] == 'k' ) : ?>

						<p style="text-align: center; margin: 0;">
							<img src="<?php echo plugin_dir_url( dirname(__FILE__) ); ?>/images/done.svg" class="well-done-icon">
						</p>

						<p class="ranking-result-tips"><strong>Thanks for submitting!</strong> Check your results below.</p>					
						
						<div class="ranking-result">

							<div class="ranking-result-body">

								<h4>RECOMMENDATION #1</h4>

								<div class="ranking-result-body-content">

									<?php if ( isset( $productlogo[0] ) && $productlogo[0] != "" ) : ?>	
										<img src="<?php echo $productlogo[0]; ?>">
									<?php else : ?>
										<h3><?php echo $result[0]['name']; ?></h3>	
									<?php endif; ?>

									<?php if ( isset( $score[0] ) && $score[0] != "" ) : ?>							
										<div class="ratings-row">
											<div class="ratings-icon">
												<svg id="Briefcase_Icon" data-name="Briefcase Icon" xmlns="http://www.w3.org/2000/svg" width="62.477" height="52.015" viewBox="0 0 62.477 52.015">
													<path id="Fill-2_00000156586870029177340990000000107699873098618026_" d="M15,29.4,66,17a2,2,0,0,1,2.3,1.4l1.6,6.7a10.591,10.591,0,0,0-1.2,1c-5.4,4.2-13.3,8-22.4,10.5L46,35.4l-4.9,1.2.3,1.2c-9.3,1.9-17.9,2.1-24.7.9l-1.5-.3-1.6-6.7A1.9,1.9,0,0,1,15,29.4Zm55.3-2.9L76,50.3a2,2,0,0,1-1.4,2.3l-51,12.3a2,2,0,0,1-2.3-1.4L15.6,39.8c.3.1.6.1.9.2,6.9,1.3,15.8,1.1,25.3-.9l.2,1,4.9-1.2-.2-1C56,35.4,64,31.5,69.5,27.1c.3-.2.5-.4.8-.6Z" transform="translate(-13.562 -12.924)" fill="#155f86"/>
													<path id="Fill-3_00000156574808678977763130000001066589582955509913_" d="M29.7,17.4l17.7-4.3a5.841,5.841,0,0,1,4.5.7,6.057,6.057,0,0,1,2.7,3.7L55,19l-2.2.5L52.4,18a3.1,3.1,0,0,0-1.6-2.2,3.4,3.4,0,0,0-2.8-.4L30.3,19.7a3.1,3.1,0,0,0-2.2,1.6,3.4,3.4,0,0,0-.4,2.8l.4,1.6-2.2.5-.4-1.6a5.841,5.841,0,0,1,.7-4.5,5.393,5.393,0,0,1,3.5-2.7" transform="translate(-13.562 -12.924)" fill="#155f86"/>
												</svg>
											</div>
											<div class="ratings-body">
												<div class="ratings-rate"><div class="ratings-rate-hightlight"><?php echo $score[0] ; ?></div> <div class="ratings-rate-dash">/</div> 10</div>
												<div class="ratings-rate ratings-rate-points mb-0">Points</div>
											</div>
										</div>
									<?php endif; ?>

								</div><!-- .ranking-result-body-content -->

								<div class="ranking-result-bottom">

									<?php if ( isset( $gotolink[0] ) && $gotolink[0] != "" ) : ?>
										<div class="goto_btn">
											<a href="<?php echo $gotolink[0]; ?>"><?php echo $gotolinklabel[0]; ?></a>
										</div>
									<?php endif; ?>						
									
									<?php if ( isset( $html[0] ) && $html[0] != "" ) : ?>
										<?php echo $html[0]; ?>
									<?php endif; ?>
									
								</div><!-- .ranking-result-bottom -->

							</div><!-- .ranking-result-body -->					
						
						</div><!-- .ranking-result -->


						<div class="action_retake_btn" style="margin-top: 22px">
							<!-- <i class="fa fa-refresh"></i> -->
							<a class="" href="javascript:void(0)" id="retake_quiz">Retake The Quiz</a>
						</div>

					<?php else : ?>
			
						<?php if ( isset( $productlogo[0] ) && $productlogo[0] != "" ) : ?>

							<div class="result_desc_row">
								<div class="col-left">
									<img src="<?php echo $productlogo[0]; ?>">
								</div>
								<div class="col-right">
									<?php echo $html[0]; ?>
								</div>
							</div>
							
							<?php if ( isset( $gotolink[0] ) && $gotolink[0] != "" ) : ?>
								<div class="action_retake_btn" style="margin-top: 22px;float: left;">
									<a class="" href="javascript:void(0)" id="retake_quiz">Retake The Quiz</a>
								</div>
								<div class="goto_btn" style="margin-top: 22px;float: right;">
									<!-- <i class="fa fa-refresh"></i> -->
									<a class="" href="<?php echo $gotolink[0]; ?>"><?php echo $gotolinklabel[0]; ?></a>
								</div>
							<?php endif; ?>

						<?php else : ?>

							<?php echo $html[0]; ?>

							<?php if ( $has_feedback ) : ?>
								<?php if ( isset( $gotolink[0] ) && $gotolink[0] != "" ) : ?>
									<div class="feedback-result__cta-wrapper">
										<div class="action_retake_btn" style="margin-top: 22px;">
											<a class="" href="javascript:void(0)" id="retake_quiz">Retake The Quiz</a>
										</div>
										<div class="goto_btn" >
											<!-- <i class="fa fa-refresh"></i> -->
											<a class="" href="<?php echo $gotolink[0]; ?>"><?php echo $gotolinklabel[0]; ?></a>
										</div>
									</div>
								<?php endif; ?>
							<?php else : ?>
								<div class="action_retake_btn" style="margin-top: 22px">
									<!-- <i class="fa fa-refresh"></i> -->
									<a class="" href="javascript:void(0)" id="retake_quiz">Retake The Quiz</a>
								</div>
							<?php endif; // end if has_feedback ?>

           	<?php endif; ?>

					<?php endif; ?>			

				</div><!-- .row -->

			<?php endif; ?>
			<!-- results -->

		</div><!-- #result_wrapper -->

		<!-- footer -->
		<div class="footer">
			<?php $quiz['footer']?>
		</div><!-- .footer -->
		<!-- footer -->

	</div><!-- #quiz_6GJBtT47 -->

<?php else : ?>

	<div class="row">
		<div class="col-sm-12">
			<p>This Quiz has no questions!</p>
		</div>
	</div><!-- .row -->

<?php endif; ?>

<script type="text/javascript">
	jQuery( function ($) {
		$( "#retake_quiz" ).click( function( event ) {
			event.preventDefault();

			var url = custom_vars.admin_url+'admin-ajax.php';
			
			$j.ajax({
				url: url,
				type: 'post',
				dataType: 'json',
				data: {
					action : 'quiz_retake',
					view_id : view_id,
				},
				success: function( response ) {
					location.reload();
				}
			});			
		});

		$( "#result_wrapper a" ).each(function(){
			var locationPathname = location.pathname.replaceAll('/','');
			var quizID = '<?php echo $quiz['quiz_id']; ?>';
			var href = $(this).attr('href');
			if ( href && href.indexOf('go.performi') > -1 && href.indexOf('?') > -1 ) {
				href += '&p=' + locationPathname + '&q=' + quizID;
				$(this).attr('href', href);
			} else if ( href && href.indexOf('go.performi') > -1 ) {
				href += '?p=' + locationPathname + '&q=' + quizID;
				$(this).attr('href', href);
			}
		});
	});
</script>