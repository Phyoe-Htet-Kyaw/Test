<?php include_once "include/header.php"; ?>

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
                <div class="row">
                    <div class="col-12">
                        <label>BLOG INFORMATIONS</label>
                    </div>
                </div>
                <div class="form-group">
                    <a href="blog.php"><button type="button" class="btn btn-primary">Add New Blog</button></a>
                </div>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>User</th>
                        <th>Category</th>
                        <th>Tag</th>
                        <th>Options</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $task = new Btasks;
                        $data = $task->show();
                        $i = 1;
                        foreach($data as $item){
                    ?>
                    <tr>
                      <td><?php echo $i; $i++; ?></td>
                      <td><?php echo $item->title ?></td>
                      <td><?php echo $item->description ?></td>
                      <td><?php echo $item->user ?></td>
                      <td><?php echo $item->category ?></td>
                      <td><?php echo $item->tag?></td>
                      <td>
                        <a href="blog_edit.php?id=<?php echo $item->id; ?>"><button type="button" class="btn btn-warning btn-sm">Edit</button></a>
                        <a href="blog_delete.php?id=<?php echo $item->id; ?>"><button type="button" class="btn btn-danger btn-sm">Delete</button></a>
                      </td>
                    </tr>
                    <?php
                      }                
                    ?>
                  </tbody>
                </table>
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
  <!-- /.content-wrapper -->
  
<?php include_once "include/footer.php"; ?>