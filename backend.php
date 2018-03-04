<?PHP
//    phpinfo();
   echo "hi";
   var_dump(extension_loaded('dom_xml'));
   echo "omg /n";
   $servername="disaster-database-mysql-azure.mysql.database.azure.com";
   $username="myadmin@disaster-database-mysql-azure";
   $password="Nobodygetswhattheywant!";
   $database="disaster";

   //$servername="localhost";
   //$username="root";
   //$password="root";
   // Opens a connection to a MySQL server
   //$connection=$mysqli = new mysqli($servername, $username, $password, "disaster");
   $connection=$mysqli=mysqli_init();
   mysqli_real_connect($connection, $servername, $username, $password, 3306);
   if (!$connection) {
       die('Not connected : ' . mysql_error());
   } else {
       echo "Connected";
   }
   
   $dom = new domDocument;
   $dom->formatOutput = true;
   
   $node = $dom->createElement( "marker" );
   /*** create the root element ***/
   $parnode = $dom->appendChild($node);
   
   /*** create the simple xml element ***/
   $sxe = simplexml_import_dom( $dom );
   
   /*** echo the xml ***/
   echo $sxe->asXML();


   echo "Demo here";
   // Set the active MySQL database
   $db_selected = mysqli_select_db($connection, $database);
   if (!$db_selected) {
       die ('Can\'t use db : ' . mysqli_error());
   }
   
   // Select all the rows in the markers table
   $query = "SELECT * FROM markers WHERE 1";
   $result = $connection->query($query);
   if (!$result) {
       die('Invalid query: ' . mysqli_error());
   }
   
   header("Content-type: text/xml");
   
   // Iterate through the rows, adding XML nodes for each
   while ($row = @mysqli_fetch_assoc($result)){
       // Add to XML document node
       $node = $doc->create_element("marker");
       $newnode = $parnode->appendChild($node);
       
       $newnode->set_attribute("id", $row['id']);
       $newnode->set_attribute("name", $row['name']);
       $newnode->set_attribute("address", $row['address']);
       $newnode->set_attribute("lat", $row['lat']);
       $newnode->set_attribute("lng", $row['lng']);
       $newnode->set_attribute("type", $row['type']);
       $newnode->set_attribute("help", $row['help']);
   }
   
   //$xmlfile = $doc->dump_mem();
   echo $sxe;
?>