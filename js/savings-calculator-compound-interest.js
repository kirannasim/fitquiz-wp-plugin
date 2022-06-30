// savings_calculator_compound
if(jQuery('#savings_calculator_compound_interest_form').length > 0){
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
            compound_calculate();
        }
    }

    function compound_calculate() {
        var url = custom_vars.admin_url + "admin-ajax.php";
        var data = $j("#savings_calculator_compound_interest_form").serialize();
        $j.ajax({
            url: url,
            type: "post",
            dataType: "json",
            data: { action: "submit_calculator", data: data },
            success: function (response) {
                $j("#savings_calculator_compound_interest_form").hide();
                graph_data = response.chart;

                if (google_charts_loaded) {
                    google.charts.load("current", { packages: ["line"] });
                    google.charts.setOnLoadCallback(draw_chart_compound);
                } else {
                    jQuery.getScript(custom_vars.plugin_url + "js/google-charts.js", function() {
                        google_charts_loaded = true;
                        google.charts.load("current", { packages: ["line"] });
                        google.charts.setOnLoadCallback(draw_chart_compound);
                    });
                }

                $j("#table").html(response.message);
                $j("#response").show();
                $j("#html").show();
                $j("#chart_container").show();
            },
        });
    }

    function draw_chart_compound() {
        var data = new google.visualization.DataTable();
        data.addColumn("number", "Year");
        data.addColumn("number", "Balance");
        data.addRows(graph_data);
        var options = { chart: { title: "" }, legend: { position: "none" }, height: 250 };
        var chart = new google.charts.Line(document.getElementById("curve_chart"));
        chart.draw(data, google.charts.Line.convertOptions(options));
    }
}