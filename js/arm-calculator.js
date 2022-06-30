// arm-calculator
if(jQuery('#annual_change_prime').length > 0){
    var slider = document.getElementById("annual_change_prime");
    var output = document.getElementById("annual_change_prime_label");
    output.innerHTML = slider.value + "%";
    slider.oninput = function () {
        output.innerHTML = this.value + "%";
    };

    function check_before_submit_form(el) {
        var form = jQuery("#arm_calculator_form");
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
            arm_calculate();
        }
    }

    var graph_data;
    function arm_calculate() {
        var url = custom_vars.admin_url + "admin-ajax.php";
        var data = jQuery("#arm_calculator_form").serialize();
        jQuery.ajax({
            url: url,
            type: "post",
            dataType: "json",
            data: { action: "submit_calculator", data: data },
            beforeSend: function () {
                jQuery(".input-error-message").remove();
                jQuery(".input-error").removeClass("input-error");
                jQuery("#arm_calculator_form").after('<div id="loading"><span>Calculating...</span></div>');
            },
            success: function (response) {
                graph_data = response.chart;

                if (google_charts_loaded) {
                    google.charts.load("current", { packages: ["corechart"] });
                    google.charts.setOnLoadCallback(drawChartArm);
                } else {
                    jQuery.getScript(custom_vars.plugin_url + "js/google-charts.js", function() {
                        google_charts_loaded = true;
                        google.charts.load("current", { packages: ["corechart"] });
                        google.charts.setOnLoadCallback(drawChartArm);
                    });            
                }                

                jQuery("#arm_calculator_form").remove();
                jQuery("#response").html(response.message);
                jQuery("#ammortization_table_wrapper").show();
                jQuery("#ammortization_table").html(response.ammortization);
                jQuery("#response").show();
                jQuery("#html").show();
                jQuery("#loading").remove();
                jQuery("#table_button").show();
            },
        });
    }

    function drawChartArm() {
        var data = google.visualization.arrayToDataTable(graph_data);
        var options = {
            chart: { title: "" },
            legend: { position: "bottom" },
            vAxis: { viewWindowMode: "explicit", viewWindow: { min: 0 } },
            hAxis: { title: "Months" },
            height: 350,
            chartArea: { left: "10%", top: "10%", width: "90%", height: "70%" },
        };
        jQuery(".chart").addClass("submit");
        var chart = new google.visualization.LineChart(document.getElementById("curve_chart"));
        chart.draw(data, options);
    }

    function show_ammortization(el) {
        jQuery("#ammortization_table").slideToggle("fast", function () {
            if (jQuery("#ammortization_table").is(":hidden")) {
                jQuery(el).text("Show Loan Amortization Table");
            } else {
                jQuery(el).text("Hide Loan Amortization Table");
            }
        });
    }
}