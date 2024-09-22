<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD.Tunggal Putra/Login</title>
    
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

     <!-- Font Awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


        <style>
            .side-image {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                text-align: center;
                background-color: #333;
                color: white;
                padding: 20px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            }

            .side-image h1 {
                font-weight: bold;
                font-size: 42px;
                margin-bottom: 10px;
            }

            .side-image p {
                font-size: 13px;
            }

            .error-message {
                background-color: #f8d7da;
                color: #721c24;
                padding: 10px;
                border: 1px solid #f5c6cb;
                border-radius: 5px;
                margin-top: 5px;
                position: relative;
                font-size: 13px;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .close-btn {
                cursor: pointer;
                font-size: 26px;
            }

            .input-field {
                position: relative;
                margin-bottom: 1.5em;
            }

            .input-field i {
                position: absolute;
                top: 50%;
                right: 20px;
                color: #616161;
                cursor: pointer;
                font-size: 16px;
                transform: translateY(-50%);
            }

            .checkbox-field {
                display: flex;
                align-items: center;
                margin-bottom: 30px;
                margin-top: -4px;
            }

            .checkbox-field input[type="checkbox"] {
                margin-right: 10px;
                margin-left: 10px;
                cursor: pointer;
            }

            .checkbox-field label {
                font-size: 14px;
                color: #333;
                cursor: pointer;
            }

            .loading {
                display: none;
                width: 50px;
                height: 50px;
                border: 3px solid #f3f3f3;
                border-radius: 50%;
                border-top: 3px solid #c7c7c7;
                width: 20px;
                height: 20px;
                position: absolute;
                top: 50%;
                left: 50%;
                margin-top: -25px;
                margin-left: -25px;
                -webkit-animation: spin 1s linear infinite;
                animation: spin 1s linear infinite;
            }

            @-webkit-keyframes spin {
                0% {
                    -webkit-transform: rotate(0deg);
                }
                100% {
                    -webkit-transform: rotate(360deg);
                }
            }

            @keyframes spin {
                0% {
                    transform: rotate(0deg);
                }
                100% {
                    transform: rotate(360deg);
                }
            }

            @media (max-width: 768px) {
                .side-image h1,
                .side-image p {
                    display: none;
                }
            }
         </style>
    </head>
<body>

    <form id="views" action="cek_login.php" method="post">
        <div class="wrapper">
            <div class="container main">
                <div class="row">
                    <div class="col-md-6 side-image">
                    </div>
                    <div class="col-md-6 right">
                        <div class="input-box">
                            <div class="logo-container">
                                <img src="img/img.jpg" alt="">
                                <header>UD.TUNGGAL PUTRA</header>
                            </div>
                            <?php
                            if (isset($_GET['error'])) {
                                $error_message = $_GET['error'];
                                echo '<div class="error-message" id="error-message">';
                                echo '<span>' . $error_message . '</span>';
                                echo '<span class="close-btn" id="close-btn" onclick="closeErrorMessage()">×</span>';
                                echo '</div>';
                            }
                            ?>
                            <div class="input-field username-field">
                                <span>
                                <i class="fas fa-user"></i>
                                <span>
                                <input type="text" class="input username-input" id="username" name="username" required autocomplete="off">
                                <label for="username" class="username-label">Username</label>
                            </div>

                            <div class="input-field password-field">
                                <input type="password" class="input password-input" id="password" name="password" required>
                                <label for="password" class="password-label">Password</label>
                                <span class="password-toggle">
                                    <i class="fas fa-lock" id="toggleIcon"></i>
                                </span>
                            </div>
                            <div class="checkbox-field">
                                <input type="checkbox" id="showPassword" onclick="togglePassword()">
                                <label for="showPassword">Tampilkan Sandi</label>
                            </div>
                            <div class="input-field">
                                <input type="submit" class="submit" name="login" value="Masuk">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
<div id="loading" class="loading"></div>
        <script>
            // Menampilkan animasi loading 
            document.getElementById('views').addEventListener('submit', function () {
                document.getElementById('loading').style.display = 'block';
            });

            function closeErrorMessage() {
                var errorMessage = document.getElementById('error-message');
                errorMessage.style.display = 'none';
                window.history.replaceState({}, document.title, "./login.php");
            }

            function togglePassword() {
                const passwordInput = document.getElementById('password');
                const checkbox = document.getElementById('showPassword');

                passwordInput.type = checkbox.checked ? 'text' : 'password';
            }
        </script>
    </body>
</html>
