<div class="row">
	<div class="span8">
		<div id="updatePreferencesMessage" class="alert alert-success" style="display:none"></div>
	</div>
	<div class="span8">
		<form id="updatePreferences" method="post" action='update_preferences.php'>
			<div class="row">
				<div class="span4 top-buffer">
					<select id="chosen-plugin-companies" name="chosen-plugin-companies" data-placeholder="    Your Preferred Companies" class="chosen-select" multiple style="width:100%;" tabindex="4">
						<option></option>
					</select>
				</div>
				<div class="span4 top-buffer">
					<select id="chosen-plugin-cities" data-placeholder="    Your Preferred Cities" class="chosen-select" multiple style="width:100%;" tabindex="4">
						<option></option>
					</select>
				</div>
			</div>
			<!-- <textarea rows="3" placeholder="List the name of your preferred locations"></textarea> -->
			<div class="row top-buffer">
				<div class="span8">
					<input type="hidden" name="allSelectedCompanies" id="allSelectedCompanies"></input>
					<input type="submit" value="Update" class="cform-submit">
				</div>
			</div>
		</form>
	</div>
</div>
<!-- Populate all companies -->
<script type="text/javascript">
	$( function() {
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
					$("#chosen-plugin-companies").append('<option selected="selected" value="' + companies[counter].id + 
						'">' + companies[counter].name + '</option>');
				} else {
					$("#chosen-plugin-companies").append('<option value="' + companies[counter].id + 
						'">' + companies[counter].name + '</option>');
				}
			}
			$("#chosen-plugin-companies").chosen();
		});
	});
</script>
<!-- Populate all cities -->
<script type="text/javascript">
	$(function() { 
		var request = $.ajax({
			url: "cities_map.php",
			type: "GET",			
			dataType: "html"
		});
		request.done(function(msg) {
			var companies = JSON.parse(msg);
			for(var counter in companies)
			{
				$("#chosen-plugin-cities").append('<option value="' + companies[counter].id + 
					'">' + companies[counter].name + '</option>');
				$("#city").append('<option value="' + companies[counter].id + 
					'">' + companies[counter].name + '</option>');
			}
			$("#chosen-plugin-cities").chosen({
				no_results_text: "Oops, nothing found!",
				width: "100%"
			});
			$('#city').chosen({
				no_results_text: "Oops, nothing found!",
				width: "100%"
			});
		});
	});
</script>



<script>
	$(document).ready(function() { 
		var options = { 
				target:   '#updatePreferencesMessage',   // target element(s) to be updated with server response 
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
			$("#updatePreferencesMessage").html("Your preferences have been updated").show();
			$("#updatePreferencesMessage").delay(5000).fadeOut('slow');
			
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