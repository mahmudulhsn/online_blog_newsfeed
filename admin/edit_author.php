<?php include('header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include('left_sidebar.php'); ?>
  <?php if(!is_admin(get_username('username'))){redirect('index.php');} ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="display: inline-block;">
            Update Author
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
                  if (isset($_POST['update_reg'])) {
                    $author_name = $_POST['author_name']; 
                    $author_email = $_POST['author_email']; 
                    $author_role = $_POST['author_role']; 
                    $author_pass = $_POST['author_pass'];

                    if (empty($author_name) || empty($author_email) || empty($author_role) || empty($author_pass)) {
                      echo "<h2 class='text btn-danger'>Field must not be empty.</h2>";
                    }else{
                       if (authorUpdate($id, $author_name, $author_email, $author_role, $author_pass)) {
                            echo "<h2 class='text btn-success'>Author Update successfully.</h2>";
                      }else{
                         echo "<h2 class='text btn-danger'>ERROR!!</h2>";
                      }
                    }
                  }
                 ?>

                 <?php foreach (findAuthor($id) as $author): ?>
   

                        <!-- form start -->
                        <form role="form" method="POST">
                            <div class="box-body">
                                <div class="form-group">
                                  <label for="author_name">Name</label>
                                  <input type="text" class="form-control" id="author_name" placeholder="Author Name" name="author_name" value="<?php echo $author['author_name']; ?>">
                                </div>
                                <div class="form-group">
                                  <fieldset disabled>
                                  <label for="author_username">Username <span style="font-style: italic;">(Username can not be changed)</span></label>
                                  <input min="1" type="text" class="form-control" id="author_username" placeholder="Author Username" name="author_username" value="<?php echo $author['author_username']; ?>">
                                  </fieldset>
                                </div>
                                <div class="form-group">
                                  <label for="author_email">Email</label>
                                  <input min="1" type="text" class="form-control" id="author_email" placeholder="Author Email" name="author_email" value="<?php echo $author['author_email']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Select Role</label>
                                    <select class="form-control select2" style="width: 100%;" name="author_role">
                                        <option selected="selected" value="admin">Admin</option>
                                        <option value="author">Author</option>
                                    </select>
                                  </div>
                                <div class="form-group">
                                  <label>Password</label>
                                  <input type="password" class="form-control" placeholder="Password" name="author_pass" value="<?php echo $author['author_pass']; ?>">
                                </div>
                              </div>
                              <!-- /.box-body -->
            
                            <div class="box-footer">
                              <!-- <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button> -->
                              <input type="submit" class="btn btn-success" name="update_reg" value="Update" >
                            </div>
                        </form>
 <?php endforeach; ?>

                      </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include('footer.php'); ?>