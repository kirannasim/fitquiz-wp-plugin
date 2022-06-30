<div id="pto_calculator_wrapper">
	<div id="pto_calculator">
    <form id="pto_calculator_form" class="form">
        <input type="hidden" name="quiz_id" value="<?php echo $quiz->quiz_id ?>">
        <input type="hidden" name="quiz_slug" value="<?php echo $quiz->slug; ?>" >

        <div class="form-group">
          <label for="fte_pto_per_year" class="control-label"># of Full Time Employee PTO Hours Per Year</label>
          <div id="fte_pto_per_year_slider">
              <div id="fte_pto_per_year_handle" class="ui-slider-handle"></div>
          </div>
          <input id="fte_pto_per_year" type="hidden" name="fte_pto_per_year" value="80" />
          <a href="#" id="fte_pto_per_decrement">«</a>
          <a href="#" id="fte_pto_per_increment">»</a>
          <div class="clearfix"></div>
          <p class="text-muted text-center">Use the slider or arrow buttons to incease or decrese the amount of PTO.</p>
        </div>

        <div class="form-group">
          <label for="fte_hr_per_week" class="control-label"># of Full Time Employee Hours Per Week</label>
          <div id="fte_hr_per_week_slider">
              <div id="fte_hr_per_week_handle" class="ui-slider-handle"></div>
          </div>
          <input id="fte_hr_per_week" type="hidden" name="fte_hr_per_week" value="40" />
        </div>

        <div class="form-group">
          <label for="fte_paid_holiday_per_year" class="control-label"># of Full Time Employee Paid Holidays Per Year</label>
          <div id="fte_paid_holiday_per_year_slider">
              <div id="fte_paid_holiday_per_year_handle" class="ui-slider-handle"></div>
          </div>
          <input id="fte_paid_holiday_per_year" type="hidden" name="fte_paid_holiday_per_year" value="10" />
        </div>

        <div class="form-group">
          <div class="checkbox">
            <label for="add_time">
            <input id="add_time" type="checkbox" name="add_time" value="1">
            I would like to input start dates &amp; pay periods
            </label>
          </div>
        </div>
        

        <div id="stage_2" style="display:none;">
          <div class="form-group">
            <label for="accural_start_date" class="">What is your accural start date?</label>
            <div class="radio">
              <label>
                <input class="form-radio accural_start_date" data-type="calendar_year" type="radio" name="accural_start_date" value="calendar_year" checked="checked"> Calendar Year
              </label>
            </div>
            <div class="radio">
              <label>
                <input class="form-radio accural_start_date" data-type="fiscal_year" type="radio" name="accural_start_date" value="fiscal_year"> Fiscal Year
              </label>
              <input class="form-control input-sm datepicker" type="text" name="fiscal_year_input" value="" autocomplete="off" style="display:none;"/>
            </div>
            <div class="radio">
              <label>
                <input class="form-radio accural_start_date" data-type="hire_date" type="radio" name="accural_start_date" value="hire_date"> Hire Date
              </label>
              <input class="form-control input-sm datepicker" type="text" name="hire_year_input" value="" autocomplete="off" style="display:none;"/>
            </div>
          </div>

          <div class="form-group">
            <label for="accural_pay_period">What is your pay period time frame for accural</label>
            <div class="radio">
              <label>
                <input class="form-radio" type="radio" name="accural_pay_period" value="day">Day
              </label>
            </div>
            <div class="radio">
              <label>
                <input class="form-radio" type="radio" name="accural_pay_period" value="week" checked="checked">Week
              </label>
            </div>
            <div class="radio">
              <label>
                <input class="form-radio" type="radio" name="accural_pay_period" value="biweekly">Biweekly
              </label>
            </div>
            <div class="radio">
              <label>
                <input class="form-radio" type="radio" name="accural_pay_period" value="semimonthly">Semi Monthly
              </label>
            </div>
            <div class="radio">
              <label>
                <input class="form-radio" type="radio" name="accural_pay_period" value="monthly">Monthly
              </label>
            </div>
          </div>
          
          <div class="form-group">
            <label for="pto_rollover">How many hours of PTO were rolled over from last year?</label>
            <input id="pto_rollover" class="form-control input-sm" type="number" name="pto_rollover" value="0"  autocomplete="off" max="240" min="0"/>
            <p class="text-muted">Use up and down arrow keys to increase or decrease the value.</p>
          </div>

          <div class="form-group">
            <label for="pto_taken">How many hours of PTO have you taken thus far?</label>
            <input id="pto_taken" class="form-control input-sm" type="number" name="pto_taken" value="0" autocomplete="off" max="100"  min="0"/>
            <p class="text-muted">Use up and down arrow keys to increase or decrease the value.</p>
          </div>
        </div>

        <div style="text-align:center">
            <button onclick="submit_calculator(this)" type="button" name="button" id="calculator_button" class="btn btn-primary">CALCULATE</button>
        </div>
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

    
  <br>
  <br>
  <p class="text-muted">Results listed above are rounded to two decimal numbers. This may affect the actual results.</p>
</div>
<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->

<style media="screen">
 #pto_calculator_wrapper .response-error{color:red;display:block;font-size:8px}#pto_calculator_wrapper .input-sm{height:30px!important;padding:5px 10px!important;font-size:12px!important;line-height:1.5!important;border-radius:3px!important}#pto_calculator_wrapper .input-error{border:1px solid red}#pto_calculator_wrapper .radio_label{font-size:14px!important}#pto_calculator_wrapper #calculator_button{color:#fff;background:#666;border:1px solid #999}#pto_calculator_wrapper #pto_calculator_form label.control-label{margin-bottom:10px}#pto_calculator_wrapper #pto_calculator_form .ui-slider-handle{width:3em;height:1.6em;top:50%;margin-top:-.8em;text-align:center;line-height:1.6em}#pto_calculator_wrapper #pto_calculator_form .form-radio{margin-bottom:0;margin-left:-20px;margin-right:0;margin-top:4px;position:absolute}#pto_calculator_wrapper #fte_pto_per_increment{float:right;font-size:18px}#pto_calculator_wrapper #fte_pto_per_decrement{float:left;font-size:18px}#pto_calculator_wrapper .output .text-left{font-size:13px!important}
.text-center{text-align:center}.form-group{margin-bottom:20px}.input-group{position:relative;display:table;border-collapse:separate}.input-group.col{float:none;padding-right:0;padding-left:0}.input-group .form-control{width:100%;margin-bottom:0}.input-group-lg>.form-control,.input-group-lg>.input-group-addon,.input-group-lg>.input-group-btn>.btn{height:45px;padding:10px 16px;font-size:18px;line-height:1.33;border-radius:6px}select.input-group-lg>.form-control,select.input-group-lg>.input-group-addon,select.input-group-lg>.input-group-btn>.btn{height:45px;line-height:45px}textarea.input-group-lg>.form-control,textarea.input-group-lg>.input-group-addon,textarea.input-group-lg>.input-group-btn>.btn{height:auto}.input-group-sm>.form-control,.input-group-sm>.input-group-addon,.input-group-sm>.input-group-btn>.btn{height:30px;padding:5px 10px;font-size:12px;line-height:1.5;border-radius:3px}select.input-group-sm>.form-control,select.input-group-sm>.input-group-addon,select.input-group-sm>.input-group-btn>.btn{height:30px;line-height:30px}textarea.input-group-sm>.form-control,textarea.input-group-sm>.input-group-addon,textarea.input-group-sm>.input-group-btn>.btn{height:auto}.input-group-addon,.input-group-btn,.input-group .form-control{display:table-cell}.input-group-addon:not(:first-child):not(:last-child),.input-group-btn:not(:first-child):not(:last-child),.input-group .form-control:not(:first-child):not(:last-child){border-radius:0}.input-group-addon,.input-group-btn{width:1%;white-space:nowrap;vertical-align:middle}.input-group-addon{padding:6px 12px;font-size:14px;font-weight:400;line-height:1;color:#555;text-align:center;background-color:#eee;border:1px solid #ccc;border-radius:4px}.input-group-addon.input-sm{padding:5px 10px;font-size:12px;border-radius:3px}.input-group-addon.input-lg{padding:10px 16px;font-size:18px;border-radius:6px}.input-group-addon input[type="radio"],.input-group-addon input[type="checkbox"]{margin-top:0}.input-group .form-control:first-child,.input-group-addon:first-child,.input-group-btn:first-child>.btn,.input-group-btn:first-child>.dropdown-toggle,.input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle){border-top-right-radius:0;border-bottom-right-radius:0}.input-group-addon:first-child{border-right:0}.input-group .form-control:last-child,.input-group-addon:last-child,.input-group-btn:last-child>.btn,.input-group-btn:last-child>.dropdown-toggle,.input-group-btn:first-child>.btn:not(:first-child){border-bottom-left-radius:0;border-top-left-radius:0}.input-group-addon:last-child{border-left:0}.input-group-btn{position:relative;white-space:nowrap}.input-group-btn:first-child>.btn{margin-right:-1px}.input-group-btn:last-child>.btn{margin-left:-1px}.input-group-btn>.btn{position:relative}.input-group-btn>.btn + .btn{margin-left:-4px}.input-group-btn>.btn:hover,.input-group-btn>.btn:active{z-index:2}
</style>
