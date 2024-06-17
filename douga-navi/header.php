<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
 <meta charset="<?php bloginfo('charset'); ?>">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta name="format-detection" content="telephone=no">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link rel=”icon” href=“/image/favicon.ico”>
 <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
 <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
 <?php wp_body_open(); ?>
 <header class="p-header l-header">

  <h1 class="p-header__logo">
   <a href="<?php echo esc_url(home_url('/')); ?>">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/logo.svg" alt="こどものこおりごきげん" width="227" height="99">
   </a>
  </h1>

  <nav class="p-header__nav u-headerDesktop">
   <ul class="p-header__navItems">
    <li class="p-header__navItem">
     <a href="<?php echo esc_url(home_url('/#gokigen')); ?>" data-en="What's GOKIGEN">ごきげんとは？</a>
    </li>
    <li class="p-header__navItem">
     <a href="<?php echo esc_url(home_url('/#movie')); ?>" data-en="MOVIE">ごきげんムービー</a>
    </li>
    <li class="p-header__navItem">
     <a href="<?php echo esc_url(home_url('/#use')); ?>" data-en="HOW TO USE">おすすめの使い方</a>
    </li>
    <li class="p-header__navItem">
     <a href="<?php echo esc_url(home_url('/#recipe')); ?>" data-en="RECIPE">ごきげんレシピ</a>
    </li>
    <li class="p-header__navItem">
     <a href="<?php echo esc_url(home_url('/#about')); ?>" data-en="ABOUT US">単結晶氷とは？</a>
    </li>
    <li class="p-header__navItem">
     <a href="<?php echo esc_url(home_url('/#store')); ?>" data-en="STORE">購入はこちら</a>
    </li>
   </ul>
  </nav>






  <!-- ハンバーガーメニュー -->
  <button class="p-header__hamburger js-hamburger u-mobile">
   <span></span>
   <span></span>
   <span></span>
  </button>

  <!-- ドロワーメニュー -->
  <nav class="p-header__drawer js-header-nav u-mobile">
   <div class="p-header__drawerWrap">
    <div class="p-header__drawerBody">
     <ul class="p-header__drawerItems">
      <li class="p-header__drawerItem">
       <a href="<?php echo esc_url(home_url('/#gokigen')); ?>" data-en="What's GOKIGEN">ごきげんとは？</a>
      </li>
      <li class="p-header__drawerItem">
       <a href="<?php echo esc_url(home_url('/#movie')); ?>" data-en="MOVIE">ごきげんムービー</a>
      </li>
      <li class="p-header__drawerItem">
       <a href="<?php echo esc_url(home_url('/#use')); ?>" data-en="HOW TO USE">おすすめの使い方</a>
      </li>
      <li class="p-header__drawerItem">
       <a href="<?php echo esc_url(home_url('/#recipe')); ?>" data-en="RECIPE">ごきげんレシピ</a>
      </li>
      <li class="p-header__drawerItem">
       <a href="<?php echo esc_url(home_url('/#about')); ?>" data-en="ABOUT US">単結晶氷とは？</a>
      </li>
      <li class="p-header__drawerItem">
       <a href="<?php echo esc_url(home_url('/#store')); ?>" data-en="STORE">購入はこちら</a>
      </li>
     </ul>


    </div>
   </div>

  </nav>


 </header>