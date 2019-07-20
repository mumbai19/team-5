<?php
include("security.php");
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
<div class="container-fluid">
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">
            EDIT Product
    </h6>
  </div>

  <div class="card-body">
  <?php
        
        if(isset($_POST['edit_btn'])){
            $id=$_POST['edit_id'];
            $sql="SELECT * FROM products WHERE product_id='$id'";
            $result=mysqli_query($con,$sql);
            foreach($result as $row)
            {
        ?>
        <form action="code.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">

<div class="modal-body">

    <div class="form-group">
        <label> Name </label>
        <input type="text" name="edit_name" value="<?php echo $row['product_title']; ?>" class="form-control" placeholder="Enter name">
    </div>
    <div class="form-group">
        <label>Price</label>
        <input type="text" name="edit_price" value="<?php echo $row['product_price']; ?>" class="form-control" placeholder="Enter Designation">
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea type="text" name="edit_description" class="form-control" placeholder="Enter Description"><?php echo $row['product_desc']; ?></textarea>
    </div>
    <div class="form-group">
        <label>Upload Image</label>
        <input type="file" name="product_image" id="faculty_image" value="<?php echo $row['product_image']; ?>" class="form-control" required>
    </div>
</div>
<div class="modal-footer">
    <a href="faculty.php" class="btn btn-danger">Cancel</a>
    <button type="submit" name="update_product_btn" class="btn btn-primary">Update</button>
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