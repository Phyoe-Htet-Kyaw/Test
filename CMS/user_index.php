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
                <div class="form-group">
                  <a href="user_create.php"><button class="btn btn-primary">Add New User</button></a>
                </div>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>User ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Options</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $task = new Utasks;
                      $data = $task->show();
                      $i = 1;
                      foreach($data as $item){
                    ?>
                    <tr>
                      <td><?php echo $i; $i++; ?></td>
                      <td><?php echo $item->name ?></td>
                      <td><?php echo $item->email ?></td>
                      <td>**********</td>
                      <td>
                        <a href="user_edit.php?id=<?php echo $item->id; ?>"><button type="button" class="btn btn-warning btn-sm">Edit</button></a>
                        <a href="user_delete.php?id=<?php echo $item->id; ?>"><button type="button" class="btn btn-danger btn-sm">Delete</button></a>
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