// rental_property_calculator
if(jQuery('#rental_property_calculator_form').length > 0){
    window.onload = function () {
        jQuery("#loan_switch input").on("click", function () {
            var select = jQuery("#loan_switch").find("input[name=loan]:checked").val();
            if (select == 0) {
                jQuery("#loan_questions").hide();
            } else {
                jQuery("#loan_questions").show();
            }
        });
    };

    var graph_data;
    function rental_property_calculate() {
        var url = custom_vars.admin_url + "admin-ajax.php";
        var data = jQuery("#rental_property_calculator_form").serialize();
        jQuery.ajax({
            url: url,
            type: "post",
            dataType: "json",
            data: { action: "submit_calculator", data: data },
            success: function (response) {
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

                jQuery("form").hide();
                jQuery("#response").html(response.message);
                jQuery("#response").show();
                jQuery("#html").show();
                jQuery("#chart_container").show();
            },
        });
    }

    function draw_chart_ira() {
        var data = new google.visualization.DataTable();
        data.addColumn("number", "Months");
        data.addColumn("number", "Cash Flow");
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