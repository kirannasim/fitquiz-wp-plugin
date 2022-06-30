<div id="bofa_chase_premium_tier_calculator">
    <form id="bofa_chase_premium_tier_calculator_form" class="form form-horizontal">
        <input type="hidden" name="quiz_id" value="<?php echo $quiz->quiz_id; ?>" />
        <input type="hidden" name="quiz_slug" value="<?php echo $quiz->slug; ?>" />
        
        <div class="form-group">
            <label for="monthly_transactions" class="control-label">Number of Monthly Transactions</label>
            <input id="monthly_transactions" class="form-control input-sm" type="text" name="monthly_transactions" value="" />
        </div>
        
        <div class="form-group">
            <label for="cash_deposits" class="control-label">$ in Monthly Cash Deposits</label>
            <input id="cash_deposits" class="form-control input-sm" type="text" name="cash_deposits" value="" />
        </div>

        <div class="clearfix"></div>
        <br>
        <div style="text-align:center">
            <button onclick="bofa_chase_premium_tier_calculator(<?php echo $quiz->quiz_id; ?>)" type="button" name="button" id="calculator_button" class="btn btn-orange">CALCULATE</button>
        </div>
    </form>

    <div style="margin:20px 0;"></div>
    
    <div id="response-<?php echo $quiz->quiz_id; ?>"></div>
     
    <?php if( isset($quiz->nomatch) && $quiz->nomatch != '' ): ?>
    <div id="html-<?php echo $quiz->quiz_id; ?>" style="display:none">
        <div class="row text-center">
            <div class="col-md-12">
            <?php echo $quiz->nomatch; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<style media="screen">
#bofa_chase_premium_tier_calculator{max-width:800px;margin:0 auto;position:relative}#bofa_chase_premium_tier_calculator .radio_label{font-size:14px!important}#bofa_chase_premium_tier_calculator .input-sm{height:30px!important;padding:5px 10px!important;font-size:12px!important;line-height:1.5!important;border-radius:3px!important}#bofa_chase_premium_tier_calculator .radio input[type="radio"],#bofa_chase_premium_tier_calculator .radio input.radio{margin:4px 0 0 -20px!important}#bofa_chase_premium_tier_calculator input.invalid{background-color:#fdd}#bofa_chase_premium_tier_calculator .input-error{border:1px solid red}#bofa_chase_premium_tier_calculator .input-error-message{display:block;overflow:hidden;border:1px solid transparent;color:red;padding:5px}#bofa_chase_premium_tier_calculator .btn-orange{border:1px solid #ed833f;background-color:#ed833f;color:#fff;text-shadow:#888 0 0 1px}#bofa_chase_premium_tier_calculator #loading{position:absolute;top:0;left:0;background:#ddd;width:100%;height:100%;z-index:9999}#bofa_chase_premium_tier_calculator #loading span{position:absolute;top:50%;left:50%;font-weight:700;color:#ed833f;transform:translate(-50%,-50%);text-transform:uppercase;letter-spacing:5px}
.text-center{text-align:center}.form-group{margin-bottom:20px}.input-group{position:relative;display:table;border-collapse:separate}.input-group.col{float:none;padding-right:0;padding-left:0}.input-group .form-control{width:100%;margin-bottom:0}.input-group-lg>.form-control,.input-group-lg>.input-group-addon,.input-group-lg>.input-group-btn>.btn{height:45px;padding:10px 16px;font-size:18px;line-height:1.33;border-radius:6px}select.input-group-lg>.form-control,select.input-group-lg>.input-group-addon,select.input-group-lg>.input-group-btn>.btn{height:45px;line-height:45px}textarea.input-group-lg>.form-control,textarea.input-group-lg>.input-group-addon,textarea.input-group-lg>.input-group-btn>.btn{height:auto}.input-group-sm>.form-control,.input-group-sm>.input-group-addon,.input-group-sm>.input-group-btn>.btn{height:30px;padding:5px 10px;font-size:12px;line-height:1.5;border-radius:3px}select.input-group-sm>.form-control,select.input-group-sm>.input-group-addon,select.input-group-sm>.input-group-btn>.btn{height:30px;line-height:30px}textarea.input-group-sm>.form-control,textarea.input-group-sm>.input-group-addon,textarea.input-group-sm>.input-group-btn>.btn{height:auto}.input-group-addon,.input-group-btn,.input-group .form-control{display:table-cell}.input-group-addon:not(:first-child):not(:last-child),.input-group-btn:not(:first-child):not(:last-child),.input-group .form-control:not(:first-child):not(:last-child){border-radius:0}.input-group-addon,.input-group-btn{width:1%;white-space:nowrap;vertical-align:middle}.input-group-addon{padding:6px 12px;font-size:14px;font-weight:400;line-height:1;color:#555;text-align:center;background-color:#eee;border:1px solid #ccc;border-radius:4px}.input-group-addon.input-sm{padding:5px 10px;font-size:12px;border-radius:3px}.input-group-addon.input-lg{padding:10px 16px;font-size:18px;border-radius:6px}.input-group-addon input[type="radio"],.input-group-addon input[type="checkbox"]{margin-top:0}.input-group .form-control:first-child,.input-group-addon:first-child,.input-group-btn:first-child>.btn,.input-group-btn:first-child>.dropdown-toggle,.input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle){border-top-right-radius:0;border-bottom-right-radius:0}.input-group-addon:first-child{border-right:0}.input-group .form-control:last-child,.input-group-addon:last-child,.input-group-btn:last-child>.btn,.input-group-btn:last-child>.dropdown-toggle,.input-group-btn:first-child>.btn:not(:first-child){border-bottom-left-radius:0;border-top-left-radius:0}.input-group-addon:last-child{border-left:0}.input-group-btn{position:relative;white-space:nowrap}.input-group-btn:first-child>.btn{margin-right:-1px}.input-group-btn:last-child>.btn{margin-left:-1px}.input-group-btn>.btn{position:relative}.input-group-btn>.btn + .btn{margin-left:-4px}.input-group-btn>.btn:hover,.input-group-btn>.btn:active{z-index:2}

</style>
