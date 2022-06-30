<div id="mortgage_amortization_calculator">
    <form id="mortgage_amortization_calculator_form" class="form">
        <input type="hidden" name="quiz_id" value="<?php echo $quiz->quiz_id ?>">
        <input type="hidden" name="quiz_slug" value="<?php echo $quiz->slug; ?>">

        <div class="form-group">
            <label for="purchase_price" class="control-label">Purchase Price</label>
            <div class="input-group">
                <div class="input-group-addon">$</div>
                <input id="purchase_price" class="form-control input-sm" type="text" name="purchase_price" value="" autocomplete="off">
            </div>
        </div>

        <div class="form-group">
            <label for="down_payment" class="control-label">Down Payment <span class="down_payment_text"></span></label>
            <div class="input-group">
            <input id="down_payment" class="form-control input-sm" type="text" name="down_payment" value="">
            <div class="input-group-addon">%</div>
            </div>
        </div>

        <div class="form-group">
            <label for="load_term" class="control-label">Loan Term (months) <span id="loan_term_text"></span></label>
            <div class="input-group">
            <input id="loan_term" class="form-control input-sm" type="text" name="loan_term" value="" />
            <div class="input-group-addon">Month(s)</div>
            </div>
        </div>

        <div class="form-group">
            <label for="interest_rate" class="control-label">Interest Rate <span id="interest_rate_text"></span></label>
            <div class="input-group">
            <input id="interest_rate" class="form-control input-sm" type="text" name="interest_rate" value="" />
            <div class="input-group-addon">%</div>
            </div>
        </div>

        <br><br>
        <div class="form-group">
            <label for="property_tax" class="control-label">Annual property taxes</label>
            <div class="input-group">
                <div class="input-group-addon">$</div>
                <input id="property_tax" class="form-control input-sm" type="text" name="property_tax" value="" autocomplete="off">
            </div>
        </div>

        <div class="form-group">
            <label for="property_insurance" class="control-label">Property insurance (annual cost)</label>
            <div class="input-group">
                <div class="input-group-addon">$</div>
                <input id="property_insurance" class="form-control input-sm" type="text" name="property_insurance" value="" autocomplete="off">
            </div>
        </div>


        <div class="form-group text-center">
            <button id="calculate_button" class="btn btn-orange" type="button">Calculate</button>
        </div>
    </form>
    <div style="margin:20px 0;"></div>
    <div id="response"></div>
    <?php if( isset($quiz->nomatch) && $quiz->nomatch != '' ): ?>
    <div id="html" style="display:none">
        <div class="row text-center">
            <div class="col-md-12">
            <?php echo $quiz->nomatch; ?>
            <?php if ( isset( $_SERVER['HTTP_REFERER'] ) ) :?>
            <p class="text-center"><span style="display:block; margin:20px 0;"><a href="<?php echo $_SERVER['PHP_SELF']; ?>">Reset Form</a></span></p>
            <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->


<style>
#mortgage_amortization_calculator{max-width:800px;margin:0 auto;position:relative}#mortgage_amortization_calculator .radio_label{font-size:14px!important}#mortgage_amortization_calculator .input-sm{height:30px!important;padding:5px 10px!important;font-size:12px!important;line-height:1.5!important;border-radius:3px!important}#mortgage_amortization_calculator .radio input[type="radio"],#mortgage_amortization_calculator .radio input.radio{margin:4px 0 0 -20px!important}#mortgage_amortization_calculator input.invalid{background-color:#fdd}#mortgage_amortization_calculator .input-error{border:1px solid red}#mortgage_amortization_calculator .input-error-message{display:block;overflow:hidden;border:1px solid transparent;color:red;padding:5px}#mortgage_amortization_calculator .btn-orange{border:1px solid #ed833f;background-color:#ed833f;color:#fff;text-shadow:#888 0 0 1px}#mortgage_amortization_calculator #loading{position:absolute;top:0;left:0;background:#ddd;width:100%;height:100%;z-index:9999}#mortgage_amortization_calculator #loading span{position:absolute;top:50%;left:50%;font-weight:700;color:#ed833f;transform:translate(-50%,-50%);text-transform:uppercase;letter-spacing:5px}#mortgage_amortization_calculator .ui-slider-handle{width:2.5em!important;height:1.6em!important;top:50%!important;margin-top:-.8em!important;text-align:center!important;line-height:1.6em!important;background:#ed833f;border:1px solid #ed833f}#mortgage_amortization_calculator .ui-widget.ui-widget-content{border:1px solid #c5c5c5;padding:8px 0;background:#f6f6f6}#mortgage_amortization_calculator .ui-slider-handle{color:#fff}#mortgage_amortization_calculator .min{float:left;display:inline-block;margin:10px 0;font-size:16px;font-weight:700}#mortgage_amortization_calculator .max{float:right;display:inline-block;margin:10px 0;font-size:16px;font-weight:700}
.text-center{text-align:center}.form-group{margin-bottom:20px}.input-group{position:relative;display:table;border-collapse:separate}.input-group.col{float:none;padding-right:0;padding-left:0}.input-group .form-control{width:100%;margin-bottom:0}.input-group-lg>.form-control,.input-group-lg>.input-group-addon,.input-group-lg>.input-group-btn>.btn{height:45px;padding:10px 16px;font-size:18px;line-height:1.33;border-radius:6px}select.input-group-lg>.form-control,select.input-group-lg>.input-group-addon,select.input-group-lg>.input-group-btn>.btn{height:45px;line-height:45px}textarea.input-group-lg>.form-control,textarea.input-group-lg>.input-group-addon,textarea.input-group-lg>.input-group-btn>.btn{height:auto}.input-group-sm>.form-control,.input-group-sm>.input-group-addon,.input-group-sm>.input-group-btn>.btn{height:30px;padding:5px 10px;font-size:12px;line-height:1.5;border-radius:3px}select.input-group-sm>.form-control,select.input-group-sm>.input-group-addon,select.input-group-sm>.input-group-btn>.btn{height:30px;line-height:30px}textarea.input-group-sm>.form-control,textarea.input-group-sm>.input-group-addon,textarea.input-group-sm>.input-group-btn>.btn{height:auto}.input-group-addon,.input-group-btn,.input-group .form-control{display:table-cell}.input-group-addon:not(:first-child):not(:last-child),.input-group-btn:not(:first-child):not(:last-child),.input-group .form-control:not(:first-child):not(:last-child){border-radius:0}.input-group-addon,.input-group-btn{width:1%;white-space:nowrap;vertical-align:middle}.input-group-addon{padding:6px 12px;font-size:14px;font-weight:400;line-height:1;color:#555;text-align:center;background-color:#eee;border:1px solid #ccc;border-radius:4px}.input-group-addon.input-sm{padding:5px 10px;font-size:12px;border-radius:3px}.input-group-addon.input-lg{padding:10px 16px;font-size:18px;border-radius:6px}.input-group-addon input[type="radio"],.input-group-addon input[type="checkbox"]{margin-top:0}.input-group .form-control:first-child,.input-group-addon:first-child,.input-group-btn:first-child>.btn,.input-group-btn:first-child>.dropdown-toggle,.input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle){border-top-right-radius:0;border-bottom-right-radius:0}.input-group-addon:first-child{border-right:0}.input-group .form-control:last-child,.input-group-addon:last-child,.input-group-btn:last-child>.btn,.input-group-btn:last-child>.dropdown-toggle,.input-group-btn:first-child>.btn:not(:first-child){border-bottom-left-radius:0;border-top-left-radius:0}.input-group-addon:last-child{border-left:0}.input-group-btn{position:relative;white-space:nowrap}.input-group-btn:first-child>.btn{margin-right:-1px}.input-group-btn:last-child>.btn{margin-left:-1px}.input-group-btn>.btn{position:relative}.input-group-btn>.btn + .btn{margin-left:-4px}.input-group-btn>.btn:hover,.input-group-btn>.btn:active{z-index:2}
</style>