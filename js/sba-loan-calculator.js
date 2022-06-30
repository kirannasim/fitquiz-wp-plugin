// sba_loan_calculator
if(jQuery('#sba_loan_calculator_form').length > 0){
    // function check_before_submit_form(el) {
    //     var form = jQuery(el).closest("form");
    //     form.validate({
    //         errorPlacement: function (error, element) {
    //             if (element.is(":radio")) {
    //                 error.appendTo(element.parents(".radio_container"));
    //             } else {
    //                 error.insertAfter(element.parent(".input-group"));
    //             }
    //         },
    //     }).settings.ignore = ":disabled,:hidden";
    //     if (form.valid()) {
	// 		console.log( 'y');
    //         sba_calculate();
    //     } else {
	// 		console.log( 'n' );
    //     }
    // }

    function sba_calculate() {
        var url = custom_vars.admin_url + "admin-ajax.php";
        var data = jQuery("#sba_loan_calculator_form").serialize();
		console.log( data );
        jQuery.ajax({
            url: url,
            type: "post",
            dataType: "json",
            data: { action: "submit_calculator", data: data },
            beforeSend: function () {
                $j(".input-error-message").remove();
                $j(".input-error").removeClass("input-error");
                $j("#sba_loan_calculator_form").after('<div id="loading"><span>Calculating...</span></div>');
            },
            success: function (response) {
                jQuery("#sba_loan_calculator_form").remove();
                jQuery("#response").html(response.message);
                jQuery("#response").show();
                jQuery("#ammortization_table_wrapper").show();
                jQuery("#ammortization_table").html(response.ammortization);
                jQuery("#html").show();
                jQuery("#loading").remove();
                jQuery("#table_button").show();
            },
        });
    }

    function show_ammortization(el) {
        jQuery("#ammortization_table").slideToggle("fast", function () {
            if (jQuery("#ammortization_table").is(":hidden")) {
                jQuery(el).text("Show Loan Amortization Table");
            } else {
                jQuery(el).text("Hide Loan Amortization Table");
            }
        });
    }
}