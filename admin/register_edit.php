<?php
include("security.php");
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
<div class="container-fluid">
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">
            EDIT Admin Profile
    </h6>
  </div>

  <div class="card-body">
  <?php
        if(isset($_POST['edit_btn'])){
            $id=$_POST['edit_id'];
            $sql="SELECT * FROM register WHERE id='$id'";
            $result=mysqli_query($con,$sql);
            foreach($result as $row)
            {
        ?>
        <form action="code.php" method="POST">
        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label> Username </label>
                <input type="text" name="edit_username" value="<?php echo $row['username']; ?>" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="edit_email" class="form-control" value="<?php echo $row['email']; ?>" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="edit_password" class="form-control" value="<?php echo $row['password']; ?>" placeholder="Enter Password">
            </div>
            <div class="form-group">
            <label>User Type</label>
            <select name="update_usertype" class="form-control">
            <option value="admin">Admin</option>
            <option value="user">User</option>
            </select>
            </div>
            <a href="register.php" class="btn btn-danger">Cancel</a>
            <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>
      </form>
      <?php
 }
}
      ?>
  </div>

</div>
</div>
<?php
include('includes/footer.php');
?>