// invoice_factoring_apr_calculator
if(jQuery('#invoice_factoring_apr_calculator_form').length > 0){
    jQuery(document).ready(function ($j) {
        $j("#invoice_factoring_apr_calculator_form input").on("blur", function () {
            $j(this).removeClass("input-error");
            $j(this).parent().siblings(".input-error-message").remove();
        });
        $j('input[name="schedule"]').on("change", function () {
            var value = $j(this).val();
            $j(".invoice_due_text").text(value);
            $j(".factoring_fee_text").text(value);
            $j("#factoring").val(value);
            $j(".selectmenu").removeClass("active").hide();
            $j("#invoice_due_" + value)
                .show()
                .addClass("active");
            $j("#invoice_due").val("");
            $j("select").prop("selectedIndex", 0);
        });
        $j(document).on("change", "select.active", function () {
            var value = $j(this).val();
            $j("#invoice_due").val(value);
        });
        $j("#calculate_form").on("click", function (e) {
            e.preventDefault();
            var url = custom_vars.admin_url + "admin-ajax.php";
            $j.ajax({
                url: url,
                type: "POST",
                dataType: "JSON",
                data: { action: "submit_calculator", data: $j("#invoice_factoring_apr_calculator_form").serialize() },
                beforeSend: function () {
                    $j(".input-error-message").remove();
                    $j(".input-error").removeClass("input-error");
                    $j("#invoice_factoring_apr_calculator_form").after('<div id="loading"><span>Calculating...</span></div>');
                },
                success: function (response) {
                    if (response.status == !1) {
                        $j("#" + response.input)
                            .addClass("input-error")
                            .parents(".form-group")
                            .append(response.message);
                        $j("#" + response.input).focus();
                    }
                    if (response.status == !0) {
                        $j("#invoice_factoring_apr_calculator_form").remove();
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