<!DOCTYPE html>
<html <?php language_attributes(); ?> lang="en">
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="icon" href="">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo THEME_URL;?>/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo THEME_URL;?>/css/reset.css">
    <link rel="stylesheet" type="text/css" href="<?php echo THEME_URL;?>/css/fonts.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo THEME_URL;?>/libraries/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo THEME_URL;?>/css/style.css">
    <!--script type="text/javascript" src="<?php echo THEME_URL;?>/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="<?php echo THEME_URL;?>/js/jquery-migrate-1.2.1.min.js"></script-->
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
    <div class="container-fluid header">
      <div class="container">
        <div class="row header-position">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <a href="<?php echo site_url(); ?>"><img src="<?php echo THEME_URL;?>/img/header-logo.jpg" class="header-logo img-responsive"></a>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
            <div class="redes-sociales-header">
              <?php
              if ( of_get_option('gaceta2015_facebook_url') ){
              ?>
              <a href="<?php echo of_get_option('gaceta2015_facebook_url'); ?>" target="_blank"><div class="icon-facebook"></div></a>
              <?php
              }
              ?>
              <?php
              if ( of_get_option('gaceta2015_twitter_url') ){
              ?>
              <a href="<?php echo of_get_option('gaceta2015_twitter_url'); ?>" target="_blank"><div class="icon-twitter"></div></a>
              <?php
              }
              ?>
              <?php
              if ( of_get_option('gaceta2015_instagram_url') ){
              ?>
              <a href="<?php echo of_get_option('gaceta2015_instagram_url'); ?>" target="_blank"><div class="icon-instagram"></div></a>
              <?php
              }
              ?>
              <?php
              if ( of_get_option('gaceta2015_youtube_url') ){
              ?>
              <a href="<?php echo of_get_option('gaceta2015_youtube_url'); ?>" target="_blank"><div class="icon-youtube"></div></a>
              <?php
              }
              ?>
              <?php
              if ( of_get_option('gaceta2015_foursquare_url') ){
              ?>
              <a href="<?php echo of_get_option('gaceta2015_foursquare_url'); ?>" target="_blank"><div class="icon-foursquare"></div></a>
              <?php
              }
              ?>
              <?php
              if ( of_get_option('gaceta2015_pinterest_url') ){
              ?>
              <a href="<?php echo of_get_option('gaceta2015_pinterest_url'); ?>" target="_blank"><div class="icon-pinterest"></div></a>
              <?php
              }
              ?>
            </div>
            <div class="header-search gotham-book">
              <form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' )); ?>">
                <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="SearchForm" class="gotham-book" placeholder="Buscar"/>
                <span class="line-search">|</span><img class="search" src="<?php echo THEME_URL;?>/img/btn_search.png">
              </form>
            </div>
            <div class="navbar-header">
              <button class="navbar-toggle collapsed false" aria-controls="navbar" data-toggle="collapse" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">
                <div class="logo-mobil">
                <img src="<?php echo THEME_URL;?>/img/header-logo.jpg" class="header-logo img-responsive"/>
                </div>
              </a>
              <div class="header-search gotham-book">
                <!--<input type="text" maxlength="64" id="SearchForm" class="gotham-book" placeholder="Buscar"/>-->
                <img class="search false" src="<?php echo THEME_URL;?>/img/btn_search.png">
              </div>
            </div>
            <!-- <div class="content-nav"> -->
              <?php 
              $menuArgs = array(
                'theme_location'  => 'gaceta_header_menu',
                'menu'            => '',
                'container'       => 'div',
                'container_class' => 'content-nav',
                'container_id'    => '',
                'menu_class'      => 'menu',
                'menu_id'         => '',
                'echo'            => true,
                'fallback_cb'     => 'wp_page_menu',
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'items_wrap'      => '<ul id="%1$s" class="header-menu gotham-bold %2$s">%3$s</ul>',
                'depth'           => 0,
                'walker'          => new gaceta2015_walker_nav_menu()
              );

              wp_nav_menu( $menuArgs ); ?>
              
            <!-- </div>   -->
          </div>
        </div>
        <div class="row menu-mobile">
          <div class="col-xs-7">
            <div class="content-nav">
              <ul class="header-menu gotham-bold">
                <?php echo gaceta2015_get_menu_item_mobil(2);?>
                <?php echo gaceta2015_get_menu_item_mobil(3);?>
                <?php echo gaceta2015_get_menu_item_mobil(4);?>
                <?php echo gaceta2015_get_menu_item_mobil(5);?>
              </ul>
              <div class="header-search gotham-book">
                <input type="text" maxlength="64" id="search" class="gotham-book" placeholder="Buscar"/>
                <div class="post-more">
                  <a href="" class="more-btn gotham-bold">
                  <span class="more-btn-wrap">
                    Buscar
                  </span>
                </a>
              </div>
              </div>
              <div class="close-menu">
                <img src="<?php echo THEME_URL;?>/img/close-menu-mobil.png"/>
              </div>
            </div> 
          </div>
        </div>
      </div>
    </div>
    