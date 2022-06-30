<div id="debt_consolidation_calculator">
    <form id="debt_consolidation_calculator_form" class="form">
        <input type="hidden" name="quiz_id" value="<?php echo $quiz->quiz_id ?>">
        <input type="hidden" name="quiz_slug" value="<?php echo $quiz->slug; ?>">

        <div class="row">
            <p id="input_message" class="text-center"></p>
            <div class="form-group col-md-6">
                <label for="loan_balance" class="control-label">Current term loan balance</label>
                <div class="input-group">
                    <div class="input-group-addon">$</div>
                    <input id="loan_balance" class="form-control input-sm" type="text" name="loan_balance" value="0" autocomplete="off">
                </div>
            </div>

            <div class="form-group col-md-6">
                <label for="monthly_payments" class="control-label">Combined monthly payments for term loans</label>
                <div class="input-group">
                    <div class="input-group-addon">$</div>
                    <input id="monthly_payments" class="form-control input-sm" type="text" name="monthly_payments" value="0" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="credit_card_balance" class="control-label">Current credit card balance</label>
                <div class="input-group">
                    <div class="input-group-addon">$</div>
                    <input id="credit_card_balance" class="form-control input-sm" type="text" name="credit_card_balance" value="0" autocomplete="off">
                </div>
            </div>

            <div class="form-group col-md-6">
                <label for="credit_card_payment" class="control-label">Combined monthly payments for credit cards</label>
                <div class="input-group">
                    <div class="input-group-addon">$</div>
                    <input id="credit_card_payment" class="form-control input-sm" type="text" name="credit_card_payment" value="0" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="cash_advance_balance" class="control-label">Total merchant cash advance balance</label>
                <div class="input-group">
                    <div class="input-group-addon">$</div>
                    <input id="cash_advance_balance" class="form-control input-sm" type="text" name="cash_advance_balance" value="0" autocomplete="off">
                </div>
            </div>

            <div class="form-group col-md-6">
                <label for="cash_advance_payment" class="control-label">Combined monthly payment for merchant cash advances</label>
                <div class="input-group">
                    <div class="input-group-addon">$</div>
                    <input id="cash_advance_payment" class="form-control input-sm" type="text" name="cash_advance_payment" value="0" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="other_debt_balance" class="control-label">Total balance of any other debt to be consolidated</label>
                <div class="input-group">
                    <div class="input-group-addon">$</div>
                    <input id="other_debt_balance" class="form-control input-sm" type="text" name="other_debt_balance" value="0" autocomplete="off">
                </div>
            </div>

            <div class="form-group col-md-6">
                <label for="other_debt_payment" class="control-label">Total monthly payment of other debt to be consolidated</label>
                <div class="input-group">
                    <div class="input-group-addon">$</div>
                    <input id="other_debt_payment" class="form-control input-sm" type="text" name="other_debt_payment" value="0" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="additional_funding" class="control-label">Additional funding needed</label>
                <div class="input-group">
                    <div class="input-group-addon">$</div>
                    <input id="additional_funding" class="form-control input-sm" type="text" name="additional_funding" value="0" autocomplete="off">
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="new_loan_interest_rate" class="control-label">Interest rate on new loan</label>
                <div class="input-group">
                    <input id="new_loan_interest_rate" class="form-control input-sm" type="text" name="new_loan_interest_rate" value="7.50" autocomplete="off">
                    <div class="input-group-addon">%</div>
                </div>
            </div>

            <div class="form-group col-md-6">
                <label for="repayment_term" class="control-label">Repayment term (in years)</label>
                <div class="input-group">
                    <input id="repayment_term" class="form-control input-sm" type="text" name="repayment_term" value="10" autocomplete="off">
                    <div class="input-group-addon">Years</div>
                </div>
            </div>
        </div>

        <div class="form-group text-center">
            <button id="calculate_form" class="btn btn-orange" type="button">Calculate</button>
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
#debt_consolidation_calculator{max-width:800px;margin:0 auto;position:relative}#debt_consolidation_calculator .input-sm{height:30px!important;padding:5px 10px!important;font-size:12px!important;line-height:1.5!important;border-radius:3px!important}#debt_consolidation_calculator label.control-label{font-size:13px}#debt_consolidation_calculator input.invalid{background-color:#fdd}#debt_consolidation_calculator .input-error{border:1px solid red}#debt_consolidation_calculator .text-color-primary{color:#008080}#debt_consolidation_calculator .input-error-message{display:block;overflow:hidden;border:1px solid transparent;color:red;padding:5px}#debt_consolidation_calculator .btn-orange{border:1px solid #ed833f;background-color:#ed833f;color:#fff;text-shadow:#888 0 0 1px}#debt_consolidation_calculator .btn-orange:hover{color:#f6c19f}#debt_consolidation_calculator #loading{position:absolute;top:0;left:0;background:#ddd;width:100%;height:100%;z-index:9999}#debt_consolidation_calculator #loading span{position:absolute;top:50%;left:50%;font-weight:700;color:#ed833f;transform:translate(-50%,-50%);text-transform:uppercase;letter-spacing:5px}
.text-center{text-align:center}.form-group{margin-bottom:20px}.input-group{position:relative;display:table;border-collapse:separate}.input-group.col{float:none;padding-right:0;padding-left:0}.input-group .form-control{width:100%;margin-bottom:0}.input-group-lg>.form-control,.input-group-lg>.input-group-addon,.input-group-lg>.input-group-btn>.btn{height:45px;padding:10px 16px;font-size:18px;line-height:1.33;border-radius:6px}select.input-group-lg>.form-control,select.input-group-lg>.input-group-addon,select.input-group-lg>.input-group-btn>.btn{height:45px;line-height:45px}textarea.input-group-lg>.form-control,textarea.input-group-lg>.input-group-addon,textarea.input-group-lg>.input-group-btn>.btn{height:auto}.input-group-sm>.form-control,.input-group-sm>.input-group-addon,.input-group-sm>.input-group-btn>.btn{height:30px;padding:5px 10px;font-size:12px;line-height:1.5;border-radius:3px}select.input-group-sm>.form-control,select.input-group-sm>.input-group-addon,select.input-group-sm>.input-group-btn>.btn{height:30px;line-height:30px}textarea.input-group-sm>.form-control,textarea.input-group-sm>.input-group-addon,textarea.input-group-sm>.input-group-btn>.btn{height:auto}.input-group-addon,.input-group-btn,.input-group .form-control{display:table-cell}.input-group-addon:not(:first-child):not(:last-child),.input-group-btn:not(:first-child):not(:last-child),.input-group .form-control:not(:first-child):not(:last-child){border-radius:0}.input-group-addon,.input-group-btn{width:1%;white-space:nowrap;vertical-align:middle}.input-group-addon{padding:6px 12px;font-size:14px;font-weight:400;line-height:1;color:#555;text-align:center;background-color:#eee;border:1px solid #ccc;border-radius:4px}.input-group-addon.input-sm{padding:5px 10px;font-size:12px;border-radius:3px}.input-group-addon.input-lg{padding:10px 16px;font-size:18px;border-radius:6px}.input-group-addon input[type="radio"],.input-group-addon input[type="checkbox"]{margin-top:0}.input-group .form-control:first-child,.input-group-addon:first-child,.input-group-btn:first-child>.btn,.input-group-btn:first-child>.dropdown-toggle,.input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle){border-top-right-radius:0;border-bottom-right-radius:0}.input-group-addon:first-child{border-right:0}.input-group .form-control:last-child,.input-group-addon:last-child,.input-group-btn:last-child>.btn,.input-group-btn:last-child>.dropdown-toggle,.input-group-btn:first-child>.btn:not(:first-child){border-bottom-left-radius:0;border-top-left-radius:0}.input-group-addon:last-child{border-left:0}.input-group-btn{position:relative;white-space:nowrap}.input-group-btn:first-child>.btn{margin-right:-1px}.input-group-btn:last-child>.btn{margin-left:-1px}.input-group-btn>.btn{position:relative}.input-group-btn>.btn + .btn{margin-left:-4px}.input-group-btn>.btn:hover,.input-group-btn>.btn:active{z-index:2}
</style>