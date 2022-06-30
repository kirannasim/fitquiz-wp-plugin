// payroll deduction calculaotr
if(jQuery('#pdc_calculator_form').length > 0){
    (function ($j) {
        $j('input[name="employee_type"]').on("change", function (e) {
            var value = $j(this).val();
            if (value === "hourly") {
                $j("#salary-inputs").hide();
                $j("#hourly-inputs").show();
                console.log(value);
            }
            if (value === "salary") {
                console.log(value);
                $j("#salary-inputs").show();
                $j("#hourly-inputs").hide();
            }
            $j("#pdc_calculator_form").find('input[type="text"]').val("");
            $j("#response").html("");
        });
        $j("input").on("blur", function () {
            if ($j(this).val() != "") {
                $j(".input-error").removeClass("input-error");
            }
        });
        $j("#calculator_button").on("click", function () {
            var url = custom_vars.admin_url + "admin-ajax.php";
            $j.ajax({
                url: url,
                type: "POST",
                dataType: "JSON",
                data: { action: "submit_calculator", data: $j("#pdc_calculator_form").serialize() },
                beforeSend: function () {
                    $j(".input-error-message").remove();
                    $j(".input-error").removeClass("input-error");
                },
                success: function (response) {
                    if (response.input != "undefined") {
                        $j("#" + response.input)
                            .addClass("input-error")
                            .parents(".form-group")
                            .append(response.message);
                        $j("#" + response.input).focus();
                    }
                    $j("#response").html(response.message);
                    $j("#response").show();
                    $j("#html").show();
                },
            });
        });
    })(jQuery);
}