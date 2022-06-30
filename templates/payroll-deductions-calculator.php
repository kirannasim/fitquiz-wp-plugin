<div id="payroll_deductions_calculator" class="container">
    <div id="pdc_calculator">
    <form class="form-horizontal" id="pdc_calculator_form">
        <input type="hidden" name="quiz_id" value="<?php echo $quiz->quiz_id ?>">
        <input type="hidden" name="quiz_slug" value="<?php echo $quiz->slug; ?>">
        
        <div class="panel panel-primary">
            <!-- <div class="panel-heading">Payrol Deduction Calculator</div> -->
            <div class="panel-body">
                <fieldset>
                    <legend>Employee Information</legend>
                    <div class="form-group">
                        <label for="" class="control-label col-md-8">Employee Type</label>
                        <div class="col-md-4">
                            <div class="checkbox">
                                <label>
                                    <input id="employee_type" type="radio" name="employee_type" value="hourly" checked="checked"> Hourly
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input id="employee_type" type="radio" name="employee_type" value="salary"> Salaried
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div id="hourly-inputs">
                    <fieldset>
                        <div class="form-group">
                            <label for="hourly_rate" class="control-label col-md-8">Hourly Rate</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="hourly_rate" class="form-control input-sm" type="text" name="hourly_rate" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="hours_per_period" class="control-label col-md-8">Number of Hours Worked in Pay Period</label>
                            <div class="col-md-4">
                                <input id="hours_per_period" class="form-control input-sm" type="text" name="hours_per_period" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fed_tax_rate" class="control-label col-md-8">Federal Tax Rate</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input id="fed_tax_rate" class="form-control input-sm" type="text" name="fed_tax_rate" value="" />
                                    <div class="input-group-addon">%</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="state_tax_rate" class="control-label col-md-8">State and Local Tax Rate</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input id="state_tax_rate" class="form-control input-sm" type="text" name="state_tax_rate" value="" />
                                    <div class="input-group-addon">%</div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Pre-tax Deductions:</legend>
                        <div class="form-group">
                            <label for="ret_plan" class="control-label col-md-8">401k/403b Retirement Plan</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="ret_plan" class="form-control input-sm" type="text" name="ret_plan" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="health_premium" class="control-label col-md-8">Health Insurance Premium</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="health_premium" class="form-control input-sm" type="text" name="health_premium" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dental_premium" class="control-label col-md-8">Dental Insurance Premium</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="dental_premium" class="form-control input-sm" type="text" name="dental_premium" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="vision_premium" class="control-label col-md-8">Vision Insurance Premium</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="vision_premium" class="form-control input-sm" type="text" name="vision_premium" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="health_safty_account" class="control-label col-md-8">HSAs &amp; FSAs</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="health_safty_account" class="form-control input-sm" type="text" name="health_safty_account" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="other_pre_tax_deductions" class="control-label col-md-8">Other pre-tax deductions</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="other_pre_tax_deductions" class="form-control input-sm" type="text" name="other_pre_tax_deductions" value="" />
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Post-tax Deductions:</legend>
                        <div class="form-group">
                            <label for="child_support" class="control-label col-md-8">Child support</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="child_support" class="form-control input-sm" type="text" name="child_support" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="garnishments" class="control-label col-md-8">Garnishments</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="garnishments" class="form-control input-sm" type="text" name="garnishments" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="roth_401k" class="control-label col-md-8">Roth 401k</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="roth_401k" class="form-control input-sm" type="text" name="roth_401k" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="life_premium" class="control-label col-md-8">Life Insurance Premium</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="life_premium" class="form-control input-sm" type="text" name="life_premium" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="charity" class="control-label col-md-8">Charitable Contributions</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="charity" class="form-control input-sm" type="text" name="charity" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="post_tax_deductions" class="control-label col-md-8">Other post-tax deductions</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="post_tax_deductions" class="form-control input-sm" type="text" name="post_tax_deductions" value="" />
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div id="salary-inputs" style="display:none">
                    <fieldset>
                        <legend></legend>
                        <div class="form-group">
                            <label for="salary_pay_rate" class="control-label col-md-7">Annual Salary Pay Rate</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="salary_pay_rate" class="form-control input-sm" type="text" name="salary_pay_rate" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label col-md-7">Pay Frequency</label>
                            <div class="col-md-5">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="pay_frequency" value="weekly">
                                        Weekly
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="pay_frequency" value="biweekly">
                                        Bi-Weekly
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="pay_frequency" value="bimonthly">
                                        Bi-Monthly
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="pay_frequency" value="monthly">
                                        Monthly
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="pay_frequency" value="quarterly">
                                        Quarterly
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="pay_frequency" value="semi-annually">
                                        Semi-Annually
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="pay_frequency" value="annually">
                                        Annually
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="salary_federal_tax_rate" class="control-label col-md-7">Federal Tax Rate</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                <input id="salary_federal_tax_rate" class="form-control input-sm" type="text" name="salary_federal_tax_rate" value="" />
                                <div class="input-group-addon">%</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="salary_state_local_tax_rate" class="control-label col-md-7">State and Local Tax Rate</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <input id="salary_state_local_tax_rate" class="form-control input-sm" type="text" name="salary_state_local_tax_rate" value="">
                                    <div class="input-group-addon">%</div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Pre-tax Deductions</legend>
                        <div class="form-group">
                            <label for="salary_ret_plan" class="control-label col-md-7">401k/403b Retirement Plan</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="salary_ret_plan" class="form-control input-sm" type="text" name="salary_ret_plan" value="" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="salary_health_premium" class="control-label col-md-7">Health Insurance Premium</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="salary_health_premium" class="form-control input-sm" type="text" name="salary_health_premium" value="" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="salary_dental_premium" class="control-label col-md-7">Dental Insurance Premium</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="salary_dental_premium" class="form-control input-sm" type="text" name="salary_dental_premium" value="" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="salary_vision_premium" class="control-label col-md-7">Vision Insurance Premium</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="salary_vision_premium" class="form-control input-sm" type="text" name="salary_vision_premium" value="" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="salary_hsa_fsa" class="control-label col-md-7">HSAs & FSAs</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="salary_hsa_fsa" class="form-control input-sm" type="text" name="salary_hsa_fsa" value="" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="salary_other_pre_tax" class="control-label col-md-7">Other pre-tax deductions</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="salary_other_pre_tax" class="form-control input-sm" type="text" name="salary_other_pre_tax" value="" >
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Post-tax Deductions</legend>
                        <div class="form-group">
                            <label for="salary_child_support" class="control-label col-md-7">Child Support</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="salary_child_support" class="form-control input-sm" type="text" name="salary_child_support" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="salary_garnishments" class="control-label col-md-7">Garnishments</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="salary_garnishments" class="form-control input-sm" type="text" name="salary_garnishments" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="salary_roth" class="control-label col-md-7">Roth 401k</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="salary_roth" class="form-control input-sm" type="text" name="salary_roth" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="salary_life_premium" class="control-label col-md-7">Life Insurance Premium</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="salary_life_premium" class="form-control input-sm" type="text" name="salary_life_premium" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="salary_charity" class="control-label col-md-7">Charitable Contributions</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="salary_charity" class="form-control input-sm" type="text" name="salary_charity" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="salary_post_tax_deductions" class="control-label col-md-7">Other post-tax deductions</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="salary_post_tax_deductions" class="form-control input-sm" type="text" name="salary_post_tax_deductions" value="">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div> <!-- Panel Body -->
        </div>
        
        

        <div style="text-align:center">
            <button class="btn btn-info" type="button" name="button" id="calculator_button">CALCULATE</button>
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
</div>


<style media="screen">
#payroll_deductions_calculator .container{display:flex;justify-content:center}#payroll_deductions_calculator .calculator_preview{max-width:800px}#payroll_deductions_calculator .input-error{border:1px solid red}#payroll_deductions_calculator .input-error-message{display:block;overflow:hidden;text-align:center;border:1px solid transparent;color:red;padding:5px}#payroll_deductions_calculator .input-sm{height:30px!important;padding:5px 10px!important;font-size:12px!important;line-height:1.5!important;border-radius:3px!important}#payroll_deductions_calculator .radio input[type="radio"],.radio input.radio{margin:4px 0 0 -20px!important}#payroll_deductions_calculator .page-header{border-bottom:none}
.text-center{text-align:center}.form-group{margin-bottom:20px}.input-group{position:relative;display:table;border-collapse:separate}.input-group.col{float:none;padding-right:0;padding-left:0}.input-group .form-control{width:100%;margin-bottom:0}.input-group-lg>.form-control,.input-group-lg>.input-group-addon,.input-group-lg>.input-group-btn>.btn{height:45px;padding:10px 16px;font-size:18px;line-height:1.33;border-radius:6px}select.input-group-lg>.form-control,select.input-group-lg>.input-group-addon,select.input-group-lg>.input-group-btn>.btn{height:45px;line-height:45px}textarea.input-group-lg>.form-control,textarea.input-group-lg>.input-group-addon,textarea.input-group-lg>.input-group-btn>.btn{height:auto}.input-group-sm>.form-control,.input-group-sm>.input-group-addon,.input-group-sm>.input-group-btn>.btn{height:30px;padding:5px 10px;font-size:12px;line-height:1.5;border-radius:3px}select.input-group-sm>.form-control,select.input-group-sm>.input-group-addon,select.input-group-sm>.input-group-btn>.btn{height:30px;line-height:30px}textarea.input-group-sm>.form-control,textarea.input-group-sm>.input-group-addon,textarea.input-group-sm>.input-group-btn>.btn{height:auto}.input-group-addon,.input-group-btn,.input-group .form-control{display:table-cell}.input-group-addon:not(:first-child):not(:last-child),.input-group-btn:not(:first-child):not(:last-child),.input-group .form-control:not(:first-child):not(:last-child){border-radius:0}.input-group-addon,.input-group-btn{width:1%;white-space:nowrap;vertical-align:middle}.input-group-addon{padding:6px 12px;font-size:14px;font-weight:400;line-height:1;color:#555;text-align:center;background-color:#eee;border:1px solid #ccc;border-radius:4px}.input-group-addon.input-sm{padding:5px 10px;font-size:12px;border-radius:3px}.input-group-addon.input-lg{padding:10px 16px;font-size:18px;border-radius:6px}.input-group-addon input[type="radio"],.input-group-addon input[type="checkbox"]{margin-top:0}.input-group .form-control:first-child,.input-group-addon:first-child,.input-group-btn:first-child>.btn,.input-group-btn:first-child>.dropdown-toggle,.input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle){border-top-right-radius:0;border-bottom-right-radius:0}.input-group-addon:first-child{border-right:0}.input-group .form-control:last-child,.input-group-addon:last-child,.input-group-btn:last-child>.btn,.input-group-btn:last-child>.dropdown-toggle,.input-group-btn:first-child>.btn:not(:first-child){border-bottom-left-radius:0;border-top-left-radius:0}.input-group-addon:last-child{border-left:0}.input-group-btn{position:relative;white-space:nowrap}.input-group-btn:first-child>.btn{margin-right:-1px}.input-group-btn:last-child>.btn{margin-left:-1px}.input-group-btn>.btn{position:relative}.input-group-btn>.btn + .btn{margin-left:-4px}.input-group-btn>.btn:hover,.input-group-btn>.btn:active{z-index:2}
</style>
