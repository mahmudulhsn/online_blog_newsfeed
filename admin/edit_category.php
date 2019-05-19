<?php include('header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php if(!is_admin(get_username('username'))){redirect('index.php');} ?>
<?php include('left_sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="display: inline-block;">
        Add new Category
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
            <?php 
              if (isset($_GET['editid'])) {
                $id = $_GET['editid'];
              }
             ?>
             
            <?php 
              if (isset($_POST['update_cat'])) {
                $cat_name = $_POST['cat_name'];

                if (empty($cat_name)) {
                  echo "<h2 class='text btn-danger'>Field must not be empty.</h2>";
                }else{
                  if (!categoryExists($cat_name)) {
                    if (addNewCategory($cat_name)) {
                      echo "<h2 class='text btn-success'>Category Created Successfully.</h2>";
                    }
                  }else{
                    echo "<h2 class='text btn-danger'>Category Already exists.</h2>";
                  }
                }
              }
             ?>

             <?php foreach (findCategory($id) as $category): ?>
             
                    <!-- form start -->
                <form role="form" method="POST">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="cat_name">Category Name</label>
                      <input type="text" class="form-control" id="cat_name" placeholder="Category Name" name="cat_name" value="<?php echo $category['cat_name']; ?>">
                    </div>
                  </div>
                  <!-- /.box-body -->
    
                  <div class="box-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Reset</button>
                      <input type="submit" class="btn btn-success" value="Update Category" name="update_cat">
                    </div>
                </form>

                <?php endforeach ?>

            </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php include('footer.php');?>