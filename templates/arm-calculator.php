<div id="arm_calculator">
	<form id="arm_calculator_form" class="form">
		<input type="hidden" name="quiz_id" value="<?php echo $quiz->quiz_id; ?>" />
		<input type="hidden" name="quiz_slug" value="<?php echo $quiz->slug; ?>" />

        <div class="form-group">
            <label for="mortgage_amount" class="control-label">Mortgage Amount</label>
            <div class="input-group">
                <div class="input-group-addon">$</div>
                <input id="mortgage_amount" class="form-control input-sm" type="number" name="mortgage_amount" min="0" value="180000" required />

            </div>
        </div>

        <div class="form-group">
            <label for="mortgage_term" class="control-label">Mortgage Term (in years)</label>
            <div class="input-group">
                <input id="mortgage_term" class="form-control input-sm" type="number" name="mortgage_term" min="0" max="60" value="30" required />
                <div class="input-group-addon">years</div>
            </div>
        </div>

        <div class="form-group">
            <label for="initial_interest_rate" class="control-label">Initial Interest Rate</label>
            <div class="input-group">
                <input id="initial_interest_rate" class="form-contrl input-sm" type="number" name="initial_interest_rate" min="0" max="30" value="5" required />
                <div class="input-group-addon">%</div>
            </div>
        </div>

        <div class="form-group">
            <label for="adjustment_period" class="control-label">Adjustment Period</label>
            <select id="adjustment_period" class="form-control input-sm" name="adjustment_period">
                <option value="3">3/1</option>
                <option value="5">5/1</option>
                <option value="7">7/1</option>
                <option value="10">10/1</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="annual_change_prime" class="control-label">Projected Annual Change in Prime</label>
            <input type="range" step="0.1" name="annual_change_prime" min="0" max="1.5" value="0.1" id="annual_change_prime" class="slider_range" required>
            <span class="helper-block" id="annual_change_prime_label">1%</span>
        </div>

        <div class="form-group">
            <label for="interest_rate_cap" class="control-label">Interest Rate Cap</label>
            <div class="input-group">
                <input id="interest_rate_cap" class="form-control input-sm" type="number" name="interest_rate_cap" min="0" max="30" value="12" required />
                <div class="input-group-addon">%</div>
            </div>
        </div>
        <div style="text-align:center">
            <button onclick="check_before_submit_form(this)" type="button" name="button" id="calculator_button" class="btn btn-orange">CALCULATE</button>
        </div>
    </form>

    <div style="margin:20px 0;"></div>
    <div id="curve_chart" class="chart" style="min-height:250px;"></div>
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
    
    <div id="ammortization_table_wrapper">
        <div style="text-align:center">
            <button onclick="show_ammortization(this)" type="button" name="button" id="table_button" class="btn btn-primary">Show Loan Amortization Table</button>
        </div>
        <div id="ammortization_table"></div>
    </div>
</div>



<style media="screen">
#arm_calculator{max-width:800px;margin:0 auto;position:relative}#arm_calculator .radio_label{font-size:14px!important}#arm_calculator .input-sm{height:30px!important;padding:5px 10px!important;font-size:12px!important;line-height:1.5!important;border-radius:3px!important}#arm_calculator .radio input[type="radio"],#arm_calculator .radio input.radio{margin:4px 0 0 -20px!important}#arm_calculator input.invalid{background-color:#fdd}#arm_calculator .input-error{border:1px solid red}#arm_calculator .input-error-message{display:block;overflow:hidden;border:1px solid transparent;color:red;padding:5px}#arm_calculator .btn-orange{border:1px solid #ed833f;background-color:#ed833f;color:#fff;text-shadow:#888 0 0 1px}#arm_calculator #loading{position:absolute;top:0;left:0;background:#ddd;width:100%;height:100%;z-index:9999}#arm_calculator #loading span{position:absolute;top:50%;left:50%;font-weight:700;color:#ed833f;transform:translate(-50%,-50%);text-transform:uppercase;letter-spacing:5px}#arm_calculator .ui-slider-handle{width:2.5em!important;height:1.6em!important;top:50%!important;margin-top:-.8em!important;text-align:center!important;line-height:1.6em!important;background:#ed833f;border:1px solid #ed833f}#arm_calculator .ui-widget.ui-widget-content{border:1px solid #c5c5c5;padding:8px 0;background:#f6f6f6}#arm_calculator .ui-slider-handle{color:#fff}#arm_calculator .min{float:left;display:inline-block;margin:10px 0;font-size:16px;font-weight:700}#arm_calculator .max{float:right;display:inline-block;margin:10px 0;font-size:16px;font-weight:700}#arm_calculator #table_button,#arm_calculator #ammortization_table{display:none}
.text-center{text-align:center}.form-group{margin-bottom:20px}.input-group{position:relative;display:table;border-collapse:separate}.input-group.col{float:none;padding-right:0;padding-left:0}.input-group .form-control{width:100%;margin-bottom:0}.input-group-lg>.form-control,.input-group-lg>.input-group-addon,.input-group-lg>.input-group-btn>.btn{height:45px;padding:10px 16px;font-size:18px;line-height:1.33;border-radius:6px}select.input-group-lg>.form-control,select.input-group-lg>.input-group-addon,select.input-group-lg>.input-group-btn>.btn{height:45px;line-height:45px}textarea.input-group-lg>.form-control,textarea.input-group-lg>.input-group-addon,textarea.input-group-lg>.input-group-btn>.btn{height:auto}.input-group-sm>.form-control,.input-group-sm>.input-group-addon,.input-group-sm>.input-group-btn>.btn{height:30px;padding:5px 10px;font-size:12px;line-height:1.5;border-radius:3px}select.input-group-sm>.form-control,select.input-group-sm>.input-group-addon,select.input-group-sm>.input-group-btn>.btn{height:30px;line-height:30px}textarea.input-group-sm>.form-control,textarea.input-group-sm>.input-group-addon,textarea.input-group-sm>.input-group-btn>.btn{height:auto}.input-group-addon,.input-group-btn,.input-group .form-control{display:table-cell}.input-group-addon:not(:first-child):not(:last-child),.input-group-btn:not(:first-child):not(:last-child),.input-group .form-control:not(:first-child):not(:last-child){border-radius:0}.input-group-addon,.input-group-btn{width:1%;white-space:nowrap;vertical-align:middle}.input-group-addon{padding:6px 12px;font-size:14px;font-weight:400;line-height:1;color:#555;text-align:center;background-color:#eee;border:1px solid #ccc;border-radius:4px}.input-group-addon.input-sm{padding:5px 10px;font-size:12px;border-radius:3px}.input-group-addon.input-lg{padding:10px 16px;font-size:18px;border-radius:6px}.input-group-addon input[type="radio"],.input-group-addon input[type="checkbox"]{margin-top:0}.input-group .form-control:first-child,.input-group-addon:first-child,.input-group-btn:first-child>.btn,.input-group-btn:first-child>.dropdown-toggle,.input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle){border-top-right-radius:0;border-bottom-right-radius:0}.input-group-addon:first-child{border-right:0}.input-group .form-control:last-child,.input-group-addon:last-child,.input-group-btn:last-child>.btn,.input-group-btn:last-child>.dropdown-toggle,.input-group-btn:first-child>.btn:not(:first-child){border-bottom-left-radius:0;border-top-left-radius:0}.input-group-addon:last-child{border-left:0}.input-group-btn{position:relative;white-space:nowrap}.input-group-btn:first-child>.btn{margin-right:-1px}.input-group-btn:last-child>.btn{margin-left:-1px}.input-group-btn>.btn{position:relative}.input-group-btn>.btn + .btn{margin-left:-4px}.input-group-btn>.btn:hover,.input-group-btn>.btn:active{z-index:2}
</style>
