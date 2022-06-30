if(jQuery('#dimensional_weight_calculator_form').length > 0){
    function check_before_submit_form(el) {
        var form = $j(el).closest("form");
        form.validate({
            errorPlacement: function (error, element) {
                if (element.is(":radio")) {
                    error.appendTo(element.parents(".radio_container"));
                } else {
                    error.insertAfter(element);
                }
            },
        }).settings.ignore = ":disabled,:hidden";
        if (form.valid()) {
            weight_calculate();
        }
    }

    function weight_calculate() {
        var url = custom_vars.admin_url + "admin-ajax.php";
        var data = $j("#dimensional_weight_calculator_form").serialize();
        $j.ajax({
            url: url,
            type: "post",
            dataType: "json",
            data: { action: "submit_calculator", data: data },
            success: function (response) {
                $j("#dimensional_weight_calculator_form").hide();
                $j("#response").html(response.message);
                $j("#response").show();
                $j("#html").show();
            },
        });
    }
}