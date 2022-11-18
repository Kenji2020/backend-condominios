<?php 

/*--------------------*/
// App Name: Yonia
// Author: Wicombit
// Author URI: https://codecanyon.net/user/wicombit/portfolio
/*--------------------*/

session_start();

session_destroy();
$_SESSION = array ();

header('Location: ./login.php');


?>