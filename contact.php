<?php include('header.php'); ?>
<style type="text/css">
    .is-invalid{
      border-color: red;
    }
  </style>

  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="contact_area">
            <h2>Contact Us</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labolore magna aliqua. Ut enim ad minim veniam. Lorem ipsum dosectetur adipisicing elit, sed do.Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

            <?php 
              if (isset($_POST['send_msg'])) {
                $msg_name = $_POST['msg_name']; 
                $msg_email = $_POST['msg_email']; 
                $msg_body = $_POST['msg_body'];

                if (empty($msg_name) || empty($msg_email) || empty($msg_body)) {
                  echo "<h2 class='text btn-danger'>Error! Field must not be empty.</h2>";
                }else{
                  if (addMessage($msg_name, $msg_email, $msg_body)) {
                    echo "<h2 class='text btn-success'>Message Send Successfully.</h2>";
                  }else{
                    echo "<h2 class='text btn-danger'>Error! Message does not Send Successfully</h2>";
                  }
                }
              }
             ?>

            <form action="" class="contact_form" method="POST">

              <?php if(isset($_POST['send_msg']) && empty($_POST['msg_name'])): ?>
                <strong class="text text-danger"><?php echo 'Name is required !'; ?></strong>
              <?php endif; ?>
              <input class="form-control <?php if(isset($_POST['send_msg']) && empty($_POST['msg_name'])){echo 'is-invalid';} ?>" type="text" placeholder="Name*" name="msg_name">
              
              
              <?php if(isset($_POST['send_msg']) && empty($_POST['msg_email'])): ?>
                <strong class="text text-danger"><?php echo 'Email is required !'; ?></strong>
              <?php endif; ?>
              <input class="form-control <?php if(isset($_POST['send_msg']) && empty($_POST['msg_email'])){echo 'is-invalid';} ?>" type="email" placeholder="Email*" name="msg_email">
              

              <?php if(isset($_POST['send_msg']) && empty($_POST['msg_body'])): ?>
                <strong class="text text-danger"><?php echo 'Email is required !'; ?></strong>
              <?php endif; ?>
              <textarea class="form-control <?php if(isset($_POST['send_msg']) && empty($_POST['msg_body'])){echo 'is-invalid';} ?>" cols="30" rows="10" placeholder="Message*" name="msg_body"></textarea>
              
              <input type="submit" name="send_msg" value="Send Message" name=>
            </form>

          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>Popular Post</span></h2>
            <ul class="spost_nav">

              <?php foreach (popilarPost() as $popularpost): ?>
              
              <li>
                <div class="media wow fadeInDown"> <a href="single_page.php?post_id=<?php echo $popularpost['post_id']; ?>" class="media-left"> <img alt="" src="admin/<?php echo $popularpost['post_thumb']; ?>"> </a>
                  <div class="media-body"> <a href="single_page.php?post_id=<?php echo $popularpost['post_id']; ?>" class="catg_title"> <?php echo $popularpost['post_title']; ?></a> </div>
                </div>
              </li>

              <?php endforeach; ?>

            </ul>
          </div>
        </aside>
      </div>
    </div>
  </section>
  
  <?php include('footer.php'); ?>