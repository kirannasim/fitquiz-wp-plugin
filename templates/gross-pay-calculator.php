<div id="gross_pay_calculator">
    <form id="gross_pay_calculator_form" class="form">
        <input type="hidden" name="quiz_id" value="<?php echo $quiz->quiz_id ?>">
        <input type="hidden" name="quiz_slug" value="<?php echo $quiz->slug; ?>">
        
        <div id="emp_type" class="text-center">
            <p>Employee Type</p>
            <label class="radio-inline">
                <input id="hourly" type="radio" name="emp_type" value="hourly" checked="checked"> Hourly
            </label>
            <label class="radio-inline">
                <input id="salaried" type="radio" name="emp_type" value="salaried"> Salaried
            </label>
        </div>

        <div id="wrapper">
            <div class="form-group">
                <label for="check_date" class="control-label">Check Date</label>
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    <input id="check_date" class="form-control datepicker input-sm" name="check_date" type="text" value="<?php echo date('m/d/Y'); ?>" required/>
                </div>
            </div>
            <!-- Stage One -->
            <div id="stage_one">
                <div class="form-group">
                    <label for="reg_hourly_pay_rate" class="control-label">Regular Hourly Pay Rate</label>
                    <div class="input-group">
                        <span class="input-group-addon">$</span>
                        <input id="reg_hourly_pay_rate" class="form-control input-sm" name="reg_hourly_pay_rate" type="text" value=""/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="reg_hours_worked" class="control-label">Number of Hours Worked in Pay Period (No Overtime)</label>
                    <div class="input-group">
                        <span class="input-group-addon">#</span>
                        <input id="reg_hours_worked" class="form-control input-sm" name="reg_hours_worked" type="text" value=""/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ot_hours_worked" class="control-label">Overtime Hours Worked</label>
                    <div class="input-group">
                        <span class="input-group-addon">#</span>
                        <input id="ot_hours_worked" class="form-control input-sm" name="ot_hours_worked" type="text" value="0" />
                    </div>
                </div>
            </div>
            <!-- Stage One -->
            <!-- Stage Two -->
            <div id="stage_two">
                <div id="salaried_type" class="text-center">
                    <p>Which of the following describes the employee?</p>
                    <label class="radio-inline">
                        <input id="salaried_type_exempt" type="radio" name="salaried_type" value="exempt" checked="checked"> Exempt Salaried
                    </label>
                    <label class="radio-inline">
                        <input id="salaried_type_nonexempt" type="radio" name="salaried_type" value="nonexempt"> Nonexempt Salaried
                    </label>
                </div>
                <div class="form-group">
                    <label for="pay_frequency" class="control-label">Pay Frequency</label>
                    <select id="pay_frequency" name="pay_frequency" class="form-control input-sm" >
                        <option value="">-- Select Option --</option>
                        <option value="52">Weekly</option>
                        <option value="26">Bi Weekly</option>
                        <option value="24">Bi Monthly</option>
                        <option value="12">Monthly</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="annual_salary_amount" class="control-label">Annual Salary Amount</label>
                    <div class="input-group">
                        <span class="input-group-addon">$</span>
                        <input id="annual_salary_amount" class="form-control input-sm" name="annual_salary_amount" type="text" value=""/>
                    </div>
                </div>
                <!-- Non Exempt -->
                <div id="salaried_nonexempt">
                    <div class="form-group">
                        <label for="ot_salaried_nonexempt" class="control-label">Overtime Hours Worked</label>
                        <div class="input-group">
                            <span class="input-group-addon">#</span>
                            <input id="ot_salaried_nonexempt" class="form-control input-sm" name="ot_salaried_nonexempt" type="text" value="0" />
                        </div>
                    </div>  
                </div>
                <!-- Non Exempt -->
            </div>
            <!-- Stage Two -->
            <div class="form-group">
                <label for="commission" class="control-label">Commission</label>
                <div class="input-group">
                    <span class="input-group-addon">$</span>
                    <input id="commission" class="form-control input-sm" name="commission" type="text" value="0" />
                </div>
            </div>
            <div class="form-group">
                <label for="tips" class="control-label">Tips</label>
                <div class="input-group">
                    <span class="input-group-addon">$</span>
                    <input id="tips" class="form-control input-sm" name="tips" type="text" value="0" />
                </div>
            </div>
            <div class="form-group">
                <label for="bonus" class="control-label">Bonus</label>
                <div class="input-group">
                    <span class="input-group-addon">$</span>
                    <input id="bonus" class="form-control input-sm" name="bonus" type="text" value="0" />
                </div>
            </div>
            <div class="form-group">
                <label for="paid_time_off" class="control-label">Paid Time Off</label>
                <div class="input-group">
                    <span class="input-group-addon">$</span>
                    <input id="paid_time_off" class="form-control input-sm" name="paid_time_off" type="text" value="0" />
                </div>
            </div>
            <div class="form-group">
                <label for="benifits" class="control-label">Employer Provided Benifits</label>
                <div class="input-group">
                    <span class="input-group-addon">$</span>
                    <input id="benifits" class="form-control input-sm" name="benifits" type="text" value="0" />
                </div>
            </div>
            <div class="form-group">
                <label for="other_income" class="control-label">Other Eligible Income</label>
                <div class="input-group">
                    <span class="input-group-addon">$</span>
                    <input id="other_income" class="form-control input-sm" name="other_income" type="text" value="0" />
                </div>
            </div>
        </div>


        <div class="form-group text-center">
            <button class="btn btn-orange" type="button" onclick="gross_pay_calculator(<?php echo $quiz->quiz_id; ?>)">Calculate</button>
        </div>
    </form>
    <div style="margin:20px 0;"></div>
    <div id="response"></div>
    <?php if( isset($quiz->nomatch) && $quiz->nomatch != '' ): ?>
    <div id="html" style="display:none">
        <div class="row text-center">
            <div class="col-md-12">
            <?php echo $quiz->nomatch ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>