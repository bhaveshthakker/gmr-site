<form method="post" id="updateProfessionalInfo" action='update_professional_info.php' >
	<div class="row">
		<div class="span8">
			<div id="updateProfessionalInfoMessage" class="alert alert-success" style="opacity: 0;height:20px;"></div>
		</div>
		<div class="span4">
			<select type="text"  id="primary_skill" name="primary_skill" 
			data-placeholder="Primary Skill" class="cform-text">
			<option></option>
			<option value="Java">Java</option>
			<option value="Java/J2ee">Java/J2ee</option>
			<option value="HTML5/CSS3">HTML5/CSS3</option>
			<option value="JavaScript">JavaScript</option>
		</select>
		<script type="text/javascript">
			$('#primary_skill').chosen({
				no_results_text: "Oops, nothing found!",
				width: "100%"
			});
			window.valueP ="<?php echo $_SESSION['primary_skill']?>";
			$('#primary_skill').val(window.valueP);
			$("#primary_skill").trigger("chosen:updated");
		</script>
	</div>
	<div class="span4">
		<select type="text" multiple="multiple"  id="secondary_skills" name="secondary_skills" 
		data-placeholder="Secondary Skills &nbsp;" class="cform-text">
		<option value="Java">Java</option>
		<option value="Java/J2ee">Java/J2ee</option>
		<option value="HTML5/CSS3">HTML5/CSS3</option>
		<option value="JavaScript">JavaScript</option>
	</select>
	<script type="text/javascript">
		window.valueS ="<?php echo $_SESSION['secondary_skills']?>";
		$('#secondary_skills').val(window.valueS);
		var $skills = $("#secondary_skills");
		$('#secondary_skills').chosen({
			no_results_text: "Oops, nothing found!",
			width: "100%"
		}).change(function(val) {
			var $skills = $("#secondary_skills");
			if($skills.val())
				$("#secondary_skills_chosen .search-field").removeClass("chosen-shift-placeholder");
			else
				$("#secondary_skills_chosen  .search-field").addClass("chosen-shift-placeholder"); 

		});		
		if($skills.val())
			$("#secondary_skills_chosen .search-field").removeClass("chosen-shift-placeholder");
		else
			$("#secondary_skills_chosen  .search-field").addClass("chosen-shift-placeholder"); 
		$("#secondary_skills").trigger("chosen:updated");
	</script>
</div>
</div>
<div class="row top-buffer">
	<div class="span4">
		<select type="text"  id="experience" name="experience" 
		data-placeholder="Experience" class="cform-text" >
		<option></option>
		<option>Not Applicable</option>
		<option>0 - 1 year</option>
		<option>1 - 2 years</option>
		<option>2 - 3 years</option>
		<option>3 - 4 years</option>
		<option>4 - 5 years</option>
		<option>5 - 6 years</option>
		<option>6 - 7 years</option>
		<option>7 - 8 years</option>
		<option>8 - 9 years</option>
		<option>9 - 10 years</option>
		<option>10 - 11 years</option>
		<option>11 - 12 years</option>
		<option>12 - 13 years</option>
		<option>13 - 14 years</option>
		<option>14 - 15 years</option>
		<option>15+ Years</option>
	</select>
	<script type="text/javascript">
		$('#experience').chosen({
			no_results_text: "Oops, nothing found!",
			width: "100%"
		});
	</script>
</div>
<div class="span4">
	<select type="text"  id="current_company" name="current_company" 
	data-placeholder="Current Company" class="cform-text">
	<option></option>
</select>
<script type="text/javascript">
	$('#current_company').chosen({
		no_results_text: "Oops, nothing found!",
		width: "100%"
	});
</script>
</div>
</div>
<div class="row top-buffer">
	<div class="span4">
		<select id="notice_period" name="notice_period" 
		data-placeholder="Notice Period (in days)">
		<option></option>
		<option>Not Applicable</option>
		<option>Immediate</option>
		<option>1 - 15 days</option>
		<option>15 - 30 days</option>
		<option>30 - 45 days</option>
		<option>45 - 60 days</option>
		<option>60+ days</option>

	</select>
	<script type="text/javascript">
		$('#notice_period').chosen({
			no_results_text: "Oops, nothing found!",
			width: "100%"
		});
	</script>
</div>
<div class="span4">
	<select type="text"  id="current_ctc" name="current_ctc" 
	data-placeholder="Current CTC ( in INR )" class="cform-text">
	<option values="</"></option>
	<option values="No">Not Applicable</option>
	<option values="0">0-50K</option>
	<option values="50">50K - 1 Lacs</option>
	<option values="1">1 - 1.5 Lacs</option>
	<option values="1.5">1.5 - 2 Lacs</option>
	<option values="2">2 - 2.5 Lacs</option>
	<option values="2.5">2.5 - 3 Lacs</option>
	<option values="3">3 - 3.5 Lacs</option>
	<option values="3.5">3.5 - 4 Lacs</option>
	<option values="4">4 - 4.5 Lacs</option>
	<option values="4.5">4.5 - 5 Lacs</option>
	<option values="5">5 - 5.5 Lacs</option>
	<option values="5.5">5.5 - 6 Lacs</option>
	<option values="6">6 - 6.5 Lacs</option>
	<option values="6.5">6.5 - 7 Lacs</option>
	<option values="7">7 - 7.5 Lacs</option>
	<option values="7.5">7.5 - 8 Lacs</option>
	<option values="8">8 - 8.5 Lacs</option>
	<option values="8.5">8.5 - 9 Lacs</option>
	<option values="9">9 - 9.5 Lacs</option>
	<option values="9.5">9.5 - 10 Lacs</option>
	<option values="10">10 - 10.5 Lacs</option>
	<option values="10.5">10.5 - 11 Lacs</option>
	<option values="11">11 - 11.5 Lacs</option>
	<option values="11.5">11.5 - 12 Lacs</option>
	<option values="12">12 - 12.5 Lacs</option>
	<option values="12.5">12.5 - 13 Lacs</option>
	<option values="13">13 - 13.5 Lacs</option>
	<option values="13.5">13.5 - 14 Lacs</option>
	<option values="14">14 - 14.5 Lacs</option>
	<option values="14.5">14.5 - 15 Lacs</option>
	<option values="15">15 - 15.5 Lacs</option>
	<option values="15.5">15.5 - 16 Lacs</option>
	<option values="16">16 - 16.5 Lacs</option>
	<option values="16.5">16.5 - 17 Lacs</option>
	<option values="17">17 - 17.5 Lacs</option>
	<option values="17.5">17.5 - 18 Lacs</option>
	<option values="18">18 - 18.5 Lacs</option>
	<option values="18.5">18.5 - 19 Lacs</option>
	<option values="19">19 - 19.5 Lacs</option>
	<option values="19.5">19.5 - 20 Lacs</option>
	<option values="20">20 - 20.5 Lacs</option>
	<option values="20.5">20.5 - 21 Lacs</option>
	<option values="21">21 - 21.5 Lacs</option>
	<option values="21.5">21.5 - 22 Lacs</option>
	<option values="22">22 - 22.5 Lacs</option>
	<option values="22.5">22.5 - 23 Lacs</option>
	<option values="23">23.5 - 23.5 Lacs</option>
	<option values="23.5">23.5 - 24 Lacs</option>
	<option values="24">24.5 - 25 Lacs</option>
	<option values="25">25+ Lacs</option>
</select>
<script type="text/javascript">
	$('#current_ctc').chosen({
		no_results_text: "Oops, nothing found!",
		width: "100%"
	});
</script>
</div>
</div>
<div class="row top-buffer">
	<div class="span8">
		<input type="hidden" id="secondary_skills_hidden" name="secondary_skills_hidden"/>
		<input type="submit" id="professionalInfoSubmit" value="Update" class="cform-submit">
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
			form : '#updateProfessionalInfo',
			modules : 'file,security',
			validateOnBlur : true,
      scrollToTopOnError : false // Set this property to true if you have a long form
  });

		var options = { 
			target:   '#updateProfessionalInfoMessage',   // target element(s) to be updated with server response 
			
			success:       afterSuccess,  // post-submit callback 
			beforeSubmit:  OnProgress //upload progress callback 
		}; 
		
		$("#updateProfessionalInfo").submit(function(e) { 
			var $secondary_skills = $("#secondary_skills").val();
			console.log($secondary_skills)
			$("#secondary_skills_hidden").val($secondary_skills);
			$(this).ajaxSubmit(options);  			
			e.preventDefault();
		});	

		//function after succesful file upload (when server response)
		function afterSuccess(response)
		{
			$('#updateProfessionalInfoMessage').html("Well done! Your information is updated.")
			.visibilityToggle();
			setTimeout(function(){
				$('#updateProfessionalInfoMessage').visibilityToggle();
			}, 5000);
			//$('#updateProfessionalInfoMessage').html(response).show();
			$('#professionalInfoSubmit').removeAttr('disabled');
		}

	//progress bar function
	function OnProgress(event, position, total, percentComplete)
	{
	    //Progress bar
	    $('#updateProfessionalInfoMessage').html("Please wait while we update your information").show();
	    console.log()
	    $('#professionalInfoSubmit').attr('disabled' , 'disabled');
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