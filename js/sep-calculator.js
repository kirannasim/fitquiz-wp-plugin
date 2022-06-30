// #sep_calculator
if(jQuery('#sep_calculator_form').length > 0){
    jQuery(document).ready(function ($j) {
        $j("input[name=pre_tax_income]").change(function () {
            var value = $j(this).val();
            if (value > 220000) {
                $j("input[name=employer_contribution]").attr({ max: 55000 });
            } else {
                var max = value / 4;
                $j("input[name=employer_contribution]").attr({ max: max });
            }
        });
        $j("#employee_switch").change(function () {
            var select = $j(this).find("input[name=emplo_show]:checked").val();
            if (select == 0) {
                $j(".ira_repeater").hide();
                $j(".add_employee").hide();
            } else {
                $j(".ira_repeater").show();
                $j(".add_employee").show();
            }
        });
    });

    var graph_data;
    function check_before_submit_form(el) {
        var form = $j(el).closest("form");
        form.validate({
            errorPlacement: function (error, element) {
                if (element.is(":radio")) {
                    error.appendTo(element.parents(".radio_container"));
                } else {
                    error.insertAfter(element.parent(".input-group"));
                }
            },
        }).settings.ignore = ":disabled,:hidden";
        if (form.valid()) {
            sep_calculate();
        }
    }

    function sep_calculate() {
        var url = custom_vars.admin_url + "admin-ajax.php";
        var data = $j("#sep_calculator_form").serialize();
        $j.ajax({
            url: url,
            type: "post",
            dataType: "json",
            data: { action: "submit_calculator", data: data },
            success: function (response) {
                $j("#sep_calculator_form").hide();
                graph_data = response.chart;

                if (google_charts_loaded) {
                    google.charts.load("current", { packages: ["line"] });
                    google.charts.setOnLoadCallback(draw_chart_ira);
                } else {
                    jQuery.getScript(custom_vars.plugin_url + "js/google-charts.js", function() {
                        google_charts_loaded = true;
                        google.charts.load("current", { packages: ["line"] });
                        google.charts.setOnLoadCallback(draw_chart_ira);
                    });
                }

                $j("#response").html(response.message);
                $j("#response").show();
                $j("#html").show();
                $j("#chart_container").show();
            },
        });
    }

    function draw_chart_ira() {
        var data = new google.visualization.DataTable();
        data.addColumn("number", "Year");
        data.addColumn("number", "Contributions");
        data.addRows(graph_data);
        var options = { chart: { title: "" }, legend: { position: "none" }, height: 250 };
        var chart = new google.charts.Line(document.getElementById("curve_chart"));
        chart.draw(data, google.charts.Line.convertOptions(options));
    }

    jQuery(window).on("resizeEnd", function () {
        if (graph_data) {
            if (google_charts_loaded) {
                draw_chart_ira();
            } else {
                jQuery.getScript(custom_vars.plugin_url + "js/google-charts.js", function() {
                    google_charts_loaded = true;
                    draw_chart_ira();
                });
            }
        }
    });

    jQuery(window).resize(function () {
        if (this.resizeTO) clearTimeout(this.resizeTO);
        this.resizeTO = setTimeout(function () {
            jQuery(this).trigger("resizeEnd");
        }, 100);
    });
}