<?php get_header();?>
<?php
$categoryId = get_query_var('cat');
$termArray = array();
$termArray[] = array('term_id' => $categoryId, 'taxonomy' => 'category');
?>
    <?php 
    $posts = gaceta2015_get_zone_posts( 4, GACETA_ZONA_1, $termArray);
    if ($posts){
    ?>
    <div class="container-fluid slide-home">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="main-slider-cont">
            <?php
            foreach ($posts as $post){
              setup_postdata($post);
              $image = gaceta2015_get_custom_field_image('imagen_destacada','thumb-640x500', 'img-responsive');
              if ($image){
                $termObj = gaceta2015_get_post_term($post->ID);
            ?>
            <div class="slide gotham-bold">
              <?php echo $image;?>
              <div class="slide-txt">
                <div class="slide-txt-wrap">
                  <?php
                  if ($termObj){
                    $termLink = $termObj->link;
                    $termName = $termObj->name;
                  ?>
                  <div class="slide-txt-section"><a href="<?php echo $termLink;?>"><?php echo $termName;?></a></div>
                  <?php
                  }
                  ?>
                  <h2 class="slide-txt-title"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                </div>
              </div>
            </div>
            <?php
              }
            }
            ?>
            <a href="#"><img src="<?php echo THEME_URL;?>/img/post/post-slide-prev.png" class="post-slide-prev img-responsive"/></a>
            <a href="#"><img src="<?php echo THEME_URL;?>/img/post/post-slide-next.png" class="post-slide-next img-responsive"/></a>
          </div>
        </div>
      </div>
    </div>
    <?php
    }
    ?>
    <div class="container-fluid content-home">
      <div class="container">
        <div class="row banner">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <img class="img-responsive" src="<?php echo THEME_URL;?>/img/banner-970x90.jpg">
          </div>
        </div>
        <?php
        $posts = gaceta2015_get_zone_posts( 5, GACETA_ZONA_2, $termArray);
        // $posts = gaceta2015_get_custom_taxonomy_posts($categoryId, 5);
        if (!empty($posts)){
          $countPosts = 0;
          $totalPosts = count($posts);
        ?>
        <div class="row section home-2">
          <?php
          for ($countPosts = 0 ;  $countPosts < 3 && $countPosts < $totalPosts ; $countPosts++ ){
            $post = $posts[$countPosts];
            setup_postdata($post);
            $seccion = gaceta2015_get_seccion_term($post->ID, 'category');
            $img = gaceta2015_get_custom_field_image('imagen_destacada', 'thumb-280x280', 'img-responsive');
          ?>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <?php
            if ($seccion){
              $termLink = get_term_link( $seccion, GACETA_TAXONOMY );
              $termName = $seccion->name;
            ?>
            <h1 class="title gotham-bold"><?php echo $termName;?></h1>
            <?php
            }
            ?>
            <div class="background-image">
              <?php
              if ($img){
              ?>
              <a href="<?php the_permalink(); ?>">
                <?php echo $img;?>
              </a>
              <?php 
              }
              ?>
            </div>
            <a href="<?php the_permalink(); ?>">
            <div class="sub-title gotham-bold"><?php the_title(); ?></div>
            </a>
          </div>
          <?php
          }
          ?>
        </div>
        <div class="row section home-2">
          <?php
          for ( ;  $countPosts < $totalPosts ; $countPosts++ ){
            $post = $posts[$countPosts];

            setup_postdata($post);
            $seccion = gaceta2015_get_seccion_term($post->ID, 'category');
            $img = gaceta2015_get_custom_field_image('imagen_destacada', 'thumb-280x280', 'img-responsive');
          ?>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <?php
            if ($seccion){
              $termLink = get_term_link( $seccion, 'category' );
              $termName = $seccion->name;
            ?>
            <h1 class="title gotham-bold"><?php echo $termName;?></h1>
            <?php
            }
            ?>
            <div class="background-image">
              <?php
              if ($img){
              ?>
              <a href="<?php the_permalink(); ?>">
                <?php echo $img;?>
              </a>
              <?php
              }
              ?>
            </div>
            <a href="<?php the_permalink(); ?>">
            <div class="sub-title gotham-bold"><?php the_title(); ?></div>
            </a>
          </div>
          <?php
          }
          ?>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <img class="img-responsive home-2" src="<?php echo THEME_URL;?>/img/300x250.png">
          </div>
        </div>
        <?php
        }
        ?>
        <div class="row">
          <div class="col-lg-12">
            <div class="line-section"></div>
          </div>
        </div>
        <div class="row section-4 home-2-4">
          <?php
          $posts = gaceta2015_get_custom_taxonomy_posts_by_custom_term($categoryId, 'videos', 3);
          ?>
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-6">
            <?php
            if (!empty($posts)){
              $post = $posts[0];
              setup_postdata($post);
              $videoUrl = gaceta2015_get_video_url(get_field('video_url'));
            ?>
            <div class="section-title gotham-bold">
                VIDEOS
            </div>
            <div class="video">
              <iframe width="638" height="358" src="<?php echo $videoUrl;?>" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="video-list">
              <?php
              $videoCount = 0;
              foreach ($posts as $post){
                setup_postdata($post);
                $videoUrl = gaceta2015_get_video_url(get_field('video_url'));
                $img = gaceta2015_get_custom_field_image('imagen_destacada', 'thumb-280x280', 'img-responsive');
                $itemClass = '';
                if ($img){
                  if ($videoCount == 1){
                    $itemClass = 'video-center';
                  }
              ?>
              <div class="video-list-item <?php echo $itemClass;?>">
                <a href="<?php echo $videoUrl; ?>">
                  <?php echo $img;?>
                  <h3 class="video-title gotham-book">
                    <?php the_title(); ?>
                  </h3>
                </a>
              </div>
              <?php
                }
                $videoCount++;
              }
              ?>
            </div>
            <div class="content-button-video">
              <a href="<?php echo get_term_link( 'videos', GACETA_TAXONOMY );?>" class="more-btn gotham-bold">
                <span class="more-btn-wrap">
                  Más videos
                </span>
              </a>
            </div>
            <?php
            }
            ?>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
            <?php 
            echo gaceta2015_get_popular_posts_block($categoryId);
            ?>
          </div> 
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="line-section"></div>
          </div>
        </div>
        <?php
        $posts = gaceta2015_get_cat_posts_exclude_custom_taxonomy($categoryId, 4);
        if (!empty($posts)){

        ?>
        <div class="row section-6">
          <?php
          foreach ($posts as $post){
            setup_postdata( $post );
            $category = get_the_category();
            $catName = (!empty($category))?$category[0]->name:'';
            $img = gaceta2015_get_custom_field_image('imagen_destacada', 'thumb-225x225', 'img-responsive');
          ?>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <div class="category-posts-item">
              <div class="section-title gotham-bold">
                <?php echo $catName;?>
              </div>
              <a href="<?php the_permalink(); ?>">
                <?php echo $img;?>
                <h2 class="category-posts-item-tit gotham-book"><?php the_title(); ?></h2>
              </a>
            </div>
          </div>  
          <?php
          }
          ?>
        </div>
        <div class="row section-7">
          <div class="lg-col-12 col-md-12 col-sm-12 col-xs-12 hallazgos-content">
            <a href="" class="more-btn gotham-bold">
              <span class="more-btn-wrap">
                Cargar más
              </span>
            </a>
          </div>
        </div>
        <?php
        }
        ?>
      </div>  
    </div>
<?php get_footer(); ?>