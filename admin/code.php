<?php
include("security.php");
include("dbconfig.php");

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

if(isset($_POST['save_faculty'])){
    $name=$_POST['faculty_name'];
    $keyword=$_POST['faculty_keyword'];
    $description=$_POST['faculty_description'];
    $image=$_FILES["faculty_image"]['name'];
    $price=$_POST['price'];

    if(file_exists("upload/".$_FILES["faculty_image"]["name"]))
    {
        $store=$_FILES["faculty_image"]["name"];
        $_SESSION['status']="Image already exists '.$store'";
        header("Location:faculty.php");

    }
    else
    {
        move_uploaded_file($_FILES["faculty_image"]["tmp_name"],"upload/".$_FILES["faculty_image"]["name"]);
        $sql="INSERT INTO products (product_title,product_price,product_desc,product_image,product_keyword) VALUES('$name','$price','$description','$image','$keyword')";
        $result=mysqli_query($con,$sql);
        if($result){
            $_SESSION['success']="Faculty Added.";
            header("Location:faculty.php");
        }else{
            $_SESSION['status']="Faculty Not Added.";
            header("Location:faculty.php");
        }
    }     
}

if(isset($_POST['update_faculty_btn']))
{
    $id=$_POST['edit_id'];
    $name=$_POST['edit_faculty_name'];
    $designation=$_POST['edit_faculty_designation'];
    $description=$_POST['edit_faculty_description'];
    $image=$_FILES["faculty_image"]['name'];

    $sql="UPDATE faculty SET name='$name',designation='$designation',description='$description',image='$image' WHERE id='$id'";
    $result=mysqli_query($con,$sql);

    if($result){
        move_uploaded_file($_FILES["faculty_image"]["tmp_name"],"upload/".$_FILES["faculty_image"]["name"]);
        $_SESSION['success']="Faculty Updated.";
        header("Location:faculty.php");
    }else{
        $_SESSION['status']="Faculty Not Updated.";
        header("Location:faculty.php");
    }
}

if(isset($_POST['faculty_delete_btn']))
{
    $id=$_POST['delete_id'];
    $sql="DELETE FROM faculty WHERE id='$id'";
    $result=mysqli_query($con,$sql);
        if($result){
            $_SESSION['success']="Faculty DELETED.";
            header("Location:faculty.php");
        }else{
            $_SESSION['status']="Faculty Not DELETED.";
            header("Location:faculty.php");
        }
}

if(isset($_POST['search_data'])){
    $id=$_POST['id'];
    $visible=$_POST['visible'];

    $sql="UPDATE faculty SET visible='$visible' WHERE id='$id'";
    $result=mysqli_query($con,$sql);

}

if(isset($_POST['del_mul_rec'])){
    $id=1;
    $sql="DELETE FROM faculty WHERE visible='$id'";
    $result=mysqli_query($con,$sql);
        if($result){
            $_SESSION['success']="Faculties DELETED.";
            header("Location:faculty.php");
        }else{
            $_SESSION['status']="Faculties Not DELETED.";
            header("Location:faculty.php");
        }
}
?>