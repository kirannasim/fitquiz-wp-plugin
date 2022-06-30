<div id="wci_cost_calculator">
    <form id="wci_cost_calculator_form" class="form">
        <input type="hidden" name="quiz_id" value="<?php echo $quiz->quiz_id; ?>" />
        <input type="hidden" name="quiz_slug" value="<?php echo $quiz->slug; ?>" />

        <div class="form-group">
            <label for="" class="control-label">Class Code Rate</label>
            <input id="code_cost" class="form-control input-sm" type="text" name="code_cost" value="" />
        </div>

        <div class="form-group">
            <label for="" class="control-label">Total Payroll</label>
            <input id="total_payroll" class="form-control input-sm" type="text" name="total_payroll" value="" />
        </div>

        <div class="form-group">
            <label for="" class="control-label">Experience Modification Rate</label>
            <input id="mod_rate" class="form-control input-sm" type="text" name="mod_rate" value="" />
        </div>

        <div class="clearfix"></div>
        <br>
        <div style="text-align:center">
            <button onclick="wci_cost_calculator()" type="button" name="button" id="calculator_button" class="btn btn-orange">CALCULATE</button>
        </div>
    </form>

    <div style="margin:20px 0;"></div>
    
    <div id="response"></div>
     
    <?php if( isset($quiz->nomatch) && $quiz->nomatch != '' ): ?>
    <div id="html" style="display:none">
        <div class="row text-center">
            <div class="col-md-12">
            <?php echo $quiz->nomatch; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<style media="screen">
#wci_cost_calculator{max-width:800px;margin:0 auto;position:relative}#wci_cost_calculator .radio_label{font-size:14px!important}#wci_cost_calculator .input-sm{height:30px!important;padding:5px 10px!important;font-size:12px!important;line-height:1.5!important;border-radius:3px!important}#wci_cost_calculator .radio input[type="radio"],#wci_cost_calculator .radio input.radio{margin:4px 0 0 -20px!important}#wci_cost_calculator input.invalid{background-color:#fdd}#wci_cost_calculator .input-error{border:1px solid red}#wci_cost_calculator .input-error-message{display:block;overflow:hidden;border:1px solid transparent;color:red;padding:5px}#wci_cost_calculator .btn-orange{border:1px solid #ed833f;background-color:#ed833f;color:#fff;text-shadow:#888 0 0 1px}#wci_cost_calculator #loading{position:absolute;top:0;left:0;background:#ddd;width:100%;height:100%;z-index:9999}#wci_cost_calculator #loading span{position:absolute;top:50%;left:50%;font-weight:700;color:#ed833f;transform:translate(-50%,-50%);text-transform:uppercase;letter-spacing:5px}
</style>
