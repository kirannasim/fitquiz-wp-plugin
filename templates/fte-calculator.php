<div id="fte_calculator">
    <form id="fte_calculator_form" class="form">
        <input type="hidden" name="quiz_id" value="<?php echo $quiz->quiz_id ?>">
        <input type="hidden" name="quiz_slug" value="<?php echo $quiz->slug; ?>">
        
        <div id="occurrence-buttons" class="text-center">
            <label class="radio-inline">
                <input type="radio" name="occurrence" value="week" checked="checked"> Weekly
            </label>
            <label class="radio-inline">
                <input type="radio" name="occurrence" value="month"> Monthly
            </label>
            <label class="radio-inline">
                <input type="radio" name="occurrence" value="annually"> Annually
            </label>
        </div>

        <div class="form-group">
            <label for="pt-hours" class="control-label">Total Part-time hours worked</label>
            <input id="pt-hours" class="form-control input-sm" type="text" name="pt-hours" data-val="60" value="60" />
        </div>

        <div class="form-group">
            <label for="pt-emp" class="control-label">Number of part-time employees</label>
            <input id="pt-emp" class="form-control input-sm" type="text" name="pt-emp" data-val="10" value="10" />
        </div>

        <div class="form-group">
            <label for="ft-hours" class="control-label">Total Full-time hours worked</label>
            <input id="ft-hours" class="form-control input-sm" type="text" name="ft-hours" data-val="40" value="40" />
        </div>

        <div class="form-group">
            <label for="ft-emp" class="control-label">Number of Full-Time Workers</label>
            <input id="ft-emp" class="form-control input-sm" type="text" name="ft-emp" data-val="32" value="32" />
        </div>


        <div class="form-group text-center">
            <button id="calculate_form" class="btn btn-orange" type="button">Calculate</button>
        </div>
    </form>
    <div style="margin:20px 0;"></div>
    <div id="response"></div>
    <?php if( isset($quiz->nomatch) ): ?>
    <div id="html" style="display:none">
        <div class="row text-center">
            <div class="col-md-12">
            <?php echo $quiz->nomatch ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
<script type="text/javascript">
   jQuery(document).ready(function($j){$j('#occurrence-buttons').find('input').on('change',function(){var value=$j(this).val();if(value!=='week'){$j('#fte_calculator_form .form-group input').val('')}else{var inputs=$j('#fte_calculator_form .form-group input[type="text"]');$j.each(inputs,function(index,field){$j(field).val($j(field).data('val'))})}});$j('#fte_calculator_form input').on('blur',function(){$j(this).removeClass('input-error');$j(this).parent().siblings('.input-error-message').remove()});$j('#calculate_form').on('click',function(e){e.preventDefault();$j.ajax({url:custom_vars.admin_url+'admin-ajax.php',type:'POST',dataType:'JSON',data:{action:'submit_calculator',data:$j("#fte_calculator_form").serialize()},beforeSend:function(){$j('.input-error-message').remove();$j('.input-error').removeClass('input-error');$j('#fte_calculator_form').after('<div id="loading"><span>Calculating...</span></div>')},success:function(response){if(response.status==false){$j('#'+response.input).addClass('input-error').parents('.form-group').append(response.message);$j('#'+response.input).focus()}if(response.status==true){$j('#fte_calculator_form').remove();$j("#response").html(response.message);$j("#response").show();$j("#html").show()}$j('#loading').remove()}})})});
</script>
<style>
#fte_calculator{max-width:800px;margin:0 auto;position:relative}#fte_calculator .input-sm{height:30px!important;padding:5px 10px!important;font-size:12px!important;line-height:1.5!important;border-radius:3px!important}#fte_calculator .radio_label{font-size:14px!important}#fte_calculator input.invalid{background-color:#fdd}#fte_calculator .input-error{border:1px solid red}#fte_calculator .text-color-primary{color:#008080}#fte_calculator .input-error-message{display:block;overflow:hidden;border:1px solid transparent;color:red;padding:5px}.btn-orange{border:1px solid #ed833f;background-color:#ed833f;color:#fff;text-shadow:#888 0 0 1px}.btn-orange:hover{color:#f6c19f}#fte_calculator #loading{position:absolute;top:0;left:0;background:#ddd;width:100%;height:100%;z-index:9999}#fte_calculator #loading span{position:absolute;top:50%;left:50%;font-weight:700;color:#ed833f;transform:translate(-50%,-50%);text-transform:uppercase;letter-spacing:5px}
.text-center{text-align:center}.form-group{margin-bottom:20px}.input-group{position:relative;display:table;border-collapse:separate}.input-group.col{float:none;padding-right:0;padding-left:0}.input-group .form-control{width:100%;margin-bottom:0}.input-group-lg>.form-control,.input-group-lg>.input-group-addon,.input-group-lg>.input-group-btn>.btn{height:45px;padding:10px 16px;font-size:18px;line-height:1.33;border-radius:6px}select.input-group-lg>.form-control,select.input-group-lg>.input-group-addon,select.input-group-lg>.input-group-btn>.btn{height:45px;line-height:45px}textarea.input-group-lg>.form-control,textarea.input-group-lg>.input-group-addon,textarea.input-group-lg>.input-group-btn>.btn{height:auto}.input-group-sm>.form-control,.input-group-sm>.input-group-addon,.input-group-sm>.input-group-btn>.btn{height:30px;padding:5px 10px;font-size:12px;line-height:1.5;border-radius:3px}select.input-group-sm>.form-control,select.input-group-sm>.input-group-addon,select.input-group-sm>.input-group-btn>.btn{height:30px;line-height:30px}textarea.input-group-sm>.form-control,textarea.input-group-sm>.input-group-addon,textarea.input-group-sm>.input-group-btn>.btn{height:auto}.input-group-addon,.input-group-btn,.input-group .form-control{display:table-cell}.input-group-addon:not(:first-child):not(:last-child),.input-group-btn:not(:first-child):not(:last-child),.input-group .form-control:not(:first-child):not(:last-child){border-radius:0}.input-group-addon,.input-group-btn{width:1%;white-space:nowrap;vertical-align:middle}.input-group-addon{padding:6px 12px;font-size:14px;font-weight:400;line-height:1;color:#555;text-align:center;background-color:#eee;border:1px solid #ccc;border-radius:4px}.input-group-addon.input-sm{padding:5px 10px;font-size:12px;border-radius:3px}.input-group-addon.input-lg{padding:10px 16px;font-size:18px;border-radius:6px}.input-group-addon input[type="radio"],.input-group-addon input[type="checkbox"]{margin-top:0}.input-group .form-control:first-child,.input-group-addon:first-child,.input-group-btn:first-child>.btn,.input-group-btn:first-child>.dropdown-toggle,.input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle){border-top-right-radius:0;border-bottom-right-radius:0}.input-group-addon:first-child{border-right:0}.input-group .form-control:last-child,.input-group-addon:last-child,.input-group-btn:last-child>.btn,.input-group-btn:last-child>.dropdown-toggle,.input-group-btn:first-child>.btn:not(:first-child){border-bottom-left-radius:0;border-top-left-radius:0}.input-group-addon:last-child{border-left:0}.input-group-btn{position:relative;white-space:nowrap}.input-group-btn:first-child>.btn{margin-right:-1px}.input-group-btn:last-child>.btn{margin-left:-1px}.input-group-btn>.btn{position:relative}.input-group-btn>.btn + .btn{margin-left:-4px}.input-group-btn>.btn:hover,.input-group-btn>.btn:active{z-index:2}

</style>