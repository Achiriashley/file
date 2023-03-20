<?php

session_start();
$conn = mysqli_connect("localhost", "root", "", "cinemix") or die("Unable to connect to Database");

$query = "SELECT * 
          FROM users
         "; 
$result = mysqli_query($conn, $query);
if($result){
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $status = 'user';

    $errors = array();

    $uname = "SELECT username 
              FROM users
              WHERE username = '$username'
             ";
    $result1 = mysqli_query($conn, $uname);

    $em = "SELECT email 
            FROM users
            WHERE email = '$email'
          ";
    $result2 = mysqli_query($conn, $em);

    if(mysqli_num_rows($result1) > 0){
        echo'Username already exist';
    }

    elseif(mysqli_num_rows($result2) > 0){
        echo'Email already exist';
    }

    elseif(count($errors)== 0){
            $sql = "INSERT INTO users (firstname, lastname, username, email, password, status)
                    VALUES ('$firstname', '$lastname', '$username', '$email','$password', '$status')
                   ";
            $result3 = mysqli_query($conn, $sql);

            if($result3){
                $_SESSION['status'] = "Confirm your Details";
                header("Location:/cinemix/view/html/login.html");
                exit(0);
            }
    }
}
?>