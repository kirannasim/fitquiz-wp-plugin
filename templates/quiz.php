<?php if ( $questions ) : ?>

	<div id="quiz_6GJBtT47" class="<?php echo ( $quiz->border == "yes" ) ? 'quiz-border' : ''; ?>" <?php

		if ( $quiz->border == "yes" ) {
			echo 'style="border:' . $quiz->border_size . 'px ' . $quiz->border_color . ' solid;"';
		} ?>>
		
		<div id="quiz_container">
			<div id="quiz_wrapper" class="q-page-wrapper">
				<?php $totalQuestion = count($questions); ?>
        
				<!-- quiz score counter -->
				<?php if ( "f" == $questions[0]->type || "w" == $questions[0]->type ) : ?>
					<div class="feedback__counter-wrapper">
						<div class="feedback__counter">
							<div class="feedback__counter-item feedback__counter-item--base feedback__counter-item--base-l">
								<span class="feedback__counter-label">Incorrect</span>
								<span id="feedback__counter-incorrect" class="feedback__counter-number incorrect"></span>
							</div>
							<div class="feedback__counter-item feedback__counter-item--progress-bar">
								<div id="feedback__progress-bar-incorrect" class="feedback__progress-bar feedback__progress-bar-incorrect"></div>
								<div id="feedback__progress-bar-correct" class="feedback__progress-bar feedback__progress-bar-correct"></div>
							</div>
							<div class="feedback__counter-item feedback__counter-item--base feedback__counter-item--base-r">
								<span class="feedback__counter-label">Correct</span>
								<span id="feedback__counter-correct" class="feedback__counter-number correct"></span>
							</div>
						</div>
					</div>
				<?php endif;  //end feedback__counter-wrapper ?>
				<!-- end quiz score counter -->

				<!-- add_header -->
        <?php if("f" !== $questions[0]->type && "w" !== $questions[0]->type && $quiz_show_header): ?>
          <h2 style="text-align:center"><?php echo $quiz_header ?></h2>
        <?php endif; //end if not question type f/w and has $quiz_show_header ?>
        <?php if ( "f" == $questions[0]->type || "w" == $questions[0]->type && $quiz_show_header > 0) : ?>
          <div id="quiz_header" style="margin-bottom: 30px; text-align: center;">
            <h2><?= $quiz_header ?></h2>
          </div>
        <?php endif; // end if question type is f or w and has $quiz_show_header ?>
        <?php if ( $display_title != '' ) : ?>
          <p style="text-align:center;"><?php echo $display_title; ?></p>
        <?php endif; //end if $display_title ?>
        <p class="answer-few-questions"> 
          <?php if ( isset( $description ) && $description != '' ) { echo $description; } elseif ( ! $has_feedback ) { echo "Answer a few questions about your business, and we'll give you a personalized product match."; } ?>
        </p>
				<!-- end add_header -->

				<!-- <div id="progress_bar">
					<div class="step_progress"></div>
				</div> -->
				<form id="quiz-steps" action="" method="post" class="form <?php if ( $has_feedback ) { echo 'form-has-feedback'; } ?>">

					<?php if ($extradata) : ?>
						<input type="hidden" name="extradata" value="<?php echo $extradata ?>">
					<?php else : ?>
						<input type="hidden" name="extradata" value="<?php echo get_post_field('post_name', get_the_id()); ?>">
					<?php endif; ?>

					<?php if ($has_feedback) : ?>
						<input type="hidden" id="feedback_input_correct" name="feedback_input_correct" value="0">
						<input type="hidden" id="feedback_input_incorrect" name="feedback_input_incorrect" value="0">
					<?php endif; ?>	

					<?php $i = 1; ?>
					<?php foreach ($questions as $item) : ?>
						<h3>Question <?php echo  $i ?></h3>

						<div class="result_row" style="background:transparent" data-question="<?php echo $item->question_id ?>">

							<div class="question-title-container">
								<!-- <div class="question-icon">
									<img class="calculator-icon" src="<?php // echo plugin_dir_url(dirname(__FILE__)) . 'images/calculator.svg'; ?>">
								</div> -->
								<div class="">
									<!-- <h2 class="question-title">
										<?php // if(isset($display_title)){ echo $display_title;}else{ echo "Which statement best describes you?"; } ?>
									</h2> -->
									<?php if ($item->intro && $item->intro != '-' && ! $has_feedback ) : ?>
										<p><?php echo $item->intro ?></p>
									<?php endif; ?>								
								</div>
							</div>

							<div class="progress-bar-new"></div>

							<div class="question-content">
								<!-- <div class="question"></div> -->								

								<?php if ( "k" != $item->type ) : ?>
									<div class="statement">
										<h2><?php echo $item->title ?></h2>
									</div>
								
									<div class="questions-number-progress">
										<div class="question_number">
											<p style="font-size: 14px;">Question <?= $i ?> of <?= $totalQuestion ?></p>
										</div>
										<?php if ( $item->image): ?>
										<div id="question-image-wrapper" class="question-image-wrapper">
											<img class="question-image" src="<?php echo $item->image; ?>" alt="">
										</div>
										<?php endif; ?>
										<div class="progress_bar_container">
											<!-- <div id="progress_bar">
												<div class="step_progress"></div>
											</div> -->
											<ul class="proglist"></ul>
										</div>

										<!-- <ul class="proglist"></ul> -->
										
										<div class="approx_time">
											<p style="font-size: 14px;"><?php if ( $totalQuestion <= 6 ){ echo 1; } else { echo 2; } ?> minute approx</p>
										</div>
									</div>
								<?php endif; ?>
								
								<?php if ( "n" == $item->type ) { ?>
									<div class="col-quiz-full input">
										<input type="number" name="q<?php echo $item->question_id ?>" step="any" <? if (isset($item->numeric_options_max)) echo 'max="'.$item->numeric_options_max.'"'; ?>
										<? if (isset($item->numeric_options_min)) echo 'min="'.$item->numeric_options_min.'"'; ?> class="form-control required" />
									</div>
								<?php } elseif ( "t" == $item->type ) { ?>
									<div class="col-quiz-full input">
										<input type="text" name="q<?php echo $item->question_id ?>" class="form-control required" placeholder="<?php echo  $item->text_input_placeholder ?>" />
									</div>
								<?php } elseif ("r" == $item->type) { ?>
									<div class="radio_container input">
										<?php foreach ($item->radio_button_options as $radio_button_option) : ?>
											<?php
											$option = explode(':', $radio_button_option, 2);
											if (!isset($option[1])) $option[1] = $option[0];
											?>
											<div class="col-quiz-full radio">
												<label class="radio_label"><input class="required" type="radio" name="q<?php echo $item->question_id ?>" value="<?php echo  trim($option[0]) ?>"><?php echo  trim($option[1]) ?>
													<span class="checkmark"></span>
												</label>
											</div>
										<?php endforeach; ?>
									</div>
								<?php }  elseif ("f" == $item->type) { ?>
									<div class="feedback__container feedback__container-<?= $i ?>">
										<div class="radio_container input">
											<?php
											$radio_fb_option_correct = $item->feedback_option_correct;
											$radio_fb_explain = $item->feedback_explain;
											?>
											<?php foreach ($item->feedback_options as $feedback_option) : 
												$option = explode(':', $feedback_option, 2);
												if (!isset($option[1])) $option[1] = $option[0]; ?>
		
												<div class="col-quiz-full radio-single radio-single-fb ">
													<label class="radio_label"><input class="required " type="radio" name="q<?= $item->question_id ?>" value="<?= trim($option[0]) ?>"><?= trim($option[1]) ?>
														<span class="checkmark"></span>
													</label>
												</div>
		
											<?php endforeach;?>
										</div>
										<div class="feedback">
											<div class="feedback__header">
												<span id="feedback__icon" class="feedback__icon"> </span>
												<h3 class="feedback__title">Explanation</h3>
											</div>
											<p class="feedback__correct" hidden><?= $radio_fb_option_correct[0] ?></p>
											<p class="feedback__explain" style="display: none;"><?= $radio_fb_explain[0] ?></p>
										</div>
									</div>
								<?php } elseif ( "w" == $item->type ) { ?>
									<div class="feedback__container feedback__container-<?= $i ?>">
										<div class="radio_container input">
											<?php
											$radio_fb_option_correct = $item->feedback_option_correct;
											$radio_fb_explain = $item->feedback_explain;
											?>
											<?php foreach ($item->feedback_options as $feedback_option) : 
												$option = explode(':', $feedback_option, 2);
												if (!isset($option[1])) $option[1] = $option[0]; ?>
		
												<div class="col-quiz-full radio-single radio-single-fb checkbox">
													<label class="radio_label"><input class="required " type="checkbox" name="q<?= $item->question_id ?>" value="<?= trim($option[0]) ?>"><?= trim($option[1]) ?>
														<span class="checkmark"></span>
													</label>
												</div>
		
											<?php endforeach; ?>
										</div>
										<div class="feedback">
											<div class="feedback__header">
												<span id="feedback__icon" class="feedback__icon"> </span>
												<h3 class="feedback__title">Explanation</h3>
											</div>
											<p class="feedback__correct" hidden><?= json_encode( $radio_fb_option_correct ); ?></p>
											<p class="feedback__explain" style="display: none;"><?= $radio_fb_explain[0] ?></p>
										</div>
									</div>
								<?php } elseif ( "b" == $item->type ) { ?>
									<div class="checkbox_container input">
										<?php foreach ($item->checkbox_button_options as $checkbox_button_option) : ?>
											<?php
											$option = explode(':', $checkbox_button_option, 2);
											if (!isset($option[1])) $option[1] = $option[0];
											?>
											<div class="col-quiz-full checkbox">
												<label class="checkbox_label"><input class="required" type="checkbox" name="q<?php echo $item->question_id ?>[]" value="<?php echo  trim($option[0]) ?>"><?php echo  trim($option[1]) ?>
												</label>
											</div>
										<?php endforeach; ?>
									</div>
								<?php } elseif ( "s" == $item->type || "u" == $item->type ) { ?>
									<div class="col-quiz-full select input">
										<select class="form-control required" name="q<?php echo $item->question_id ?>">
											<option value=""><?php echo ($item->type == "s" ? 'Choose an option' : 'Choose a state') ?></option>
											<?php foreach ($item->select_options as $select_option) : ?>
												<?php
												$option = explode(':', $select_option, 2);
												if (!isset($option[1])) $option[1] = $option[0];
												?>
												<option value="<?php echo  trim($option[0]) ?>"><?php echo  trim($option[1]) ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								<?php } elseif ( "c" == $item->type ) { ?>
									<div class="col-quiz-full contact_form input">
										<div class="contact_form_input">
											<label for="name">Name</label>
											<input type="text" name="name" class="form-control required" placeholder="Enter your Name">
										</div>

										<div class="contact_form_input">
											<label for="email">Your Email</label>
											<input type="email" name="email" class="form-control required" placeholder="Enter email">
										</div>
									</div>
								<?php } elseif ( "k" == $item->type ) { ?>
									<!-- <p class="rank-intro"><?php echo $item->intro; ?></p> -->

									<div class="rank_container">								
										<div class="ranks">
											<?php foreach ( $item->rank_button_options as $inx => $rank_button_option ) : 
												$option = explode( ':', $rank_button_option, 2 );
												if ( !isset( $option[1] ) ) $option[1] = $option[0]; ?>
												<div class="rank" data-rank="<?php echo $inx; ?>">
													<input type="hidden" name="q<?php echo $item->question_id; ?>[]" value="<?php echo $inx; ?>">
													<div class="rank-content">
														<span class="rank-num"><?php echo $inx+1; ?></span>
														<span class="rank-answer"><?php echo trim( $option[1] ); ?></span>
													</div>
													<div class="rank-actions">
														<a href="#" class="rank-action" data-action="down"></a>
														<a href="#" class="rank-action" data-action="up"></a>
													</div>
												</div>
											<?php endforeach; ?>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					<?php $i++;
					endforeach; ?>

					<input type="hidden" id="results" value="">
					<input type="hidden" name="quiz_id" value="<?php echo $quiz_id ?>">
					<input type="hidden" name="view_id" value="<?php echo $view_id ?>">
				</form>

			</div><!-- #quiz_wrapper -->
		</div><!-- #quiz_container -->
	</div><!-- #quiz_6GJBtT47 -->

<?php else : ?>
	<div class="col-quiz-full">
		<p>This Quiz has no questions!</p>
	</div>
<?php endif; ?>

<script>
	const view_id = <?php echo $view_id ?>;
	<?php if ($display != "modal") : ?>
		const modal = true;
	<?php else : ?>
		const modal = false;
	<?php endif; ?>
</script>

