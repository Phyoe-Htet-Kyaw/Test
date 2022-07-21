<?php
  include_once "include/header.php";

  $task = new Utasks;
  if($task->middleware($_GET)){
      $res = $task->edit($_GET['id']); 
  }else{
    echo "<script>window.location.href='/ITsolution/admin/user_index.php'</script>";
  }

  if($task->update($_GET, $_POST, $_FILES)){
    echo "<script>window.location.href='/ITsolution/admin/user_index.php'</script>";
  }
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
                <label>Edit User Data</label>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <input type="text" name="uname" class="form-control" value="<?php echo $res->name; ?>">
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
                <input type="email" name="email" class="form-control" value="<?php echo $res->email; ?>">
              </div>
              <div class="form-group">
                <input type="password" name="pass" class="form-control" value="<?php echo $res->password; ?>">
              </div>
              <div class="form-group">
                <a href="user_index.php"><button type="button" class="btn btn-primary btn-sm">Back</button></a>
                <button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button>
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