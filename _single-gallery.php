<?php
the_post();
$postUrl = get_permalink();

?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">
    <title>Galeria</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo THEME_URL;?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo THEME_URL;?>/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo THEME_URL;?>/css/reset.css">
    <link rel="stylesheet" type="text/css" href="<?php echo THEME_URL;?>/css/fonts.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo THEME_URL;?>/libraries/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo THEME_URL;?>/css/style.css">
    <?php 
    wp_head();
    ?>
    <script type="text/javascript" src="<?php echo THEME_URL;?>/libraries/slick/slick.min.js"></script>
    <script type="text/javascript" src="<?php echo THEME_URL;?>/js/main.js"></script>
  </head>
  <body>
    <div class="container-fluid top-belt">
      <div class="row">
        <div class="col-lg-12"></div>
      </div>
    </div>
    <div class="container-fluid content-post galeria">
      <div class="row">
        <div class="col-lg-10 col-md-7 col-sm-8 col-xs-7 width-slider">
          <div class="post-col1">
            <div class="content-logo">
               <a href="<?php echo site_url(); ?>"><img src="<?php echo THEME_URL;?>/img/header-logo.jpg" class="img-responsive"></a>
            </div>
            <?php
              if( have_rows('galeria') ):
              ?>
            <div id="gallery-slider" class="post-slider cycle-slideshow"
              data-cycle-fx=scrollHorz
              data-cycle-timeout=0
              data-cycle-caption="#gallery-caption"
              data-cycle-next="#gallery-next"
              data-cycle-prev="#gallery-prev"
              data-cycle-caption-template="<span class='active gotham-bold'>{{slideNum}} </span><span class='total-img gotham-book'>/ {{slideCount}}</span>"
              data-cycle-slides="> div"
            >
              <?php
              $i = 0;
              $carouselImages = array();
              while ( have_rows('galeria') ) : the_row();
                $image = get_sub_field('imagen');
                $imgClass = 'img-responsive';
                $contentClass = '';
                if ($i > 0){
                  $contentClass = ' none';
                }
                $img = gaceta2015_get_acf_image_thumbnail($image, 'large', $imgClass);
                $carouselImages[] = $img;
                if ($img){
                   $caption = get_field('custom_caption', $image['id']);
                   $description = get_field('custom_description', $image['id']);
                   if ( $i==0 ){
                    $firstCaption = $caption;
                    $firstDescription = $description;
                   }
                ?>
                  <div class="slide post-slider-wrap <?php echo $contentClass;?>">
                    <?php echo $img;?>
                    <div class="gallery-item-title none"><?php echo $image['title'];?></div>
                    <div class="gallery-item-caption none">
                      <?php echo $caption;?>
                    </div>
                    <div class="gallery-item-description none">
                      <?php echo $description;?>
                    </div>
                  </div>
                <?php
                }
                $i++;
              endwhile;
              ?>
              <a href="#" id="gallery-prev"><img src="<?php echo THEME_URL;?>/img/post/post-slide-prev.png" class="post-slide-prev img-responsive"/></a>
              <a href="#" id="gallery-next"><img src="<?php echo THEME_URL;?>/img/post/post-slide-next.png" class="post-slide-next img-responsive"/></a>
            </div>
            <?php
            endif;
            ?>
          </div>  
        </div>
        <div class="col-lg-2 col-md-5 col-sm-4 col-xs-5 width-sidebar">
          <div class="content-sidebar">
            <div class="post-slider-bottom">
              <div class="control-pagination">
                <a href="<?php echo $postUrl;?>">
                  <img class="close-galery" src="<?php echo THEME_URL;?>/img/galeria/btn_closefullgallery.png"/>
                </a>
                <div class="content-img">
                  <div id="gallery-caption">
                    
                  </div>
                  <img src="<?php echo THEME_URL;?>/img/post/img_pagination.jpg"/>
                  <img src="<?php echo THEME_URL;?>/img/post/img_pagination.jpg"/>
                  <img src="<?php echo THEME_URL;?>/img/post/img_pagination.jpg"/>
                </div>
              </div>
              <div class="title-galery gotham-bold">CAmpo de título mucho futuro para un nuevo clásico</div>
              <div class="description-galery sentinel-book">
                <?php echo $firstDescription;?>
              </div>
              <div class="footer-galery gotham-book">
                <span class="gotham-bold"><?php echo $firstCaption;?>
              </div>
              <ul class="redes-sociales-galery">
                <li><img src="<?php echo THEME_URL;?>/img/galeria/btn_gallery_facebook.jpg"/></li>
                <li><img src="<?php echo THEME_URL;?>/img/galeria/btn_gallery_twitter.jpg"/></li>
                <li><img src="<?php echo THEME_URL;?>/img/galeria/btn_gallery_pinterest.jpg"/></li>
                <li><img src="<?php echo THEME_URL;?>/img/galeria/btn_gallery_mail.jpg"/></li>
              </ul>  
            </div>
            <div class="aside-galery">
                <img class="img-responsive" src="<?php echo THEME_URL;?>/img/galeria/img_banner.jpg"/>
            </div>
          </div>
        </div> 
      </div> 
    </div>       
    <script src="<?php echo THEME_URL;?>/js/bootstrap.min.js"></script>
  </body>
</html>