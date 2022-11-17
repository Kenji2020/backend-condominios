<?php 

/*--------------------*/
// App Name: Yonia
// Author: Wicombit
// Author URI: https://codecanyon.net/user/wicombit/portfolio
/*--------------------*/

session_start();
if (isset($_SESSION['username'])){
    
    
require '../admin/config.php';
require '../admin/functions.php';
require '../views/header.view.php';
require '../views/navbar.view.php'; 

$connect = connect($database);
if(!$connect){
	header('Location: ' . SITE_URL . '/controller/error.php');
	} 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$chef_title = cleardata($_POST['chef_title']);

	$chef_image = $_FILES['chef_image']['tmp_name'];

	$imagefile = explode(".", $_FILES["chef_image"]["name"]);
	$renamefile = round(microtime(true)) . '.' . end($imagefile);

	$chef_image_upload = '../' . $items_config['images_folder'];

	move_uploaded_file($chef_image, $chef_image_upload . 'chef_' . $renamefile);

	$statment = $connect->prepare(
		'INSERT INTO chefs (chef_id,chef_title,chef_image) VALUES (null, :chef_title, :chef_image)'
		);

	$statment->execute(array(
		':chef_title' => $chef_title,
		':chef_image' => 'chef_' . $renamefile
		));

	header('Location:' . SITE_URL . '/controller/chefs.php');

}

require '../views/new.chef.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>