<?PHP

//echo "Hello World ";

 //require("phpsqlajax_dbinfo.php");

 echo "Echo";

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

 echo "Echo1";

// Opens a connection to a MySQL server
$connection=mysql_connect ($servername, $username, $password);

if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Set the active MySQL database
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

// Select all the rows in the markers table
$query = "SELECT * FROM disaster_info";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");

echo $result;

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row = mysqli_fetch_assoc($result)){
  // Add to XML document node
  echo '<marker ';
  echo 'id="' . $id . '" ';
  echo 'category="' . parseToXML($row['category']) . '" ';
  echo 'name="' . parseToXML($row['title']) . '" ';
  echo 'lat="' . $row['lat'] . '" ';
  echo 'lng="' . $row['lng'] . '" ';
  echo 'bubble_size="' . $row['bubble_size'] . '" ';
  echo 'color="' . $row['color'] . '" ';
  echo 'help="' . parseToXML($row['help']) . '" ';
  echo 'description="' . parseToXML($row['description']) . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';

?>