<?php
require_once 'connection.php';

if (isset($_POST['key'])) {

    $key = $_POST['key'];

    if ($key === 'login') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = mysqli_query($conn, "SELECT * FROM `users` WHERE username = '$username' AND password = '$password'");

        if (mysqli_num_rows($query) === 0) {
            echo "greska";
        } else {
            session_start();
            $row = mysqli_fetch_assoc($query);
            $_SESSION['userid'] = $row['userid'];
            echo "OK";
        }

    }

    mysqli_close($conn);
}
?>