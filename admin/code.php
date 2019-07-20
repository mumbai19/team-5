<?php
include("security.php");
include("database/dbconfig.php");

if(isset($_POST['registerbtn'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirmpassword=$_POST['confirmpassword'];
    $usertype=$_POST['usertype'];

    if($password==$confirmpassword){
        $sql="INSERT INTO register (username,email,password,usertype) VALUES('$username','$email','$password','$usertype')";
        $result=mysqli_query($con,$sql);
        if($result){
            $_SESSION['success']="Admin Profile Added.";
        header("Location:register.php");
        }else{
            $_SESSION['status']="Admin Profile Not Added.";
            header("Location:register.php");
        }
    }
    else{
        $_SESSION['status']="Password and Confirm password are not same.";
        header("Location:register.php");
    }
}
if(isset($_POST['updatebtn'])){

    $id=$_POST['edit_id'];
    $username=$_POST['edit_username'];
    $email=$_POST['edit_email'];
    $password=$_POST['edit_password'];
    $usertype=$_POST['update_usertype'];

    $sql="UPDATE register SET username='$username',email='$email',password='$password',usertype='$usertype' WHERE id='$id'";
    $result=mysqli_query($con,$sql);
        if($result){
            $_SESSION['success']="Admin Profile Updated.";
        header("Location:register.php");
        }else{
            $_SESSION['status']="Admin Profile Not Updated.";
            header("Location:register.php");
        }
}

if(isset($_POST['delete_btn'])){

    $id=$_POST['delete_id'];
    $sql="DELETE FROM register WHERE id='$id'";
    $result=mysqli_query($con,$sql);
        if($result){
            $_SESSION['success']="Admin Profile DELETED.";
        header("Location:register.php");
        }else{
            $_SESSION['status']="Admin Profile Not DELETED.";
            header("Location:register.php");
        }
}

if(isset($_POST['about_save'])){
    $title=$_POST['title'];
    $subtitle=$_POST['subtitle'];
    $description=$_POST['description'];
    $links=$_POST['links'];

    $sql="INSERT INTO aboutus (title,subtitle,description,links) VALUES('$title','$subtitle','$description','$links')";
        $result=mysqli_query($con,$sql);
        if($result){
            $_SESSION['success']="About us Updated.";
        header("Location:aboutus.php");
        }else{
            $_SESSION['status']="About us Not Updated.";
            header("Location:aboutus.php");
        }
}

if(isset($_POST['about_updatebtn'])){

    $id=$_POST['edit_id'];
    $title=$_POST['edit_title'];
    $subtitle=$_POST['edit_subtitle'];
    $description=$_POST['edit_description'];
    $links=$_POST['edit_links'];

    $sql="UPDATE aboutus SET title='$title',subtitle='$subtitle',description='$description',links='$links' WHERE id='$id'";
    $result=mysqli_query($con,$sql);
        if($result){
            $_SESSION['success']="About Us Updated.";
        header("Location:aboutus.php");
        }else{
            $_SESSION['status']="About Us Not Updated.";
            header("Location:aboutus.php");
        }
}

if(isset($_POST['about_delete_btn'])){

    $id=$_POST['delete_id'];
    $sql="DELETE FROM aboutus WHERE id='$id'";
    $result=mysqli_query($con,$sql);
        if($result){
            $_SESSION['success']="About Us DELETED.";
            header("Location:aboutus.php");
        }else{
            $_SESSION['status']="About Us Not DELETED.";
            header("Location:aboutus.php");
        }
}

if(isset($_POST['save_product_user'])){

//    echo var_dump($_POST);
    


    $name=$_POST['pname'];
    $price=$_POST['pprice'];
    $description=$_POST['pdescription'];
    $image=$_FILES["product_image"]['name'];
    $keyword=$_POST['pkeyword'];

        move_uploaded_file($_FILES["product_image"]["tmp_name"],"uploadd/".$_FILES["product_image"]["name"]);
        $sql="INSERT INTO products (product_title,product_price,product_desc,product_image,product_keywords) VALUES('$name','$price','$description','$image','$keyword')";
        echo $sql;
        $result=mysqli_query($con,$sql);
        echo $result;
        /*
        if($result){
            $_SESSION['success']="product Added.";
            header("Location:product.php");
        }else{
            echo $sql;
            $_SESSION['status']="product Not Added";
            header("Location:product.php");
        }
        */
}
if(isset($_POST['update_product_btn']))
{
    $id=$_POST['edit_id'];
    $name=$_POST['edit_name'];
    $designation=$_POST['edit_price'];
    $description=$_POST['edit_description'];
    $image=$_FILES["product_image"]['name'];

    $sql="UPDATE products SET product_name='$name',product_price='$price',product_desc='$description',product_image='$image' WHERE product_id='$id'";
    $result=mysqli_query($con,$sql);

    if($result){
        move_uploaded_file($_FILES["product_image"]["tmp_name"],"uploadd/".$_FILES["product_image"]["name"]);
        $_SESSION['success']="Product Updated.";
        header("Location:product.php");
    }else{
        $_SESSION['status']="Product Not Updated.";
        header("Location:product.php");
    }
}

if(isset($_POST['product_delete_btn']))
{
    $id=$_POST['delete_id'];
    $sql="DELETE FROM products WHERE id='$id'";
    $result=mysqli_query($con,$sql);
        if($result){
            $_SESSION['success']="product DELETED.";
            header("Location:product.php");
        }else{
            $_SESSION['status']="product Not DELETED.";
            header("Location:product.php");
        }
}
