<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database_name";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$st1 = mysqli_prepare($conn, 'INSERT INTO people(id, name)
VALUES (?, ?)');
$st2 = mysqli_prepare($conn, 'INSERT INTO fruits(id, name)
VALUES (?, ?)');

mysqli_stmt_bind_param($st1, 'ss', $id, $name);
mysqli_stmt_bind_param($st2, 'ss', $id, $name);

$filename = 'example.json';
$json = file_get_contents($filename);
    
$data = json_decode($json, true);
$human = $data['people'];
$fruit = $data['fruits'];

foreach ($human as $row) {
    $id = $row['id'];
    $name = $row['name'];

    mysqli_stmt_execute($st1);
}

foreach ($fruit as $row) {
    $id = $row['id'];
    $name = $row['type'];

    mysqli_stmt_execute($st2);
}


mysqli_close($conn);
?>