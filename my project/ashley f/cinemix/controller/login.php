<?php

session_start();
$conn = mysqli_connect("localhost", "root", "", "cinemix") or die("Unable to connect to Database");

if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * 
              FROM users
              WHERE username = '$username' AND
                    password = '$password'
             ";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    if(is_array($row)){
        $_SESSION["username"] = $row["username"];
        $_SESSION["email"] = $row["email"];
        $_SESSION["status"] = $row["status"];
        
        if(isset($_SESSION["username"])){
            header("location:/cinemix/view/html/homepage.html");
        }
    }
    else{
        echo "wrong username or password";
    }
}

?>