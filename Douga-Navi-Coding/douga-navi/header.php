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
 <header class="p-header">
  <div class="p-header__inner">
   <div class="p-header__aboveRow">

    <div class="p-header__aboveLeft">
     <a href="#" class="p-header__logoLink">
      <figure class="p-header__logo">
       <img src="<?php echo get_template_directory_uri() ?>/assets/images/logo01.svg" alt="動画制作ナビ" width="156" height="28">
      </figure>
     </a>
     <div class="p-header__searchBox">
      <?php get_search_form(); ?>
     </div>
    </div>
    <div class="p-header__aboveRight">
     <div class="p-header__drawerBtn js-headerDrawer">
      <figure>
       <img src="<?php echo get_template_directory_uri() ?>/assets/images/ico_search.png" alt="" width="17" header="20">
      </figure>
     </div>
     <div class="p-header__cntctInfo">
      <a href="tel:0354436700" class="p-header__tel">03-5443-6700</a>
      <p class="p-header__bsnssHours"> （受付時間：平日10:00～18:30）</p>
     </div>
     <div class="p-header__cntctBtnBox">
      <a href="#">無料相談</a>
     </div>
    </div>

   </div>
   <div class="p-header__belowRow">

    <div class="p-header__drawerAbove">
     <div class="p-header__drawerSearchForm">
      <?php get_search_form(); ?>
     </div>
     <div class="p-header__closeBtn js-drawerClose">
      <span></span>
      <span></span>
     </div>
    </div>

    <div class="p-header__drawerBelow">
     <div class="p-header__drawerCntctBtn">
      <a href="#">まずは無料相談してみる</a>
     </div>

     <nav class="p-header__nav">
      <ul class="p-header__navLists">

       <li class="p-header__navItem">
        <a href="#">ホーム</a>
       </li>

       <li class="p-header__navItem">
        <a href="#">制作実績から探す</a>
       </li>

       <li class="p-header__navItem">
        <a href="#">価格</a>
       </li>

       <li class="p-header__navItem">
        <a href="#">動画制作ナビとは</a>
       </li>

       <li class="p-header__navItem">
        <a href="#">ご利用の流れ</a>
       </li>

       <li class="p-header__navItem">
        <a href="#">よくあるご質問</a>
       </li>
      </ul>
     </nav>
    </div>

   </div>


  </div>
 </header>