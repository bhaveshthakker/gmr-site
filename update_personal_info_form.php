<div class="row">
	<div class="span4">
		<input type="text"  id="fullname" name="fullname" 
		placeholder="Full Name" class="cform-text" 
		size="40" title="Your full name" data-validation="required" 
		data-validation-error-msg="Please enter your full name" />
	</div>
	<div class="span4">
		<input type="text"  id="dob" name="dob" 
		placeholder="Your Birthdate" class="cform-text" 
		title="Your mobile number" />
	</div>
	<script type="text/javascript">
		$(function() {
			$("#dob").datepicker({
				format: "dd/mm/yyyy",
				weekStart: 1,
				startView: 2,
				endDate: "-18y",
				autoclose: true
			});
		});
	</script>
</div>
<div class="row top-buffer">
	<div class="span4">
		<input type="text"  id="email" name="email" 
		placeholder="Your email" class="cform-text" 
		size="40" title="Your full name" />
	</div>
	<div class="span4">
		<input type="text"  id="contact_no" name="contact_no" 
		placeholder="Mobile Number" class="cform-text" 
		size="10" title="Your mobile number" data-validation="required" 
		data-validation-error-msg="Please enter your mobile number" />
	</div>
</div>
<div class="row top-buffer">
	<div class="span4">
		<select id="city" name="city" 
		data-placeholder="Current City" title="Your current city" data-validation="required" 
		data-validation-error-msg="Please enter your current city">
		<option></option>
	</select>
</div>
<div class="span4">
	<input type="text"  id="pincode" name="pincode" 
	placeholder="Pin code" class="cform-text" 
	size="10" title="Your current location pincode" data-validation="required" 
	data-validation-error-msg="Please enter your mobile number" />
</div>
</div>