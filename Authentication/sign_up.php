<?php
require "config.php";
    $username = $_POST['name'];
    $mobile = $_POST['mobile_no'];
    $password = $_POST['password'];
    $police_id = $_POST['police_id'];

    $conn = new mysqli('localhost','root','root','e_challan');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("connection failed :" .$conn->connect_error);
    }
    else{

        if(isset($_POST['d_sign'])){
            $stmt = $conn->prepare("insert into driver(name ,mobile ,password) values(?,?,?)");
            $stmt->bind_param("sis",$username,$mobile,$password);
            $execval = $stmt->execute();
            echo $execval;
            echo "Registeration successfull...";
            header('location:login.html');
            $stmt->close();
            
        }

        if(isset($_POST['p_sign'])){
            $stmt = $conn->prepare("insert into police(police_id, name, mobile, password) values(?,?,?,?)");
            $stmt->bind_param("isis",$police_id,$username,$mobile,$password);
            $execval = $stmt->execute();
            echo $execval;
            echo "Registeration Successfull...";
            header('location:login.html');
            $stmt->close();
        }
    }




?>