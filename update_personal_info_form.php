<form method="post" id="updatePersonalInfo" action='update_personal_info.php' >
	<div class="row">
		<div class="span8">
			<div id="updatePersonalInfoMessage" class="alert alert-success" style="opacity: 0;height:20px;"></div>
		</div>
		<div class="span4">
			<input type="text"  id="fullname" name="fullname" 
			placeholder="Full Name" class="cform-text" 
			size="40" title="Your full name" 
			value="<?php echo $_SESSION['firstname']?>" />
		</div>
		<div class="span4">
			<input type="text"  id="dob" name="dob" 
			placeholder="Your Birthdate" class="cform-text" 
			title="Your date of birth" value="<?php echo $_SESSION['dob']?>" />
		</div>
	</div>
	<div class="row top-buffer">
		<div class="span4">
			<input type="text"  id="email" name="email" disabled="disable"
			placeholder="Your email" class="cform-text" 
			size="40" title="Your email address" value="<?php echo $_SESSION['username']?>" />
		</div>
		<div class="span4">
			<input type="text"  id="contact_no" name="contact_no" 
			placeholder="Mobile Number" class="cform-text" 
			maxlength="10" title="Your mobile number" data-validation="custom" data-validation-regexp="^[789]\d{9}$|^$" 
			data-validation-error-msg="Please enter valid mobile number" value="<?php echo $_SESSION['contact_no']?>" />
		</div>
	</div>
	<div class="row top-buffer">
		<div class="span4">
			<select id="city" name="city" 
			data-placeholder="Current City" title="Your current city">
			<option></option>
		</select>
		<script type="text/javascript">
			$('#city').chosen({
				no_results_text: "Oops, nothing found!",
				width: "100%"
			});
		</script>
	</div>
	<div class="span4">
		<input type="text"  id="pincode" name="pincode" 
		placeholder="Pincode" class="cform-text" 
		size="10" title="Your current location pincode" data-validation="custom" data-validation-regexp="^\d{6}$|^$"
		data-validation-error-msg="Please enter valid pincode" value="<?php echo $_SESSION['pincode']?>"/>
	</div>
</div>
<div class="row top-buffer">
	<div class="span8">
		
		<input type="submit" id="personalInfoSubmit" value="Update" class="cform-submit">
	</div>
</div>
</form>
<script type="text/javascript">
	$(function() {
		$("#dob").datepicker({
			format: "dd/mm/yyyy",
			weekStart: 1,
			startView: 2,
			endDate: "-18y",
			autoclose: true
		});
		$.validate({
			form : '#updatePersonalInfo',
			modules : 'file,security',
			validateOnBlur : true,
      scrollToTopOnError : false // Set this property to true if you have a long form
  });

		var options = { 
			target:   '#updatePersonalInfoMessage',   // target element(s) to be updated with server response 
			
			success:       afterSuccess,  // post-submit callback 
			beforeSubmit:  OnProgress //upload progress callback 
		}; 
		
		$("#updatePersonalInfo").submit(function(e) { 
			$(this).ajaxSubmit(options);  			
			e.preventDefault();
		});	

		//function after succesful file upload (when server response)
		function afterSuccess(response)
		{
			$('#updatePersonalInfoMessage').html("Well done! Your information is updated.")
			.visibilityToggle();
			setTimeout(function(){
				$('#updatePersonalInfoMessage').visibilityToggle();
			}, 5000);
			//$('#updatePersonalInfoMessage').html(response).show();
			$('#personalInfoSubmit').removeAttr('disabled');
		}

	//progress bar function
	function OnProgress(event, position, total, percentComplete)
	{
	    //Progress bar
	    $('#updatePersonalInfoMessage').html("Please wait while we update your information").show();
	    console.log()
	    $('#personalInfoSubmit').attr('disabled' , 'disabled');
	}
	jQuery.fn.visible = function() {
		//return this.css('visibility', 'visible');
		return this.animate({'opacity': '1'},5000);
	};

	jQuery.fn.invisible = function() {
		return this.animate({'opacity': '0'},5000);
	};

	jQuery.fn.visibilityToggle = function() {
		return this.css('opacity', function(i, visibility) {
			return (visibility == 1) ? 0 : 1;
		});
	};

}); 
</script>