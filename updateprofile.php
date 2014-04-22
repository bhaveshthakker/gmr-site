			<form id="updateProfile" method="post" action='upload.php' enctype="multipart/form-data" >
		<label for="resume" >Resume:</label>
		<input type="file" name="resume" id="resume"/>
		<?php
		    if(isset($_SESSION['resume_path'])) {
		?>
			<a href="<?php echo "/".$_SESSION['resume_path']; ?>" target="_blank">Current Resume</a>

		<?php
		    }
		?>
		<img src="img/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>
		<div id="progressbox" ><div id="progressbar"></div ><div id="statustxt">0%</div></div>
		<div id="output"></div>
		<textarea rows="3" placeholder="List the name of your preferred companies"></textarea>
		<select id="chosen-plugin" data-placeholder="Choose a Country..." class="chosen-select" multiple style="width:350px;" tabindex="4">
            <option value=""></option>
        </select>
		<textarea rows="3" placeholder="List the name of your preferred locations"></textarea>
		<input type="submit" value="Update" class="cform-submit">

	</form>
	<script type="text/javascript">
		var request = $.ajax({
			url: "company_map.php",
			type: "GET",			
			dataType: "html"
		});
		request.done(function(msg) {
			var companies = JSON.parse(msg);
			for(var counter in companies)
			{
    			$("#chosen-plugin").append('"<option value="' + companies[counter].id + 
    				                       '">' + companies[counter].name + '</option>');
			}
			$("#chosen-plugin").chosen();
		});
	</script>