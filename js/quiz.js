jQuery(document).ready(function(j){

    var maxHeight = 0;
    var current_index = 0;
    

    $j("#quiz_wrapper .result_row").each(function(){
         var thisH = $j(this).innerHeight();
         $j(this).css('min-height', (thisH)+"px");
         if (thisH > maxHeight) { maxHeight = thisH; }
    });

    var steps = $j('.result_row').length;
    var step_width = 100/steps;
    $j(".step_progress").css('width', step_width+"%");

    var form = $j("#quiz-steps");
    
    var wizardLength = form.find('h3').length - 1;
    var started = false;
    form.steps({
        headerTag: "h3",
        bodyTag: "div",
        transitionEffect: "slideLeft",
        autoFocus: true,
        onStepChanging: function (event, currentIndex, newIndex)
        {
            if(newIndex < currentIndex){
                $j(".body input").removeClass("required");
                $j(".body select").removeClass("required");
            }

            // form validation
            form.validate({
                errorPlacement: function(error, element){
                        if ( element.is(":radio") )
                        {
                                error.appendTo( element.parents('.radio_container') );
                        }
                        else
                        { // This is the default behavior
                                error.insertAfter( element );
                        }
                 }
            }).settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        
        onStepChanged: function (event, currentIndex, priorIndex){
            // save question id on API
            var question_id = $j(".result_row.current").data("question");
            quiz_question(view_id,question_id);

            $j(".body input").addClass("required");
            $j(".body select").addClass("required");
            var progress_width = (step_width * currentIndex) + step_width;
            $j(".step_progress").css('width', progress_width+"%");

            if(started == false){
                quiz_start(view_id);
                started = true;
            }


            current_index = currentIndex;
        },

        onFinished: function (event, currentIndex) {
            quiz_submit()
        },
    });
    
    // get first question id on load
    var question_id = $j(".result_row.current").data("question");

    quiz_question(view_id,question_id);

    $j( "#quiz_wrapper form" ).change(function(e) {
        
        if ( e.target.getAttribute('type') === 'checkbox' ) {
            return false;
        }

        if(current_index == wizardLength){
            var last_step = $j("#quiz-steps-p-"+current_index).find(".input");
            if(!last_step.hasClass( "contact_form" ) ){
                quiz_submit()
            }
        }
        form.steps("next",{});
    });
    
    form.find('div.steps').find('ul li a').addClass('no-scroll');
    
    if(modal){
        $j("#quiz_wrapper .content").css('min-height', (maxHeight)+"px");
    }
    
    
    $j("#quiz_wrapper").css('visibility',"visible");

    function quiz_question(view_id,question_id){
        var url = custom_vars.admin_url+'admin-ajax.php';
        $j.ajax({
          url : url,
          type : 'post',
          dataType: 'json',
          data : {
            action : 'quiz_question',
            view_id : view_id,
            question_id : question_id,
          },
         success : function(response) {
            
        }

        })
    }
});