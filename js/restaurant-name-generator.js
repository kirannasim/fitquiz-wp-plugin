// restaurant_name_generator
if(jQuery('#restaurant_name_generator_form').length > 0){
    function check_before_submit_form(el) {
        var form = $j("#restaurant_name_generator_form");
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
            form_submit();
        }
    }

    function form_submit() {
        var url = custom_vars.admin_url + "admin-ajax.php";
        var data = $j("#restaurant_name_generator_form").serialize();
        $j.ajax({
            url: url,
            type: "post",
            dataType: "json",
            data: { action: "submit_calculator", data: data },
            success: function (response) {
                $j("#restaurant_name_generator_form").hide();
                $j("#response").html(response.message);
                $j("#response").show();
                $j("#html").show();
            },
        });
    }
}