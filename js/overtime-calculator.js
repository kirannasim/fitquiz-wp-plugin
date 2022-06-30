// overtime_calculator
if(jQuery('#overtime_calculator_form').length > 0){
    jQuery(function ($j) {
        $j(".datepicker").datepicker({
            beforeShow: function () {
                $j(".input-error").removeClass("input-error");
                $j(".input-error-message").hide();
            },
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
                data: { action: "submit_calculator", data: $j("#overtime_calculator_form").serialize() },
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
    });
}