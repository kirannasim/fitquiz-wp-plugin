<div id="quiz_6GJBtT47">
	<div id="hard-money-loan-calculator">
		<?php if($quiz_show_header): ?>
			<h2 style="text-align:center"><?php echo $quiz_header ?></h2>
		<?php endif; ?>
		<form id="hard-money-loan-calculator_form" class="calculator_form">

			<div class="question_container">
				<div class="question">
					<h4>Purchase Price</h4>
				</div>
				<div class="input">
						<input type="number" name="purchase_price" min="0" value="100000" id="purchase_price" required>
				</div>
			</div>

			<div class="question_container">
				<div class="question">
					<h4>Needed Repairs</h4>
				</div>
				<div class="input">
						<input type="number" name="needed_repairs" min="0" value="15000" id="needed_repairs" required>
				</div>
			</div>

			<div class="question_container">
				<div class="question">
					<h4>After Repaired Value</h4>
				</div>
				<div class="input">
						<input type="number" name="after_repaired_value" min="0" value="300000" id="after_repaired_value" required>
				</div>
			</div>

			<div class="question_container">
				<div class="question">
					<h4>What Portion Will the Lender Fund (50%-100%)</h4>
				</div>
				<div class="input">
						<input type="range" step="1" name="lender_fund" min="50" max="100" value="70" id="lender_fund" class="slider_range" required>
						<label for="lender_fund" id="lender_fund_label" style="text-align:center">70%</label>
				</div>
			</div>

			<div class="question_container">
				<div class="question">
					<h4>Is the Funding Based On:</h4>
				</div>
				<div class="input">
					<div class="radio_container input" style="width:100%; font-size:0.8em">
						<div class="radio">
							<label class="radio_label"><input class="required" type="radio" name="funding_base" value="1" checked>Purchase Cost
									<span class="checkmark" style="top:2px;"></span>
							</label>
						</div>
						<div class="radio">
							<label class="radio_label"><input class="required" type="radio" name="funding_base" value="2">Purchase Cost + Repairs
									<span class="checkmark" style="top:2px;"></span>
							</label>
						</div>
						<div class="radio">
							<label class="radio_label"><input class="required" type="radio" name="funding_base" value="3">After Repaired Value
									<span class="checkmark" style="top:2px;"></span>
							</label>
						</div>
					</div>
				</div>
			</div>

			<div class="question_container">
				<div class="question">
					<h4>How Long Will You Need The Loan (1-24 Months)</h4>
				</div>
				<div class="input">
						<input type="range" step="1" name="loan_need" min="1" max="24" value="24" id="loan_need" class="slider_range" required>
						<label for="loan_need" id="loan_need_label" style="text-align:center">24</label>
				</div>
			</div>

			<div class="question_container">
				<div class="question">
					<h4>What Is The Interest Rate (7%-18%)</h4>
				</div>
				<div class="input">
						<input type="range" step="1" name="interest_rate" min="7" max="18" value="10" id="interest_rate" class="slider_range" required>
						<label for="interest_rate" id="interest_rate_label" style="text-align:center">10</label>
				</div>
			</div>

			<div class="question_container">
				<div class="question">
					<h4>What Are The Points Charged By The Lender (2-7)</h4>
				</div>
				<div class="input">
						<input type="range" step="1" name="points_charged" min="2" max="7" value="5" id="points_charged" class="slider_range" required>
						<label for="points_charged" id="points_charged_label" style="text-align:center">5</label>
				</div>
			</div>

			<div class="question_container">
				<div class="question">
					<h4>Enter Any Amounts for Lender Charges Beyond Points</h4>
				</div>
				<div class="input">
						<input type="number" name="beyond_points" min="0" value="0" id="beyond_points" required>
				</div>
			</div>

			<p style="text-align:center">
				<button onclick="check_before_submit_form(this)" type="button" name="button" id="calculator_button">Calculate</button>
			</p>

			<input type="hidden" name="quiz_id" value="<?php echo $quiz->quiz_id ?>">
			<input type="hidden" name="quiz_slug" value="<?php echo $quiz->slug ?>">

		</form>
		<div id="response"></div>
	</div>

	<?php if(isset($quiz->quiz_html) && $quiz->quiz_html != ''): ?>
    <div id="html" style="display:none">
       
        <div class="row text-center">
            <div class="col-md-12">
			<?php 
			if( $quiz->quiz_html){
				$result = preg_replace('@rel="(.*)"@U', '', $quiz->quiz_html);
				$result = preg_replace('@<a(.*)>@U', '<a$1 rel="noopener nofollow">', $result);
				echo $result; 
			}
			?>

            <?php if ( isset( $_SERVER['REQUEST_URI'] ) ) :?>
            <p class="text-center"><span style="display:block; margin:20px 0;"><a href="<?php echo $_SERVER['REQUEST_URI']; ?>">Reset Form</a></span></p>
            <?php endif; ?>
            </div>
        </div>

    </div>
    <?php endif; ?>


</div>
<script>
const view_id = <?php echo $view_id ?>;
</script>