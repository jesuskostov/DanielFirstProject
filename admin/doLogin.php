<?php
include "../php/connection.php";

session_start();
if (isset($_POST['login']))
{
    $username = $_POST['name'];
    $password = $_POST['password'];

	$result = $mysqli->query("SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password'") or die($mysqli->error);

    if (mysqli_num_rows($result)>0){
        $_SESSION['username'] = $username;
        header("Location: about.php?username=$username");
    } else {
        header("Location: login.php?error=Не сте се логнали!");
    }

}
