// paycheck-protection-loan-calculator
if(jQuery('#paycheck-protection-loan-calculator_form').length > 0){
    window.onload = function() {
            
        jQuery('input[name$="february"]').change(function(el) {
        var february = jQuery('input[name$="february"]:checked').val(); 
        var seasonal = jQuery('input[name$="seasonal"]:checked').val(); 

        if(february == 'Yes' &&  seasonal == 'Yes'  ){
            jQuery('#january').show();
            jQuery('#february').hide();
            jQuery('#months').hide();
        }
        
        if(february == 'Yes' &&  seasonal == 'No'  ){
            jQuery('#january').show();
            jQuery('#february').hide();
            jQuery('#months').hide();
        } 

        if(february == 'No' &&  seasonal == 'Yes'  ){
            jQuery('#january').hide();
            jQuery('#february').show();
            jQuery('#months').hide();
        } 

        if(february == 'No' &&  seasonal == 'No'  ){
            jQuery('#january').hide();
            jQuery('#february').hide();
            jQuery('#months').show();
        } 

    });

    jQuery('input[name$="seasonal"]').change(function(el) {
        var seasonal = jQuery('input[name$="seasonal"]:checked').val(); 
        var february = jQuery('input[name$="february"]:checked').val();

        if(february == 'Yes' &&  seasonal == 'Yes'  ){
            jQuery('#january').show();
            jQuery('#february').hide();
            jQuery('#months').hide();
        } 

        if(february == 'Yes' &&  seasonal == 'No'  ){
            jQuery('#january').show();
            jQuery('#february').hide();
            jQuery('#months').hide();
        } 

        if(february == 'No' &&  seasonal == 'Yes'  ){
            jQuery('#january').hide();
            jQuery('#february').show();
            jQuery('#months').hide();
        } 

        if(february == 'No' &&  seasonal == 'No'  ){
            jQuery('#january').hide();
            jQuery('#february').hide();
            jQuery('#months').show();
        } 
        
        
    });

    jQuery('input[name$="refinancing"]').change(function(el) {
        var refinancing = jQuery('input[name$="refinancing"]:checked').val(); 
        if(refinancing == 'Yes'){
            jQuery('#loan-container').show();
        }else{
            jQuery('#loan-container').hide();
        }
    });



    var form = jQuery("#paycheck-protection-loan-calculator_form");
    jQuery("#paycheck-protection-loan-calculator_form input").change(function() {
        form.validate().element(this);
    });	// fire validate for each field
    }// end onload

    function check_before_submit_paycheck_protection(el){
        
        paycheck_protection_calculate();
        
    }// check if form is valid and submit

    function paycheck_protection_calculate(){
        var url = custom_vars.admin_url + 'admin-ajax.php';
        var data = $j('#paycheck-protection-loan-calculator_form').serialize();
        
        jQuery.ajax({
            url : url,
            type : 'post',
            dataType: 'json',
            data : {
            action : 'submit_calculator',
            data : data,
            },

            beforeSend: function() {
                jQuery('#paycheck-protection-loan-calculator_form').after('<div id="loading"><span>Calculating...</span></div>');
            },
            
            success : function(response) {
                jQuery('#paycheck-protection-loan-calculator_form').hide();
                jQuery("#response").html(response.message);
                jQuery("#response").show();
                jQuery("#html").show();
                jQuery('#loading').hide();
            }
        })
    }
}