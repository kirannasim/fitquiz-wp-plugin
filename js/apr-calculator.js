// apr calculator
if(jQuery('#apr_calculator_form').length > 0){
    function check_before_submit_credit(el){
        var form = $j(el).closest('form');
        calculate_form();
    }

    function calculate_form(){
        var url = custom_vars.admin_url+'admin-ajax.php';
        $j.ajax({
            url : url,
            type : 'POST',
            dataType: 'JSON',
            data : {
                data : $j("#apr_calculator_form").serialize(),
                action : 'submit_calculator',
            },
            beforeSend: function(){
                $j('.apr_form_error').removeClass('apr_form_error');
            },
            success : function(response) {
                if ( response.input != 'undefined' ) {
                    $j('#' + response.input).addClass('apr_form_error');
                }

                $j("#response").html(response.message);
                $j("#response").show();
                $j("#html").show();
            }
        });
    }
}