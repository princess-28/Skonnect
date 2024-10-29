<?php
define('HOST','localhost');
define('USERNAME', 'root');
define('PASSWORD','');
define('DB','skconnect');

$con = mysqli_connect(HOST,USERNAME,PASSWORD,DB);

if (isset($_POST['action_name']) && ($_POST['action_name'] == 'register')) {

    $apply_position     = $_POST['apply_position'];
    $apply_barangay     = $_POST['apply_barangay'];
    $apply_municipality = $_POST['apply_municipality'];
    $apply_province     = $_POST['apply_province'];
    $apply_lname        = $_POST['apply_lname'];
    $apply_fname        = $_POST['apply_fname'];
    $apply_mname       = $_POST['apply_mname'];
    $apply_nname        = $_POST['apply_nname'];
    $apply_age          = $_POST['apply_age'];
    $apply_birthday     = $_POST['apply_birthday'];
    $apply_bcity        = $_POST['apply_bcity'];
    $apply_bprovince    = $_POST['apply_bprovince'];
    $apply_spouse       = $_POST['apply_spouse'];
    $apply_add_province = $_POST['apply_add_province'];
    $apply_add_municipality = $_POST['apply_add_municipality'];
    $apply_add_barangay     = $_POST['apply_add_barangay'];
    $apply_add_street       = $_POST['apply_add_street'];
    $apply_occupation       = $_POST['apply_occupation'];
    $apply_post_office      = $_POST['apply_post_office'];
    $apply_res_months       = $_POST['apply_res_months'];
    $apply_res_year         = $_POST['apply_res_year'];
    $apply_sk_precint       = $_POST['apply_sk_precint'];
    $apply_sk_barangay      = $_POST['apply_sk_barangay'];
    $apply_sk_city          = $_POST['apply_sk_city'];
    $apply_sk_province      = $_POST['apply_sk_province'];

    $apply_gender       = ($_POST['apply_gender']) ?? '';
    $apply_civil_status = ($_POST['apply_civil_status']) ?? '';

    // check if nag apply nah by lname and fname 


        $query = "SELECT * FROM apply WHERE apply_fname='$apply_fname' AND apply_lname='$apply_lname'";
        $exec= mysqli_query($con,$query);

        if($exec && mysqli_num_rows($exec) > 0) {

            $response = array(
                'status' => 'error',
                'message' => $apply_fname . ' ' . $apply_lname . ' is already applied.'
            );
        } else {

            $uploadDir = 'profile/';
            $fileName = basename($_FILES['input-file']['name']);
            $uploadFilePath = $uploadDir . $fileName;


            if (isset($_FILES['input-file']) && ($_FILES['input-file']['name'] != '')) {

                if (move_uploaded_file($_FILES['input-file']['tmp_name'], $uploadFilePath)) {

                        $sql = "INSERT INTO apply (
                                `apply_id` ,
                                `apply_position` ,
                                `apply_barangay` ,
                                `apply_municipality` ,
                                `apply_province` ,
                                `apply_lname` ,
                                `apply_fname` ,
                                `apply_mname` ,
                                `apply_nname` ,
                                `apply_age` ,
                                `apply_birthday` ,
                                `apply_bcity` ,
                                `apply_bprovince` ,
                                `apply_spouse` ,
                                `apply_add_province` ,
                                `apply_add_municipality` ,
                                `apply_add_barangay` ,
                                `apply_add_street` ,
                                `apply_occupation` ,
                                `apply_post_office` ,
                                `apply_res_months` ,
                                `apply_res_year` ,
                                `apply_sk_precint` ,
                                `apply_sk_barangay` ,
                                `apply_sk_city` ,
                                `apply_sk_province`,
                                `apply_gender`,
                                `apply_civil_status`,
                                `apply_image`,
                                `apply_status`

                                 ) values 
                                (null,
                                '$apply_position',
                                '$apply_barangay',
                                '$apply_municipality',
                                '$apply_province',
                                '$apply_lname',
                                '$apply_fname',
                                '$apply_mname',
                                '$apply_nname',
                                '$apply_age',
                                '$apply_birthday',
                                '$apply_bcity',
                                '$apply_bprovince',
                                '$apply_spouse',
                                '$apply_add_province',
                                '$apply_add_municipality',
                                '$apply_add_barangay',
                                '$apply_add_street',
                                '$apply_occupation',
                                '$apply_post_office',
                                '$apply_res_months',
                                '$apply_res_year',
                                '$apply_sk_precint',
                                '$apply_sk_barangay',
                                '$apply_sk_city',
                                '$apply_sk_province',
                                '$apply_gender',
                                '$apply_civil_status',
                                '$fileName',
                                1 )";

                    if (mysqli_query($con, $sql)) {

                        $response = array(
                            'status' => 'success',
                            'message' => 'Registration completed.'
                        );
                    } else {
                        $response = array(
                            'status' => 'error',
                            'message' => 'Registration failed: ' . $con->error
                        );
                    }                                   

                } else {
                    $response = array(
                        'status' => 'error',
                        'message' => 'Image upload failed.'
                    );
                }





            } else {

                $sql = "INSERT INTO apply (
                                `apply_id` ,
                                `apply_position` ,
                                `apply_barangay` ,
                                `apply_municipality` ,
                                `apply_province` ,
                                `apply_lname` ,
                                `apply_fname` ,
                                `apply_mname` ,
                                `apply_nname` ,
                                `apply_age` ,
                                `apply_birthday` ,
                                `apply_bcity` ,
                                `apply_bprovince` ,
                                `apply_spouse` ,
                                `apply_add_province` ,
                                `apply_add_municipality` ,
                                `apply_add_barangay` ,
                                `apply_add_street` ,
                                `apply_occupation` ,
                                `apply_post_office` ,
                                `apply_res_months` ,
                                `apply_res_year` ,
                                `apply_sk_precint` ,
                                `apply_sk_barangay` ,
                                `apply_sk_city` ,
                                `apply_sk_province`,
                                `apply_gender`,
                                `apply_civil_status`,
                                `apply_status`
                                 ) values 
                                (null,
                                '$apply_position',
                                '$apply_barangay',
                                '$apply_municipality',
                                '$apply_province',
                                '$apply_lname',
                                '$apply_fname',
                                '$apply_mname',
                                '$apply_nname',
                                '$apply_age',
                                '$apply_birthday',
                                '$apply_bcity',
                                '$apply_bprovince',
                                '$apply_spouse',
                                '$apply_add_province',
                                '$apply_add_municipality',
                                '$apply_add_barangay',
                                '$apply_add_street',
                                '$apply_occupation',
                                '$apply_post_office',
                                '$apply_res_months',
                                '$apply_res_year',
                                '$apply_sk_precint',
                                '$apply_sk_barangay',
                                '$apply_sk_city',
                                '$apply_sk_province',
                                '$apply_gender',
                                '$apply_civil_status',
                                1 )";

                    if (mysqli_query($con, $sql)) {

                        $response = array(
                            'status' => 'success',
                            'message' => 'Registration completed.'
                        );
                    } else {
                        $response = array(
                            'status' => 'error',
                            'message' => 'Registration failed: ' . $con->error
                        );
                    }      
            }

        }


        echo json_encode($response);
}



if (isset($_POST['action_name']) && ($_POST['action_name'] == 'select')) {

    $id = $_POST['id'];

    $query="SELECT * from apply WHERE apply_id=$id";
    $exec= mysqli_query($con,$query);
    if($exec){
        $row=mysqli_fetch_assoc($exec);
        echo json_encode($row);
    }else{
      echo 0;
    }

} 



    
if (isset($_POST['action_name']) && ($_POST['action_name'] == 'delete')) {

    $id= $_POST['id'];

    $query="DELETE from `apply` WHERE `apply_id` =$id";
    $exec= mysqli_query($con,$query);
    if($exec){
      echo 1;
    }else{
      echo 0;
    }
}




if (isset($_POST['action_name']) && ($_POST['action_name'] == 'update')) {
    
    $apply_id      = $_POST['apply_id'];

    $apply_barangay     = $_POST['apply_barangay'];
    $apply_municipality = $_POST['apply_municipality'];
    $apply_province     = $_POST['apply_province'];
    $apply_lname        = $_POST['apply_lname'];
    $apply_fname        = $_POST['apply_fname'];
    $apply_mname       = $_POST['apply_mname'];
    $apply_nname        = $_POST['apply_nname'];
    $apply_age          = $_POST['apply_age'];
    $apply_birthday     = $_POST['apply_birthday'];
    $apply_bcity        = $_POST['apply_bcity'];
    $apply_bprovince    = $_POST['apply_bprovince'];
    $apply_spouse       = $_POST['apply_spouse'];
    $apply_add_province = $_POST['apply_add_province'];
    $apply_add_municipality = $_POST['apply_add_municipality'];
    $apply_add_barangay     = $_POST['apply_add_barangay'];
    $apply_add_street       = $_POST['apply_add_street'];
    $apply_occupation       = $_POST['apply_occupation'];
    $apply_post_office      = $_POST['apply_post_office'];
    $apply_res_months       = $_POST['apply_res_months'];
    $apply_res_year         = $_POST['apply_res_year'];
    $apply_sk_precint       = $_POST['apply_sk_precint'];
    $apply_sk_barangay      = $_POST['apply_sk_barangay'];
    $apply_sk_city          = $_POST['apply_sk_city'];
    $apply_sk_province      = $_POST['apply_sk_province'];
    $apply_id      = $_POST['apply_id'];

    $apply_gender       = ($_POST['apply_gender']) ?? '';
    $apply_civil_status = ($_POST['apply_civil_status']) ?? '';

    // check if nag apply nah by lname and fname 


            $uploadDir = 'profile/';
            $fileName = basename($_FILES['input-file']['name']);
            $uploadFilePath = $uploadDir . $fileName;


            if (isset($_FILES['input-file']) && ($_FILES['input-file']['name'] != '')) {

                if (move_uploaded_file($_FILES['input-file']['tmp_name'], $uploadFilePath)) {

                    $sql = "UPDATE apply SET 
                    `apply_image` = '$fileName',
                    `apply_barangay` = '$apply_barangay',
                    `apply_municipality` = '$apply_municipality',
                    `apply_province` = '$apply_province',
                    `apply_lname` = '$apply_lname',
                    `apply_fname` = '$apply_fname',
                    `apply_mname` = '$apply_mname',
                    `apply_nname` = '$apply_nname',
                    `apply_age` = '$apply_age',
                    `apply_birthday` = '$apply_birthday',
                    `apply_bcity` = '$apply_bcity',
                    `apply_bprovince` = '$apply_bprovince',
                    `apply_spouse` = '$apply_spouse',
                    `apply_add_province` = '$apply_add_province',
                    `apply_add_municipality` = '$apply_add_municipality',
                    `apply_add_barangay` = '$apply_add_barangay',
                    `apply_add_street` = '$apply_add_street',
                    `apply_occupation` = '$apply_occupation',
                    `apply_post_office` = '$apply_post_office',
                    `apply_res_months` = '$apply_res_months',
                    `apply_res_year` = '$apply_res_year',
                    `apply_sk_precint` = '$apply_sk_precint',
                    `apply_sk_barangay` = '$apply_sk_barangay',
                    `apply_sk_city` = '$apply_sk_city',
                    `apply_sk_province` = '$apply_sk_province',
                    `apply_gender` = '$apply_gender',
                    `apply_civil_status` = '$apply_civil_status'
                    WHERE apply_id   = '$apply_id'"; 


                    if (mysqli_query($con, $sql)) {

                        $response = array(
                            'status' => 'success',
                            'message' => 'Update completed.'
                        );
                    } else {
                        $response = array(
                            'status' => 'error',
                            'message' => 'Update failed: ' . $con->error
                        );
                    }                                   

                } else {
                    $response = array(
                        'status' => 'error',
                        'message' => 'Image upload failed.'
                    );
                }





            } else {

                
                    $sql = "UPDATE apply SET 
                    `apply_barangay` = '$apply_barangay',
                    `apply_municipality` = '$apply_municipality',
                    `apply_province` = '$apply_province',
                    `apply_lname` = '$apply_lname',
                    `apply_fname` = '$apply_fname',
                    `apply_mname` = '$apply_mname',
                    `apply_nname` = '$apply_nname',
                    `apply_age` = '$apply_age',
                    `apply_birthday` = '$apply_birthday',
                    `apply_bcity` = '$apply_bcity',
                    `apply_bprovince` = '$apply_bprovince',
                    `apply_spouse` = '$apply_spouse',
                    `apply_add_province` = '$apply_add_province',
                    `apply_add_municipality` = '$apply_add_municipality',
                    `apply_add_barangay` = '$apply_add_barangay',
                    `apply_add_street` = '$apply_add_street',
                    `apply_occupation` = '$apply_occupation',
                    `apply_post_office` = '$apply_post_office',
                    `apply_res_months` = '$apply_res_months',
                    `apply_res_year` = '$apply_res_year',
                    `apply_sk_precint` = '$apply_sk_precint',
                    `apply_sk_barangay` = '$apply_sk_barangay',
                    `apply_sk_city` = '$apply_sk_city',
                    `apply_sk_province` = '$apply_sk_province',
                    `apply_gender` = '$apply_gender',
                    `apply_civil_status` = '$apply_civil_status'
                    WHERE apply_id   = '$apply_id'"; 

                    if (mysqli_query($con, $sql)) {

                        $response = array(
                            'status' => 'success',
                            'message' => 'Update completed.'
                        );
                    } else {
                        $response = array(
                            'status' => 'error',
                            'message' => 'Update failed: ' . $con->error
                        );
                    }      
            }



        echo json_encode($response);
}


if (isset($_POST['action_name']) && ($_POST['action_name'] == 'approve')) {

    $id= $_POST['id'];

    $query1 = "SELECT * FROM apply WHERE apply_id='$id'";
    $exec= mysqli_query($con,$query1);

    if($exec && mysqli_num_rows($exec) == 1) {

        $apply = mysqli_fetch_assoc($exec);
        $block_fname    = $apply['apply_fname'];
        $block_lname    = $apply['apply_lname'];


        $sql = "SELECT * FROM block WHERE block_fname='$block_fname' AND block_lname='$block_lname'";
        $exec2= mysqli_query($con,$sql);

        if($exec2 && mysqli_num_rows($exec2) > 0) {
            echo 'blocklist';

        } else {

            $query = "UPDATE apply SET `apply_status` = '2' WHERE apply_id   = '$id'"; 
            $exec= mysqli_query($con,$query);

            if($exec){
              echo 1;
            }else{
              echo 0;
            }


        }

    } else {

        echo 0;
    }





}

if (isset($_POST['action_name']) && ($_POST['action_name'] == 'decline')) {

    $id= $_POST['id'];
    
    $query = "UPDATE apply SET `apply_status` = '1' WHERE apply_id   = '$id'"; 
    $exec= mysqli_query($con,$query);

    if($exec){
      echo 1;
    }else{
      echo 0;
    }
}
?>
