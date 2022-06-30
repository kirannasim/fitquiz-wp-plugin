<div id="net_operating_income_noi_formula_calculate">

    <form class="repeater" id="net_operating_income_noi_formula_calculate_form">
    <input type="hidden" name="quiz_id" value="<?php echo $quiz->quiz_id; ?>" />
    <input type="hidden" name="quiz_slug" value="<?php echo $quiz->slug; ?>" />

     <div class="row">
        
        <div class="col-12 form-group mb-3">
            <div class="form-row">
                <div class="col-6 text-right">
                    <label for="annual_gross_rental_income" class="control-label align-middle">Annual Gross Rental Income</label>
                </div>

                <div class="col-6 text-right">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input id="annual_gross_rental_income" class="form-control input-sm d-block" type="number" name="annual_gross_rental_income" min="0" step="0.01" required />
                    </div>
                </div>

            </div>
        </div>

        <div class="col-12 form-group mb-3">
            <div class="form-row">
                <div class="col-6 text-right">
                <label for="annual_other_income" class="control-label align-middle">Annual Other Income</label>
                </div>

                <div class="col-6 text-right">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input id="annual_other_income" class="form-control input-sm" type="number" name="annual_other_income" min="0" step="0.01" required />
                    </div>
                </div>

                
            </div>
        </div>

        <div class="col-12 form-group mb-4">
            <div class="form-row">
                <div class="col-6 text-right">
                <label for="annual_vacancy_loss" class="control-label align-middle">Annual Vacancy Loss</label>
                </div>

                <div class="col-6 text-right">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">%</span>
                        </div>
                        <input id="annual_vacancy_loss" class="form-control input-sm" type="number" name="annual_vacancy_loss" min="0" max="100" step="0.01" required />
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12 mb-3">
            <h3>Annual Operating Expenses</h3>
        </div>

        <div class="col-12 form-group mb-4">
            <div class="form-row">
                <div class="col-6 text-right">
                <label for="property_taxes" class="control-label align-middle">Property Taxes</label>
                </div>

                <div class="col-6 text-right">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input id="property_taxes" class="form-control input-sm" type="number" name="property_taxes" min="0" step="0.01" required />
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12 form-group mb-4">
            <div class="form-row">
                <div class="col-6 text-right">
                <label for="property_insurance" class="control-label align-middle">Property Insurance</label>
                </div>

                <div class="col-6 text-right">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input id="property_insurance" class="form-control input-sm" type="number" name="property_insurance" min="0" step="0.01" required />
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 form-group mb-4">
            <div class="form-row">
                <div class="col-6 text-right">
                <label for="property_management_fees" class="control-label align-middle">Property Management Fees</label>
                </div>

                <div class="col-6 text-right">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">%</span>
                        </div>
                        <input id="property_management_fees" class="form-control input-sm" type="number" name="property_management_fees" min="0" max="100" step="0.01" required />
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 form-group mb-4">
            <div class="form-row">
                <div class="col-6 text-right">
                <label for="maintenance_repairs" class="control-label align-middle">Maintenance & Repairs</label>
                </div>

                <div class="col-6 text-right">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input id="maintenance_repairs" class="form-control input-sm" type="number" name="maintenance_repairs" min="0" step="0.01" required />
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 form-group mb-4">
            <div class="form-row">
                <div class="col-6 text-right">
                <label for="miscellaneous_expenses" class="control-label align-middle">Miscellaneous Expenses</label>
                </div>

                <div class="col-6 text-right">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input id="miscellaneous_expenses" class="form-control input-sm" type="number" name="miscellaneous_expenses" min="0" step="0.01" required />
                    </div>
                </div>
            </div>
        </div>

        

        
     </div>   
	 

     <div class="form-group text-center">
        <button onclick="check_before_submit_income_noi(this)" type="button" name="button" id="calculator_button" class="btn btn-orange">CALCULATE</button>
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