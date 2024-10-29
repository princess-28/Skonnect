<?php 
@session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>SK Candidate Information Management System</title>
</head>
<body>
    <div class="container">
        <nav class="sidenav">
            <div class="logo">                
                  <img src="logo.png" alt="Logo">
                  <div class="logo-text">SK Candidate Information <br> Management System</div>
            </div>
            <ul class="navi">
                <li><a href="home.php"><i class="fa-solid fa-house"></i>HOMEPAGE</a></li>
                <li><a href="register.php"><i class="fa-solid fa-file-pen"></i>REGISTRATION</a></li>
                <li><a href="apply.php"><i class="fa-solid fa-file-circle-check"></i>APPLICATION</a></li>
                <li><a href="candidate.php"><i class="fa-solid fa-users"></i>CANDIDATE</a></li>
                <li  class="active"><a href="blocklist.php"><i class="fa-solid fa-users-slash"></i>BLOCKLIST</a></li>
            </ul>
        </nav>
        <div class="main-content">
            <header>
                <div class="logout-dropdown">
                    <button class="logout-btn"><i class="fa-solid fa-circle-user"></i> Profile  ▼</button>
                    <div class="logout-dropdown-content">
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
            </header>
            <section>

                <div style="display: flex; justify-content: space-between;">
                <h3>BLOCKLIST</h3>
                <button type="button" data-role="add" style="border-radius: 5px;"> <i class="fa-solid fa-add"></i> Add New</button>
                    
                </div>

    


                  <div class="content">
                    <table id="example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>LASTNAME</th>
                                <th>FIRSTNAME</th>
                                <th>MIDDLE NAME</th>
                                <th>VIOLATION</th>
                                <th>ACTION</th>                               
                            </tr>
                        </thead>
                        <tbody>


                             <?php 

                                define('HOST','localhost');
                                define('USERNAME', 'root');
                                define('PASSWORD','');
                                define('DB','skconnect');                                                 
                                $con = mysqli_connect(HOST,USERNAME,PASSWORD,DB);

                                $query = "SELECT * FROM `block`"; 
                                $result = mysqli_query($con, $query); 

                                $num = 1;

                                if (mysqli_num_rows($result) > 0) :
                                  while($row = mysqli_fetch_assoc($result)) :
                             ?>

                                <tr>
                                    <td><?php echo $num++; ?></td>
                                    <td><?php echo $row["block_lname"]; ?></td>
                                    <td><?php echo $row["block_fname"]; ?></td>
                                    <td><?php echo $row["block_mname"]; ?></td>
                                    <td><?php echo $row["block_violation"]; ?></td>
                                    <td>                                        
                                        <button type="button" data-id="<?php echo $row["block_id"]; ?>" data-role="update" class="btn btn-primary"> <i class="fa-solid fa-edit"></i></button>
                                        <button type="button" data-id="<?php echo $row["block_id"]; ?>" data-role="delete" class="btn btn-danger"> <i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>

                             <?php 
                                  endwhile;
                                endif; 
                              ?>


                        </tbody>
                    </table>
                  </div>


            </section>
        </div>
    </div>






<!-- Add Modal -->
    <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Blocklist</h5>
            <button type="button" class="close" onclick="closeAddModal()" aria-label="Close">

              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card shadow-lg border-0 rounded-lg mt-12">
                <div class="card-body">
                    <form method='post' id='addForm' >
                    <input id="action_name"  name="action_name" type="hidden"  value="add" />
                        <div class="row mb-3">
                            <div class="col-md-12">

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="block_lname"  name="block_lname" type="text" placeholder="Enter first name" />
                                    <label for="block_lname">Last Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="block_fname"  name="block_fname" type="text" placeholder="Enter first name" />
                                    <label for="block_fname">First Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="block_mname"  name="block_mname" type="text" placeholder="Enter first name" />
                                    <label for="block_mname">Middle Name</label>
                                </div>

                                    <label style="padding-left: 5px;">Violation</label>
                                <div class="form-floating mb-3">

                                    <textarea class="form-control" id="block_violation" name="block_violation" style="width: 100%; height: 100px;"></textarea>
                                </div>

                            </div>
                        </div>

                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary"  onclick="closeAddModal()">Close</button>
            <button type="submit" class="btn btn-primary" id="addblocklist">Add Blocklist</button>
          </div>

        </form>
        </div>
      </div>
    </div>





<!-- Update Modal -->
    <div class="modal fade" id="UpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Blocklist</h5>
            <button type="button" class="close" onclick="closeAddModal()" aria-label="Close">

              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card shadow-lg border-0 rounded-lg mt-12">
                <div class="card-body">
                    <form method='post' id='updateForm' >
                    <input id="action_name"  name="action_name" type="hidden"  value="update" />
                    <input id="update_block_id"  name="update_block_id" type="hidden"  value="" />
                        <div class="row mb-3">
                            <div class="col-md-12">

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="update_block_lname"  name="update_block_lname" type="text" placeholder="Enter first name" />
                                    <label for="update_block_lname">Last Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="update_block_fname"  name="update_block_fname" type="text" placeholder="Enter first name" />
                                    <label for="update_block_fname">First Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="update_block_mname"  name="update_block_mname" type="text" placeholder="Enter first name" />
                                    <label for="update_block_mname">Middle Name</label>
                                </div>

                                    <label style="padding-left: 5px;">Violation</label>
                                <div class="form-floating mb-3">

                                    <textarea class="form-control" id="update_block_violation" name="update_block_violation" style="width: 100%; height: 100px;"></textarea>
                                </div>

                            </div>
                        </div>

                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary"  onclick="closeAddModal()">Close</button>
            <button type="submit" class="btn btn-warning" id="updateblocklist">Update Blocklist</button>
          </div>

        </form>
        </div>
      </div>
    </div>



    <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').dataTable({
                "bLengthChange": false,
                "bFilter": true,
                "bInfo": false});

            });


        $(document).on('click', 'button[data-role=add]', function() {

            $('#addForm')[0].reset();
            $('#AddModal').modal('show');
        });

        
        function closeAddModal() {
            $('#AddModal').modal('hide');
            $('#UpdateModal').modal('hide');
            $('#ViewModal').modal('hide');
        }


        $("#addForm").on('submit', (function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: 'save_blocklist.php',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {

                    var userData=JSON.parse(response);
                    console.log(response);
                    
                    alert(userData.message)

                    if (userData.status == 'success') {
                       location.reload();
                    }

                },
                error: function (response) {
                    alert("Error: " + response);
                }
            });
        }));



        $("#updateForm").on('submit', (function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: 'save_blocklist.php',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {

                    var userData=JSON.parse(response);
                    console.log(response);
                    
                    alert(userData.message)

                    if (userData.status == 'success') {
                       location.reload();
                    }

                },
                error: function (response) {
                    alert("Error: " + response);
                }
            });
        }));


        $(document).on('click', 'button[data-role=delete]', function() {
            var id = $(this).data('id');

            var confirmalert = confirm("Are you sure you want to delete?");
            if (confirmalert == true) {
                $.ajax({
                    url: 'save_blocklist.php',
                    type: 'POST',
                    data: { 
                    action_name:'delete', 
                    id:id
                    },
                    success: function(response){
                        if(response == 1){
                            alert("Blocklist deleted!")                                                            
                            location.reload();
                        }
                    }
                });
            }

        });


    $(document).on('click', 'button[data-role=update]', function() {
        var id = $(this).data('id');
                    
        $.ajax({
                url: 'save_blocklist.php',
                type: 'POST',
                data: { 
                    action_name:'select', 
                    id:id
                },
                success: function(data){

                    var userData=JSON.parse(data);
                    console.log(userData)

                    $("#update_block_id").val(userData.block_id);
                    $("#update_block_fname").val(userData.block_fname);
                    $("#update_block_lname").val(userData.block_lname);
                    $("#update_block_mname").val(userData.block_mname);
                    $("#update_block_violation").val(userData.block_violation);

                    $('#UpdateModal').modal('show');

                }
        });

    });

    </script>

</body>
</html>
