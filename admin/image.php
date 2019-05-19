<?php include('header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include('left_sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="display: inline-block;">
            Add New Post
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
                <div class="box box-primary">
                          
                        <?php 
                          if (isset($_POST['pub_post'])) {

                            $image_name    = $_FILES['image_name']['name'];
                            $temp          = $_FILES['image_name']['tmp_name'];
                            $dir           = "uploads/".$image_name;
                            echo $dir;
                            move_uploaded_file($temp, "uploads/".$image_name);


                            imageUp($dir);
                                    
                          }
                         ?> 


                        <!-- form start -->
                        <form action="" role="" method="POST" enctype="multipart/form-data">
                            <div class="box-body">

                                  <div class="form-group">
                                      <div class="imageupload panel panel-default">
                                        <div class="panel-heading clearfix">
                                            <h3 class="panel-title pull-left">Upload Image</h3>
                                            <div class="btn-group pull-right">
                                                <button type="button" class="btn btn-default active">File</button>
                                                <button type="button" class="btn btn-default">URL</button>
                                            </div>
                                        </div>
                                        <div class="file-tab panel-body">
                                            <label class="btn btn-default btn-file">
                                                <span>Browse</span>
                                                <!-- The file is stored here. -->
                                                <input type="file" name="image_name">
                                            </label>
                                            <button type="button" class="btn btn-default">Remove</button>
                                        </div>
                                        <div class="url-tab panel-body">
                                            <div class="input-group">
                                                <input type="text" class="form-control hasclear" placeholder="Image URL">
                                                <div class="input-group-btn">
                                                    <button type="button" class="btn btn-default">Submit</button>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-default">Remove</button>
                                            <!-- The URL is stored here. -->
                                            <input type="hidden" name="image-url">
                                        </div>
                                    </div>
                                  </div>
                            </div>
                            <!-- /.box-body -->
              
                            <div class="box-footer">
                              <!-- <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button> -->
                              <input type="submit" class="btn btn-success" value="Publish Post" name="pub_post">
                            </div>
                          </form>




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