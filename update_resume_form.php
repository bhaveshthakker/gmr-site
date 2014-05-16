<form id="updateProfile" method="post" action='upload.php' enctype="multipart/form-data" >	
	<div class="row">
		<div class="span8">
			<div id="updateResumeMessage" class="alert alert-success" style="display:none"></div>
		</div>
	</div>
	<div class="row top-buffer">
		<div class="span4">
			<input type="file" name="resume" id="resume" />
		</div>
		<div class="span4">
			<div class="progress progress-striped" style="display:none;">
				<div class="bar"></div>
			</div >	
		</div>
	</div>
	<div class="row">
		<div class="span4">
			<?php
			if(isset($_SESSION['resume_path']) && $_SESSION['resume_path']!='') {
				?>
				<a id="resume_path_link" href="<?php echo "/".$_SESSION['resume_path']; ?>" target="_blank">View My Resume</a>
				<?php }
				else { ?>
				<a id="resume_path_link" href="#" target="_blank" style="display:none;">View My Resume</a>	
				<?php } ?>

		</div>
	</div>
	<div class="row top-buffer">
		<div class="span8">
			<input type="submit" value="Upload" class="cform-submit" />
		</div>
	</div>	
</form>
	<script type="text/javascript">
		$(document).ready(function() { 
			$.validate({
				form : '#updateProfile',
				modules : 'file, security',
				validateOnBlur : true,
				scrollToTopOnError : false,
				onSuccess: function() {
					var options = { 
						target:   '#updateResumeMessage',   // target element(s) to be updated with server response 
						beforeSubmit:  beforeSubmit,  // pre-submit callback 
						success:       afterSuccess,  // post-submit callback 
						uploadProgress: OnProgress, //upload progress callback 
						resetForm: true        // reset the form after successful submit 
					}; 
					$("#updateProfile").ajaxSubmit(options); 
					return false;
				}
			});


//function after succesful file upload (when server response)
function afterSuccess(response)
{
	console.log(response);
	$('#submit-btn').show(); //hide submit button
	/*$('.progress .bar').width('0%');*/
	if(response.resume_path) {
		$('#updateResumeMessage').html('Well Done! Resume successfully uploaded.');
		$('#resume_path_link').attr('href', response.resume_path).show();
	} else {
		$('#updateResumeMessage').html('Oops! Something went wrong. Please try again or mail us at mail@getmereferred.com');
	}
	$('#updateResumeMessage').show().delay( 5000 ).fadeOut(); 
	//Progress bar
    $('.progress').delay( 5000 ).hide();
}

//function to check file size before uploading.
function beforeSubmit(){
	//Progress bar
    $('.progress').show();
	$('.progress .bar').width('0%');
    //check whether browser fully supports all File API
    if (window.File && window.FileReader && window.FileList && window.Blob)
    {

		if( !$('#resume').val()) //check empty input filed
		{
			$("#updateResumeMessage").html("Are you kidding me?").show();
			return false
		}
		
		var fsize = $('#resume')[0].files[0].size; //get file size
		var ftype = $('#resume')[0].files[0].type; // get file type
		

		//allow file types 
		switch(ftype)
		{

			case 'application/pdf':
			case 'application/msword':
			case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
			break;
			default:
			$("#updateResumeMessage").html("<b>"+ftype+"</b> Unsupported file type!").show();
			return false
		}
		
		//Allowed file size is less than 5 MB (1048576)
		if(fsize>2097152) 
		{
			$("#updateResumeMessage").html("<b>"+bytesToSize(fsize) +"</b> Too big file! </b> It should be less than 2 MB.").show();
			return false;
		}
		$("#updateResumeMessage").hide();  
	}
	else
	{
		//Output error to older unsupported browsers that doesn't support HTML5 File API
		$("#updateResumeMessage").html("Please upgrade your browser, because your current browser lacks some new features we need!").show();
		return false;
	}
}

//progress bar function
function OnProgress(event, position, total, percentComplete)
{
    //$('#progressbar').width(percentComplete + '%') //update progressbar percent complete
    $('.progress .bar').width(percentComplete + '%'); //update status text
}

//function to format bites bit.ly/19yoIPO
function bytesToSize(bytes) {
	var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
	if (bytes == 0) return '0 Bytes';
	var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
	return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}

}); 
</script>