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
			var p_skill ="<?php echo $_SESSION['primary_skill']?>";
			$('#primary_skill').val(p_skill);
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
		var $secondary_skills_values ="<?php echo $_SESSION['secondary_skills']?>";
		var $secondary_skills_dropdown = $("#secondary_skills");
		$secondary_skills_dropdown.val($secondary_skills_values.split(","));
		
		$secondary_skills_dropdown.chosen({
			no_results_text: "Oops, nothing found!",
			width: "100%"
		}).change(function(event) {
			if($(event.target).val())
				$("#secondary_skills_chosen .search-field").removeClass("chosen-shift-placeholder");
			else
				$("#secondary_skills_chosen  .search-field").addClass("chosen-shift-placeholder"); 

		});		
		if($secondary_skills_dropdown.val())
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
		<option value="Not Applicable">Not Applicable</option>
		<option value="0 - 1 year">0 - 1 year</option>
		<option value="1 - 2 years">1 - 2 years</option>
		<option value="2 - 3 years">2 - 3 years</option>
		<option value="3 - 4 years">3 - 4 years</option>
		<option value="4 - 5 years">4 - 5 years</option>
		<option value="5 - 6 years">5 - 6 years</option>
		<option value="6 - 7 years">6 - 7 years</option>
		<option value="7 - 8 years">7 - 8 years</option>
		<option value="8 - 9 years">8 - 9 years</option>
		<option value="9 - 10 years	">9 - 10 years</option>
		<option value="10 - 11 years">10 - 11 years</option>
		<option value="11 - 12 years">11 - 12 years</option>
		<option value="12 - 13 years">12 - 13 years</option>
		<option value="13 - 14 years">13 - 14 years</option>
		<option value="14 - 15 years">14 - 15 years</option>
		<option value="15+ Years">15+ Years</option>
	</select>
	<script type="text/javascript">
		$('#experience').chosen({
			no_results_text: "Oops, nothing found!",
			width: "100%"
		});
		var experience ="<?php echo $_SESSION['experience']?>";
		$('#experience').val(experience);
		$("#experience").trigger("chosen:updated");
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
		<option value="Not Applicable">Not Applicable</option>
		<option value="Immediate">Immediate</option>
		<option value="1 - 15 days">1 - 15 days</option>
		<option value="15 - 30 days">15 - 30 days</option>
		<option value="30 - 45 days">30 - 45 days</option>
		<option value="45 - 60 days">45 - 60 days</option>
		<option value="60+ days">60+ days</option>

	</select>
	<script type="text/javascript">
		$('#notice_period').chosen({
			no_results_text: "Oops, nothing found!",
			width: "100%"
		});
		var notice_period ="<?php echo $_SESSION['notice_period']?>";
		$('#notice_period').val(notice_period);
		$("#notice_period").trigger("chosen:updated");
	</script>
</div>
<div class="span4">
	<select type="text"  id="current_ctc" name="current_ctc" 
	data-placeholder="Current CTC ( in INR )" class="cform-text">
	<option></option>
	<option value="Not Applicable">Not Applicable</option>
</select>
<script type="text/javascript">
	$(function() {
		var ctc = ctc_array;
		var current_ctc = <?php echo "'".$_SESSION['current_ctc']."'"; ?>;
		for(var counter in ctc)
		{
			if(ctc[counter]==current_ctc) {
				$("#current_ctc").append('<option selected="selected" value="' + ctc[counter] + 
					'">' + ctc[counter] + '</option>');	
			} else {
				$("#current_ctc").append('<option value="' + ctc[counter] + 
					'">' + ctc[counter] + '</option>');	
			}
		}
		$('#current_ctc').chosen({
			no_results_text: "Oops, nothing found!",
			width: "100%"
		});
	});
	//var current_ctc ="<?php echo $_SESSION['current_ctc']?>";
	//$('#current_ctc').val(current_ctc);
	//$("#current_ctc").trigger("chosen:updated");
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
			//console.log($secondary_skills)
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