<div id="retro_pay_calculator">
    <form id="retro_pay_calculator_form" class="form">
        <input type="hidden" name="quiz_id" value="<?php echo $quiz->quiz_id ?>">
        <input type="hidden" name="quiz_slug" value="<?php echo $quiz->slug; ?>">

        <div class="active">
            <h4 class="page-header">Employee Type:</h4>
            <div class="form-group">
                <div class="radio">
                    <label for="hourly_type"><input id="hourly_type" class="input" type="radio" name="employee_type" value="hourly"/> Hourly</label>
                </div>
                <div class="radio">
                    <label for="salaried_type"><input id="salaried_type" class="input" type="radio" name="employee_type" value="salaried"/> Salaried</label>
                </div>

				<div class="radio">
                    <label for="flat_rate_type"><input id="flat_rate_type" class="input" type="radio" name="employee_type" value="flat_rate"/> Flat Rate</label>
                </div>
            </div>
        </div>

        <div id="hourly_employee" class="tab">
            <h4 class="page-header">Hourly Employee Input</h4>
            <div class="form-group">
                <label for="prior_hourly_pay_rate_expected" class="control-label">Prior Period Hourly Pay Rate Expected</label>
                <div class="input-group">
                    <div class="input-group-addon">$</div>
                    <input id="prior_hourly_pay_rate_expected" class="form-control input-sm input" type="text" name="prior_hourly_pay_rate_expected" value="" placeholder="0.00" required="required" />
                </div>
            </div>
            <div class="form-group">
                <label for="prior_hourly_pay_rate_paid" class="control-label">Prior Period Hourly Pay Rate Paid</label>
                <div class="input-group">
                    <div class="input-group-addon">$</div>
                    <input id="prior_hourly_pay_rate_paid" class="form-control input-sm input" type="text" name="prior_hourly_pay_rate_paid" value="" placeholder="0.00" required="required" />
                </div>
            </div>
            <div class="form-group">
                <label for="incorrect_hours" class="control-label">Number of Hours Paid Incorrectly</label>
                <div class="input-group">
                    <div class="input-group-addon">#</div>
                    <input id="incorrect_hours" class="form-control input-sm input" type="text" name="incorrect_hours" value="" placeholder="0" />
                </div>
            </div>
        </div>

        <div id="salaried_employee" class="tab">
            <h4 class="page-header">Salaried Employee Input</h4>
            <div class="form-group">
                <label for="salary_pay_rate_expected" class="control-label">Annual Salary Pay Rate Expected</label>
                <div class="input-group">
                    <div class="input-group-addon">$</div>
                    <input id="salary_pay_rate_expected" class="form-control input-sm input" type="text" name="salary_pay_rate_expected" value="" placeholder="0.00" required="required"/>
                </div>
            </div>
            <div class="form-group">
                <label for="salary_pay_rate_paid" class="control-label">Annual Salary Pay Rate Paid</label>
                <div class="input-group">
                    <div class="input-group-addon">$</div>
                    <input id="salary_pay_rate_paid" class="form-control input-sm input" type="text" name="salary_pay_rate_paid" value="" placeholder="0.00" required="required"/>
                </div>
            </div>
            <div class="form-group">
                <label for="salary_pay_days_per_year" class="control-label">Number of Pay Days Per Year</label>
                <div class="input-group">
                    <div class="input-group-addon">#</div>
                    <input id="salary_pay_days_per_year" class="form-control input-sm input" type="text" name="salary_pay_days_per_year" value="0" />
                </div>
                <span class="help-block"><a href="http://www.workingdays.us/workingdays_holidays_2018.htm" title="Click here to calculate exact # of days" target="_blank">Click here to calculate exact # of days</a></span>
            </div>
            <div class="form-group">
                <label for="salary_pay_days_incorrect" class="control-label">Number of Days Paid Incorrectly</label>
                <div class="input-group">
                    <div class="input-group-addon">#</div>
                    <input id="salary_pay_days_incorrect" class="form-control input-sm input" type="text" name="salary_pay_days_incorrect" value="0" />
                </div>
            </div>
        </div>


		<div id="flat_rate_employee" class="tab">
			<h4 class="page-header">Flat Rate Employee</h4>
			<div class="form-group">
				
				<label for="flat_rate_total_paid" class="control-label">Total Paid for Prior Period</label>
                <div class="input-group">
                    <div class="input-group-addon">$</div>
                    <input id="flat_rate_total_paid" class="form-control input-sm input" type="text" name="flat_rate_total_paid" value="0.00" />
                </div>
			</div>
			<div class="form-group">
				
				<label for="flat_rate_correct_amount" class="control-label">Correct Amount for Prior Period</label>
                <div class="input-group">
                    <div class="input-group-addon">$</div>
                    <input id="flat_rate_correct_amount" class="form-control input-sm input" type="text" name="flat_rate_correct_amount" value="0.00" />
                </div>
			</div>
			
		</div>

        <div class="form-group text-center">
            <button id="calculate_button" class="btn btn-orange disabled" type="button">Calculate</button>
        </div>
    </form>
    <div style="margin:20px 0;"></div>
    <div id="response"></div>
    
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

<style>
 #retro_pay_calculator{max-width:800px;margin:0 auto;position:relative}#retro_pay_calculator .radio_label{font-size:14px!important}#retro_pay_calculator .input-sm{height:30px!important;padding:5px 10px!important;font-size:12px!important;line-height:1.5!important;border-radius:3px!important}#retro_pay_calculator .radio input[type="radio"],#retro_pay_calculator .radio input.radio{margin:4px 0 0 -20px!important}#retro_pay_calculator input.invalid{background-color:#fdd}#retro_pay_calculator .input-error{border:1px solid red}#retro_pay_calculator .input-error-message{display:block;overflow:hidden;border:1px solid transparent;color:red;padding:5px}#retro_pay_calculator .tab{display:none}#retro_pay_calculator .active{display:block}#retro_pay_calculator .btn-orange{border:1px solid #ed833f;background-color:#ed833f;color:#fff;text-shadow:#888 0 0 1px}#retro_pay_calculator #loading{position:absolute;top:0;left:0;background:#ddd;width:100%;height:100%;z-index:9999}#retro_pay_calculator #loading span{position:absolute;top:50%;left:50%;font-weight:700;color:#ed833f;transform:translate(-50%,-50%);text-transform:uppercase;letter-spacing:5px}
</style>