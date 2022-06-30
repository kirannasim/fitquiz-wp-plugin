<div id="paycheck-protection-loan-calculator">


	<form id="paycheck-protection-loan-calculator_form" class="form">
		<input type="hidden" name="quiz_id" value="<?php echo $quiz->quiz_id; ?>">
		<input type="hidden" name="quiz_slug" value="<?php echo $quiz->slug; ?>">

		
		<div id="february-container" class="mb-5">
			
			<div class="form-group">
				<label for="name" class="control-label">Was your business formed after February 15, 2019</label>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="february" id="february-yes" value="Yes" checked>
					<label class="form-check-label" for="february-yes">
						Yes
					</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="february" id="february-no" value="No" >
					<label class="form-check-label" for="february-no">
						No
					</label>
				</div>
			</div>

			<div class="form-group">
				<label for="name" class="control-label">Is your business seasonal?</label>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="seasonal" id="seasonal-yes" value="Yes" checked>
					<label class="form-check-label" for="seasonal-yes">
						Yes
					</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="seasonal" id="seasonal-no" value="No" >
					<label class="form-check-label" for="seasonal-no">
						No
					</label>
				</div>
			</div>

			

			<div class="form-group" id="payroll-february-no-container">
				
				<label id="january" for="payroll" class="control-label">What was your payroll cost from January 1, 2020 to Feb 29, 2020?</label>
				<label id="february" for="payroll" class="control-label">What was your payroll from February 15, 2019 to June 30, 2019?</label>
				<label id="months" for="payroll" class="control-label">What was your payroll cost for the last 12 months?</label>

				

				<div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                    </div>
					<input id="payroll" class="form-control input-sm" type="number" step="0.01" name="payroll" min="0" value="0.00" required />
                </div>



			</div>

			
			
		</div>

		

		<div id="refinancing-container">
		
			<div class="form-group">
				<label for="name" class="control-label">Are you refinancing a loan originated after January 31, 2020 that was used to cover payroll costs?</label>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="refinancing" id="refinancing-yes" value="Yes">
					<label class="form-check-label" for="refinancing-yes">
						Yes
					</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="refinancing" id="refinancing-no" value="No" checked>
					<label class="form-check-label" for="refinancing-no">
						No
					</label>
				</div>
			</div>

			<div class="form-group" id="loan-container">
				<label for="loan" class="control-label">What is the outstanding balance of the loan you are refinancing?</label>
               

				<div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                    </div>
					<input id="loan" class="form-control input-sm" type="number" step="0.01" name="loan" min="0" value="0.00" />
                </div>


			</div>

		</div>

		

		
		<div style="text-align:center">
		<p><button onclick="check_before_submit_paycheck_protection(this)" type="button" name="button" class="btn btn-orange">CALCULATE</button></p>
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
#loan-container,
#february,
#months{
	display:none;
}
</style>