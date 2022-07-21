<?php
  include_once "include/header.php";

  $task = new Projects;
  if($task->middleware($_GET)){
      $res = $task->edit($_GET['id']); 
  }else{
    echo "<script>window.location.href='/ITsolution/admin/project_index.php'</script>";
  }

  if($task->update($_GET, $_POST, $_FILES)){
    echo "<script>window.location.href='/ITsolution/admin/project_index.php'</script>";
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
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12">
                    <label>EDIT PROJECT INFORMATIONS</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <input type="text" name="ptitle" class="form-control" value="<?php echo $res->title; ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <textarea name="description" class="form-control" rows="5" ><?php echo $res->description; ?></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <label for="exampleInputFile">Photo</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="user">Choose User</label>
                            <select name="user" id="user" class="form-control">
                                <?php
                                $user = new Utasks;
                                $user_data = $user->show();

                                foreach($user_data as $item){
                                ?>
                                <option value="<?php echo $item->id; ?>" <?php if($item->id == $res->user_id) echo "selected"; ?>><?php echo $item->name; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category">Choose Category</label>
                            <select name="category" id="category" class="form-control">
                                <?php
                                $category = new Procategory;
                                $category_data = $category->show();

                                foreach($category_data as $item){
                                ?>
                                <option value="<?php echo $item->id; ?>" <?php if($item->id == $res->category_id) echo "selected"; ?>><?php echo $item->name; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                          <a href="project_index.php"><button type="button" class="btn btn-primary btn-sm">Back</button></a>
                          <button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button>
                        </div>
                    </div>
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