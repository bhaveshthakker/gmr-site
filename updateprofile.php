<div id="tab-1">
	<form id="updateProfile" method="post" action='upload.php' enctype="multipart/form-data" >
		<label for="resume" >Resume:</label>
		<input type="file" name="resume" id="resume"/>
		<img src="img/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>
		<div id="progressbox" ><div id="progressbar"></div ><div id="statustxt">0%</div></div>
		<div id="output"></div>
		<textarea rows="3" placeholder="List the name of your preferred companies"></textarea>
		<textarea rows="3" placeholder="List the name of your preferred locations"></textarea>
		<input type="submit" value="Update" class="cform-submit">

	</form>
</div>