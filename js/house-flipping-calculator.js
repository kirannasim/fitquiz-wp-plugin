// house_flipping_calculator
if(jQuery('#house_flipping_calculator').length > 0){
    var slider = document.getElementById("marketing_cost");
    var output = document.getElementById("marketing_cost_label");
    output.innerHTML = slider.value + "%";
    slider.oninput = function () {
        output.innerHTML = this.value + "%";
    };

    function check_before_submit_form(el) {
        var form = jQuery("#house_flipping_calculator_form");
        form.validate({
            errorPlacement: function (error, element) {
                if (element.is(":radio")) {
                    error.appendTo(element.parents(".input-group"));
                } else {
                    error.insertAfter(element.parent(".input-group"));
                }
            },
        }).settings.ignore = ":disabled,:hidden";
        if (form.valid()) {
            hfc_calculate();
        }
    }

    var graph_data;
    function hfc_calculate() {
        var data = jQuery("#house_flipping_calculator_form").serialize();
        var url = custom_vars.admin_url + 'admin-ajax.php';
        jQuery.ajax({
            url: url,
            type: "post",
            dataType: "json",
            data: { action: "submit_calculator", data: data },
            beforeSend: function () {
                jQuery(".input-error-message").remove();
                jQuery(".input-error").removeClass("input-error");
                jQuery("#house_flipping_calculator_form").after('<div id="loading"><span>Calculating...</span></div>');
            },
            success: function (response) {
                jQuery("#house_flipping_calculator_form").remove();
                graph_data = response;

                if (google_charts_loaded) {
                    google.charts.load("current", { packages: ["line"] });
                    google.charts.setOnLoadCallback(drawChart_hfc);
                } else {
                    jQuery.getScript(custom_vars.plugin_url + "js/google-charts.js", function() {
                        google_charts_loaded = true;
                        google.charts.load("current", { packages: ["line"] });
                        google.charts.setOnLoadCallback(drawChart_hfc);
                    });
                }                
                
                jQuery("#response").html(response.message);
                jQuery("#response").show();
                jQuery("#html").show();
                jQuery("#loading").remove();
            },
        });
    }

    function drawChart_hfc() {
        var data = new google.visualization.DataTable();
        data.addColumn("number", "Flip");
        data.addColumn("number", "ROI");
        data.addRows(graph_data.chart);
        var options = { chart: { title: "" }, legend: { position: "none" }, height: 250 };
        jQuery(".chart").addClass("submit");
        var chart = new google.charts.Line(document.getElementById("curve_chart"));
        chart.draw(data, google.charts.Line.convertOptions(options));
    }
}