
<div id="overtime_calculator">
    <form class="form-horizontal" id="overtime_calculator_form">
        <input type="hidden" name="quiz_id" value="<?php echo $quiz->quiz_id ?>">
        <input type="hidden" name="quiz_slug" value="<?php echo $quiz->slug; ?>">
        
        <div class="panel panel-primary">
            <div class="panel-body">
                <fieldset>
                    <div class="form-group">
                        <label for="check_date" class="control-label col-md-8">Check Date</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon date-addon">D/M/Y</div>
                                <input id="check_date" class="form-control input-sm datepicker" type="text" name="check_date" value="" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="regular_hourly_pay_rate" class="control-label col-md-8">Regular Hourly Pay Rate</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input id="regular_hourly_pay_rate" class="form-control input-sm" type="text" name="regular_hourly_pay_rate" value="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="regular_hours_worked" class="control-label col-md-8">Number of Regular Hours Worked in Pay Period</label>
                        <div class="col-md-4">
                            <input id="regular_hours_worked" class="form-control input-sm" type="text" name="regular_hours_worked" value="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="overtime_hours_worked" class="control-label col-md-8">Overtime Hours Worked at Time & a Half</label>
                        <div class="col-md-4">
                            <input id="overtime_hours_worked" class="form-control input-sm" type="text" name="overtime_hours_worked" value="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alt_overtime_rate" class="control-label col-md-8">Alternate Overtime Rate</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input id="alt_overtime_rate" class="form-control input-sm" type="text" name="alt_overtime_rate" value="" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alt_hours_worked" class="control-label col-md-8">Overtime Hours Worked at Alternate Rate</label>
                        <div class="col-md-4">
                            <input id="alt_hours_worked" class="form-control input-sm" type="text" name="alt_hours_worked" value="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nontaxable_reimbursements" class="control-label col-md-8">Nontaxable Reimbursements</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input id="nontaxable_reimbursements" class="form-control input-sm" type="text" name="nontaxable_reimbursements" value="" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fed_tax_rate" class="control-label col-md-8">Federal Tax Rate</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input id="fed_tax_rate" class="form-control input-sm" type="text" name="fed_tax_rate" value="22" />
                                <div class="input-group-addon">%</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fed_tax_amount" class="control-label col-md-8">Federal Tax Amount</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input id="fed_tax_amount" class="form-control input-sm" type="text" name="fed_tax_amount" value="" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="state_tax_rate" class="control-label col-md-8">State Tax Rate</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input id="state_tax_rate" class="form-control input-sm" type="text" name="state_tax_rate" value="0" />
                                <div class="input-group-addon">%</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="state_tax_amount" class="control-label col-md-8">State Tax Amount</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input id="state_tax_amount" class="form-control input-sm" type="text" name="state_tax_amount" value="" />
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Pre-tax Deductions</legend>
                    <div class="form-group">
                        <label for="ret_plan" class="control-label col-md-8">401k/403b Retirement Plan</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input id="ret_plan" class="form-control input-sm" type="text" name="ret_plan" value="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="health_premium" class="control-label col-md-8">Health Insurance Premium</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input id="health_premium" class="form-control input-sm" type="text" name="health_premium" value="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dental_premium" class="control-label col-md-8">Dental Insurance Premium</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input id="dental_premium" class="form-control input-sm" type="text" name="dental_premium" value="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="vision_premium" class="control-label col-md-8">Vision Insurance Premium</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input id="vision_premium" class="form-control input-sm" type="text" name="vision_premium" value="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hsa_fsa" class="control-label col-md-8">HSAs &amp; FSAs</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input id="hsa_fsa" class="form-control input-sm" type="text" name="hsa_fsa" value="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="other_pre_tax_deductions" class="control-label col-md-8">Other pre-tax deductions</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input id="other_pre_tax_deductions" class="form-control input-sm" type="text" name="other_pre_tax_deductions" value="">
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Post-tax Deductions</legend>
                    <div class="form-group">
                        <label for="child_support" class="control-label col-md-8">Child Support</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input id="child_support" class="form-control input-sm" type="text" name="child_support" value="" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="garnishments" class="control-label col-md-8">Garnishments</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input id="garnishments" class="form-control input-sm" type="text" name="garnishments" value="" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="roth_401" class="control-label col-md-8">Roth 401k</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input id="roth_401" class="form-control input-sm" type="text" name="roth_401" value="" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="life_premium" class="control-label col-md-8">Life Insurance Premium</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input id="life_premium" class="form-control input-sm" type="text" name="life_premium" value="" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="charity" class="control-label col-md-8">Charitable Contributions</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input id="charity" class="form-control input-sm" type="text" name="charity" value="" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="other_post_tax_deductions" class="control-label col-md-8">Other post-tax deductions</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input id="other_post_tax_deductions" class="form-control input-sm" type="text" name="other_post_tax_deductions" value="" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>

        <div style="text-align:center">
            <button class="btn btn-primary" type="button" name="button" id="calculator_button">CALCULATE</button>
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

<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->

<style media="screen">
#overtime_calculator{max-width:800px;margin:0 auto;position:relative;}#overtime_calculator .radio_label{font-size:14px!important}#overtime_calculator #calculator_button{color:#fff}#overtime_calculator table tbody tr{border-bottom:1px solid #3e3e3e}#overtime_calculator table tbody tr td:last-child{text-align:right}#overtime_calculator .input-error{border:1px solid red}#overtime_calculator .input-error-message{display:block;overflow:hidden;text-align:center;border:1px solid transparent;color:red;padding:5px}#overtime_calculator #ui-datepicker-div{z-index:2!important}#overtime_calculator .input-error-message{display:block;overflow:hidden;text-align:center;border:1px solid transparent;color:red;padding:5px}#overtime_calculator .input-sm{height:30px!important;padding:5px 10px!important;font-size:12px!important;line-height:1.5!important;border-radius:3px!important}#overtime_calculator .radio input[type="radio"],#overtime_calculator .radio input.radio{margin:4px 0 0 -20px!important}#overtime_calculator .date-addon{font-size:10px!important}
.text-center{text-align:center}.form-group{margin-bottom:20px}.input-group{position:relative;display:table;border-collapse:separate}.input-group.col{float:none;padding-right:0;padding-left:0}.input-group .form-control{width:100%;margin-bottom:0}.input-group-lg>.form-control,.input-group-lg>.input-group-addon,.input-group-lg>.input-group-btn>.btn{height:45px;padding:10px 16px;font-size:18px;line-height:1.33;border-radius:6px}select.input-group-lg>.form-control,select.input-group-lg>.input-group-addon,select.input-group-lg>.input-group-btn>.btn{height:45px;line-height:45px}textarea.input-group-lg>.form-control,textarea.input-group-lg>.input-group-addon,textarea.input-group-lg>.input-group-btn>.btn{height:auto}.input-group-sm>.form-control,.input-group-sm>.input-group-addon,.input-group-sm>.input-group-btn>.btn{height:30px;padding:5px 10px;font-size:12px;line-height:1.5;border-radius:3px}select.input-group-sm>.form-control,select.input-group-sm>.input-group-addon,select.input-group-sm>.input-group-btn>.btn{height:30px;line-height:30px}textarea.input-group-sm>.form-control,textarea.input-group-sm>.input-group-addon,textarea.input-group-sm>.input-group-btn>.btn{height:auto}.input-group-addon,.input-group-btn,.input-group .form-control{display:table-cell}.input-group-addon:not(:first-child):not(:last-child),.input-group-btn:not(:first-child):not(:last-child),.input-group .form-control:not(:first-child):not(:last-child){border-radius:0}.input-group-addon,.input-group-btn{width:1%;white-space:nowrap;vertical-align:middle}.input-group-addon{padding:6px 12px;font-size:14px;font-weight:400;line-height:1;color:#555;text-align:center;background-color:#eee;border:1px solid #ccc;border-radius:4px}.input-group-addon.input-sm{padding:5px 10px;font-size:12px;border-radius:3px}.input-group-addon.input-lg{padding:10px 16px;font-size:18px;border-radius:6px}.input-group-addon input[type="radio"],.input-group-addon input[type="checkbox"]{margin-top:0}.input-group .form-control:first-child,.input-group-addon:first-child,.input-group-btn:first-child>.btn,.input-group-btn:first-child>.dropdown-toggle,.input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle){border-top-right-radius:0;border-bottom-right-radius:0}.input-group-addon:first-child{border-right:0}.input-group .form-control:last-child,.input-group-addon:last-child,.input-group-btn:last-child>.btn,.input-group-btn:last-child>.dropdown-toggle,.input-group-btn:first-child>.btn:not(:first-child){border-bottom-left-radius:0;border-top-left-radius:0}.input-group-addon:last-child{border-left:0}.input-group-btn{position:relative;white-space:nowrap}.input-group-btn:first-child>.btn{margin-right:-1px}.input-group-btn:last-child>.btn{margin-left:-1px}.input-group-btn>.btn{position:relative}.input-group-btn>.btn + .btn{margin-left:-4px}.input-group-btn>.btn:hover,.input-group-btn>.btn:active{z-index:2}
</style>
