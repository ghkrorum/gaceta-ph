<?php get_header();?>
    <div class="container-fluid slide-home">
      <?php
      $posts = gaceta2015_get_zone_posts( 4, GACETA_ZONA_1 );
      ?>
      <?php if( !empty($posts) ): ?>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="main-slider-cont">
            <?php 
            foreach ($posts as $post){
              setup_postdata($post);
              $image = gaceta2015_get_custom_field_image('imagen_destacada','thumb-640x500', 'img-responsive');
              if ($image){
            ?>
            <div class="slide gotham-bold">
              <?php 
              echo $image;
              $termObj = gaceta2015_get_post_term($post->ID);
              ?>
              <div class="slide-txt">
                <div class="slide-txt-wrap">
                  <?php
                  if ($termObj){
                    $termName = $termObj->name;
                    $termLink = $termObj->link;
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
            <a href="#" class="slider-prev"><img src="<?php echo THEME_URL;?>/img/post/post-slide-prev.png" class="post-slide-prev img-responsive"/></a>
            <a href="#" class="slider-next"><img src="<?php echo THEME_URL;?>/img/post/post-slide-next.png" class="post-slide-next img-responsive"/></a>
          </div>
        </div>
      </div>
      <?php endif; ?>
    </div>
    <div class="container-fluid content-home">
      <div class="container">
        <div class="row banner">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <img class="img-responsive" src="<?php echo THEME_URL;?>/img/banner-970x90.jpg">
          </div>
        </div>
        <div class="row section">
          <?php
          $posts = gaceta2015_get_zone_posts( 3, GACETA_ZONA_2 );
          if ($posts){
            foreach ( $posts as $post ){
              setup_postdata($post);
              $termObj = gaceta2015_get_post_term($post->ID);
              $termName = '';
              $termLink = '';
              if ( $termObj ){
                $termName = $termObj->name;
                $termLink = $termObj->link;
              }
              
              
              $image = gaceta2015_get_custom_field_image('imagen_destacada','thumb-308x308', 'img-responsive');
          ?>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <h1 class="title gotham-bold"><?php echo $termName;?></h1>
            <?php
            if ($image){
            ?>
            <a href="<?php the_permalink(); ?>">
              <?php echo $image;?>
            </a>
            <?php
            }
            ?>
            <a href="<?php the_permalink(); ?>">
            <div class="sub-title gotham-bold"><?php the_title(); ?></div>
            </a>
            <?php 
            if ( !empty($termLink) ){
            ?>
            <div class="post-more">
              <a href="<?php echo $termLink;?>" class="more-btn gotham-bold">
                <span class="more-btn-wrap">
                  <?php echo MORE_TEXT.$termName;?>
                </span>
              </a>
            </div>
            <?php
            }
            ?>
          </div>
          <?php
            }
          }
          ?>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="line-section"></div>
          </div>
        </div>
        <div class="row section-2">
          <?php
          $posts = gaceta2015_get_zone_posts( 1, GACETA_ZONA_3 );
          if ( $posts ){
            $post = current($posts);
            setup_postdata($post);
            $termObj = gaceta2015_get_post_term($post->ID);
            $termName = '';
            $termLink = '';
            if ( !empty($termObj) ){
              $termName = $termObj->name;
              $termLink = $termObj->link;
            }
            $image = gaceta2015_get_custom_field_image('imagen_destacada','thumb-308x308', 'img-responsive');
          ?>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <div class="content-image">
              <?php 
              if ($image){
              ?>
              <a href="<?php the_permalink(); ?>"><?php echo $image;?></a>
              <?php
              }
              ?>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <div class="post-c-cat gotham-bold">
              <?php
              if ( !empty($termLink) ){
              ?>
              <a href="<?php echo $termLink;?>"><?php echo $termName;?></a>
              <?php
              }
              ?>
            </div>
            <h2 class="post-c-title gotham-bold">
              <a href=""><?php the_title(); ?></a>
            </h2>
            <div class="post-c-summary sentinel-book">
              <?php the_excerpt_max_charlength(160);?>
            </div>
            <?php
            if ( !empty($termLink) ){
            ?>
            <a href="<?php echo $termLink;?>" class="more-btn gotham-bold">
              <span class="more-btn-wrap">
                <?php echo MORE_TEXT.$termName;?>
              </span>
            </a>
            <?php
            }
            ?>
          </div>
          <?php
          }
          ?>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <img class="img-responsive" src="<?php echo THEME_URL;?>/img/300x250.png">
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="line-section"></div>
          </div>
        </div>
        <?php
        $idObj = get_term_by( 'slug', 'cita', GACETA_TAXONOMY);
        $termId = $idObj->term_id;
        $post = gaceta2015_get_last_post_by_category($termId);
        if ($post){
          setup_postdata($post);
          $cita = get_field('cita');
          $autor = get_field('cita_autor');
          $twitterTxt = $cita.' - '.$autor;
        ?>
        <div class="row section-3">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 quote">
            <div class="quote-txt sentinel-book italic">
              "<?php echo $cita;?>".
            </div>
            <div class="quote-author sentinel-book">
              <?php echo $autor;?>
            </div>
            <div class="quote-social">
              <a href="#"><img src="<?php echo THEME_URL;?>/img/quote-ico-face.png"></a>
              <a href="https://twitter.com/intent/tweet?text=<?php echo $twitterTxt;?>" id="cita-twitter-btn"><img src="<?php echo THEME_URL;?>/img/twitter-section-3.png"></a>
            </div>
          </div>
        </div>
        <?php
        }
        ?>
        <div class="row section-4">
          <?php
          $idObj = get_term_by( 'slug', 'videos', GACETA_TAXONOMY);
          $termId = $idObj->term_id;
          $videos = gaceta2015_get_posts_by_category( $termId, 3);
          if ( !empty( $videos ) ){
          ?>
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-6">
            <div class="section-title gotham-bold">
                VIDEOS
            </div>
            <?php
            foreach ($videos as $post){
              setup_postdata($post);
              $videoUrl = gaceta2015_get_video_url(get_field('video_url'));
            ?>
            <div class="video">
              <iframe width="638" height="358" src="<?php echo $videoUrl;?>" frameborder="0" allowfullscreen></iframe>  
            </div>
            <?php
              break;
            }
            reset($videos);
            ?>
            <div class="video-list">
              <?php
              $videoCount = 0;
              foreach ($videos as $post){
                $itemClass = '';
                setup_postdata($post);
                $videoUrl = gaceta2015_get_video_url(get_field('video_url'));
                $image = gaceta2015_get_custom_field_image('imagen_destacada','thumb-200x116', 'img-responsive');
                if ($image){
                  if ($videoCount == 1){
                    $itemClass = 'video-center';
                  }
              ?>
              <div class="video-list-item <?php echo $itemClass;?>">
                <a href="<?php echo  $videoUrl;?>">
                  <?php echo $image;?>
                  <h3 class="video-title gotham-book">
                    <?php the_title(); ?>
                  </h3>
                </a>
              </div>
              <?php
                  $videoCount++;
                }
              }
              ?>
            </div>
            <div class="content-button-video">
              <a href="<?php echo get_term_link( $termId, GACETA_TAXONOMY );?>" class="more-btn gotham-bold">
                <span class="more-btn-wrap">
                  Más videos
                </span>
              </a>
            </div>
          </div>
          <?php
          }
          ?>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
            
            <?php echo gaceta2015_get_popular_posts_block(NULL);?>

          </div> 
        </div>
        <div class="row section-5">
          <?php
          $posts = gaceta2015_get_zone_posts( 1, GACETA_ZONA_4 );
          if ($posts){
              $post = current($posts);
              setup_postdata($post);
              $termObj = gaceta2015_get_post_term($post->ID);
              $termName = '';
              $termLink = '';
              
              if ( !empty($termObj) ){
                $termName = $termObj->name;
                $termLink = $termObj->link;
              }

              $image = gaceta2015_get_custom_field_image('imagen_destacada','thumb-310x310', 'img-responsive bolsa');
          ?>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <?php
              if ($image){
              ?>
              <a href="<?php the_permalink(); ?>"><?php echo $image;?></a>
              <?php
              }
              ?>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <div class="post-c-cat gotham-bold">
              <?php 
              if (!empty($termLink)){
              ?>
              <a href="<?php echo $termLink;?>"><?php echo $termName;?></a>
              <?php
              }
              ?>
            </div>
            <h2 class="post-c-title gotham-bold">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
            <div class="post-c-summary sentinel-book">
              <?php the_excerpt_max_charlength(160);?>
            </div>
            <?php 
            if (!empty($termLink)){
            ?>
            <a href="<?php echo $termLink;?>" class="more-btn gotham-bold">
              <span class="more-btn-wrap">
                <?php echo MORE_TEXT.$termName;?>
              </span>
            </a>
            <?php
            }
            ?>
          </div>
          <?php
          }
          ?>
          <?php
          $idObj = get_term_by( 'slug', 'mundo-amarillo', GACETA_TAXONOMY);
          $termId = $idObj->term_id;
          $post = gaceta2015_get_last_post_by_category($termId);
            if ($post){
              setup_postdata($post);
              $image = gaceta2015_get_custom_field_image('imagen_destacada','thumb-274x201', 'img-responsive');
          ?>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <div class="section-title gotham-bold">
              <a href="<?php echo get_term_link( $termId, GACETA_TAXONOMY );?>">Mundo amarillo</a>
            </div>
            <div class="yellow-b-col">
              <?php
              if ($image){
              ?>
              <a href="<?php the_permalink(); ?>"><?php echo $image;?></a>
              <?php
              }
              ?>
              <h2 class="yellow-b-title gotham-bold">
                <a href="<?php the_permalink(); ?>"><?php the_title();?></a>
              </h2>
            </div>
            <div class="break"></div>
          </div>
          <?php
          }
          ?>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="line-section"></div>
          </div>
        </div>
        <div id="general-posts">
          <?php
          $posts = gaceta2015_get_posts_exclude_custom_taxonomy(4);
          if ($posts){
          ?>
          <div class="row section-6">
            <?php
            foreach ( $posts as $post ){
              setup_postdata( $post );
              $category = get_the_category();
              $termObj = gaceta2015_get_post_term($post->ID);
              $catName = (!empty($termObj))?$termObj->name:'';
              $image = gaceta2015_get_custom_field_image('imagen_destacada','thumb-310x310', 'img-responsive');
            ?>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
              <div class="category-posts-item">
                <div class="section-title gotham-bold">
                  <?php echo $catName;?>
                </div>
                <a href="<?php the_permalink(); ?>">
                  <?php if (!empty($image)){ 
                    echo $image;
                  }
                  ?>
                <h2 class="category-posts-item-tit gotham-book"><?php the_title(); ?></h2></a>
              </div>
            </div>  
            <?php
            }
            ?>
          </div>
        </div>
        <div class="row section-7">
          <div class="lg-col-12 col-md-12 col-sm-12 col-xs-12 hallazgos-content">
            <a href="" class="more-btn gotham-bold load-more-posts" data-offset='4'>
              <span class="more-btn-wrap">
                Cargar Más
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