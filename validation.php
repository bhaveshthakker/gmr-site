<?php 
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function check_email($email){
  return preg_match('/^\S+@[\w\d.-]{2,}\.[\w]{2,6}$/iU', $email) ? TRUE : FALSE;
}
function sanity_check($string, $type, $length){
  // assign the type
  $type = 'is_'.$type;
  if(!$type($string))
  {
    return FALSE;
  }
  // now we see if there is anything in the string
  elseif(empty($string))
  {
    return FALSE;
  }
  // then we check how long the string is
  elseif(strlen($string) > $length)
  {
    return FALSE;
  }
  else
  {
    // if all is well, we return TRUE
    return TRUE;
  }
}
?>