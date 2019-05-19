<?php include('header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include('left_sidebar.php'); ?>
<?php if(!is_admin(get_username('username'))){redirect('index.php');} ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="display: inline-block;">
        Authors
      </h1>

      <a href="add_author.php" class="btn btn-success pull-right"> <i class="fa fa-plus"></i> &nbsp; Add New Author</a>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SL/th>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Password</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                <?php 
                  if (isset($_GET['deleteid'])) {
                    $id = $_GET['deleteid'];
                    if (deleteAuthor($id)) {
                      echo "<h2 class='alert alert-success'>Author deleted successfully.</h2>";
                    }
                  }
                 ?>
                <?php
                  $i = 1;
                  foreach (fetchAllAuthor() as $author): 
                ?>

                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $author['author_name']; ?></td>
                  <td><?php echo $author['author_username']; ?></td>
                  <td><?php echo $author['author_email']; ?></td>
                  <td><?php echo $author['author_role']; ?></td>
                  <td><?php echo $author['author_pass']; ?></td>
                  <td>
                    <a href="edit_author.php?editid=<?php echo $author['author_id'];?>" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                    <a href="all_author.php?deleteid=<?php echo $author['author_id'];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-trash"></i> Delete</a> 
                  </td>
                </tr>
                
                <?php endforeach ?>

                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include('footer.php');?>