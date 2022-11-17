<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT * FROM chefs ORDER BY RAND()";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$chefs = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{   
    $chef_id = $row['chef_id'];
    $chef_title = $row['chef_title'];
    $chef_image = $row['chef_image'];

    $chefs[] = array(
        'id'=> $id++,
        'chef_id'=> $chef_id,
        'chef_title'=> $chef_title,
        'chef_image'=> $chef_image,
        );

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode($chefs);
$str = htmlspecialchars_decode($json_string);
print ($str)

?>
