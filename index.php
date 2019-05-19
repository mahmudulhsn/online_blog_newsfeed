<?php include('header.php'); ?>

<!-- Content area start here -->
  <section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider">

          <?php foreach (fetchAllSliderPost() as $sliderpost): ?>

          <div class="single_iteam"> <a href="single_page.php?post_id=<?php echo $sliderpost['post_id']; ?>"> <img src="admin/<?php echo $sliderpost['post_thumb']; ?>" alt=""></a>
            <div class="slider_article">
              <h2><a class="slider_tittle" href="single_page.php?post_id=<?php echo $sliderpost['post_id']; ?>"><?php echo $sliderpost['post_title']; ?></a></h2>

              <p><?php echo exerpt(html_entity_decode($sliderpost['post_content']), 300) ?> <br> <a class="btn btn-info" href="single_page.php?post_id=<?php echo $sliderpost['post_id']; ?>">Read More</a></p>
            </div>
          </div>

          <?php endforeach ?>

        </div>
      </div>
      <!-- latest post starts here  -->
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>Latest post</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
              <li>
                <div class="media"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                </div>
              </li>
              <li>
                <div class="media"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                </div>
              </li>
              <li>
                <div class="media"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                </div>
              </li>
              <li>
                <div class="media"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                </div>
              </li>
              <li>
                <div class="media"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                </div>
              </li>
            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_post_content">
            <h2><span>Sports</span></h2>

            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">

                <?php foreach (fetchFirstPostOfCagegory(8) as $firstpost): ?>
                  
                

                <li>
                  <figure class="bsbig_fig"> <a href="single_page.php?post_id=<?php echo $firstpost['post_id']; ?>" class="featured_img"> <img alt="" src="admin/<?php echo $firstpost['post_thumb']; ?>"> <span class="overlay"></span> </a>
                    <figcaption> <a href="single_page.php?post_id=<?php echo $firstpost['post_id']; ?>"><?php echo $firstpost['post_title']; ?></a> </figcaption>

                    <p><?php echo exerpt(html_entity_decode($firstpost['post_content']), 150) ?> <br> <a class="btn btn-info" href="single_page.php?post_id=<?php echo $firstpost['post_id']; ?>">Read More</a></p>
                  </figure>
                </li>

                <?php endforeach ?>

              </ul>
            </div>

            <div class="single_post_content_right">
              <ul class="spost_nav">

                <?php foreach (fetchSidePostsOfCagegory(8) as $sidepost): ?>
                  
                
                <li>
                  <div class="media wow fadeInDown"> <a href="single_page.php?post_id=<?php echo $sidepost['post_id']; ?>" class="media-left"> <img alt="" src="admin/<?php echo $sidepost['post_thumb']; ?>"> </a>
                    <div class="media-body"> <a href="single_page.php?post_id=<?php echo $sidepost['post_id']; ?>" class="catg_title"> <?php echo $sidepost['post_title']; ?></a> </div>
                  </div>
                </li>

               <?php endforeach ?>
                
              </ul>
            </div>
          </div>

          <div class="fashion_technology_area">
            <div class="fashion">
              <div class="single_post_content">
                <h2><span>National</span></h2>
                <ul class="business_catgnav wow fadeInDown">

                  <?php foreach (fetchFirstPostOfCagegory(10) as $firstpost): ?>

                  <li>
                    <figure class="bsbig_fig"> <a href="single_page.php?post_id=<?php echo $firstpost['post_id']; ?>" class="featured_img"> <img alt="" src="admin/<?php echo $firstpost['post_thumb']; ?>"> <span class="overlay"></span> </a>
                      <figcaption> <a href="single_page.php?post_id=<?php echo $firstpost['post_id']; ?>">Proin rhoncus consequat nisl eu ornare mauris</a> </figcaption>
                      <p><?php echo exerpt(html_entity_decode($firstpost['post_content']), 150) ?> <br> <a class="btn btn-info" href="single_page.php?post_id=<?php echo $firstpost['post_id']; ?>">Read More</a></p>
                    </figure>
                  </li>

                  <?php endforeach ?>

                </ul>
                <ul class="spost_nav">

                  <?php foreach (fetchSidePostsOfCagegory(10) as $sidepost): ?>

                  <li>
                    <div class="media wow fadeInDown"> <a href="single_page.php?post_id=<?php echo $sidepost['post_id']; ?>" class="media-left"> <img alt="" src="admin/<?php echo $sidepost['post_thumb']; ?>"> </a>
                      <div class="media-body"> <a href="single_page.php?post_id=<?php echo $sidepost['post_id']; ?>" class="catg_title"> <?php echo $sidepost['post_title']; ?></a> </div>
                    </div>
                  </li>

                  <?php endforeach ?>

                </ul>
              </div>
            </div>
            <div class="technology">
              <div class="single_post_content">
                <h2><span>Politics</span></h2>
                <ul class="business_catgnav">

                  <?php foreach (fetchFirstPostOfCagegory(9) as $firstpost): ?>

                  <li>
                    <figure class="bsbig_fig wow fadeInDown"> <a href="single_page.php?post_id=<?php echo $firstpost['post_id']; ?>" class="featured_img"> <img alt="" src="admin/<?php echo $firstpost['post_thumb']; ?>"> <span class="overlay"></span> </a>
                      <figcaption> <a href="single_page.php?post_id=<?php echo $firstpost['post_id']; ?>"><?php echo $firstpost['post_title']; ?></a> </figcaption>
                      <p><?php echo exerpt(html_entity_decode($firstpost['post_content']), 150) ?> <br> <a class="btn btn-info" href="single_page.php?post_id=<?php echo $firstpost['post_id']; ?>">Read More</a></p>
                    </figure>
                  </li>

                  <?php endforeach ?>

                </ul>
                <ul class="spost_nav">

                  <?php foreach (fetchSidePostsOfCagegory(9) as $sidepost): ?>

                  <li>
                    <div class="media wow fadeInDown"> <a href="single_page.php?post_id=<?php echo $sidepost['post_id']; ?>" class="media-left"> <img alt="" src="admin/<?php echo $sidepost['post_thumb']; ?>"> </a>
                      <div class="media-body"> <a href="single_page.php?post_id=<?php echo $sidepost['post_id']; ?>" class="catg_title"> <?php echo $sidepost['post_title']; ?></a> </div>
                    </div>
                  </li>

                  <?php endforeach ?>

                </ul>
              </div>
            </div>
          </div>
          <div class="single_post_content">
            <h2><span>Photography</span></h2>
            <ul class="photograph_nav  wow fadeInDown">
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img2.jpg" title="Photography Ttile 1"> <img src="images/photograph_img2.jpg" alt=""/></a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img3.jpg" title="Photography Ttile 2"> <img src="images/photograph_img3.jpg" alt=""/> </a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img4.jpg" title="Photography Ttile 3"> <img src="images/photograph_img4.jpg" alt=""/> </a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img4.jpg" title="Photography Ttile 4"> <img src="images/photograph_img4.jpg" alt=""/> </a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img2.jpg" title="Photography Ttile 5"> <img src="images/photograph_img2.jpg" alt=""/> </a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img3.jpg" title="Photography Ttile 6"> <img src="images/photograph_img3.jpg" alt=""/> </a> </figure>
                </div>
              </li>
            </ul>
          </div>
          <div class="single_post_content">
            <h2><span>Entertainment</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav">

                <?php foreach (fetchFirstPostOfCagegory(11) as $firstpost): ?>>

                <li>
                  <figure class="bsbig_fig  wow fadeInDown"> <a class="featured_img" href="single_page.php?post_id=<?php echo $firstpost['post_id']; ?>"> <img src="admin/<?php echo $firstpost['post_thumb']; ?>" alt=""> <span class="overlay"></span> </a>
                    <figcaption> <a href="single_page.php?post_id=<?php echo $firstpost['post_id']; ?>"> <?php echo $firstpost['post_title']; ?></a> </figcaption>
                    <p><?php echo exerpt(html_entity_decode($firstpost['post_content']), 150) ?> <br> <a class="btn btn-info" href="single_page.php?post_id=<?php echo $firstpost['post_id']; ?>">Read More</a></p>
                  </figure>
                </li>

                <?php endforeach ?>

              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">

                <?php foreach (fetchSidePostsOfCagegory(11) as $sidepost): ?>

                  <li>
                    <div class="media wow fadeInDown"> <a href="single_page.php?post_id=<?php echo $sidepost['post_id']; ?>" class="media-left"> <img alt="" src="admin/<?php echo $sidepost['post_thumb']; ?>"> </a>
                      <div class="media-body"> <a href="single_page.php?post_id=<?php echo $sidepost['post_id']; ?>" class="catg_title"> <?php echo $sidepost['post_title']; ?></a> </div>
                    </div>
                  </li>

                  <?php endforeach ?>

              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <?php include('right_sidebar.php'); ?>
      </div>
    </div>
  </section>

  <?php include('footer.php'); ?>