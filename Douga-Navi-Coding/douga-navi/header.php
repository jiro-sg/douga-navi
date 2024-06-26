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
     <a href="<?php echo esc_url(home_url()); ?>" class="p-header__logoLink">
      <figure class="p-header__logo">
       <img src="<?php echo get_template_directory_uri() ?>/assets/images/logo01.svg" alt="動画制作ナビ" width="156" height="28">
      </figure>
     </a>
     <div class="p-header__searchBox">
      <?php get_search_form(); ?>
     </div>
    </div>
    <div class="p-header__aboveRight">
     <div class="p-header__drawerBtn js-drawerOpen">
      <figure>
       <img src="<?php echo get_template_directory_uri() ?>/assets/images/ico_search.png" alt="" width="17" header="20">
      </figure>
     </div>
     <div class="p-header__cntctInfo">
      <a href="tel:0120571500" class="p-header__tel">0120-571-500</a>
      <p class="p-header__bsnssHours"> （受付時間：平日10:00～18:30）</p>
     </div>
     <div class="p-header__cntctBtnBox">
      <a href="<?php echo esc_url(home_url('/contact/')); ?>">無料相談</a>
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
        <a href="<?php echo esc_url(home_url()); ?>">ホーム</a>
       </li>

       <li class="p-header__navItem">
        <a href="<?php echo esc_url(home_url('/search/')); ?>
        ">制作実績から探す</a>
       </li>

       <!-- <li class="p-header__navItem">
        <a href="<//?php echo esc_url(home_url()); ?>
        ">価格</a>
       </li> -->

       <li class="p-header__navItem">
        <a href="<?php echo esc_url(home_url('/about/')); ?>">動画制作ナビとは</a>
       </li>

       <li class="p-header__navItem">
        <a href="<?php echo esc_url(home_url('/flow/')); ?>">ご利用の流れ</a>
       </li>

       <li class="p-header__navItem">
        <a href="<?php echo esc_url(home_url('/faq/')) ?>">よくあるご質問</a>
       </li>
      </ul>

      <ul class="p-header__txnmyLists">
       <li class="p-header__txnmyItem">
        <div class="p-header__txnmyBox js-drawerAccdin">
         <p class="p-header__txnmyName">用途から探す</p><span class="p-header__txnmyAccdinBtn"></span>
        </div>
        <ul class="p-header__prntsTermLists">
         <li class="p-header__prntsTermItem">
          <a href="#">動画広告</a>
          <ul class="p-header__termLists">
           <li class="p-header__termItem">
            <a href="#">YouTube広告</a>
           </li>
           <li class="p-header__termItem">
            <a href="#">YouTubeShort広告</a>
           </li>
           <li class="p-header__termItem">
            <a href="#">TikTok広告</a>
           </li>
           <li class="p-header__termItem">
            <a href="#">Instagramリール広告</a>
           </li>
          </ul>
         </li>
        </ul>
       </li>
      </ul>

      <ul class="p-header__txnmyLists">
       <li class="p-header__txnmyItem">
        <div class="p-header__txnmyBox js-drawerAccdin">
         <p class="p-header__txnmyName">表現方法から探す</p><span class="p-header__txnmyAccdinBtn"></span>
        </div>


        <ul class="p-header__termLists">
         <li class="p-header__termItem">
          <a href="#">実写</a>
         </li>
         <li class="p-header__termItem">
          <a href="#">アニメーション</a>
         </li>
         <li class="p-header__termItem">
          <a href="#">CG</a>
         </li>
         <li class="p-header__termItem">
          <a href="#">ドローン撮影</a>
         </li>
        </ul>


       </li>
      </ul>



     </nav>
    </div>

   </div>


  </div>
 </header>