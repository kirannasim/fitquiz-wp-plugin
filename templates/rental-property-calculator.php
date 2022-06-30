<div id="rental_property_calculator">
	<form id="rental_property_calculator_form" class="form">
	<input type="hidden" name="quiz_id" value="<?php echo $quiz->quiz_id ?>">
	<input type="hidden" name="quiz_slug" value="<?php echo $quiz->slug; ?>">
	
	<fieldset>
		<legend>Purchase</legend>
		<div class="form-group">
			<label for="purchase_price" class="control-label">Purchase Price</label>
			<div class="input-group">
				<div class="input-group-addon">$</div>
				<input id="purchase_price" class="form-control input-sm" step="any" type="number" name="purchase_price" value="100000" min="0" required>
			</div>
		</div>
		<div class="form-group" id="loan_switch">
			<label class="control-label">Loan</label>
			<div class="radio">
				<label>
					<input type="radio" name="loan" value="0" checked>
					No
				</label>
			</div>
			<div class="radio">
				<label>
					<input type="radio" name="loan" value="1">
					Yes
				</label>
			</div>
		</div>

		<div id="loan_questions" style="display:none">
			<div class="question_container">
				<div class="question">
					<div class="form-group">
						<label for="down_payment" class="control-label">Down Payment</label>
						<div class="input-group">
							<input id="down_payment" class="form-control input-sm" type="number" step="any" name="down_payment" min="0" value="20" required>
							<div class="input-group-addon">%</div>
						</div>
					</div>
				</div>
			</div>
			<div class="question_container">
				<div class="question">
					<div class="form-group">
						<label for="interest_rate" class="control-label">Interest Rate</label>
						<div class="input-group">
							<input id="interest_rate" class="form-control input-sm" type="number" step="any" name="interest_rate" min="0" max="100" value="5" required>
							<div class="input-group-addon">%</div>
						</div>
					</div>
				</div>
			</div>
			<div class="question_container">
				<div class="question">
					<div class="form-group">
						<label for="loan_term" class="control-label">Loan Term</label>
						<div class="input-group">
							<input id="loan_term" class="form-control input-sm" type="number" step="any" name="loan_term" min="0" max="30" value="20" required>
							<div class="input-group-addon">%</div>
						</div>
					</div>
				</div>
			</div>
			<div class="question_container">
				<div class="question">
					<div class="form-group">
						<label for="closing_costs" class="control-label">Closing Costs</label>
						<div class="input-group">
							<input id="closing_costs" class="form-control input-sm" type="number" step="any" name="closing_costs" min="0" max="100" value="50" required>
							<div class="input-group-addon">%</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</fieldset>

	<fieldset>
		<legend>Income</legend>
		<div class="form-group">
			<label for="monthly_rent" class="control-label">Monthly Rent</label>
			<div class="input-group">
				<div class="input-group-addon">$</div>
				<input id="monthly_rent" class="form-control input-sm" step="any" type="number" name="monthly_rent" min="0" value="1000" required>
			</div>
		</div>
		<div class="form-group">
			<label for="other_monthly_income" class="control-label">Other Monthly Income</label>
			<div class="input-group">
				<div class="input-group-addon">$</div>
				<input id="other_monthly_income" class="form-control input-sm" step="any" type="number" name="other_monthly_income" min="0" value="0" required>
			</div>
			<span class="help-block">(Parking, laundry, vending, etc.)</span>
		</div>
		<div class="form-group">
			<label for="vacancy_rate" class="control-label">Vacancy Rate</label>
			<div class="input-group">
				<div class="input-group-addon">$</div>
				<input id="vacancy_rate" class="form-control input-sm" step="any" type="number" name="vacancy_rate" min="0" value="0" required>
			</div>
		</div>
	</fieldset>

	<fieldset>
		<legend>Monthly Operating Expenses</legend>
		<div class="form-group">
			<label for="property_tax" class="control-label">Property Tax</label>
			<div class="input-group">
				<div class="input-group-addon">$</div>
				<input id="propery_tax" class="form-control input-sm" step="any" type="number" name="propery_tax" min="0" value="125" required>
			</div>
		</div>
		<div class="form-group">
			<label for="property_management_fees" class="control-label">Property Management Fees</label>
			<div class="input-group">
				<div class="input-group-addon">$</div>
				<input id="property_management_fees" class="form-control input-sm" step="any" type="number" name="property_management_fees" min="0" value="125" required>
			</div>
		</div>
		<div class="form-group">
			<label for="maintenance" class="control-label">Property Management Fees</label>
			<div class="input-group">
				<div class="input-group-addon">$</div>
				<input id="maintenance" class="form-control input-sm" step="any" type="number" name="maintenance" min="0" value="183.33" required>
			</div>
			<span class="help-block">(Property upkeep)</span>
		</div>
		<div class="form-group">
			<label for="utilities" class="control-label">Common Area Utilities</label>
			<div class="input-group">
				<div class="input-group-addon">$</div>
				<input id="utilities" class="form-control input-sm" step="any" type="number" name="utilities" min="0" value="66.67" id="utilities" required>
			</div>
		</div>
	</fieldset>
		<p style="text-align:center"><button onclick="rental_property_calculate(this)" type="button" name="button" id="calculator_button" class="btn btn-orange">Calculate</button></p>
	</form>
	<div id="response"></div>
	<div id="chart_container" style="display:none; margin-top:15px;">
		<h3>Cash Flow over the months</h3>
		<div id="curve_chart" class="chart"></div>
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


<style media="screen">
#rental_property_calculator{max-width:800px;margin:0 auto;position:relative}#rental_property_calculator .input-sm{height:30px!important;padding:5px 10px!important;font-size:12px!important;line-height:1.5!important;border-radius:3px!important}#rental_property_calculator .radio_label{font-size:14px!important}#rental_property_calculator .radio input[type="radio"],#rental_property_calculator .radio input.radio{margin:4px 0 0 0px!important}#rental_property_calculator input.invalid{background-color:#fdd}#rental_property_calculator .input-error{border:1px solid red}#rental_property_calculator .ui-slider-handle{width:auto!important;height:1.6em!important;top:50%!important;margin-top:-.8em!important;text-align:center!important;line-height:1em!important;background:#ed833f;border:1px solid #ed833f;color:#fff;padding:4px}#rental_property_calculator .ui-widget.ui-widget-content{border:1px solid #c5c5c5;padding:8px 0;background:#f6f6f6}#rental_property_calculator .text-color-primary{color:#008080}#rental_property_calculator .input-error-message{display:block;overflow:hidden;border:1px solid transparent;color:red;padding:5px}#rental_property_calculator .btn-orange{border:1px solid #ed833f;background-color:#ed833f;color:#fff;text-shadow:#888 0 0 1px}.btn-orange:hover{color:#f6c19f}#rental_property_calculator #loading{position:absolute;top:0;left:0;background:#ddd;width:100%;height:100%;z-index:9999}#rental_property_calculator #loading span{position:absolute;top:50%;left:50%;font-weight:700;color:#ed833f;transform:translate(-50%,-50%);text-transform:uppercase;letter-spacing:5px}#rental_property_calculator .min{float:left;display:inline-block;margin:10px 0;font-size:16px;font-weight:700}#rental_property_calculator .max{float:right;display:inline-block;margin:10px 0;font-size:16px;font-weight:700}
.text-center{text-align:center}.form-group{margin-bottom:20px}.input-group{position:relative;display:table;border-collapse:separate}.input-group.col{float:none;padding-right:0;padding-left:0}.input-group .form-control{width:100%;margin-bottom:0}.input-group-lg>.form-control,.input-group-lg>.input-group-addon,.input-group-lg>.input-group-btn>.btn{height:45px;padding:10px 16px;font-size:18px;line-height:1.33;border-radius:6px}select.input-group-lg>.form-control,select.input-group-lg>.input-group-addon,select.input-group-lg>.input-group-btn>.btn{height:45px;line-height:45px}textarea.input-group-lg>.form-control,textarea.input-group-lg>.input-group-addon,textarea.input-group-lg>.input-group-btn>.btn{height:auto}.input-group-sm>.form-control,.input-group-sm>.input-group-addon,.input-group-sm>.input-group-btn>.btn{height:30px;padding:5px 10px;font-size:12px;line-height:1.5;border-radius:3px}select.input-group-sm>.form-control,select.input-group-sm>.input-group-addon,select.input-group-sm>.input-group-btn>.btn{height:30px;line-height:30px}textarea.input-group-sm>.form-control,textarea.input-group-sm>.input-group-addon,textarea.input-group-sm>.input-group-btn>.btn{height:auto}.input-group-addon,.input-group-btn,.input-group .form-control{display:table-cell}.input-group-addon:not(:first-child):not(:last-child),.input-group-btn:not(:first-child):not(:last-child),.input-group .form-control:not(:first-child):not(:last-child){border-radius:0}.input-group-addon,.input-group-btn{width:1%;white-space:nowrap;vertical-align:middle}.input-group-addon{padding:6px 12px;font-size:14px;font-weight:400;line-height:1;color:#555;text-align:center;background-color:#eee;border:1px solid #ccc;border-radius:4px}.input-group-addon.input-sm{padding:5px 10px;font-size:12px;border-radius:3px}.input-group-addon.input-lg{padding:10px 16px;font-size:18px;border-radius:6px}.input-group-addon input[type="radio"],.input-group-addon input[type="checkbox"]{margin-top:0}.input-group .form-control:first-child,.input-group-addon:first-child,.input-group-btn:first-child>.btn,.input-group-btn:first-child>.dropdown-toggle,.input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle){border-top-right-radius:0;border-bottom-right-radius:0}.input-group-addon:first-child{border-right:0}.input-group .form-control:last-child,.input-group-addon:last-child,.input-group-btn:last-child>.btn,.input-group-btn:last-child>.dropdown-toggle,.input-group-btn:first-child>.btn:not(:first-child){border-bottom-left-radius:0;border-top-left-radius:0}.input-group-addon:last-child{border-left:0}.input-group-btn{position:relative;white-space:nowrap}.input-group-btn:first-child>.btn{margin-right:-1px}.input-group-btn:last-child>.btn{margin-left:-1px}.input-group-btn>.btn{position:relative}.input-group-btn>.btn + .btn{margin-left:-4px}.input-group-btn>.btn:hover,.input-group-btn>.btn:active{z-index:2}
</style>
