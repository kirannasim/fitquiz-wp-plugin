// hourly_pay_calculator
if(jQuery('#hourly_pay_calculator_form').length > 0){
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
        var handle = $j("#slide-handle");
        $j("#regular_hours_worked_slider").slider({
            min: 1,
            max: 80,
            create: function () {
                handle.text($j(this).slider("value"));
            },
            slide: function (event, ui) {
                handle.text(ui.value);
                $j("#regular_hours_worked").val(ui.value);
            },
        });
        $j("#regular_hours_worked_slider").val($j().slider("value"));
        $j("#calculator_button").on("click", function () {
            $j.ajax({
                url: custom_vars.admin_url + "admin-ajax.php",
                type: "POST",
                dataType: "JSON",
                data: { action: "submit_calculator", data: $j("#hourly_pay_calculator_form").serialize() },
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