<div id="residential_rental_property_depreciation_calculator">

    <form class="repeater" id="residential_rental_property_depreciation_calculator_form">
    <input type="hidden" name="quiz_id" value="<?php echo $quiz->quiz_id; ?>" />
    <input type="hidden" name="quiz_slug" value="<?php echo $quiz->slug; ?>" />

     <div class="row">
        
        <div class="col-12 form-group mb-3">
            <div class="form-row">
                <div class="col-6 text-right">
                    <label for="purchase_price" class="control-label align-middle">Purchase Price</label>
                </div>

                <div class="col-6 text-right">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input id="purchase_price" class="form-control input-sm d-block" type="number" name="purchase_price" min="0" step="0.01" required />
                    </div>
                </div>

            </div>
        </div>

        <div class="col-12 form-group mb-3">
            <div class="form-row">
                <div class="col-6 text-right">
                <label for="closing_cost" class="control-label align-middle">Closing Cost</label>
                </div>

                <div class="col-6 text-right">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input id="closing_cost" class="form-control input-sm" type="number" name="closing_cost" min="0" step="0.01" required />
                    </div>
                </div>

                
            </div>
        </div>

        <div class="col-12 form-group mb-4">
            <div class="form-row">
                <div class="col-6 text-right">
                <label for="recovery_period" class="control-label align-middle">Recovery Period</label>
                </div>

                <div class="col-6 text-right">

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Years</span>
                        </div>
                        <input id="recovery_period" class="form-control input-sm" type="number" name="recovery_period" min="0" step="0.01" required />
                    </div>

                    
                   

                </div>
            </div>
        </div>

     </div>   
	 

     <div class="form-group text-center">
        <button onclick="check_before_submit_property_depreciation(this)" type="button" name="button" id="calculator_button" class="btn btn-orange">CALCULATE</button>
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