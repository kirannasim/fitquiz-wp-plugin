<div id="gross_margin_markup_calculator">

    <form class="repeater" id="gross_margin_markup_calculator_form">
    <input type="hidden" name="quiz_id" value="<?php echo $quiz->quiz_id; ?>" />
    <input type="hidden" name="quiz_slug" value="<?php echo $quiz->slug; ?>" />

	 <div data-repeater-list="products">
		 <div data-repeater-item class="repeater_group">
			 <input type="hidden" name="id" id="cat-id"/>
			 <h4>Product #<span>1<span></h4>
             
             <div class="form-row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="retail_price_item" class="control-label">Retail Price Item</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input id="retail_price_item" class="form-control input-sm credit_input" type="number" step="0.01" name="retail_price_item" min="0" value="0.00" required />
                        </div>


                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="wholesale_price_item" class="control-label">Wholesale Price Item</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input id="wholesale_price_item" class="form-control input-sm credit_input" type="number" step="0.01" name="wholesale_price_item" min="0" value="0.00"  required>
                        </div>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="number_goods_sold" class="control-label">Number of Goods Sold</label>
                        <input id="number_goods_sold" class="form-control input-sm credit_input" type="number" step="1" name="number_goods_sold" min="1" value="1" required>
                    </div>
                </div>



                <div class="col-md-2">
                <input class="btn btn-primary btn-add" data-repeater-delete type="button" value="&times;"/>
                </div>
             </div>

             
		 </div>
	 </div>

	 <div class="form-group">
        <input class="btn btn-primary" data-repeater-create type="button" value="Add another product"/>
     </div>

     <div class="form-group text-center">
        <button onclick="check_before_submit_margin_markup(this)" type="button" name="button" id="calculator_button" class="btn btn-orange">CALCULATE</button>
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

