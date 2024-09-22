<?php
require 'function.php';

date_default_timezone_set('Asia/Jayapura');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    $user = mysqli_fetch_assoc($query);

    if ($user) {
        // Verifikasi password menggunakan MD5
        if ($user['password'] === md5($password)) {
            $_SESSION['log'] = 'True';
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $user['role']; 

            // Catat aktivitas login
            $login_time = date('Y-m-d H:i:s');
            $query = "INSERT INTO login_activities (username, login_time) VALUES ('$username', '$login_time')";
            mysqli_query($conn, $query);

            
            if ($user['role'] == 1) { // Admin
                header('Location: index.php');
            } else { // User 
                header('Location: index.php');
            }
            exit();
        } else {
            $error_message = "Username atau password salah. Silakan coba lagi.";
        }
    } else {
        $error_message = "Username atau password salah. Silakan coba lagi.";
    }

    header('Location: login.php?error=' . urlencode($error_message));
    exit();
}


if (isset($_GET['error'])) {
    $error_message = $_GET['error'];
 // Script untuk menghapus parameter error dari URL setelah menampilkan pesan kesalahan
    echo '<div class="error-message" id="error-message">';
    echo '<i class="fas fa-exclamation-triangle" style="color: red;"></i>';
    echo '<span>' . $error_message . '</span>';
    echo '<span class="close-btn" id="close-btn" onclick="closeErrorMessage()">×</span>';
    echo '</div>';
}

// Menampilkan animasi loading saat tombol submit ditekan
echo '<script>
    document.getElementById("views").addEventListener("submit", function() {
        document.getElementById("loading").style.display = "block";
    });

    function closeErrorMessage() {
        var errorMessage = document.getElementById("error-message");
        errorMessage.style.display = "none";
    }
    </script>';
?>
