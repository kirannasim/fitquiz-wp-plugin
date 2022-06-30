<div id="quiz_6GJBtT47">
    <div id="credit_card_rewards_calculator">
    <form class="form credit_calculator_form" id="credit_card_rewards_calculator_form"> 
        <div class="form-group">
            <label for="travel_expenses" class="control-label">Airfare, Hotels &amp; Other Travel Monthly Spending</label>
            <div class="input-group">
                <div class="input-group-addon">$</div>
                <input id="travel_expenses" class="form-control input-sm" type="text" name="travel_expenses" value="0.00" autocomplete="off">
            </div>
        </div>

        <div class="form-group">
            <label for="office_expenses" class="control-label">Office Supplies &amp; Advertising Monthly Spending</label>
            <div class="input-group">
                <div class="input-group-addon">$</div>
                <input id="office_expenses" class="form-control input-sm" type="text" name="office_expenses" value="0.00" autocomplete="off">
            </div>
        </div>

        <div class="form-group">
            <label for="meal_expenses" class="control-label">Restaurants &amp; Gas Stations Monthly Spending</label>
            <div class="input-group">
                <div class="input-group-addon">$</div>
                <input id="meal_expenses" class="form-control input-sm" type="text" name="meal_expenses" value="0.00" autocomplete="off">
            </div>
        </div>

        <div class="form-group">
            <label for="communication_expenses" class="control-label">Telecommunication Services Monthly Spending</label>
            <div class="input-group">
                <div class="input-group-addon">$</div>
                <input id="communication_expenses" class="form-control input-sm" type="text" name="communication_expenses" value="0.00" autocomplete="off">
            </div>
        </div>

        <div class="form-group">
            <label for="other_expenses" class="control-label">Other Monthly Spending</label>
            <div class="input-group">
                <div class="input-group-addon">$</div>
                <input id="other_expenses" class="form-control input-sm" type="text" name="other_expenses" value="0.00" autocomplete="off">
            </div>
        </div>

        <div style="text-align:center">
            <button class="btn btn-primary" onclick="check_before_submit_credit(this)" type="button" name="button" id="calculator_button">CALCULATE</button>
        </div>

        <input type="hidden" name="quiz_id" value="<?php echo $quiz->quiz_id ?>">
		<input type="hidden" name="quiz_slug" value="<?php echo $quiz->slug ?>">


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
#credit_card_rewards_calculator{max-width:800px;margin:0 auto;position:relative}
.radio_label{
font-size: 14px !important;
}
#calculator_button{
	color: #fff;
}
.text-center{text-align:center}.form-group{margin-bottom:20px}.input-group{position:relative;display:table;border-collapse:separate}.input-group.col{float:none;padding-right:0;padding-left:0}.input-group .form-control{width:100%;margin-bottom:0}.input-group-lg>.form-control,.input-group-lg>.input-group-addon,.input-group-lg>.input-group-btn>.btn{height:45px;padding:10px 16px;font-size:18px;line-height:1.33;border-radius:6px}select.input-group-lg>.form-control,select.input-group-lg>.input-group-addon,select.input-group-lg>.input-group-btn>.btn{height:45px;line-height:45px}textarea.input-group-lg>.form-control,textarea.input-group-lg>.input-group-addon,textarea.input-group-lg>.input-group-btn>.btn{height:auto}.input-group-sm>.form-control,.input-group-sm>.input-group-addon,.input-group-sm>.input-group-btn>.btn{height:30px;padding:5px 10px;font-size:12px;line-height:1.5;border-radius:3px}select.input-group-sm>.form-control,select.input-group-sm>.input-group-addon,select.input-group-sm>.input-group-btn>.btn{height:30px;line-height:30px}textarea.input-group-sm>.form-control,textarea.input-group-sm>.input-group-addon,textarea.input-group-sm>.input-group-btn>.btn{height:auto}.input-group-addon,.input-group-btn,.input-group .form-control{display:table-cell}.input-group-addon:not(:first-child):not(:last-child),.input-group-btn:not(:first-child):not(:last-child),.input-group .form-control:not(:first-child):not(:last-child){border-radius:0}.input-group-addon,.input-group-btn{width:1%;white-space:nowrap;vertical-align:middle}.input-group-addon{padding:6px 12px;font-size:14px;font-weight:400;line-height:1;color:#555;text-align:center;background-color:#eee;border:1px solid #ccc;border-radius:4px}.input-group-addon.input-sm{padding:5px 10px;font-size:12px;border-radius:3px}.input-group-addon.input-lg{padding:10px 16px;font-size:18px;border-radius:6px}.input-group-addon input[type="radio"],.input-group-addon input[type="checkbox"]{margin-top:0}.input-group .form-control:first-child,.input-group-addon:first-child,.input-group-btn:first-child>.btn,.input-group-btn:first-child>.dropdown-toggle,.input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle){border-top-right-radius:0;border-bottom-right-radius:0}.input-group-addon:first-child{border-right:0}.input-group .form-control:last-child,.input-group-addon:last-child,.input-group-btn:last-child>.btn,.input-group-btn:last-child>.dropdown-toggle,.input-group-btn:first-child>.btn:not(:first-child){border-bottom-left-radius:0;border-top-left-radius:0}.input-group-addon:last-child{border-left:0}.input-group-btn{position:relative;white-space:nowrap}.input-group-btn:first-child>.btn{margin-right:-1px}.input-group-btn:last-child>.btn{margin-left:-1px}.input-group-btn>.btn{position:relative}.input-group-btn>.btn + .btn{margin-left:-4px}.input-group-btn>.btn:hover,.input-group-btn>.btn:active{z-index:2}
</style>
