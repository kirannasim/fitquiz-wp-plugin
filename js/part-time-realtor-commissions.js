if(jQuery('#part_time_realtor_form').length > 0){
    var slider_points_charged = document.getElementById("agent_portion");
    var output_points_charged_label = document.getElementById("agent_portion_label");
    output_points_charged_label.innerHTML = slider_points_charged.value + "%";
    slider_points_charged.oninput = function () {
        output_points_charged_label.innerHTML = this.value + "%";
    };

    function check_before_submit_form(el) {
        var form = jQuery(el).closest("form");
        form.validate({
            errorPlacement: function (error, element) {
                if (element.is(":radio")) {
                    error.appendTo(element.parents(".radio_container"));
                } else {
                    error.insertAfter(element.parent("div"));
                }
            },
        }).settings.ignore = ":disabled,:hidden";
        if (form.valid()) {
            form_submit();
        }
    }

    var graph_data;
    function form_submit() {
        var url = custom_vars.admin_url + "admin-ajax.php";
        var data = jQuery("#part_time_realtor_form").serialize();
        jQuery.ajax({
            url: url,
            type: "post",
            dataType: "json",
            data: { action: "submit_calculator", data: data },
            beforeSend: function () {
                jQuery(".input-error-message").remove();
                jQuery(".input-error").removeClass("input-error");
                jQuery("#part_time_realtor_form").after('<div id="loading"><span>Calculating...</span></div>');
            },
            success: function (response) {
                graph_data = response.chart;

                if (google_charts_loaded) {
                    google.charts.load("current", { packages: ["corechart", "bar"] });
                    google.charts.setOnLoadCallback(draw_chart_part_time);
                } else {
                    jQuery.getScript(custom_vars.plugin_url + "js/google-charts.js", function() {
                        google_charts_loaded = true;
                        google.charts.load("current", { packages: ["corechart", "bar"] });
                        google.charts.setOnLoadCallback(draw_chart_part_time);
                    });
                }                

                jQuery("#part_time_realtor_form").remove();
                jQuery("#response").html(response.message);
                jQuery("#response").show();
                jQuery("#html").show();
                jQuery("#loading").remove();
            },
        });
    }

    function draw_chart_part_time() {
        var data = google.visualization.arrayToDataTable(graph_data);
        var options = { legend: { position: "none" }, chartArea: { left: "10%", top: "10%", width: "90%", height: "70%" } };
        var chart = new google.visualization.ColumnChart(document.getElementById("curve_chart"));
        chart.draw(data, options);
    }
}