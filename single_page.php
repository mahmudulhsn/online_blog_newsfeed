<?php include('header.php'); ?>
<style type="text/css">
    
  </style>
  
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          
          <?php 
              if (isset($_GET['post_id'])) {
                  $post_id = $_GET['post_id'];                  
                  post_view_count($post_id);
              }
           ?>

          <?php foreach (fetchSinglePost($post_id) as $singlepost): ?>

          <div class="single_page">
            <ol class="breadcrumb">
              <li><a href="index.php">Home</a></li>
              <li><a href="#"><?php echo $singlepost['cat_name'];  ?></a></li>
              <!-- <li class="active">Mobile</li> -->
            </ol>
            <h1><?php echo $singlepost['post_title'];  ?></h1>
            <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i><?php echo $singlepost['author_name'];  ?></a> <span><i class="fa fa-calendar"></i> <?php echo date_format(date_create($singlepost['publishing_date']),'d M, Y'); ?></span> <a href="category.php?cat_id=<?php echo $singlepost['cat_id']; ?>"><i class="fa fa-tags"></i><?php echo $singlepost['cat_name'];  ?></a> <span><i class="fa fa-eye"></i> <?php echo $singlepost['count_post_views']; ?></span></div>
            <div class="single_page_content"> <img class="img-center" src="admin/<?php echo $singlepost['post_thumb']; ?>" alt="">
              <p> <?php echo html_entity_decode($singlepost['post_content']);  ?></p>
              <?php fetchPostTags($post_id); ?>
              
              <!-- <button class="btn default-btn">Default</button>
              <button class="btn btn-red">Red Button</button>
              <button class="btn btn-yellow">Yellow Button</button>
              <button class="btn btn-green">Green Button</button>
              <button class="btn btn-black">Black Button</button>
              <button class="btn btn-orange">Orange Button</button>
              <button class="btn btn-blue">Blue Button</button>
              <button class="btn btn-lime">Lime Button</button>
              <button class="btn btn-theme">Theme Button</button> -->
            </div>
            <div class="social_link">
              <ul class="sociallink_nav">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
              </ul>
            </div>
            <div class="all-comments">
              <ul>
                <?php foreach (fetchComments($post_id) as $comments): ?>
                <li class="wow fadeInDown">
                  <p><?php echo $comments['cmnt_body']; ?></p>
                  <span class="right">Commented by <?php echo $comments['cmnt_name']; ?></span>
                </li>
                <?php endforeach; ?>
              </ul>
            </div>
            <div class="comments">
              <h2>Comment:</h2>
              <?php 
                if (isset($_POST['post_cmnt'])) {
                  $cmnt_name = $_POST['cmnt_name'];
                  $cmnt_body = $_POST['cmnt_body'];
                  $postid = $post_id;

                  if (empty($cmnt_name) || empty($cmnt_body)) {
                    echo "<h2 class='text text-danger'>Error! Field must not be empty.</h2>";
                  }else{
                    if (addComment($cmnt_name, $cmnt_body, $postid)) {
                       echo "<h2 class='text text-success'>Comment Added Successfully.</h2>";
                    }else{
                      echo "<h2 class='text text-danger'>Error! Comment does not Added Successfully</h2>";
                    }
                  }
                }
               ?>
              <form action="" method="POST">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Name</label>
                  <input type="text" class="form-control <?php if(isset($_POST['post_cmnt']) && empty($_POST['cmnt_name'])){echo 'is-invalid';} ?>" id="exampleFormControlInput1" placeholder="Enter Name..." name="cmnt_name">

                  <?php if(isset($_POST['post_cmnt']) && empty($_POST['cmnt_name'])): ?>
                    <strong class="text text-danger"><?php echo 'Name is required !'; ?></strong>
                  <?php endif; ?>

                </div>
                <!-- <div class="form-group">
                  <label for="exampleFormControlInput1">Email address</label>
                  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div> -->

                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Your Comment</label>
                  <textarea class="form-control <?php if(isset($_POST['post_cmnt']) && empty($_POST['cmnt_body'])){echo 'is-invalid';} ?>" id="exampleFormControlTextarea1" rows="3" name="cmnt_body"></textarea>
                  <?php if(isset($_POST['post_cmnt']) && empty($_POST['cmnt_body'])): ?>
                    <strong class="text text-danger"><?php echo 'Message is required !'; ?></strong>
                  <?php endif; ?>
                </div>
                <input class="btn btn-primary" type="submit" value="Post" name="post_cmnt">
              </form>
            </div>
            

            <div class="related_post">
              <h2>Related Post <i class="fa fa-thumbs-o-up"></i> 
                      <h3> <?php echo $singlepost['cat_name']; ?></h3></h2>
              <ul class="spost_nav wow fadeInDown animated">

                <?php foreach (fetchRelatedPost($singlepost['cat_name'], $post_id) as $reltedpost): ?>

                <li>
                  <div class="media"> <a class="media-left" href="single_page.php?post_id=<?php echo $reltedpost['post_id']; ?>"> <img src="admin/<?php echo $reltedpost['post_thumb']; ?>" alt=""> </a>
                    <div class="media-body"> <a class="catg_title" href="single_page.php?post_id=<?php echo $reltedpost['post_id']; ?>"> <?php echo $reltedpost['post_title']; ?></a> </div>
                  </div>
                </li>
                <?php endforeach; ?>

                
              </ul>
            </div>

          </div>

          <?php endforeach ?>

        </div>
      </div>

      <nav class="nav-slit"> 
        <a class="prev" href="#"> 
          <span class="icon-wrap"><i class="fa fa-angle-left"></i></span>
        <div>
          <h3>City Lights</h3>
          <img src="../images/post_img1.jpg" alt=""/> 
        </div>
        </a> <a class="next" href="#"> <span class="icon-wrap"><i class="fa fa-angle-right"></i></span>
        <div>
          <h3>Street Hills</h3>
          <img src="../images/post_img1.jpg" alt=""/> </div>
        </a> 
      </nav>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <?php include('right_sidebar.php'); ?>
      </div>
    </div>
  </section>

<?php include('footer.php'); ?>