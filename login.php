<!DOCTYPE html>
<html>

<head>
    <title>Sangguniang Kabataan Application</title>
    <link rel="stylesheet" href="style.css">
    <!-- Include Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Style for the icon */
        .password-toggle-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="main">
		<img src="logo.png" alt="Sangguniang Kabataan Logo" class="logo">
        <h2>SK Candidate Information Management System</h2>
        <form action="save_login.php" id="loginForm"  method='post'>
            <input type="hidden" id="action_name" name="action_name" value="login">

            <label for="user_name">
                Username:
            </label>
            <input type="text" id="user_name" name="user_name" placeholder="Enter your Username" required>

            <label for="user_password">
                Password:
            </label>
            <div style="position: relative;">
                <input type="password" id="user_password" name="user_password" placeholder="Enter your Password" required>
                <!-- Icon to toggle password visibility -->
                <i class="far fa-eye password-toggle-icon" onclick="togglePasswordVisibility()"></i>
            </div>

            <a href="#" id="forgot-password-link">Forgot Password?</a>

            <div class="wrap">
                <button type="submit" id="login">
                    Login
                </button>
            </div>
        </form>
        <!-- <p>Not registered? <a href="#" style="text-decoration: none;">Create an account</a></p> -->
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script> 
    <script>
        // JavaScript function to toggle password visibility
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("user_password");
            var icon = document.querySelector(".password-toggle-icon");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }




        $('#loginForm').on('submit', function(event) {
            event.preventDefault();
            const formData = $(this).serialize();

             $.ajax({
                 url: 'save_login.php',
                 method: 'POST',
                 data: formData,
                 success: function(result) {
                    console.log('response')
                    console.log(result)

                    if (result == "admin") {
                        window.location.href = 'home.php'; 

                    } else if (result == "username") {
                        alert("Username is empty");

                    } else if (result == "password") {
                        alert("Password is empty");

                    } else if (result == "usernamepassword") {
                        alert("Username and Password is empty");

                    } else if (result == "error") {          
                        alert("Incorrect Username or Password");

                    } else {
                        alert(result);
                    }

                 }
             });
                                       
        });
</script>
    
</body>

</html>
