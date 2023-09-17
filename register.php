<?php
require_once 'connection.php';

if (isset($_POST['key'])) {

    $key = $_POST['key'];

    if ($key === 'reg') {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = mysqli_query($conn, "SELECT * FROM `users` WHERE username = '$username' AND password = '$password'");

        if (mysqli_num_rows($query) === 0) {
            $sql = "INSERT INTO `users` (`ime`, `username`, `password`) VALUES ('$name', '$username', '$password')";

            if ($conn->query($sql) === TRUE) {
                echo "OK";
            } else {
                echo "unsuccesful";
            }
        } else {
            echo 'user already exist';
        }
    }

    mysqli_close($conn);
}
?>