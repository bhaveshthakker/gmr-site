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
					<input type="hidden" name="allSelectedLocations" id="allSelectedLocations"></input>
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
			var current_company = <?php echo "'".$_SESSION['current_company']."'"; ?>;
			var company_ids = preferred_companies.split(";")
			/*for(var counter in company_ids) {
				company_ids[counter] = company_ids[counter].split(":")[1];
			}*/
			for(var counter in companies)
			{
				if(company_ids.indexOf(companies[counter].name) !== -1) {
					$("#chosen-plugin-companies").append('<option selected="selected" value="' + companies[counter].id + 
						'">' + companies[counter].name + '</option>');
				} else {
					$("#chosen-plugin-companies").append('<option value="' + companies[counter].id + 
						'">' + companies[counter].name + '</option>');
				}
				if((current_company === companies[counter].id)) {
					$("#current_company").append('<option selected="selected" value="' + companies[counter].id + 
						'">' + companies[counter].name + '</option>');
				} else {
					$("#current_company").append('<option value="' + companies[counter].id + 
						'">' + companies[counter].name + '</option>');
				}

			}

			$("#chosen-plugin-companies").chosen();
			$("#current_company").trigger("chosen:updated");
		});
	});
</script>
<!-- Populate all cities -->
<script type="text/javascript">
	$(function() { 
			var cities = city_array;
			var current_city = <?php echo "'".$_SESSION['current_city']."'"; ?>;
			var preferred_cities = <?php echo "'".$_SESSION['location']."'"; ?>;
			var city_ids = preferred_cities.split(";")
			//console.log('current_city: '+ current_city);
			for(var counter in cities)
			{
				if(city_ids.indexOf(cities[counter]) === -1) {
					$("#chosen-plugin-cities").append('<option value="' + cities[counter] + 
						'">' + cities[counter] + '</option>');
				} else {
					$("#chosen-plugin-cities").append('<option selected="selected" value="' + cities[counter] + 
						'">' + cities[counter] + '</option>');
				}

				if(cities[counter]==current_city) {
					$("#city").append('<option selected="selected" value="' + cities[counter] + 
					'">' + cities[counter] + '</option>');	
				} else {
					$("#city").append('<option value="' + cities[counter] + 
					'">' + cities[counter] + '</option>');	
				}
			}
			$("#chosen-plugin-cities").chosen({
				no_results_text: "Oops, nothing found!",
				width: "100%"
			});
			$('#city').trigger("chosen:updated");
	});
</script>



<script>
	$(document).ready(function() { 
		var options = { 
				target:   '#updatePreferencesMessage',   // target element(s) to be updated with server response 
				beforeSubmit:  beforeSubmit,  // pre-submit callback 
				success:       afterSuccess,  // post-submit callback 
				uploadProgress: OnProgress //upload progress callback 
			}; 
			$("#updatePreferences").submit(function() { 
				populateCompanyName();
				populateLocationsName();
				$(this).ajaxSubmit(options);  			
				//console.log($("#chosen-plugin-companies").val());
				// always return false to prevent standard browser submit and page navigation 
				return false;
			});	

			function populateCompanyName() {
				var allSelectedCompanies = $("#chosen-plugin-companies :selected");
				var allSelectedCompaniesTexts = "";
				for(var i = 0; i< allSelectedCompanies.length; i++)
				{
					allSelectedCompaniesTexts += allSelectedCompanies[i].text+ ";";// + ":" + allSelectedCompanies[i].value + ";"
				}
				$("#allSelectedCompanies").val(allSelectedCompaniesTexts);
			}

			function populateLocationsName() {
				var allSelectedLocations = $("#chosen-plugin-cities :selected");
				var allSelectedLocationsTexts = "";
				for(var i = 0; i< allSelectedLocations.length; i++)
				{
					allSelectedLocationsTexts += allSelectedLocations[i].text+ ";";// + ":" + allSelectedCompanies[i].value + ";"
				}
				$("#allSelectedLocations").val(allSelectedLocationsTexts);
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