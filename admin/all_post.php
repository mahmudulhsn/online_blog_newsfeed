<?php include('header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include('left_sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="display: inline-block;">
            Posts
      </h1>

      <a href="add_post.php" class="btn btn-success pull-right"> <i class="fa fa-plus"></i> &nbsp; Add New Posts</a>
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
                        <th>Thumbnail</th>
                        <th>Title</th>
                        <th>Publishing Date</th>
                        <th>Category</th>
                        <!-- <th>Author</th>-->                      
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php 
                      if (isset($_GET['deleteid'])) {
                        $id = $_GET['deleteid'];
                        if (deletePost($id)) {
                          echo "<h2 class='alert alert-success'>Post deleted successfully.</h2>";
                        }
                      }
                     ?>
                     
                    <?php $i=1; foreach (fetchAllPost() as $post): ?>
                         
                    <tr>
                        <td> <?php echo $i++; ?></td>
                        <td> <img src="<?php echo $post['post_thumb']; ?>" alt="" style="height: 40px; width: 80px;"></td>
                        <td> <?php echo $post['post_title']; ?></td>
                        <td> <?php echo $post['publishing_date']; ?></td>
                        <td> <?php echo $post['cat_name']; ?></td>
                       <!--  <td> <?php echo $post['author_name']; ?></td> -->
                        <td>
                            <a href="edit_post.php?editid=<?php echo $post['post_id'];?>" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                            <a href="all_post.php?deleteid=<?php echo $post['post_id'];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-trash"></i> Delete</a> 
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