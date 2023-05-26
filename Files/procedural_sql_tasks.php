<?php
//procedural mysql creating database
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "database_name"; //use created database name

$conn = mysqli_connect($servername, $username, $password);  //after connecting, add the database name to use it like that
//$conn = mysqli_connect($servername, $username, $password, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());  // error if not successful
} else{
    echo "Connection successful";  //prints Connection successful if the code succesfully connects to myphpadmin sql
}

//!!!The code bellow created the database!!!
//note: name the database in $conn
/*$sql = "CREATE DATABASE database_name";
if (mysqli_query($conn, $sql)) {
    echo "Database created succesfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
} */

//bellow we will create our table
//best to do that in myphpadmin
/*$sql = "CREATE TABLE people (
id INT(11) PRIMARY KEY,
name VARCHAR(50) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "Table created succesfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
} */

//and finally we insert some values
$sql = "INSERT INTO people (name)
VALUES ('Georgi')";

if (mysqli_query($conn, $sql)) {
    echo "New record created succesfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn); //closes the connection when done
?>