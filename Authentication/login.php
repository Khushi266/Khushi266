<?php
require "config.php";

$conn = new mysqli('localhost','root','root','e_challan');
if($conn->connect_error){
        echo "$conn->connect_error";
        die("connection failed :" .$conn->connect_error);
}
else{
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    
    if(isset($_POST['d_login'])){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
         $username = $_POST["username"];
         $password = $_POST["password"];
         $sql = "SELECT * FROM driver WHERE name='$username' and password='$password'";
         if($conn->query($sql))
         {
            $_SESSION['username'] = $username;
            header('Location: driver_dashboard.php');
            exit();
         }
        }
    }

    if(isset($_POST['p_login'])){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $police_id = $_POST['police_id'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM police WHERE police_id='$police_id' and password='$password'";
            if($conn->query($sql)){
                $_SESSION['police_id'] = $police_id;
                $_SESSION['username'] = $username;
                header('location: driver_dashboard.php');
                exit();
            }
        }
    }
}





?>