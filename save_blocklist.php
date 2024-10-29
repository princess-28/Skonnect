<?php
define('HOST','localhost');
define('USERNAME', 'root');
define('PASSWORD','');
define('DB','skconnect');

$con = mysqli_connect(HOST,USERNAME,PASSWORD,DB);

if (isset($_POST['action_name']) && ($_POST['action_name'] == 'add')) {

    $block_lname        = $_POST['block_lname'];
    $block_fname        = $_POST['block_fname'];
    $block_mname       = $_POST['block_mname'];
    $block_violation        = $_POST['block_violation'];

    // check if nag block nah by lname and fname 


    $query = "SELECT * FROM block WHERE block_fname='$block_fname' AND block_lname='$block_lname'";
    $exec= mysqli_query($con,$query);

    if($exec && mysqli_num_rows($exec) > 0) {

        $response = array(
            'status' => 'error',
            'message' => $block_fname . ' ' . $block_lname . ' is already in blocklist.'
        );
    } else {
        $sql = "INSERT INTO block  values  (null, '$block_fname','$block_lname','$block_mname', '$block_violation')";

        if (mysqli_query($con, $sql)) {

            $response = array(
                'status' => 'success',
                'message' => 'Blocklist added!.'
            );
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Adding failed: ' . $con->error
            );
        }                                   

          

    }


    echo json_encode($response);
}



    
if (isset($_POST['action_name']) && ($_POST['action_name'] == 'delete')) {

    $id= $_POST['id'];

    $query="DELETE from `block` WHERE `block_id` =$id";
    $exec= mysqli_query($con,$query);
    if($exec){
      echo 1;
    }else{
      echo 0;
    }
}


if (isset($_POST['action_name']) && ($_POST['action_name'] == 'select')) {

    $id = $_POST['id'];

    $query="SELECT * from block WHERE block_id=$id";
    $exec= mysqli_query($con,$query);
    if($exec){
        $row=mysqli_fetch_assoc($exec);
        echo json_encode($row);
    }else{
      echo 0;
    }

} 



if (isset($_POST['action_name']) && ($_POST['action_name'] == 'update')) {


    $block_id        = $_POST['update_block_id'];
    $block_lname        = $_POST['update_block_lname'];
    $block_fname        = $_POST['update_block_fname'];
    $block_mname       = $_POST['update_block_mname'];
    $block_violation        = $_POST['update_block_violation'];
                   
    $sql = "UPDATE block SET 
        `block_fname`    = '$block_fname',
        `block_mname`    = '$block_mname',
        `block_lname`    = '$block_lname',
        `block_violation`    = '$block_violation'
        WHERE block_id   = '$block_id'"; 

    if (mysqli_query($con, $sql)) {

        $response = array(
            'status' => 'success',
            'message' => 'Blocklist updated.'
        );
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Blocklist update failed: ' . $con->error
        );
    }

    echo json_encode($response);

}

?>
