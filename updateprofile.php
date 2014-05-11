<div class="row update-form">
	<div class="span1"></div>
	<div class="span8">
		<div id="update-sections">
			<!-- <ul class="nav nav-pills">
				<li class="active"><a href="#section-1">Personal Info</a></li>
				<li><a href="#section-2">Upload Resume</a></li>
				<li><a href="#section-3">Professional Info</a></li>
				<li><a href="#section-4">Update Preferences</a></li>
			</ul> -->
			<section id="section-1" class="top-buffer">
				<legend> <span class="order-bullet">1.</span> Update your personal information</legend>
				<?php include('update_personal_info_form.php'); ?>
			</section>
			<section id="section-2" class="top-buffer">
				<legend><span class="order-bullet">2.</span>Upload your resume</legend>	
				<?php include('update_resume_form.php') ?>
			</section>
			<section id="section-3" class="top-buffer">
				<legend> <span class="order-bullet">3.</span> Update your professional information</legend>
				<?php include('update_professional_info_form.php'); ?>
			</section>
			<section  id="section-4" class="top-buffer"><legend> <span class="order-bullet">4.</span> Update your preferences</legend>
				<?php include('update_preferences_form.php'); ?>
			</section>
		</div>
	</div>
	<div class="span1"></div>	
</div>