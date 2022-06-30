// current_ratio_calculator
if(jQuery('#current_ratio_calculator_form').length > 0){
    jQuery(document).ready(function ($j) {
        $j("#cash, #equivalents, #receivable, #inventory, #other").keyup(function () {
            var cash = parseFloat($j("#cash").val()) || 0;
            var equivalents = parseFloat($j("#equivalents").val()) || 0;
            var receivable = parseFloat($j("#receivable").val()) || 0;
            var inventory = parseFloat($j("#inventory").val()) || 0;
            var other = parseFloat($j("#other").val()) || 0;
            $j("#total").val(cash + equivalents + receivable + inventory + other);
        });
        $j("#payable, #taxes, #payroll, #loans, #liabilities_other").keyup(function () {
            var payable = parseFloat($j("#payable").val()) || 0;
            var taxes = parseFloat($j("#taxes").val()) || 0;
            var payroll = parseFloat($j("#payroll").val()) || 0;
            var loans = parseFloat($j("#loans").val()) || 0;
            var liabilities_other = parseFloat($j("#liabilities_other").val()) || 0;
            $j("#liabilities_total").val(payable + taxes + payroll + loans + liabilities_other);
        });
        $j("#calculate_button").on("click", function (e) {
            e.preventDefault();
            var form = $j("#current_ratio_calculator_form");
            $j.ajax({
                url: custom_vars.admin_url + "admin-ajax.php",
                type: "POST",
                dataType: "JSON",
                data: { action: "submit_calculator", data: form.serialize() },
                beforeSend: function () {
                    $j(".input-error-message").remove();
                    $j(".input-error").removeClass("input-error");
                    form.after('<div id="loading"><span>Calculating...</span></div>');
                },
                success: function (response) {
                    if (response.status === !1) {
                        if (response.input) {
                            $j("#" + response.input)
                                .addClass("input-error")
                                .parents(".form-group")
                                .append(response.message);
                            $j("#" + response.input).focus();
                        } else {
                            $j("#response").html(response.message);
                        }
                    }
                    if (response.status == !0) {
                        form.remove();
                        $j("#response").html(response.message);
                        $j("#response").show();
                        $j("#html").show();
                    }
                    $j("#loading").remove();
                },
            });
        });
    });
}