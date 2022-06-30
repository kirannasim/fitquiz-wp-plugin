// equipment_lease_calculator
if(jQuery('#equipment_lease_calculator_form').length > 0){
    jQuery(document).ready(function ($j) {
        $j("#equipment_lease_calculator_form input").on("focus", function () {
            $j(this).removeClass("input-error");
            $j(this).parent().siblings(".input-error-message").remove();
        });
        var equipment_life_term_text = $j("#equipment_life_term_text");
        var equipment_life_term = $j("#equipment_life_term");
        var equipment_life_term_handle = $j("#equipment_life_term_handle");
        $j("#equipment_life_term_slider").slider({
            min: 1,
            max: 15,
            value: 8,
            create: function () {
                equipment_life_term_text.text($j(this).slider("value") + " years");
                equipment_life_term.val($j(this).slider("value"));
                equipment_life_term_handle.text($j(this).slider("value"));
            },
            slide: function (event, ui) {
                equipment_life_term_text.text(ui.value + " years");
                equipment_life_term.val(ui.value);
                equipment_life_term_handle.text(ui.value);
            },
        });
        var lease_term_text = $j("#lease_term_text");
        var lease_term_months = $j("#lease_term_months");
        var lease_term_handle = $j("#lease_term_handle");
        $j("#lease_term_slider").slider({
            min: 3,
            max: 72,
            value: 24,
            create: function () {
                lease_term_text.text($j(this).slider("value") + " months");
                lease_term_months.val($j(this).slider("value"));
                lease_term_handle.text($j(this).slider("value"));
            },
            slide: function (event, ui) {
                lease_term_text.text(ui.value + " months");
                lease_term_months.val(ui.value);
                lease_term_handle.text(ui.value);
            },
        });
        $j("#calculate_form").on("click", function (e) {
            e.preventDefault();
            $j.ajax({
                url: custom_vars.admin_url + "admin-ajax.php",
                type: "POST",
                dataType: "JSON",
                data: { action: "submit_calculator", data: $j("#equipment_lease_calculator_form").serialize() },
                beforeSend: function () {
                    $j(".input-error-message").remove();
                    $j(".input-error").removeClass("input-error");
                    $j("#equipment_lease_calculator_form").after('<div id="loading"><span>Calculating...</span></div>');
                },
                success: function (response) {
                    if (response.status == !1) {
                        $j("#" + response.input)
                            .addClass("input-error")
                            .parents(".form-group")
                            .append(response.message);
                    }
                    if (response.status == !0) {
                        $j("#equipment_lease_calculator_form").remove();
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