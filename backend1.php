<?PHP

//echo "Hello World ";

 //require("phpsqlajax_dbinfo.php");


 $servername="disaster-database-mysql-azure.mysql.database.azure.com";
 $username="myadmin@disaster-database-mysql-azure";
 $password="Nobodygetswhattheywant!";
 $database="disaster";

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}


// Opens a connection to a MySQL server
$connection=mysqli_connect ($servername, $username, $password);

if (!$connection) {
  die('Not connected : ' . mysqli_error());
}

// Set the active MySQL database
$db_selected = mysqli_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysqli_error());
}

// Select all the rows in the markers table
$query = "SELECT * FROM disaster_info WHERE id=1";
$result = mysqli_query($query);

// echo $row['1']['lat'];
// echo $row['lat']['1'];

if (!$result) {
  die('Invalid query: ' . mysqli_error());
}

// header("Content-type: text/xml");

// echo $result;



$row = mysqli_fetch_all($result);

echo $row;
 
 //echo $row['lat'];
 
// echo $query;

// Start XML file, echo parent node
//echo '<markers>';

// Iterate through the rows, printing XML nodes for each
//while ($row = mysqli_fetch_assoc($result)){
  // Add to XML document node
  // echo '<marker ';
  // echo 'id="' . $id . '" ';
  // echo 'category="' . parseToXML($row['category']) . '" ';
  // echo 'name="' . parseToXML($row['title']) . '" ';
  // echo 'lat="' . $row['lat'] . '" ';
  // echo 'lng="' . $row['lng'] . '" ';
  // echo 'bubble_size="' . $row['bubble_size'] . '" ';
  // echo 'color="' . $row['color'] . '" ';
  // echo 'help="' . parseToXML($row['help']) . '" ';
  // echo 'description="' . parseToXML($row['description']) . '" ';
  // echo '/>';
//}

// End XML file
//echo '</markers>';

?>