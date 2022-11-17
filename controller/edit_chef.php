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
	header ('Location: ' . SITE_URL . '/controller/error.php');
	}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$chef_title = cleardata($_POST['chef_title']);
	$chef_id = cleardata($_POST['chef_id']);
	$chef_image_save = $_POST['chef_image_save'];
	$chef_image = $_FILES['chef_image'];

	if (empty($chef_image['name'])) {
		$chef_image = $chef_image_save;
	} else{
			$imagefile = explode(".", $_FILES["chef_image"]["name"]);
			$renamefile = round(microtime(true)) . '.' . end($imagefile);
		$chef_image_upload = '../' . $items_config['images_folder'];
		move_uploaded_file($_FILES['chef_image']['tmp_name'], $chef_image_upload . 'chef_' . $renamefile);
		$chef_image = 'chef_' . $renamefile;
	}


$statment = $connect->prepare(
	'UPDATE chefs SET chef_title = :chef_title, chef_image = :chef_image WHERE chef_id = :chef_id'
	);

$statment->execute(array(

		':chef_title' => $chef_title,
		':chef_image' => $chef_image,
		':chef_id' => $chef_id

		));

header('Location:' . SITE_URL . '/controller/chefs.php');

} else{

$id_chef = id_chef($_GET['id']);
    
if(empty($id_chef)){
	header('Location: ' . SITE_URL . '/controller/home.php');
	}

$chef = get_chef_per_id($connect, $id_chef);
    
    if (!$chef){
    header('Location: ' . SITE_URL . '/controller/home.php');
}

$chef = $chef['0'];

}

require '../views/edit.chef.view.php';
require '../views/footer.view.php';
    
} else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>