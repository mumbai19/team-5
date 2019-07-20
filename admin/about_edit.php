<?php
include("security.php");
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
<div class="container-fluid">
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">
            EDIT About Us
    </h6>
  </div>

  <div class="card-body">
  <?php
        if(isset($_POST['edit_btn'])){
            $id=$_POST['edit_id'];
            $sql="SELECT * FROM aboutus WHERE id='$id'";
            $result=mysqli_query($con,$sql);
            foreach($result as $row)
            {
        ?>
        <form action="code.php" method="POST">
        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label> Title </label>
                <input type="text" name="edit_title" value="<?php echo $row['title']; ?>" class="form-control" placeholder="Enter Title">
            </div>
            <div class="form-group">
                <label>Sub Title</label>
                <input type="text" name="edit_subtitle" class="form-control" value="<?php echo $row['subtitle']; ?>" placeholder="Enter Subtitle">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="edit_description" class="form-control" rows="4" cols="30" placeholder="Enter Description"><?php echo $row['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label>Links</label>
                <input type="text" name="edit_links" class="form-control" value="<?php echo $row['links']; ?>" placeholder="Enter Links">
            </div>
            <a href="aboutus.php" class="btn btn-danger">Cancel</a>
            <button type="submit" name="about_updatebtn" class="btn btn-primary">Update</button>
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