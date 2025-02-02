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
                <h3>APPLICATION</h3>
                <div style="display: flex; ">
                    
                    <div class="gallery" onclick="redirectToForm('apply-chair.php')">
                        <a target="_blank" href="">
                            <img src="sk.png" alt="Cinque Terre">
                        </a>
                        <div class="desc">SK CHAIRPERSON</div>
                    </div>

                    <div class="gallery" onclick="redirectToForm('apply-kagawad.php')">
                        <a target="_blank" href="">
                            <img src="sk.png" alt="Cinque Terre">
                        </a>
                        <div class="desc">SK KAGAWAD</div>
                    </div>

                </div>
            </section>
        </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script> 
    <script src="./slick-1.8.1/slick/slick.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">


        function redirectToForm(formUrl) {
          window.location.href = formUrl;
        }
    </script>
</body>
</html>
