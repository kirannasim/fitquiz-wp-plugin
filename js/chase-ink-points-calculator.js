// chase_ink_points_calculator
if(jQuery('#chase_ink_points_calculator_form').length > 0){
    jQuery(document).ready(function ($j) {
        $j("#calculate_button").on("click", function (e) {
            e.preventDefault();
            $j.ajax({
                url: custom_vars.admin_url + "admin-ajax.php",
                type: "POST",
                dataType: "JSON",
                data: { action: "submit_calculator", data: $j("#chase_ink_points_calculator_form").serialize() },
                beforeSend: function () {
                    $j(".input-error-message").remove();
                    $j(".input-error").removeClass("input-error");
                    $j("#chase_ink_points_calculator_form").after('<div id="loading"><span>Calculating...</span></div>');
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
                        $j("#chase_ink_points_calculator_form").remove();
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