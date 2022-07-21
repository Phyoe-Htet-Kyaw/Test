<?php
    include_once "include/header.php";  
?>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">DataTable with minimal features & hover style</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="form-group">
              <label>Add New User</label>
            </div>
            <?php
              $task = new Utasks;
              if($task->input($_POST, $_FILES)){
                echo "<script>window.location.href='/ITsolution/admin/user_index.php'</script>";
              }
            ?>
            <form action="" method="post" enctype="multipart/form-data">                  
              <label>User Informations</label>
              <div class="form-group">
                <input type="text" name="uname" class="form-control" placeholder="Enter User Name">
              </div>                 
              <div class="form-group">
                <label for="exampleInputFile">Photo</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="photo" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose Photo</label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Enter Email Address">
              </div>                     
              <div class="form-group">
                <input type="password" name="pass" class="form-control" placeholder="Enter Password">
              </div>                                
              <div class="form-group">
                <a href="user_index.php"><button type="button" name="back" class="btn btn-primary">Back</button></a>
                <button type="submit" name="submit" class="btn btn-primary">Add User</button>
              </div>   
            </form>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->

<?php include_once "include/footer.php"; ?>