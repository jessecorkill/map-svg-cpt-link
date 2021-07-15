<?
$servername = 'http://localhost:10096/';
$database = DB_NAME;
$username = DB_USER;
$password = DB_PASSWORD;

$table_name = 'wp_mapsvg_database35';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";
if($cpt_data){
  foreach($cpt_data as $post){
    $sql = "INSERT INTO" . $table_name . "(title) VALUES ('plugin-can-write')";
    if (mysqli_query($conn, $sql)) {
          echo "MSCL: New record created successfully";
    } else {
          echo "MSCL: Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
}
else{
  echo "MSCL: No Custom Post Data Available.";
}

mysqli_close($conn);
