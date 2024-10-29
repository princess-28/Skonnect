<?php
	session_start();

	define('HOST','localhost');
	define('USERNAME', 'root');
	define('PASSWORD','');
	define('DB','skconnect');

	$con = mysqli_connect(HOST,USERNAME,PASSWORD,DB);

	if (isset($_POST['action_name']) && ($_POST['action_name'] == 'login')) {

	    if (empty($_POST['user_name']) || empty($_POST['user_password'])) {

	        if (empty($_POST['user_name']) && empty($_POST['user_password'])) {
	            echo 'usernamepassword';
	        } elseif(empty($_POST['user_name'])) {
	            echo 'username';
	        } elseif (empty($_POST['user_password'])) {
	            echo 'password';
	        }

	    } else {

	        $user_name = ($_POST['user_name']);
	        $user_password = ($_POST['user_password']);

	        $query = "SELECT * FROM user WHERE user_name='$user_name' AND user_password='$user_password'";
	        $exec= mysqli_query($con,$query);

	        if($exec && mysqli_num_rows($exec) == 1) {

		        $user = mysqli_fetch_assoc($exec);

	            $_SESSION['user_id']		= $user['user_id'];
	            $_SESSION['user_name'] 		= $user['user_name'];
	            $_SESSION['user_type'] 		= $user['user_type'];

	            echo $user['user_type'];

	        }else{
	            echo 'error';
	        }

	    }
	}
?>