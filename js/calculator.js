var google_charts_loaded = false;

function resetQuizForm(quiz_id)
{   
    var form_wrapper = jQuery('#response-'+quiz_id).parent('div').attr('id');
    var form_id = '#' + form_wrapper + '_form';
    jQuery(form_id).show();
    jQuery('#response-' + quiz_id).html('');

    return false;
}

function resetCalculatorForm(form_id) {   
    jQuery('#' + form_id +'_form').show();
    jQuery('#' + form_id + ' #response').html('');
}

jQuery(document).ready(function(){
    if ( jQuery('.datepicker').length > 0 ) {
        jQuery('.datepicker').datepicker();
    }
    jQuery('input[name="emp_type"], input[name="salaried_type"]').on('click', function(){
        var val = $j(this).val();
        if ( val == 'hourly' ) {
            jQuery('#stage_one').show();
            jQuery('#stage_two').hide();
            jQuery('#salaried_type_exempt').prop('checked', true);
            jQuery('#paid_time_off').parents('div.form-group').show();
        } else {
            jQuery('#stage_one').hide();
            jQuery('#stage_two').show();
            jQuery('#paid_time_off').parents('div.form-group').hide();
        }

        if ( val == 'nonexempt' ) {
            jQuery('#salaried_nonexempt').show();
        } else {
            jQuery('#salaried_nonexempt').hide();
        }
    });

    jQuery('input').on('blur', function(){
        jQuery(this).removeClass('input-error');
        jQuery(this).parent().siblings('.input-error-message').remove();
    });
})