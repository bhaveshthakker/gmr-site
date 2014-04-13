<?php
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
    
    //check if this is an ajax request
    if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
        die('');
    }
    
    
    //Is file size is less than allowed size.
    if ($_FILES["resume"]["size"] > 5242880) {
        die("File size is too big!");
    }
    
    //allowed file type Server side check
    switch(strtolower($_FILES['resume']['type']))
        {
            //allowed file types
            case 'image/png': 
            case 'image/gif': 
            case 'image/jpeg': 
            case 'image/pjpeg':
            case 'text/plain':
            case 'text/html': //html file
            case 'application/x-zip-compressed':
            case 'application/pdf':
            case 'application/msword':
            case 'application/vnd.ms-excel':
            case 'video/mp4':
                break;
            default:
                die( 'Unsupported File!'); //output error
    }
    
    $File_Name          = strtolower($_FILES['resume']['name']);
    $File_Ext           = substr($File_Name, strrpos($File_Name, '.')); //get file extention
    $Random_Number      = rand(0, 9999999999); //Random number to be added to name.
    $NewFileName        = $Random_Number.$File_Ext; //new file name
    
    if(move_uploaded_file($_FILES['resume']['tmp_name'], $UploadDirectory.$NewFileName ))
       {
        // do other stuff 
               die( 'Success! File Uploaded.');
    }else{
        die( 'error uploading File!');
    }
    
}
else
{
    die( 'Something wrong with upload! Is "upload_max_filesize" set correctly?');
}