<?php
include("security.php");
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
<div class="container-fluid">
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">
            EDIT Faculty
    </h6>
  </div>

  <div class="card-body">
  <?php
        
        if(isset($_POST['edit_btn'])){
            $id=$_POST['edit_id'];
            $sql="SELECT * FROM products WHERE id='$id'";
            $result=mysqli_query($con,$sql);
            foreach($result as $row)
            {
        ?>
        <form action="code.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">

<div class="modal-body">

    <div class="form-group">
        <label> Name </label>
        <input type="text" name="edit_faculty_name" value="<?php echo $row['name']; ?>" class="form-control" placeholder="Enter name">
    </div>
    <div class="form-group">
        <label>Designation</label>
        <input type="text" name="edit_faculty_designation" value="<?php echo $row['designation']; ?>" class="form-control" placeholder="Enter Designation">
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea type="text" name="edit_faculty_description" class="form-control" placeholder="Enter Description"><?php echo $row['description']; ?></textarea>
    </div>
    <div class="form-group">
        <label>Upload Image</label>
        <input type="file" name="faculty_image" id="faculty_image" value="<?php echo $row['image']; ?>" class="form-control" required>
    </div>
</div>
<div class="modal-footer">
    <a href="faculty.php" class="btn btn-danger">Cancel</a>
    <button type="submit" name="update_faculty_btn" class="btn btn-primary">Update</button>
</div>
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