<div id="ultimate_business_name_generator">

    <form class="repeater" id="ultimate_business_name_generator_form">
    <input type="hidden" name="quiz_id" value="<?php echo $quiz->quiz_id; ?>" />
    <input type="hidden" name="quiz_slug" value="<?php echo $quiz->slug; ?>" />

     <div class="row">
        
        <div class="col-12 form-group mb-3">
            <label for="service" class="control-label align-middle">What service do you provide or types of goods do you sell?</label>
            <input id="service" class="form-control input-sm d-block" type="text" name="service" required />
        </div>

        <div class="col-12 form-group mb-3">
            <label for="geographical" class="control-label align-middle">What primary geographical area do you serve?</label>
            <input id="geographical" class="form-control input-sm d-block" type="text" name="geographical" required />
        </div>

        <div class="col-12 form-group mb-3">
            <label for="founder" class="control-label align-middle">What is the last name of the founder(s)?</label>
            <input id="founder" class="form-control input-sm d-block" type="text" name="founder" required />
        </div>

        

     </div>   
	 

     <div class="form-group text-center">
        <button onclick="check_before_submit_business_name_generator(this)" type="button" name="button" id="calculator_button" class="btn btn-orange">GENERATE</button>
     </div>

	</form>

    <div style="margin:20px 0;"></div>
    <div id="response"></div>
    
    <?php if(isset($quiz->quiz_html) && $quiz->quiz_html != ''): ?>
    <div id="html" style="display:none">
       
        <div class="row text-center">
            <div class="col-md-12">
			<?php 
			if( $quiz->quiz_html){
				$result = preg_replace('@rel="(.*)"@U', '', $quiz->quiz_html);
				$result = preg_replace('@<a(.*)>@U', '<a$1 rel="noopener nofollow">', $result);
				echo $result; 
			}
			?>

            <?php if ( isset( $_SERVER['REQUEST_URI'] ) ) :?>
            <p class="text-center"><span style="display:block; margin:20px 0;"><a href="<?php echo $_SERVER['REQUEST_URI']; ?>">Reset Form</a></span></p>
            <?php endif; ?>
            </div>
        </div>

    </div>
    <?php endif; ?>
    
    


</div>


<style>
label.error{
    width:100%;
    display:block;
    text-align:left;
}
</style>