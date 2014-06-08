<?php 

require_once('session_initialize.php'); 
require_once('database.php');
require_once('set_session_data.php');

$response=array();


$query = "select * from openings";
$response['query'] = $query;

$result = mysql_query($query) or die(mysql_error());
$response['result'] = '$result';

$numOfOpenings = mysql_num_rows($result);
$count = 0;
if($numOfOpenings > 0) {
  while($row = mysql_fetch_assoc($result)) {
    $opening=array();
    $opening['opening_id'] = $row['opening_id'];
    $opening['primary_skill'] = $row['primary_skill'];
    $opening['experience'] = $row['experience'];
    $opening['company'] = $row['company'];
    $opening['location'] = $row['location'];
    $response['data'][$count] = $opening;
    $count++;
  }
}
echo json_encode($response);
/*{
  "data": [
  {
  "name": "Tiger Nixon",
  "position": "System Architect",
  "salary": "$320,800",
  "start_date": "2011/04/25",
  "office": "Edinburgh",
  "extn": "5421"
},
{
  "name": "Garrett Winters",
  "position": "Accountant",
  "salary": "$170,750",
  "start_date": "2011/07/25",
  "office": "Tokyo",
  "extn": "8422"
},
{
  "name": "Ashton Cox",
  "position": "Junior Technical Author",
  "salary": "$86,000",
  "start_date": "2009/01/12",
  "office": "San Francisco",
  "extn": "1562"
},
{
  "name": "Cedric Kelly",
  "position": "Senior Javascript Developer",
  "salary": "$433,060",
  "start_date": "2012/03/29",
  "office": "Edinburgh",
  "extn": "6224"
},
{
  "name": "Airi Satou",
  "position": "Accountant",
  "salary": "$162,700",
  "start_date": "2008/11/28",
  "office": "Tokyo",
  "extn": "5407"
}
]
} */
?>
