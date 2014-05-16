<?php
header('Content-type:application/json');
require_once('session_initialize.php');
require_once('database.php');

if(isset($_FILES["resume"]) && $_FILES["resume"]["error"]== UPLOAD_ERR_OK)
{
    ############ Edit settings ##############
    $UploadDirectory    = 'upload/'; //specify upload directory ends with / (slash)
    ##########################################
    
    /*
    Note : You will run into errors or blank page if "memory_limit" or "upload_max_filesize" is set to low in "php.ini". 
    Open "php.ini" file, and search for "memory_limit" or "upload_max_filesize" limit 
    and set them adequately, also check "post_max_size".
    */
    $response=Array();
    //check if this is an ajax request
    if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
        $response['error'] = '1';
        $response['error_desc'] = 'Not an AJAX request';
    }
    
    
    //Is file size is less than allowed size.
    if ($_FILES["resume"]["size"] > 2097152) {
        $response['error'] = '1';
        $response['error_desc'] = 'File size too long';
    }
    
    //allowed file type Server side check
    switch(strtolower($_FILES['resume']['type']))
    {
            //allowed file types
        case 'application/pdf':
        case 'application/msword':
        case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
        break;
        default:
            $response['error'] = '1';
            $response['error_desc'] = 'Unsupported File!';
            }
            
            $File_Name          = strtolower($_FILES['resume']['name']);
    $File_Ext           = substr($File_Name, strrpos($File_Name, '.')); //get file extention
    $Random_Number      = rand(0, 9999999999); //Random number to be added to name.
    $NewFileName        = $_SESSION['username'].'-'.date('Y-m-d-h-i-s').$File_Ext; //new file name
    $username = $_SESSION['username'];
    if(move_uploaded_file($_FILES['resume']['tmp_name'], $UploadDirectory.$NewFileName ))
    {
        // do other stuff 

        $query = "update applicants set resume_path='$UploadDirectory$NewFileName' where username='$username'";
        $_SESSION['resume_path'] = $_SESSION['resume_path'] = $UploadDirectory.$NewFileName;
        //echo $query;
        $result = mysql_query($query);
        if($result) {
            $response['error'] = '0';
            $response['resume_path'] = $_SESSION['resume_path'];
        } else {
            $response['error'] = '1';
            $response['error_desc'] = 'Database update failed';
        }
    }else{
         $response['error'] = '1';
        $response['error_desc'] = 'Error moving file';
    }
    
}
else
{
    $response['error'] = '1';
    $response['error_desc'] = 'Something wrong with upload! Is "upload_max_filesize" set correctly?';
}
echo json_encode($response);
?>