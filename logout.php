<?php
session_start();
session_destroy();
header('location:login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website</title>
    <script>
        function confirmLogout() {
            var userConfirmation = confirm("Apakah Anda yakin ingin keluar?");
            if (userConfirmation) {
                window.location.href = "logout.php";
            }
        }
    </script>
</head>
<body>
    <button onclick="confirmLogout()">Keluar</button>
</body>
</html>
