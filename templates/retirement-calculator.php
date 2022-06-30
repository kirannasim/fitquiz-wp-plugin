<div id="quiz_6GJBtT47">
<div id="retirement_wrapper">

  <!-- add_header -->
	<?php if($quiz_show_header): ?>
		<h2 style="text-align:center"><?php echo $quiz_header ?></h2>
	<?php endif; ?>
  <!-- add_header -->

	<form id="retirement_calculator_form" method="post" class="form calculator_form">
		   <input type="hidden" name="quiz_id" value="34">
		   <div class="question_container">
		      <div class="question">
		         <h4>Current age</h4>
		         <p>Min age:14 - Max age: 90</p>
		      </div>
		      <div class="input"> <input type="number" id="input_1" name="q185" step="any" max="90" min="14" placeholder="45" value="45" class="form-control required"></div>
		   </div>
		   <div class="question_container">
		      <div class="question">
		         <h4>Projected age at retirement</h4>
		         <p>Min age:10 - Max age: 90</p>
		      </div>
		      <div class="input"> <input type="number" id="input_2" name="q186" step="any" max="90" min="10" placeholder="60" value="60" class="form-control required"></div>
		   </div>
		   <div class="question_container">
		      <div class="question">
		         <h4>Current annual household income</h4>
		         <p>Min. 0 - Max. 10000000</p>
		      </div>
		      <div class="input"> <input type="number" id="input_3" name="q187" step="any" max="10000000" min="0" placeholder="65000" value="65000" class="form-control required"></div>
		   </div>
		   <div class="question_container">
		      <div class="question">
		         <h4>Average annual retirement savings as a percent of income</h4>
		         <p>Min 0 - Max 100</p>
		      </div>
		      <div class="input"> <input type="number" id="input_4" name="q188" step="any" max="100" min="0" placeholder="20" value="20" class="form-control required"></div>
		   </div>
		   <div class="question_container">
		      <div class="question">
		         <h4>Current retirement savings balance</h4>
		         <p>Min. 0 - Max 10000000</p>
		      </div>
		      <div class="input"> <input type="number" id="input_5" name="q189" step="any" max="10000000" min="0" placeholder="20000" value="20000" class="form-control required"></div>
		   </div>
		   <div class="question_container">
		      <div class="question">
		         <h4>Average expected annual income increase</h4>
		         <p>Min 0 - Max 20</p>
		      </div>
		      <div class="input"> <input type="number" id="input_6" name="q190" step="any" max="20" min="0" placeholder="5" value="5" class="form-control required"></div>
		   </div>
		   <div class="question_container">
		      <div class="question">
		         <h4>Income required during retirement as a percent of current household income</h4>
		         <p>Min 40 - Max 160</p>
		      </div>
		      <div class="input"> <input type="number" id="input_7" name="q191" step="any" max="160" min="40" placeholder="50" value="50" class="form-control required"></div>
		   </div>
		   <div class="question_container">
		      <div class="question">
		         <h4>Expected number years needed of retirement income</h4>
		         <p>Min 1 - Max 100</p>
		      </div>
		      <div class="input"> <input type="number" id="input_8" name="q192" step="any" max="100" min="1" placeholder="25" value="25" class="form-control required"></div>
		   </div>
		   <div class="question_container">
		      <div class="question">
		         <h4>Average expected annual rate of return on retirement savings</h4>
		         <p>Min 0 - Max 10</p>
		      </div>
		      <div class="input"> <input type="number" id="input_9" name="q193" step="any" max="10" min="0" placeholder="5" value="5" class="form-control required"></div>
		   </div>
		   <div class="question_container">
		      <div class="question">
		         <h4>Rate of Return During Retirement</h4>
		         <p>Min 0 - Max 10</p>
		      </div>
		      <div class="input"> <input type="number" id="input_10" name="q194" step="any" max="10" min="0" placeholder="4" value="4" class="form-control required"></div>
		   </div>
		   <div class="question_container">
		      <div class="question">
		         <h4>Average expected annual inflation rate</h4>
		         <p>Min 0 - Max 10</p>
		      </div>
		      <div class="input"> <input type="number" id="input_11" name="q195" step="any" max="10" min="0" placeholder="3" value="3" class="form-control required"></div>
		   </div>
		   <div style="text-align:center"> <button onclick="check_before_submit_form(this)" type="button" name="button" id="calculator_button">Calculate</button></div>
		</form>

<div id="graphs">

	<span>
		<h3>Retirement savings runs out at age 81.</h3>
		<p>Your plan provides $700,394 when you retire. This assumes annual retirement expenses of $64,337 which is 40% of your last year's income of $160,844. This includes $0 per year from Social Security.</p>
	</span>

  <div id="curve_chart" class="chart"></div>

	

	<?php if(isset($quiz->quiz_html) && $quiz->quiz_html != ''): ?>
    <div id="quiz_html">
       
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

	


	<p style="text-align:center">
	<button onclick="show_report(this)" type="button" name="button" id="table_button">Show My Retirement Summary</button>
	</p>

</div>



 <div id="response"></div>

 


</div>
</div>

<script>
const view_id = <?php echo $view_id ?>;
</script>



