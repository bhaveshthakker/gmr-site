<div class="row">
	<div class="span2"></div>
	<div class="span8">
		<section>
			<legend>1.&nbsp;&nbsp; Update your personal information</legend>
			<div class="row">
				<div class="span4"></div>
				<div class="span4"></div>
			</div>
		</section>

		<!-- <textarea rows="3" placeholder="List the name of your preferred companies"></textarea> -->
		<section><legend>2.&nbsp;&nbsp; Update your preferences</legend>
			<form id="updatePreferences" method="post" action='update_preferences.php'>
				<select id="chosen-plugin-companies" name="chosen-plugin-companies" data-placeholder="Choose your preferred companies..." class="chosen-select" multiple style="width:100%;" tabindex="4">
					<option value=""></option>
				</select>

				<!-- <textarea rows="3" placeholder="List the name of your preferred locations"></textarea> -->
				<select id="chosen-plugin-cities" data-placeholder="Choose your preferred cities..." class="chosen-select" multiple style="width:100%;" tabindex="4">
					<option value=""></option>
				</select>
				<input type="hidden" name="allSelectedCompanies" id="allSelectedCompanies"></input>
				<span id="updatePreferencesMessage"></span>
				<input type="submit" value="Save Preferences" class="cform-submit">
			</form>
		</section>
		<section>
			<legend>3.&nbsp;&nbsp;Upload your resume</legend>
			<form id="updateProfile" method="post" action='upload.php' enctype="multipart/form-data" >
				
				<div class="row">
				<div class="span4">
					<input type="file" name="resume" id="resume"/>
					<?php
					if(isset($_SESSION['resume_path'])) {
						?>
						<a href="<?php echo "/".$_SESSION['resume_path']; ?>" target="_blank">Current Resume</a>
						<?php } ?>
					</div>
					<div class="span4">
						<div class="progress progress-striped">
							<div class="bar"></div>
						</div >	
						<div id="output"></div>
					</div>
				</div>	

					<input type="submit" value="Upload Resume" class="cform-submit">	
				</form>
			</section>
		</div>
		<div class="span2"></div>	
	</div>
	<!-- Populate all companies -->
	<script type="text/javascript">
		var request = $.ajax({
			url: "company_map.php",
			type: "GET",			
			dataType: "html"
		});
		request.done(function(msg) {
			var companies = JSON.parse(msg);
			var preferred_companies = <?php echo "'".$_SESSION['company']."'"; ?>;
			var company_ids = preferred_companies.split(";")
			for(var counter in company_ids) {
				company_ids[counter] = company_ids[counter].split(":")[1];
			}
			for(var counter in companies)
			{
				if(company_ids.indexOf(companies[counter].id) !== -1) {
					$("#chosen-plugin-companies").append('"<option selected="selected" value="' + companies[counter].id + 
						'">' + companies[counter].name + '</option>');
				} else {
					$("#chosen-plugin-companies").append('"<option value="' + companies[counter].id + 
						'">' + companies[counter].name + '</option>');
				}
			}
			$("#chosen-plugin-companies").chosen();
		});
	</script>
	<!-- Populate all cities -->
	<script type="text/javascript">
		var request = $.ajax({
			url: "cities_map.php",
			type: "GET",			
			dataType: "html"
		});
		request.done(function(msg) {
			var companies = JSON.parse(msg);
			for(var counter in companies)
			{
				$("#chosen-plugin-cities").append('"<option value="' + companies[counter].id + 
					'">' + companies[counter].name + '</option>');
			}
			$("#chosen-plugin-cities").chosen();
		});
	</script>



	<script>
		$(document).ready(function() { 
			var options = { 
				target:   '#output',   // target element(s) to be updated with server response 
				beforeSubmit:  beforeSubmit,  // pre-submit callback 
				success:       afterSuccess,  // post-submit callback 
				uploadProgress: OnProgress, //upload progress callback 
				resetForm: true        // reset the form after successful submit 
			}; 
			$("#updatePreferences").submit(function() { 
				populateCompanyName();
				$(this).ajaxSubmit(options);  			
				// always return false to prevent standard browser submit and page navigation 
				return false; 
			});	

			function populateCompanyName() {
				var allSelectedCompanies = $("#chosen-plugin-companies :selected");
				var allSelectedCompaniesTexts = "";
				for(var i = 0; i< allSelectedCompanies.length; i++)
				{
					allSelectedCompaniesTexts += allSelectedCompanies[i].text + ":" + allSelectedCompanies[i].value + ";"
				}
				$("#allSelectedCompanies").val(allSelectedCompaniesTexts);
			}

		//function after succesful file upload (when server response)
		function afterSuccess()
		{
			$("#updatePreferencesMessage").html("Your preferences have been updated");
			setTimeout(function(){ 
				$("#updatePreferencesMessage").html("");
			}, 5000);
		}

		//function to check file size before uploading.
		function beforeSubmit() {
		}

		//progress bar function
		function OnProgress(event, position, total, percentComplete)
		{
		    //Progress bar
		    $("#updatePreferencesMessage").html("Please wait while we update your preferences");
		}

	}); 
</script>

