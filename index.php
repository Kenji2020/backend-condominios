<?php 

/*--------------------*/
// App Name: Yonia
// Author: Wicombit
// Author URI: https://codecanyon.net/user/wicombit/portfolio
/*--------------------*/

session_start();

require './admin/config.php';
require './admin/functions.php';


if (isset($_SESSION['username'])){
    
	header('Location: ' . SITE_URL . '/controller/home.php');

} else {
    
	header('Location: ' . SITE_URL . '/controller/login.php');

}

?>