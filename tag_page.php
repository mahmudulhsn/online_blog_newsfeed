<?php include('header.php'); ?>
<style type="text/css">
    
  </style>
  
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="category_post">
            <?php 
                if (isset($_GET['cat_id'])) {
                    $cat_id = $_GET['cat_id']; 
                }
             ?>
             <!-- <h2><?php echo $categorypost['cat_name']; ?></h2> -->

            <?php foreach (fetchCategoryPost($cat_id) as $categorypost): ?>
            
            <div class="single_post">
              <div class="row">
                <div class="col-md-4">
                  <a href="single_page.php?post_id=<?php echo $categorypost['post_id']; ?>"> <img src="admin/<?php echo $categorypost['post_thumb']; ?>" alt=""></a>
                </div>
                <div class="col-md-8">
                  <h3> <a href="single_page.php?post_id=<?php echo $categorypost['post_id']; ?>"><?php echo $categorypost['post_title']; ?> </a></h3>
                  <p><?php echo exerpt(html_entity_decode($categorypost['post_content']), 150) ?> <br> <a class="btn btn-info" href="single_page.php?post_id=<?php echo $categorypost['post_id']; ?>">Read More</a></p>
                </div>
              </div>
            </div>

            <?php endforeach; ?>
          </div>
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