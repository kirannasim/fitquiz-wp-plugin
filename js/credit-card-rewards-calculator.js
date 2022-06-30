// credit_card_rewards_calculator
if(jQuery('#credit_card_rewards_calculator_form').length > 0){
    function check_before_submit_credit(el){
        var form = $j(el).closest('form');
        credit_calculate();
    }// check if form is valid and submit

    function credit_calculate(){
        var url = custom_vars.admin_url+'admin-ajax.php';
        $j.ajax({
            url : url,
            type : 'POST',
            dataType: 'JSON',
            data : {
                action: 'submit_calculator',
                data : $j("#credit_card_rewards_calculator_form").serialize()
            },
            success : function(response) {
                $j("#response").html(response.message);
                $j("#response").show();
                $j("#html").show();
            }
        });
    }
}