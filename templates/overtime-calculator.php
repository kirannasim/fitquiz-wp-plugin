<div id="overtime_calculator">
    <form id="overtime_calculator_form" class="form-horizontal">
        <input type="hidden" name="quiz_id" value="<?php echo $quiz->quiz_id ?>">
        <input type="hidden" name="quiz_slug" value="<?php echo $quiz->slug; ?>">
        
        <div class="form-group">
            <label for="check_date" class="control-label col-sm-4">Check Date</label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    <input id="check_date" class="form-control  datepicker" name="check_date" type="text" value="<?php echo date('m/d/Y'); ?>" />
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="reg_hours_pay_rate" class="control-label col-sm-4">Regular Hourly Pay Rate</label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">#</span>
                    <input id="reg_hours_pay_rate" class="form-control " name="reg_hours_pay_rate" type="text" value="" />
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="hours_worked_in_pay_period" class="control-label col-sm-4">Number of Regular Hours Worked in Pay Period</label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">#</span>
                    <input id="hours_worked_in_pay_period" class="form-control " name="hours_worked_in_pay_period" type="text" value="" />
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="ot_worked_at_time_and_half" class="control-label col-sm-4">Overtime Hours Worked at Time &amp; a Half</label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">#</span>
                    <input id="ot_worked_at_time_and_half" class="form-control " name="ot_worked_at_time_and_half" type="text" value="" />
                </div> 
            </div>
        </div>

        <div class="form-group">
            <label for="alt_ot_percentage_of_reg_rate" class="control-label col-sm-4">Alternate Overtime Rate as a Percentage of Regular Rate</label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">%</span>
                    <input id="alt_ot_percentage_of_reg_rate" class="form-control " name="alt_ot_percentage_of_reg_rate" type="text" value="200" />
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <label for="ot_alt_rate_worked" class="control-label col-sm-4">Overtime Hours Worked at Alternate Rate</label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">#</span>
                    <input id="ot_alt_rate_worked" class="form-control " name="ot_alt_rate_worked" type="text" value="1.75" />
                </div>
            </div>
        </div>

        <div class="form-group text-center">
            <button id="calculator_button" class="btn btn-orange" type="button" nonclick="overtime_calculator(<?php echo $quiz->quiz_id; ?>)">Calculate My Overtime Pay</button>
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