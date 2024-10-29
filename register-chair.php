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
    <link rel="stylesheet" type="text/css" href="./slick-1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="./slick-1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>SK Candidate Information Management System</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="forms.css">
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
                <li class="active"><a href="register.php"><i class="fa-solid fa-file-pen"></i>REGISTRATION</a></li>
                <li><a href="apply.php"><i class="fa-solid fa-file-circle-check"></i>APPLICATION</a></li>
                <li><a href="candidate.php"><i class="fa-solid fa-users"></i>CANDIDATE</a></li>
                <li><a href="blocklist.php"><i class="fa-solid fa-users-slash"></i>BLOCKLIST</a></li>
            </ul>
        </nav>
        <div class="main-content">
            <header>
                <div class="logout-dropdown">
                    <button class="logout-btn" style="padding: 0"><i class="fa-solid fa-circle-user"></i> Profile  ▼</button>
                    <div class="logout-dropdown-content">
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
            </header>
            <section style="position: relative;">
                <h3>REGISTRATION</h3>

                <form id="myform" method="POST" enctype="multipart/form-data" >
                      <input type="hidden" name="action_name" id="action_name" value="register">
                      <input type="hidden" name="apply_position" id="apply_position" value="chairman">
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
                                     <img src="icon.png">
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
                                     <input type="checkbox" id="single" name="apply_civil_status" value="single" onclick="toggleCivilStatus(this)">
                                     Single
                                     </label>
                                     <label for="married">
                                     <input type="checkbox" id="married" name="apply_civil_status" value="married" onclick="toggleCivilStatus(this)">
                                     Married
                                     </label>
                                     <label for="annulled">
                                     <input type="checkbox" id="annulled" name="apply_civil_status" value="annulled" onclick="toggleCivilStatus(this)">
                                     Annulled/Divorced
                                     </label>
                                  </div>
                                  <div class="checkbox-right">
                                     <label for="widow">
                                     <input type="checkbox" id="widow" name="apply_civil_status" value="widow" onclick="toggleCivilStatus(this)">
                                     Widow/er
                                     </label>
                                     <label for="separated">
                                     <input type="checkbox" id="separated" name="apply_civil_status" value="separated" onclick="toggleCivilStatus(this)">
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
                         <button type="submit" class="btn submit-btn"><i class="fa-solid fa-circle-check"></i>Submit</button>
                         <button type="button" class="btn cancel-btn"><i class="fas fa-times"></i>Cancel</button>
                         <br><br>
                      </div>
                   
                   </form>

            </section>
        </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script> 
    <script src="./slick-1.8.1/slick/slick.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        function redirectToForm(formUrl) {
          // Redirect to the registration form URL
          window.location.href = formUrl;
        }


        $(document).ready(function () {

            function toUpperCaseInput(input) {
                input.val(input.val().toUpperCase());
            }

            // Event listeners for input and paste events
            $('input[type="text"]').on('input', function() {
                toUpperCaseInput($(this));
            });

            $('input[type="text"]').on('paste', function() {
                var input = $(this);
                setTimeout(function() {
                    toUpperCaseInput(input);
                }, 0);
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
                    // url: 'testsave.php',
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
        });

    </script>
</body>
</html>
