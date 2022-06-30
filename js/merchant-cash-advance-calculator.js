// mca_apr_calculator
if(jQuery('#mca_apr_calculator_form').length > 0){
    jQuery(document).ready(function ($j) {
        $j("#mca_apr_calculator_form input").on("focus", function () {
            $j(this).removeClass("input-error");
            $j(this).parent().siblings(".input-error-message").remove();
        });
        $j("#calculate_form").on("click", function (e) {
            e.preventDefault();
            var url = custom_vars.admin_url + "admin-ajax.php";
            $j.ajax({
                url: url,
                type: "POST",
                dataType: "JSON",
                data: { action: "submit_calculator", data: $j("#mca_apr_calculator_form").serialize() },
                beforeSend: function () {
                    $j(".input-error-message").remove();
                    $j(".input-error").removeClass("input-error");
                    $j("#cap_rate_calculator").after('<div id="loading"><span>Calculating...</span></div>');
                },
                success: function (response) {
                    if (response.status == !1) {
                        $j("#" + response.input)
                            .addClass("input-error")
                            .parents(".form-group")
                            .append(response.message);
                    }
                    if (response.status == !0) {
                        $j("#cap_rate_calculator").remove();
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