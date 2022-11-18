<?php

/*--------------------*/
// App Name: Yonia
// Author: Wicombit
// Author URI: https://codecanyon.net/user/wicombit/portfolio
/*--------------------*/

/* URL PROJECT */

define ('SITE_URL', 'YOUR_URL_HERE');

/* DATABASE CONFIGURATION */

$database = array(
'host' => 'condominios.cifm8lfferqz.us-west-2.rds.amazonaws.com',
'db' => 'condominios',
'user' => 'victorinfluencia',
'pass' => 'colocolo5631',
'port' => '5463'
);

$email_config = array(
'email_address' => 'EMAIL_ADDRESS_HERE',
'email_password' => 'PASSWORD_HERE',
'email_subject' => 'EMAIL_SUBJECT_HERE',
'email_name' => 'EMAIL_NAME_HERE',
'smtp_host' => 'EMAIL_HOST_HERE',
'smtp_port' => 'EMAIL_PORT_HERE',
'smtp_encrypt' => 'tls'
);

$items_config = array(
    
    'items_per_page' => '8',
    'images_folder' => 'images/'
);


?>