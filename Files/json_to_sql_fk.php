<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database_name";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$filename = "example.json";
$data = file_get_contents($filename);
$array = json_decode($data, true);
$addr = $array["address"];



foreach ($addr as $row){
    if ($row['parent_id'] == 0) {  //if the foreign key(parent_id) is 0, we wont insert nothing to its column and it will appear as its default value - null
            $query = "INSERT INTO address(id, name) VALUES ('".$row['id']."', '".$row['name']."');";

            mysqli_query($conn,$query);
        } else{
            $query = "INSERT INTO address VALUES ('".$row['id']."', '".$row['parent_id']."', '".$row['name']."');";

            mysqli_query($conn,$query);
        }
    }
    
echo "Data inserted successfully";
mysqli_close($conn);
?>