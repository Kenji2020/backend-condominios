<?php

if ( !empty($_GET["item"]) ) {

    include 'dbconfig.php';

    $itemResult = $db->query("SELECT * FROM recipes WHERE recipe_id = '".$_GET["item"]."'");
    $itemRow = $itemResult->fetch_assoc();
    $recipe_video = $itemRow['recipe_video'];

header('Access-Control-Allow-Origin: *');  
header('Content-Type: application/json');
if(isset($recipe_video) && $recipe_video != ""){

require ('script.php');
$YT_Channel = new YTChannel('AIzaSyCIuVnDuCtVW6IPvOKEC59Wxwn829mqpEk');

 echo $YT_Channel->dumb_array($YT_Channel->video_info($recipe_video));


}

}

?>