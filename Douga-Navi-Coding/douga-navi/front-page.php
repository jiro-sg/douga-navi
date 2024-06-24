<?php get_header(); ?>
<div class="p-frnt">
 <div class="p-frnt__inner">
  <aside class="p-frnt__sidebar
   p-sidebar">
   <?php get_sidebar(); ?>
  </aside>

  <main class="p-frnt__main">

   <div class="p-frnt__fv p-frntFv">
    <div class="p-frntFv__SwiperBox">
     <!-- Slider main container -->
     <div class="swiper p-frntFv__swiper">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper p-frntFv__swiperWrppr">
       <!-- Slides -->
       <div class="swiper-slide p-frntFv__swiperSlide">
        <picture>
         <source srcset='<?php echo get_template_directory_uri() ?>/assets/images/img_topFV-pc.png' media='(min-width: 768px)'>
         <img src='#' alt='動画制作ナビ' width='837' height='308'>
        </picture>
       </div>

       <div class="swiper-slide p-frntFv__swiperSlide">
        <picture>
         <source srcset='https://picsum.photos/id/237/200/300' media='(min-width: 768px)'>
         <img src='https://picsum.photos/seed/picsum/200/300' alt='FV02' width='837' height='308'>
        </picture>
       </div>

       <div class="swiper-slide p-frntFv__swiperSlide">
        <picture>
         <source srcset='https://picsum.photos/200/300?grayscale' media='(min-width: 768px)'>
         <img src='https://picsum.photos/id/870/200/300?grayscale&blur=2' alt='Fv03' width='837' height='308'>
        </picture>
       </div>
      </div>
     </div>
     <!-- If we need pagination -->
     <div class="swiper-pagination p-frntFv__swiperPgntin"></div>
    </div>
   </div>

   <div class="p-frnt__subLink p-frntSubLink">
    <a href="#" class="p-frntSubLink__navi">動画制作ナビとは？</a>
    <a href="#" class="p-frntSubLink__flow">ご利用の流れ</a>
   </div>

   <section class="p-frnt__search p-frntSrch">
    <h2 class="p-frntSrch__ttl">用途から探す</h2>

    <article class="p-frntSrch__txnmy p-frntSrchTxnmy">
     <h3 class="p-frntSrchTxnmy__ttl"><a href="#">動画広告</a></h3>

     <ul class="p-frntSrchTxnmy__lists">

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        YouTube広告
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        YouTube<br>Short広告
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        TikTok広告
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        Instagram<br>リール広告
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        Facebook広告
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        X広告
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        CM
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        タクシー広告動画
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        Google広告<br>（ディスプレイ・P-MAX）
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        Yahoo!広告
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        LINE広告
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        VOD動画広告
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>
     </ul>
    </article>

    <article class="p-frntSrch__txnmy p-frntSrchTxnmy">
     <h3 class="p-frntSrchTxnmy__ttl"><a href="#">採用動画</a></h3>

     <ul class="p-frntSrchTxnmy__lists">

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        事業紹介動画<br>（求職者向け）
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        オフィス紹介
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        企業説明会用動画
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        コンセプトムービー
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        社員インタビュー
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>
     </ul>
    </article>

    <article class="p-frntSrch__txnmy p-frntSrchTxnmy">
     <h3 class="p-frntSrchTxnmy__ttl"><a href="#">SNS動画</a></h3>

     <ul class="p-frntSrchTxnmy__lists">

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        YouTube
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        YouTube Short
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        TikTok
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        Instagram リール
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        Facebook
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        X
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>
     </ul>
    </article>

    <article class="p-frntSrch__txnmy p-frntSrchTxnmy">
     <h3 class="p-frntSrchTxnmy__ttl"><a href="#">研修用動画</a></h3>

     <ul class="p-frntSrchTxnmy__lists">

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        マニュアル動画
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        インナーブラン<br>ディング動画
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        社員総会
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        従業員インタビュー<br>動画
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>
     </ul>
    </article>

    <article class="p-frntSrch__txnmy p-frntSrchTxnmy">
     <h3 class="p-frntSrchTxnmy__ttl"><a href="#">プロモーション動画</a></h3>

     <ul class="p-frntSrchTxnmy__lists">

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        商品・サービスPR
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        インナーブラン<br>ディング動画
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        社員総会
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        従業員インタビュー<br>動画
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>
     </ul>
    </article>

    <article class="p-frntSrch__txnmy p-frntSrchTxnmy">
     <h3 class="p-frntSrchTxnmy__ttl"><a href="#">結婚式</a></h3>
    </article>

    <article class="p-frntSrch__txnmy p-frntSrchTxnmy">
     <h3 class="p-frntSrchTxnmy__ttl"><a href="#">ライフイベント動画</a></h3>

     <ul class="p-frntSrchTxnmy__lists">

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        お祝い・記念日動画
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        ペット動画
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>
     </ul>
    </article>

    <article class="p-frntSrch__txnmy p-frntSrchTxnmy">
     <h3 class="p-frntSrchTxnmy__ttl"><a href="#">その他</a></h3>
    </article>
   </section>


   <section class="p-frnt__search p-frntSrch">
    <h2 class="p-frntSrch__ttl">表現方法から探す</h2>

    <article class="p-frntSrch__txnmy p-frntSrchTxnmy">

     <ul class="p-frntSrchTxnmy__lists">

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        実写
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        アニメーション
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        CG
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        ドローン撮影
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>
     </ul>
    </article>
   </section>

   <section class="p-frnt__search p-frntSrch">
    <h2 class="p-frntSrch__ttl">価格帯から探す</h2>

    <article class="p-frntSrch__txnmy p-frntSrchTxnmy">

     <ul class="p-frntSrchTxnmy__lists">

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        10万円未満
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        10万円以上30万円未満
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        30万円以上100万円未満
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        100万円以上
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>
     </ul>
    </article>
   </section>

   <section class="p-frnt__search p-frntSrch">
    <h2 class="p-frntSrch__ttl">動画尺から探す</h2>

    <article class="p-frntSrch__txnmy p-frntSrchTxnmy">

     <ul class="p-frntSrchTxnmy__lists">

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        ショート動画
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        短尺動画（3分未満）
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        中尺動画（10分未満）
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        長尺動画（10分以上）
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>
     </ul>
    </article>
   </section>

   <section class="p-frnt__search p-frntSrch">
    <h2 class="p-frntSrch__ttl">業種から探す</h2>

    <article class="p-frntSrch__txnmy p-frntSrchTxnmy">

     <ul class="p-frntSrchTxnmy__lists">

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        買取
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        不動産
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        フィットネス
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        塾・教育
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>

      <li class="p-frntSrchTxnmy__item">
       <p class="p-frntSrchTxnmy__term">
        その他
       </p>
       <figure class="p-frntSrchTxnmy__img">
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
       </figure>
      </li>
     </ul>
    </article>
   </section>

   <div class="p-frnt__cta p-frntCTA">

    <div class="p-frntCTA__banner c-ctaBanner02">
     <p class="c-ctaBanner02__txt">動画制作・動画集客に関することはお気軽にご相談ください。
     </p>
     <p class="c-ctaBanner02__txt">専任スタッフがすぐに<br class="u-mobile">ご連絡いたします。</p>
     <div class="c-ctaBanner02__btn">
      <a href="#">まずは無料相談してみる</a>
     </div>
    </div>
   </div>

  </main>
 </div>
</div>

<?php get_footer(); ?>