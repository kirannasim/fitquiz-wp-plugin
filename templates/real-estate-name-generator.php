<div id="real_estate_name_generator" class="real-estate-name-gen__wrapper">
	<h2 class="slogen-gen__title">
    Generate Your Name
  </h2>

	<form class="repeater" id="real_estate_name_generator_form">
		<input type="hidden" name="quiz_id" value="<?php echo $quiz->quiz_id; ?>" />
		<input type="hidden" name="quiz_slug" value="<?php echo $quiz->slug; ?>" />

		<div class="form-row">
			<div class="col-12">
				<div class="form-group">

					<h5>Chose a name format</h5>

					<div class="form-check">
							<input type="radio" class="form-check-input" id="format1" name="format" value="1" checked>
							<label class="form-check-label" for="format1">Adjective + Nature & Architectural + Real Estate</label>
					</div>

					<div class="form-check">
							<input type="radio" class="form-check-input" id="format2" name="format" value="2">
							<label class="form-check-label" for="format2">Adjective + Real Estate</label>
					</div>

					<div class="form-check">
							<input type="radio" class="form-check-input" id="format3" name="format" value="3">
							<label class="form-check-label" for="format3">Nature + Real Estate</label>
					</div>

				</div>
			</div>

			<div class="col-12 mt-3">
					<div class="form-group text-center">
					<button onclick="check_before_submit_real_estate_name_generator(this)" type="button" name="button" id="real-estate-name-gen_btn" class="real-estate-name-gen_btn">GENERATE</button>
					</div>
			</div>

		</div>

	</form>
	<div style="margin:20px 0;"></div>
  <div id="response"></div>
	<div class="real-estate-name-gen__warning">

		<small><p class="real-estate-name-gen__warning-copy text-center">
			Warning: The company names produced by this generator were created by our team, but it is up to you to verify trademark status.
		</p>
		</small>
	</div>
  

  <?php if (isset($quiz->quiz_html) && $quiz->quiz_html != ''): ?>
    <div id="html" style="display:none">

    	<div class="row text-center">
      	<div class="col-md-12">
			<?php
				if ($quiz->quiz_html) {
    		$result = preg_replace('@rel="(.*)"@U', '', $quiz->quiz_html);
    		$result = preg_replace('@<a(.*)>@U', '<a$1 rel="noopener nofollow">', $result);
    		echo $result;
				}
			?>

      <?php if (isset($_SERVER['REQUEST_URI'])): ?>
        <p class="text-center"><span style="display:block; margin:20px 0;"><a href="<?php echo $_SERVER['REQUEST_URI']; ?>">Reset Form</a></span></p>
      <?php endif;?>
            </div>
        </div>

    </div>
  <?php endif;?>




</div>




<style>
	label.error{
			width:100%;
			display:block;
			text-align:left;
	}

	.real-estate-name-gen__wrapper {
		margin-left: auto;
    margin-right: auto;
		margin-bottom: 6rem;
    padding: 1rem 2rem;
    background-color: #fff;
    box-shadow: 0 0 25px #e5e5e5;
	}

	.real-estate-name-gen_btn--back {
		display: none;
		margin-top: 40px;
	}

	.real-estate-name-gen__wrapper .table td {
		display: block;
		padding: 1.25rem;
		text-align: center;
    font-size: 20px;
    font-weight: 700;
	}

</style>