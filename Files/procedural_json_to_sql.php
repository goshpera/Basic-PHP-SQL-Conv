<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database_name";

$conn = mysqli_connect($servername, $username, $password, $dbname);


$st = mysqli_prepare($conn, 'INSERT INTO people(name)
VALUES (?)');  //here we prepare the values to be uploaded in the sql table

mysqli_stmt_bind_param($st, 's', $name); //we specify the values - 's' stands for string type of value

$filename = 'example.json';  //specify the json file in same directory
$json = file_get_contents($filename);

$data = json_decode($json, true);  //if set to true, the php program takes the json as an array
$ppl = $data['people'];

foreach ($ppl as $row) {  //run a foreach to add every sample
    $name = $row['name'];  //specify from the array

    mysqli_stmt_execute($st);
}

mysqli_close($conn);
?>