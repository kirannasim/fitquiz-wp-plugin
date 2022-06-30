<div id="cash_out_refinance">
    <form id="cash_out_refinance_form" class="form">
        <input type="hidden" name="quiz_id" value="<?php echo $quiz->quiz_id ?>">
        <input type="hidden" name="quiz_slug" value="<?php echo $quiz->slug; ?>">

        <div class="form-group">
            <label for="property_value" class="control-label">Property's Current Value</label>
            <div class="input-group">
                <div class="input-group-addon">$</div>
                <input id="property_value" class="form-control input-sm" type="text" name="property_value" value="" placeholder="0.00" />
            </div>
        </div>

        <div class="form-group">
            <label for="current_balance" class="control-label">Current Balance Owed</label>
            <div class="input-group">
                <div class="input-group-addon">$</div>
                <input id="current_balance" class="form-control input-sm" type="text" name="current_balance" value="" placeholder="0.00" />
            </div>
            <span class="help-block"> Total of 1st mortgage, 2nd mortgage, HELOC, etc. </span>
        </div>

        <div class="form-group">
            <label for="amount_taken" class="control-label">How Much Cash You'll Take Out</label>
            <div class="input-group">
                <div class="input-group-addon">%</div>
                <input id="amount_taken" class="form-control input-sm" type="text" name="amount_taken" value="" placeholder="0.00" />
            </div>
            <span class="help-block">Max Cash Out Refi is Typically 75% LTV </span>
        </div>

        <div class="form-group">
            <label for="interest_rate" class="control-label">Desired Interest Rate </label>
            <div class="input-group">
                <div class="input-group-addon">%</div>
                <input type="text" id="interest_rate" class="form-control input-sm" name="interest_rate" value="" placeholder="0.0"  />
            </div>
        </div>
        <br/>
        <div class="form-group">
            <label class="control-label">Desired Repayment Term</label>
            <div class="radio">
                <label for="15">
                    <input type="radio" name="repayment_term" id="15" value="15" checked />
                    15 Years
                </label>
            </div>
            <div class="radio">
                <label for="30">
                    <input type="radio" name="repayment_term" id="30" value="30" />
                    30 Years
                </label>
            </div>
        </div>

        <div class="form-group text-center">
            <button id="calculate_button" class="btn btn-orange" type="button">Calculate</button>
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
 #cash_out_refinance{max-width:800px;margin:0 auto;position:relative}#cash_out_refinance .radio_label{font-size:14px!important}#cash_out_refinance .input-sm{height:30px!important;padding:5px 10px!important;font-size:12px!important;line-height:1.5!important;border-radius:3px!important}#cash_out_refinance .radio input[type="radio"],#cash_out_refinance .radio input.radio{margin:4px 0 0 -20px!important}#cash_out_refinance input.invalid{background-color:#fdd}#cash_out_refinance .input-error{border:1px solid red}#cash_out_refinance .input-error-message{display:block;overflow:hidden;border:1px solid transparent;color:red;padding:5px}.ui-slider .ui-slider-handle{height:2em;background-color:#ed833f;border:1px solid #ed833f}.ui-widget.ui-widget-content,.ui-slider-horizontal .ui-slider-range{padding:10px 0}#cash_out_refinance .btn-orange{border:1px solid #ed833f;background-color:#ed833f;color:#fff;text-shadow:#888 0 0 1px}#cash_out_refinance .btn-orange:hover{color:#f6c19f}#cash_out_refinance #loading{position:absolute;top:0;left:0;background:#ddd;width:100%;height:100%;z-index:9999}#cash_out_refinance #loading span{position:absolute;top:50%;left:50%;font-weight:700;color:#ed833f;transform:translate(-50%,-50%);text-transform:uppercase;letter-spacing:5px}#cash_out_refinance .min{float:left;display:inline-block;margin:10px 0;font-size:16px;font-weight:700}#cash_out_refinance .max{float:right;display:inline-block;margin:10px 0;font-size:16px;font-weight:700}
.text-center{text-align:center}.form-group{margin-bottom:20px}.input-group{position:relative;display:table;border-collapse:separate}.input-group.col{float:none;padding-right:0;padding-left:0}.input-group .form-control{width:100%;margin-bottom:0}.input-group-lg>.form-control,.input-group-lg>.input-group-addon,.input-group-lg>.input-group-btn>.btn{height:45px;padding:10px 16px;font-size:18px;line-height:1.33;border-radius:6px}select.input-group-lg>.form-control,select.input-group-lg>.input-group-addon,select.input-group-lg>.input-group-btn>.btn{height:45px;line-height:45px}textarea.input-group-lg>.form-control,textarea.input-group-lg>.input-group-addon,textarea.input-group-lg>.input-group-btn>.btn{height:auto}.input-group-sm>.form-control,.input-group-sm>.input-group-addon,.input-group-sm>.input-group-btn>.btn{height:30px;padding:5px 10px;font-size:12px;line-height:1.5;border-radius:3px}select.input-group-sm>.form-control,select.input-group-sm>.input-group-addon,select.input-group-sm>.input-group-btn>.btn{height:30px;line-height:30px}textarea.input-group-sm>.form-control,textarea.input-group-sm>.input-group-addon,textarea.input-group-sm>.input-group-btn>.btn{height:auto}.input-group-addon,.input-group-btn,.input-group .form-control{display:table-cell}.input-group-addon:not(:first-child):not(:last-child),.input-group-btn:not(:first-child):not(:last-child),.input-group .form-control:not(:first-child):not(:last-child){border-radius:0}.input-group-addon,.input-group-btn{width:1%;white-space:nowrap;vertical-align:middle}.input-group-addon{padding:6px 12px;font-size:14px;font-weight:400;line-height:1;color:#555;text-align:center;background-color:#eee;border:1px solid #ccc;border-radius:4px}.input-group-addon.input-sm{padding:5px 10px;font-size:12px;border-radius:3px}.input-group-addon.input-lg{padding:10px 16px;font-size:18px;border-radius:6px}.input-group-addon input[type="radio"],.input-group-addon input[type="checkbox"]{margin-top:0}.input-group .form-control:first-child,.input-group-addon:first-child,.input-group-btn:first-child>.btn,.input-group-btn:first-child>.dropdown-toggle,.input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle){border-top-right-radius:0;border-bottom-right-radius:0}.input-group-addon:first-child{border-right:0}.input-group .form-control:last-child,.input-group-addon:last-child,.input-group-btn:last-child>.btn,.input-group-btn:last-child>.dropdown-toggle,.input-group-btn:first-child>.btn:not(:first-child){border-bottom-left-radius:0;border-top-left-radius:0}.input-group-addon:last-child{border-left:0}.input-group-btn{position:relative;white-space:nowrap}.input-group-btn:first-child>.btn{margin-right:-1px}.input-group-btn:last-child>.btn{margin-left:-1px}.input-group-btn>.btn{position:relative}.input-group-btn>.btn + .btn{margin-left:-4px}.input-group-btn>.btn:hover,.input-group-btn>.btn:active{z-index:2}
</style>