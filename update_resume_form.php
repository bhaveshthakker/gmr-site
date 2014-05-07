<div class="row">
	<div class="span4">
		<form id="updateProfile" method="post" action='upload.php' enctype="multipart/form-data" >
			<input type="file" name="resume" id="resume"/>
			<?php
			if(isset($_SESSION['resume_path'])) {
				?>
				<a href="<?php echo "/".$_SESSION['resume_path']; ?>" target="_blank">Current Resume</a>
				<?php } ?>
			</div>
			<div class="span4">
				<div class="progress progress-striped" >
					<div class="bar"></div>
				</div >	
				<div id="output"></div>
			</div>
			<input type="submit" value="Upload Resume" class="cform-submit">	
		</form>
	</div>