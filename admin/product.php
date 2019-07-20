<?php
include("security.php");
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

            <div class="form-group">
                <label> Name </label>
                <input type="text" name="pname" class="form-control" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="number" name="pprice" class="form-control" placeholder="Enter Price">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea type="text" name="pdescription" class="form-control" placeholder="Enter Description"></textarea>
            </div>
            <div class="form-group">
                <label>Upload Image</label>
                <input type="file" name="product_image" id="faculty_image" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Keyword</label>
                <input type="text" name="pkeyword" class="form-control" placeholder="Enter Keyword">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="save_product_user" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Faculty
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add
            </button>
    </h6>
    <hr>
  </div>

  <div class="card-body">
      <?php  
        if(isset($_SESSION['success']) && !empty($_SESSION['success'])){
            echo '<h2 class="bg-primary text-white">'.$_SESSION['success'].'</h2>';
            unset($_SESSION['success']);
        }
        if(isset($_SESSION['status']) && !empty($_SESSION['status'])){
            echo '<h2 class="bg-primary text-white">'.$_SESSION['status'].'</h2>';
            unset($_SESSION['status']);
        }
      ?>
      
    <div class="table-responsive">
        <?php
        $con=mysqli_connect("localhost","root","","trishul");
        $sql="SELECT * FROM products";
        $result=mysqli_query($con,$sql);
        ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Name </th>
            <th>Price</th>
            <th>Description</th>
            <th>Image</th>
            <th>Keyword</th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
     <?php
if(mysqli_num_rows($result)){
    while($row=mysqli_fetch_assoc($result)){

     ?>
          <tr>
            <td> <?php echo $row['product_id']; ?> </td>
            <td> <?php echo $row['product_title']; ?> </td>
            <td> <?php echo $row['product_price']; ?> </td>
            <td> <?php echo $row['product_desc']; ?> </td>
            <td> <?php echo '<img src="uploadd/'.$row['product_image'].'" width="100px" height="100px" alt="image">' ?> </td>
            <td><?php echo $row['product_keywords'];?></td>
            <td>
                <form action="product_edit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['product_id']; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="code.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row['product_id']; ?>">
                  <button type="submit" name="product_delete_btn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
          </tr>
          <?php
                }
            }else{
                echo "No record";
            }
            ?>
        
        </tbody>
      </table>


      </div>
  </div>
</div>

<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
