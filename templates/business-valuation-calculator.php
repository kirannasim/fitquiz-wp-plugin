<div id="business_valuation_calculation">
    <form id="business_valuation_calculation_form" class="form">
        <input type="hidden" name="quiz_id" value="<?php echo $quiz->quiz_id ?>">
        <input type="hidden" name="quiz_slug" value="<?php echo $quiz->slug ?>">

        <div class="form-group">
            <label for="business_type" class="control-label">Type of Business</label>
            <select id="business_type" class="form-control input-sm" name="business_type">
                <option value="1">Agriculture</option>
                <option value="2">Communications</option>
                <option value="3">Construction-Building</option>
                <option value="4">Construction-Heavy</option>
                <option value="5">Construction-Special Trades</option>
                <option value="6">Electric, Gas, Water, Sanitary Svcs</option>
                <option value="7">Business Services (B2B)</option>
                <option value="8">Consumer Services (B2C)</option>
                <option value="9">Domain Name/Basic Site</option>
                <option value="10">General Internet</option>
                <option value="11">Software</option>
                <option value="12">Web Design/Tech Services</option>
                <option value="13">Apparel & finished fabrics</option>
                <option value="14">Chemicals & Allied Products</option>
                <option value="15">Electronic & Electrical Equip,</option>
                <option value="16">Fabricated Metal Products</option>
                <option value="17">Food and Kindred Products</option>
                <option value="18">Furniture and Fixtures</option>
                <option value="19">Industrial & Comm, Machinery</option>
                <option value="20">Lumber and Wood Products</option>
                <option value="21">Measuring & Analyzing Instr,</option>
                <option value="22">Miscellaneous</option>
                <option value="23">Paper & Allied Products</option>
                <option value="24">Primary Metal Industries</option>
                <option value="25">Printing, Publishing</option>
                <option value="26">Rubber and Plastic Products</option>
                <option value="27">Stone, Clay, Glass, Concrete</option>
                <option value="28">Textile Mill Products</option>
                <option value="29">Tobacco Products</option>
                <option value="30">Transportation Equipment</option>
                <option value="31">Restaurants</option>
                <option value="32">Apparel and Accessory Stores</option>
                <option value="33">Automotive Dealers</option>
                <option value="34">Bars/Taverns</option>
                <option value="35">Blding Mat,, Hardware, Garden</option>
                <option value="36">Convenience Stores</option>
                <option value="37">Florists</option>
                <option value="38">Gasoline Service Stations</option>
                <option value="39">General Merchandise Stores</option>
                <option value="40">Home Furniture & Furnishings</option>
                <option value="41">Liquor Stores</option>
                <option value="42">Marine Dealers & Equipment</option>
                <option value="43">Miscellaneous Retail</option>
                <option value="44">Other Eating & Drinking Places</option>
                <option value="45">Other Food Stores</option>
                <option value="46">Pet Shops & Supplies</option>
                <option value="47">Supermarkets</option>
                <option value="48">Vending Machines</option>
                <option value="49">Agents & Brokers</option>
                <option value="50">Amusement & Recreation</option>
                <option value="51">Auto Repair, Parts & Services</option>
                <option value="52">Beauty Salons, Barber Shops</option>
                <option value="53">Computer & Software Services</option>
                <option value="54">Drycleaning/Laundry Services</option>
                <option value="55">Educational Services</option>
                <option value="56">Engineering & Accounting Svcs</option>
                <option value="57">Finance, Banking, Loans, etc,</option>
                <option value="58">Freight, Moving/Delivery</option>
                <option value="59">Health, Medical & Dental</option>
                <option value="60">Hotels & Other Lodging Places</option>
                <option value="61">Landscaping & Yard Services</option>
                <option value="62">Legal Services</option>
                <option value="63">Marine Repair, Parts & Services</option>
                <option value="64">Membership Organizations</option>
                <option value="65">Miscellaneous Repair Services</option>
                <option value="66">Miscellaneous Services</option>
                <option value="67">Motion Pictures</option>
                <option value="68">Museums, Art Galleries, Zoos</option>
                <option value="69">Other Business Services</option>
                <option value="70">Other Personal Services</option>
                <option value="71">Other Travel & Transportation</option>
                <option value="72">Passenger Transportation</option>
                <option value="73">Pet Care & Grooming</option>
                <option value="74">Social Services</option>
                <option value="75">Storage & Warehousing</option>
                <option value="76">Travel Agencies</option>
                <option value="77">Durable Goods</option>
                <option value="78">Nondurable Goods</option>
                <option value="79">Non-classifiable Establishments</option>

            </select>
        </div>
        
        <div class="form-group">
            <label for="last_monthly_sales" class="control-label">Last 12 Months Sales</label>
            <div class="input-group">
                <div class="input-group-addon">$</div>
                <input id="last_monthly_salse" class="form-control input-sm" type="text" name="last_monthly_sales" value="400000" autocomplete="off" />
            </div>
        </div>

        <div class="form-group">
            <label for="last_monthly_profits" class="control-label">Last 12 Months Profits + Owner's Salary</label>
            <div class="input-group">
                <div class="input-group-addon">$</div>
                <input id="last_monthly_profits" class="form-control input-sm" type="text" name="last_monthly_profits" value="200000" autocomplete="off" />
            </div>
        </div>

        <div class="form-group text-center">
            <button id="calculate_form" class="btn btn-orange" type="button">Calculate</button>
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
    #business_valuation_calculation {
        max-width: 800px;
        margin: 0 auto;
        position:relative;
    }
    #business_valuation_calculation .radio_label{
        font-size: 14px !important;
    }
    #business_valuation_calculation .input-sm {
        height: 30px !important;
        padding: 5px 10px !important;
        font-size: 12px !important;
        line-height: 1.5 !important;
        border-radius: 3px !important;
    }
    #business_valuation_calculation .radio input[type="radio"], 
    #business_valuation_calculation .radio input.radio {
        margin:4px 0 0 -20px !important;
    }

    #business_valuation_calculation input.invalid {
        background-color: #ffdddd;
    }

    #business_valuation_calculation .input-error {
        border:1px solid red;
    }

    #business_valuation_calculation .text-color-primary {
        color:#008080;
    }

    #business_valuation_calculation .input-error-message {
        display: block;
        overflow: hidden;
        border: 1px solid transparent;
        color: red;
        padding: 5px;
    }

    #business_valuation_calculation .btn-orange {
        border: 1px solid #ed833f;
        background-color: #ed833f;
        color: #fff;
        text-shadow: #888 0 0 1px;
    }

    #business_valuation_calculation .btn-orange:hover {
        color:#f6c19f;
    }

    #business_valuation_calculation #loading {
        position:absolute;
        top:0;
        left:0;
        background:#ddd;
        width:100%;
        height:100%;
        z-index:9999;
    }

    #business_valuation_calculation #loading span {
        position:absolute;
        top:50%;
        left:50%;
        font-weight:bold;
        color: #ed833f;
        transform: translate(-50%, -50%);
        text-transform: uppercase;
        letter-spacing: 5px;
    }
     .text-center{text-align:center}.form-group{margin-bottom:20px}.input-group{position:relative;display:table;border-collapse:separate}.input-group.col{float:none;padding-right:0;padding-left:0}.input-group .form-control{width:100%;margin-bottom:0}.input-group-lg>.form-control,.input-group-lg>.input-group-addon,.input-group-lg>.input-group-btn>.btn{height:45px;padding:10px 16px;font-size:18px;line-height:1.33;border-radius:6px}select.input-group-lg>.form-control,select.input-group-lg>.input-group-addon,select.input-group-lg>.input-group-btn>.btn{height:45px;line-height:45px}textarea.input-group-lg>.form-control,textarea.input-group-lg>.input-group-addon,textarea.input-group-lg>.input-group-btn>.btn{height:auto}.input-group-sm>.form-control,.input-group-sm>.input-group-addon,.input-group-sm>.input-group-btn>.btn{height:30px;padding:5px 10px;font-size:12px;line-height:1.5;border-radius:3px}select.input-group-sm>.form-control,select.input-group-sm>.input-group-addon,select.input-group-sm>.input-group-btn>.btn{height:30px;line-height:30px}textarea.input-group-sm>.form-control,textarea.input-group-sm>.input-group-addon,textarea.input-group-sm>.input-group-btn>.btn{height:auto}.input-group-addon,.input-group-btn,.input-group .form-control{display:table-cell}.input-group-addon:not(:first-child):not(:last-child),.input-group-btn:not(:first-child):not(:last-child),.input-group .form-control:not(:first-child):not(:last-child){border-radius:0}.input-group-addon,.input-group-btn{width:1%;white-space:nowrap;vertical-align:middle}.input-group-addon{padding:6px 12px;font-size:14px;font-weight:400;line-height:1;color:#555;text-align:center;background-color:#eee;border:1px solid #ccc;border-radius:4px}.input-group-addon.input-sm{padding:5px 10px;font-size:12px;border-radius:3px}.input-group-addon.input-lg{padding:10px 16px;font-size:18px;border-radius:6px}.input-group-addon input[type="radio"],.input-group-addon input[type="checkbox"]{margin-top:0}.input-group .form-control:first-child,.input-group-addon:first-child,.input-group-btn:first-child>.btn,.input-group-btn:first-child>.dropdown-toggle,.input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle){border-top-right-radius:0;border-bottom-right-radius:0}.input-group-addon:first-child{border-right:0}.input-group .form-control:last-child,.input-group-addon:last-child,.input-group-btn:last-child>.btn,.input-group-btn:last-child>.dropdown-toggle,.input-group-btn:first-child>.btn:not(:first-child){border-bottom-left-radius:0;border-top-left-radius:0}.input-group-addon:last-child{border-left:0}.input-group-btn{position:relative;white-space:nowrap}.input-group-btn:first-child>.btn{margin-right:-1px}.input-group-btn:last-child>.btn{margin-left:-1px}.input-group-btn>.btn{position:relative}.input-group-btn>.btn + .btn{margin-left:-4px}.input-group-btn>.btn:hover,.input-group-btn>.btn:active{z-index:2}
</style>