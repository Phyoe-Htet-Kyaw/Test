<?php
    include_once "include/header.php";

    $user = new Utasks;
    if($user->middleware($_GET)){
        $res = $user->edit($_GET['id']); 
    }else{
      echo "<script>window.location.href='/ITsolution/admin/user_index.php'</script>";
    }

    $task = new Feedback;
    if($task->rate($_GET, $_POST)){
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
              <label>Feedback</label>
            </div>
            <form action="" method="post">
              <div class="form-group">              
                <label>Hello! <?php echo $res->name; ?>. Please give us your feedback.</label>
              </div>
              <div class="form-group">
                <label for="rating">Rating &nbsp; >> &nbsp; 1 &nbsp;</label>
                <input type="radio" name="rating" value="1">
                <input type="radio" name="rating" value="2">
                <input type="radio" name="rating" value="3">
                <input type="radio" name="rating" value="4">
                <input type="radio" name="rating" value="5">
                <label for="rating">&nbsp; 5</label>
              </div>
              <div class="form-group">
                <textarea name="feedback" class="form-control" rows="5" placeholder="Enter Feedback"></textarea>
              </div>
              <div class="form-group">
                <a href="user_index.php"><button type="button" name="back" class="btn btn-primary">Back</button></a>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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