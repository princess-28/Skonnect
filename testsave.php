<?php
define('HOST','localhost');
define('USERNAME', 'root');
define('PASSWORD','');
define('DB','skconnect');

$con = mysqli_connect(HOST,USERNAME,PASSWORD,DB);

if (isset($_POST['action_name']) && ($_POST['action_name'] == 'register')) {


        echo json_encode($_POST);
}

?>
