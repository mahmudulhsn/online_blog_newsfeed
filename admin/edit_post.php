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
                          if (isset($_GET['editid'])) {
                            $id = $_GET['editid'];
                          }
                         ?>
                          
                        <?php 
                          if (isset($_POST['pub_post'])) {

                            $post_title    = $_POST['post_title'];
                            $post_content  = htmlentities($_POST['post_content']);
                            $post_tags     = $_POST['post_tags'];
                            $cat_id        = $_POST['cat_id'];
                            $author_id     = $_POST['author_id'];

                            $post_thumb    = $_FILES['post_thumb']['name'];
                            $temp          = $_FILES['post_thumb']['tmp_name'];
                            $dir           = "uploads/".$post_thumb;


                            if (empty($post_title) || empty($post_content) || empty($post_thumb) || empty($cat_id) || empty($author_id) ) {
                                echo "<h2 class='text btn-danger'>Error!! Field must not be empty.</h2>";
                              }
                              else{
                                if (postUpdate($id, $post_title, $post_content, $dir, $post_tags, $cat_id, $author_id)) {

                                      move_uploaded_file($temp, "uploads/".$post_thumb);
                                   echo "<h2 class='text btn-success'>Post Updated successfully.</h2>";
                                    }else{
                                      echo "<h2 class='text btn-danger'>Error!!</h2>";
                                    }
                              }
                          }
                         ?>

                         <?php foreach (findpost($id) as $post): ?>

                        <!-- form start -->
                        <form action="" role="" method="POST" enctype="multipart/form-data">
                            <div class="box-body">
                                  <div class="form-group">
                                      <label for="post_title">Title</label>
                                      <input type="text" class="form-control" id="post_title" placeholder="Title" name="post_title" value="<?php echo $post['post_title']; ?>">
                                  </div>
                                  <div class="form-group">
                                      <label for="post_tags">Tags</label>
                                      <input type="text" class="form-control" id="post_tags" placeholder="Tags separated with commas..." name="post_tags" value="<?php echo $post['post_tags']; ?>">
                                  </div>
                                  <div class="form-group">
                                    <label>Select category</label>
                                    <select class="form-control select2" style="width: 100%;" name="cat_id">
                                      <option selected="selected" >---Select a Category---</option>
                                        <?php foreach (fetchAllCategory() as $category): ?>
                                        <option value="<?php echo $category['cat_id']; ?>"><?php echo $category['cat_name']; ?></option>
                                        <?php endforeach ?>

                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label>Select Author</label>
                                    <select class="form-control select2" style="width: 100%;" name="author_id">
                                      <option selected="selected">---Select An Author---</option>
                                        <?php foreach (fetchAllAuthor() as $author): ?>
                                        <option value="<?php echo $author['author_id']; ?>"><?php echo $author['author_name']; ?></option>
                                         <?php endforeach ?>
                                    </select>
                                  </div>

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
                                                <input type="file" name="post_thumb">
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

                                 
                                  <div class="form-group">
                                      <label for="branchAddress">Content</label>
                                      <textarea id="editor1" rows="10" cols="80" name="post_content"><?php echo $post['post_content']; ?></textarea>
                                  </div>
                            </div>
                            <!-- /.box-body -->
              
                            <div class="box-footer">
                              <!-- <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button> -->
                              <input type="submit" class="btn btn-success" value="Publish Post" name="pub_post">
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