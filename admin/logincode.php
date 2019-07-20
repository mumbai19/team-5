<?php
include("security.php");

if(isset($_POST['login_btn'])){
    $email_login=$_POST['emaill'];
    $password_login=$_POST['passwordd'];
    $sql="SELECT * FROM register WHERE email='$email_login' AND password='$password_login'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result);
    if($row['usertype'] == "admin"){
        $_SESSION['username']=$email_login;
        header("Location:index.php");
    }else if($row['usertype'] == "user"){
        $_SESSION['username']=$email_login;
        header("Location:../index.php");
    }
    else{
        $_SESSION['status']="Invalid credential!!";
        header("Location:login.php");
    }
}

?>