// pto_calculator
if(jQuery('#pto_calculator_form').length > 0){
    function submit_calculator() {
        $j(".response-error").remove();
        $j(".input-error").removeClass("input-error");
        var url = custom_vars.admin_url + "admin-ajax.php";
        var data = $j("#pto_calculator_form").serialize();
        $j.ajax({
            url: url,
            type: "post",
            dataType: "json",
            data: { action: "submit_calculator", data: data },
            success: function (response) {
                if (undefined != response.input) {
                    $j("#" + response.input).addClass("input-error");
                    return !1;
                }
                $j("#response").html(response.message);
                $j("#ammortization_table_wrapper").show();
                $j("#ammortization_table").html(response.ammortization);
                $j("#response").show();
                $j("#html").show();
            },
        });
    }

    jQuery(function ($) {
        $j("#add_time").on("click", function () {
            $j("#stage_2").toggle();
        });
        $j(".datepicker").datepicker({ changeMonth: !0, changeYear: !0, yearRange: "1950:" + new Date().getFullYear(), showButtonPanel: !0 });
        $j(".accural_start_date").on("click", function () {
            var accural_start_date = $j(this).data("type");
            if (accural_start_date == "fiscal_year") {
                $j('input[name="fiscal_year_input"]').show();
                $j('input[name="hire_year_input"]').val("").hide();
            } else if (accural_start_date == "hire_date") {
                $j('input[name="hire_year_input"]').show();
                $j('input[name="fiscal_year_input"]').val("").hide();
            } else if (accural_start_date == "calendar_year") {
                $j('input[name="hire_year_input"]').val("").hide();
                $j('input[name="fiscal_year_input"]').val("").hide();
            }
        });
        var fte_pto_per_year_handle = $j("#fte_pto_per_year_handle");
        var fte_pto_per_year_slider = $j("#fte_pto_per_year_slider");
        var fte_pto_per_year = $j("#fte_pto_per_year");
        fte_pto_per_year_slider.slider({
            min: 10,
            max: 1200,
            value: 80,
            create: function () {
                fte_pto_per_year_handle.text($j(this).slider("value"));
            },
            slide: function (event, ui) {
                fte_pto_per_year_handle.text(ui.value);
                fte_pto_per_year.val(ui.value);
            },
        });
        $j("#fte_pto_per_increment").on("click", function (e) {
            e.preventDefault();
            var slider = fte_pto_per_year_slider.slider("value");
            fte_pto_per_year_slider.slider("value", slider + 1);
            fte_pto_per_year_handle.text(slider + 1);
            fte_pto_per_year.val(slider + 1);
        });
        $j("#fte_pto_per_decrement").on("click", function (e) {
            e.preventDefault();
            var slider = fte_pto_per_year_slider.slider("value");
            fte_pto_per_year_slider.slider("value", slider - 1);
            fte_pto_per_year_handle.text(slider - 1);
            fte_pto_per_year.val(slider - 1);
        });
        var fte_hr_per_week_handle = $j("#fte_hr_per_week_handle");
        var fte_hr_per_week_slider = $j("#fte_hr_per_week_slider");
        var fte_hr_per_week = $j("#fte_hr_per_week");
        fte_hr_per_week_slider.slider({
            min: 25,
            max: 40,
            value: 40,
            step: 0.5,
            create: function () {
                fte_hr_per_week_handle.text($j(this).slider("value"));
            },
            slide: function (event, ui) {
                fte_hr_per_week_handle.text(ui.value);
                fte_hr_per_week.val(ui.value);
            },
        });
        var fte_paid_holiday_per_year_handle = $j("#fte_paid_holiday_per_year_handle");
        var fte_paid_holiday_per_year_slider = $j("#fte_paid_holiday_per_year_slider");
        var fte_paid_holiday_per_year = $j("#fte_paid_holiday_per_year");
        fte_paid_holiday_per_year_slider.slider({
            min: 0,
            max: 30,
            value: 10,
            create: function () {
                fte_paid_holiday_per_year_handle.text($j(this).slider("value"));
            },
            slide: function (event, ui) {
                fte_paid_holiday_per_year_handle.text(ui.value);
                fte_paid_holiday_per_year.val(ui.value);
            },
        });
        $j("#reset_calculator_button").on("click", function (e) {
            e.preventDefault();
            $j(".response-error").remove();
            $j(".input-error").removeClass("input-error");
            $j("#stage_2").hide();
            fte_pto_per_year_slider.slider("value", 80);
            fte_pto_per_year_handle.text("80");
            fte_pto_per_year.val("80");
            fte_hr_per_week_slider.slider("value", 40);
            fte_hr_per_week_handle.text("40");
            fte_hr_per_week.val("40");
            fte_paid_holiday_per_year_slider.slider("value", 10);
            fte_paid_holiday_per_year_handle.text("10");
            fte_paid_holiday_per_year.val("10");
            document.getElementById("pto_calculator_form").reset();
        });
    });
}