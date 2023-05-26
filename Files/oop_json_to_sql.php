<?php
$servername = "localhost";
$username = "username";
$password = "";
$dbname = "database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO people(id, name)
VALUES (?, ?)";

$filename = 'example.json';
$json = file_get_contents($filename);
$data = json_decode($josndata);

foreach($data as $key => $value) {
  $key->$data->'people'->'id';
  $value->$data->'people'->'name';

  mysqli_stmt_execute($sql);
}
if ($conn->query($sql) === TRUE) {
  echo "New records created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>