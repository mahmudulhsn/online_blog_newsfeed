<?php include('header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php if(!is_admin(get_username('username'))){redirect('index.php');} ?>
<?php include('left_sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="display: inline-block;">
        Categories
      </h1>

      <a href="add_category.php" class="btn btn-success pull-right"> <i class="fa fa-plus"></i> &nbsp; Add New Category</a>
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
                  <th>SL</th>
                  <th>Categoty Name</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                <?php 
                  if (isset($_GET['deleteid'])) {
                    $id = $_GET['deleteid'];
                    if (deleteCategory($id)) {
                      echo "<h2 class='alert alert-success'>Category deleted successfully.</h2>";
                    }
                  }
                 ?>
                <?php $i = 1;  foreach (fetchAllCategory() as $category): ?>

                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $category['cat_name']; ?></td>
                  <td>
                    <a href="edit_category.php?editid=<?php echo $category['cat_id'];?>" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                    <a href="all_category.php?deleteid=<?php echo $category['cat_id'];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-trash"></i> Delete</a> 
                  </td>
                </tr>

                <?php endforeach ?>

                </tbody>
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