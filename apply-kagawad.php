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
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>SK Candidate Information Management System</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="modal.css">
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
                <li class="active"><a href="apply.php"><i class="fa-solid fa-file-circle-check"></i>APPLICATION</a></li>
                <li><a href="candidate.php"><i class="fa-solid fa-users"></i>CANDIDATE</a></li>
                <li><a href="blocklist.php"><i class="fa-solid fa-users-slash"></i>BLOCKLIST</a></li>
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
                <h3>SK KAGAWAD APPLICATION LIST</h3>


                  <div class="content">
            <table id="example">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>LASTNAME</th>
                        <th>FIRSTNAME</th>
                        <th>MIDDLE NAME</th>
                        <th>AGE</th>
                        <th>GENDER</th>
                        <th>CIVIL STATUS</th>
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

                        $query = "SELECT * FROM `apply` WHERE apply_position = 'kagawad' AND `apply_status` = 1"; 
                        $result = mysqli_query($con, $query); 

                        $num = 1;

                        if (mysqli_num_rows($result) > 0) :
                          while($row = mysqli_fetch_assoc($result)) :
                     ?>

                        <tr>
                            <td><?php echo $num++; ?></td>
                            <td><?php echo $row["apply_lname"]; ?></td>
                            <td><?php echo $row["apply_fname"]; ?></td>
                            <td><?php echo $row["apply_mname"]; ?></td>
                            <td><?php echo $row["apply_age"]; ?></td>
                            <td><?php echo $row["apply_gender"]; ?></td>
                            <td><?php echo $row["apply_civil_status"]; ?></td>
                            <td>                                     
                                        <button type="button" data-id="<?php echo $row["apply_id"]; ?>" data-role="approve" class="btn btn-success"> <i class="fa-solid fa-check"></i></button>   
                                        <button type="button" data-id="<?php echo $row["apply_id"]; ?>" data-role="update" class="btn btn-primary"> <i class="fa-solid fa-edit"></i></button>
                                        <button type="button" data-id="<?php echo $row["apply_id"]; ?>" data-role="delete" class="btn btn-danger"> <i class="fa-solid fa-trash"></i></button>

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
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Blocklist</h5>
            <button type="button" class="close" onclick="closeAddModal()" aria-label="Close">

              <span aria-hidden="true" style="color: black">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card shadow-lg border-0 rounded-lg mt-12">
                <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-12">



                <form id="myform" method="POST" enctype="multipart/form-data" >
                    <input id="action_name"  name="action_name" type="hidden"  value="update" />
                    <input id="apply_id"  name="apply_id" type="hidden"  value="" />
                      <input type="hidden" name="action_name" id="action_name" value="update">
                      <div class="form-container">
                         <div class="heads">
                            <div class="logo-left">
                               <img src="Log.jpg" alt="Logo" class="log"> 
                            </div>
                            <div class="header-text">
                               <h5><b>Republic of the Philippines<br> COMMISION ON ELECTIONS <br> MANILA</b></h5>
                            </div>
                            <br><br><br>
                            <div class="cer-text">
                               <h1><b>CERTIFICATE OF CANDIDACY <br> SANGGUNIANG KABATAAN</b></h1>
                            </div>
                            <br>
                            <div class="d-text">
                               <div class="app-text">
                                  <h2> APPLICATION FOR SANGGUNIANG KABATAAN CHAIRPERSON</h2>
                               </div>
                               <br><br>
                               <div class="ins-text">
                                  <p>INSTRUCTIONS:</p>
                               </div>
                               <div>
                                  <p>I hereby announce my Candidacy for the position of Sangguniang Kabataan Chairman of <span class="underline editable-area" contenteditable="true" id="barangay"></span>, Municipality of 
                                     <span class="underline editable-area" contenteditable="true" id="municipality"></span>, Province of 
                                     <span class="underline editable-area" contenteditable="true" id="province"></span> on October 25, 2024, 2010 Barangay Sangguniang Kabataan Elections: 
                                     and after having been sworn to in accordance with law, hereby state the following.
                                  </p>
                                  <input type="hidden" name="apply_barangay" id="apply_barangay">
                                  <input type="hidden" name="apply_municipality" id="apply_municipality">
                                  <input type="hidden" name="apply_province" id="apply_province">
                               </div>
                               <br>
                               <label for="input-file" id="drop-area">
                                  <input type="file" accept="image/*" id="input-file" name="input-file" hidden>
                                  <div id="img-view">
                                     <img src="icon.png" id="displayImage">
                                     <p>Drag and drop or click here <br> to upload image</p>
                                     <span> Upload any images from desktop</span>
                                  </div>
                               </label>
                            </div>
                            <hr>
                            <script src="script.js"></script>
                            <div class="names-group">
                               <label for="name">1. MY NAME IS:</label>
                               <div class="last-group">
                                  <label for="apply_lname">LAST NAME</label>
                                  <input type="text" id="apply_lname" name="apply_lname" required>
                               </div>
                               <div class="first-group">
                                  <label for="apply_fname">FIRST NAME</label>
                                  <input type="text" id="apply_fname" name="apply_fname" required>
                               </div>
                               <div class="middle-group">
                                  <label for="apply_mname">MIDDLE NAME</label>
                                  <input type="text" id="apply_mname" name="apply_mname" >
                               </div>
                            </div>
                            <div class="nick-group">
                               <label for="apply_nname">2. I AM GENERALLY OR POPULARLY KNOWN BY THE NICKNAME:</label>
                               <h6>(Indicate only one nickname or stage name)</h6>
                               <input type="text" id="apply_nname" name="apply_nname"   placeholder="NICKNAME/STAGENAME" >
                            </div>
                            <div class="gend-group">
                               <label for = "apply_gender">3. MY GENDER IS:</label>
                               <label for="male">
                               <input type="checkbox" id="apply_gender" name="apply_gender" value="male" onclick="toggleCheckboxes(this)">
                               Male
                               </label>
                               <label for="female">
                               <input type="checkbox" id="apply_gender" name="apply_gender" value="female" onclick="toggleCheckboxes(this)">
                               Female
                               </label>
                            </div>
                            <br><br>
                            <div class="age-group">
                               <label for="apply_age">4. MY AGE IS:</label>
                               <input type="number" id="apply_age" name="apply_age" >
                               <label for="apply_birthday">5. MY BIRTHDAY IS:</label>
                               <input type="date" id="apply_birthday" name="apply_birthday" >
                            </div>
                            <br><br>
                            <div class="birth-group">
                               <label for="bplace">6. MY BIRTHPLACE IS:</label>
                               <div class="city-group">
                                  <label for="apply_bcity">CITY/MUNICIPALITY</label>
                                  <input type="text" id="apply_bcity" name="apply_bcity" placeholder="CITY/MUNICIPALITY" >
                               </div>
                               <div class="province-group">
                                  <label for="apply_bprovince">PROVINCE</label>
                                  <input type="text" id="apply_bprovince" name="apply_bprovince" placeholder="PROVINCE" >
                               </div>
                            </div>
                            <div class="civil-status-group">
                               <label for="civilStatus">7. MY CIVIL STATUS IS:</label>
                               <div class="civil-group">
                                  <div class="checkbox-left">
                                     <label for="single">
                                     <input type="checkbox" id="apply_civil_status" name="apply_civil_status" value="single" onclick="toggleCivilStatus(this)">
                                     Single
                                     </label>
                                     <label for="married">
                                     <input type="checkbox" id="apply_civil_status" name="apply_civil_status" value="married" onclick="toggleCivilStatus(this)">
                                     Married
                                     </label>
                                     <label for="annulled">
                                     <input type="checkbox" id="apply_civil_status" name="apply_civil_status" value="annulled" onclick="toggleCivilStatus(this)">
                                     Annulled/Divorced
                                     </label>
                                  </div>
                                  <div class="checkbox-right">
                                     <label for="widow">
                                     <input type="checkbox" id="apply_civil_status" name="apply_civil_status" value="widow" onclick="toggleCivilStatus(this)">
                                     Widow/er
                                     </label>
                                     <label for="separated">
                                     <input type="checkbox" id="apply_civil_status" name="apply_civil_status" value="separated" onclick="toggleCivilStatus(this)">
                                     Legally separated
                                     </label>
                                  </div>
                               </div>
                               <div class="spouse-group">
                                  <label for="apply_spouse">Full Name of Spouse if Married: </label>
                                  <input type="text" id="apply_spouse" name="apply_spouse" >
                               </div>
                            </div>
                            <hr>
                            <br>
                            <div class="add-group">
                               <label for="myadd">8. MY RESIDENCE/ADDRESS:</label>
                               <div class="prov-group">
                                  <label for="apply_add_province">PROVINCE</label>
                                  <input type="text" id="apply_add_province" name="apply_add_province" placeholder="PROVINCE" >
                               </div>
                               <div class="muni-group">
                                  <label for="apply_add_municipality">CITY/MUNICIPALITY</label>
                                  <input type="text" id="apply_add_municipality" name="apply_add_municipality" placeholder="CITY/MUNICIPALITY">
                               </div>
                            </div>
                            <div class="bar-group">
                               <label for="apply_add_barangay">BARANGAY</label>
                               <input type="text" id="apply_add_barangay" name="apply_add_barangay" placeholder="BARANGAY">
                            </div>
                            <div class="sub-group">
                               <label for="apply_add_street">HOUSE NO./STREET/SUBMISSION</label>
                               <input type="text" id="apply_add_street" name="apply_add_street" placeholder="HOUSE NO./STREET/SUBMISSION">
                            </div>
                         </div>
                         <div class="occup-group">
                            <label for="apply_occupation">9. MY PROFESSION OR OCCUPATION IS:</label>
                            <input type="text" id="apply_occupation" name="apply_occupation"   placeholder="PROFESSION OR OCCUPATION" >
                         </div>
                         <div class="elec-group">
                            <label for="apply_post_office">10. MY POST OFFICE ADDRESS FOR ELECTION  IS: (Indicate if the same as no. 8)</label>
                            <input type="text" id="apply_post_office" name="apply_post_office" >
                         </div>
                         <div class="res-group">
                            <label for="res">11. MY PERIOD OF RESIDENCY IN THE PHILIPPINES BEFORE OCTOBER 25, 2023 IS:</label>
                            <div class="residency-group">
                               <select id="apply_res_months" name="apply_res_months">
                                  <option value="0">Option 1</option>
                                  <option value="1">1 Month</option>
                                  <option value="3">3 Months</option>
                                  <option value="6">6 Months</option>
                                  <option value="12">12 Months</option>
                               </select>
                               <label for="apply_res_months">No. of Months:</label>
                               <select id="apply_res_year" name="apply_res_year">
                                  <option value="0">Option 2</option>
                                  <option value="1">1 Year</option>
                                  <option value="2">2 Years</option>
                                  <option value="5">5 Years</option>
                                  <option value="10">10 Years</option>
                               </select>
                               <label for="apply_res_year">No. of Years:</label>
                            </div>
                            <div class="member-group">
                               <label for="member">12. I AM A MEMBER OF KATIPUPNAN NG KABATAAN OF: </label>
                               <div class="prec-group">
                                  <label for="apply_sk_precint">PRECINT</label>
                                  <input type="text" id="apply_sk_precint" name="apply_sk_precint" placeholder="PRECINT" >
                               </div>
                               <div class="bars-group">
                                  <label for="apply_sk_barangay">BARANGAY</label>
                                  <input type="text" id="apply_sk_barangay" name="apply_sk_barangay" placeholder="BARANGAY">
                               </div>
                            </div>
                            <div class="cit-group">
                               <label for="apply_sk_city">CITY/MUNICIPALITY</label>
                               <input type="text" id="apply_sk_city" name="apply_sk_city" placeholder="CITY/MUNICIPALITY">
                            </div>
                            <div class="pro-group">
                               <label for="apply_sk_province">PROVINCE</label>
                               <input type="text" id="apply_sk_province" name="apply_sk_province" placeholder="PROVINCE">
                            </div>
                         </div>
                         <hr>
                         <br>
                         <div class="par-group"></div>
                         <p>13. I AM A FILIPINO.</p>
                         <p>14. I AM A MEMBER OF THE KATIPUNAN NG KABATAAN IN THE BARANGAY WHERE I SEEK TO BE SELECTED.</p>
                         <p>15. I AM A RESIDENT OF THE BARANGAY WHERE I SEEK TO BE ELECTED FOR ATLEAST ONE YEAR BEFORE THE <br> SANNGUNIANG KABATAANG ELECTIONS.</p>
                         <p>16. I AM NOT A PERMANENT OF, OR IMMIGRANT TO A FOREIGN COUNTRY.</p>
                         <p>17. I POSSESS ALL THE QUALIFICATONS AND NONE OF THE DISQUALIFICATIONS AND NONE OF THE DISQUALIFICATIONS FOR THE OFFICE ISEEK TO BE ELECTED.</p>
                         <p>18. I WILL SUPPORT AND DEFEND THE CONSTITUTION OF THE REPUBLIC OF THE PHILLIPPINES AND WILL
                            MAINTAIN TRUE FAITH AND ALLEGIANCE THERE TO I WILL OBEY THE LAWS, 
                            LEGAL ORDERS AND DECREES PROMULGATE BY THE DULY CONSTITUTES AUTHORITIES. 
                            I IMPOSE THIS OBLIGATIONS UPON MYSELF VOLUNTARILY, WITHOUT MENTAL RESERVATION OR PURPOSE OF ENVASION.
                         </p>
                         <p>19. I RECOGNIZE THE AUTHORITY OF THE ELECTION OFFICER OR HIS REPRESENTATIVE NOT TO ACCEPT MY 
                            CERTIFICATE OF CANDIDACY IN CASE I AM NOT A MEMBER OF THE KATIPUNAN NG KABATAAN IN THE BARANGGAY.
                         </p>
                         <br>
                         <hr>
                         <br>
                         <div class="stated-group">
                            <label for="apply_stated">I hereby clarify that the facts stated herein are true and correct of my own personal knowledege.</label>
                            <!-- <input type="text" id="apply_stated" name="apply_stated" > -->
                         </div>
                      </div>
                      <div class="can-container">
                         <!-- Form elements go here -->
                         <button type="submit" class="btn submit-btn"><i class="fa-solid fa-circle-check"></i>Update</button>
                         <button type="button" class="btn cancel-btn" onclick="closeAddModal()"><i class="fas fa-times"></i>Cancel</button>
                         <br><br>
                      </div>
                   
                   </form>





                            </div>
                        </div>

                </div>
            </div>
          </div>
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
                "bFilter": false,
                "bInfo": false});
            });


        function closeAddModal() {
            $('#AddModal').modal('hide');
            $('#UpdateModal').modal('hide');
            $('#ViewModal').modal('hide');
        }

        $(document).on('click', 'button[data-role=update]', function() {
            var id = $(this).data('id');
                        
            $.ajax({
                    url: 'save_register.php',
                    type: 'POST',
                    data: { 
                        action_name:'select', 
                        id:id
                    },
                    success: function(data){
                        $('#myform')[0].reset();
                        var userData=JSON.parse(data);
                        console.log(userData)

                        $("#apply_id").val(userData.apply_id);
                        $("#apply_barangay").val(userData.apply_barangay);
                        $("#apply_municipality").val(userData.apply_municipality);
                        $("#apply_province").val(userData.apply_province);
                        $("#apply_lname").val(userData.apply_lname);
                        $("#apply_fname").val(userData.apply_fname);
                        $("#apply_mname").val(userData.apply_mname);
                        $("#apply_nname").val(userData.apply_nname);
                        $("#apply_age").val(userData.apply_age);
                        $("#apply_birthday").val(userData.apply_birthday);
                        $("#apply_bcity").val(userData.apply_bcity);
                        $("#apply_bprovince").val(userData.apply_bprovince);
                        $("#apply_spouse").val(userData.apply_spouse);
                        $("#apply_add_province").val(userData.apply_add_province);
                        $("#apply_add_municipality").val(userData.apply_add_municipality);
                        $("#apply_add_barangay").val(userData.apply_add_barangay);
                        $("#apply_add_street").val(userData.apply_add_street);
                        $("#apply_occupation").val(userData.apply_occupation);
                        $("#apply_post_office").val(userData.apply_post_office);
                        $("#apply_res_months").val(userData.apply_res_months);
                        $("#apply_res_year").val(userData.apply_res_year);
                        $("#apply_sk_precint").val(userData.apply_sk_precint);
                        $("#apply_sk_barangay").val(userData.apply_sk_barangay);
                        $("#apply_sk_city").val(userData.apply_sk_city);
                        $("#apply_sk_province").val(userData.apply_sk_province);

                        $('input[name="apply_gender"][value="' + userData.apply_gender + '"]').prop('checked', true);
                        $('input[name="apply_civil_status"][value="' + userData.apply_civil_status + '"]').prop('checked', true);

                        if ((userData.apply_image !== null)) {

                            $('#img-view').css('background-image', 'url(./profile/' + userData.apply_image + ')');
                            $('#img-view').empty();

                        }

                        console.log(userData.apply_image)


                        $('#barangay').text(userData.apply_barangay);
                        $('#municipality').text(userData.apply_municipality);
                        $('#province').text(userData.apply_province);

                        $("#apply_barangay").val(userData.apply_barangay);
                        $("#apply_municipality").val(userData.apply_municipality);
                        $("#apply_province").val(userData.apply_province);



                        $('#AddModal').modal('show');

                    }
            });

        });





        $(document).on('click', 'button[data-role=delete]', function() {
            var id = $(this).data('id');

            var confirmalert = confirm("Are you sure you want to delete?");
            if (confirmalert == true) {
                $.ajax({
                    url: 'save_register.php',
                    type: 'POST',
                    data: { 
                    action_name:'delete', 
                    id:id
                    },
                    success: function(response){
                        if(response == 1){
                            alert("Application deleted!")                                                            
                            location.reload();
                        }
                    }
                });
            }

        });

        $(document).on('click', 'button[data-role=approve]', function() {
            var id = $(this).data('id');

            var confirmalert = confirm("Are you sure you want to approve?");
            if (confirmalert == true) {
                $.ajax({
                    url: 'save_register.php',
                    type: 'POST',
                    data: { 
                    action_name:'approve', 
                    id:id
                    },
                    success: function(response){
                        console.log(response)

                        if(response == 1){
                            alert("Application approved!")                                                            
                            location.reload();
                        }
                        

                        if(response == 'blocklist'){
                            alert("Applicate is blocklisted!")         
                        }
                    }
                });
            }

        });

            
            $("#myform").on("submit", function (event) {
                event.preventDefault(); 

                 var barangaySpan = document.getElementById('barangay').innerText;
                 var municipalitySpan = document.getElementById('municipality').innerText;
                 var provinceSpan = document.getElementById('province').innerText;

            // Set the value to the hidden input field
                document.getElementById('apply_barangay').value = barangaySpan;
                document.getElementById('apply_municipality').value = municipalitySpan;
                document.getElementById('apply_province').value = provinceSpan;

                var formData = new FormData(this);
                console.log(formData)
                $.ajax({
                    type: 'POST',
                    url: 'save_register.php',
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
                        console.log(response)
                        alert(response.message)
                    }
                });
            });


    </script>

</body>
</html>
