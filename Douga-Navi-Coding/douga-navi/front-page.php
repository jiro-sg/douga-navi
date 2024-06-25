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
         <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_topFV-sp.png' alt=' 動画制作ナビ' width='837' height='308'>
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

   <div class="p-frnt__mainInner">


    <div class="p-frnt__subLink p-frntSubLink">
     <a href="#" class="p-frntSubLink__navi">動画制作ナビとは？</a>
     <a href="#" class="p-frntSubLink__flow">ご利用の流れ</a>
    </div>

    <section class="p-frnt__search p-frntSrch">
     <h2 class="p-frntSrch__ttl">用途から探す</h2>

     <article class="p-frntSrch__txnmy p-frntTxnmy">
      <ul class="p-frntTxnmy__prntsLists">
       <li class="p-frntTxnmy__prntsItem">

        <label for="videoAds">
         <input type="checkbox" id="videoAds" name="termParents[]" value="videoAds"><span>動画広告</span>
        </label>

        <ul class="p-frntTxnmy__lists">

         <li class="p-frntTxnmy__item">
          <label for="youtubeAds">
           <input type="checkbox" id="youtubeAds" name="term[]" value="youtubeAds">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             YouTube広告
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>

         <li class="p-frntTxnmy__item">
          <label for="youtubeShortAds">
           <input type="checkbox" id="youtubeShortAds" name="term[]" value="youtubeShortAds">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             YouTube<br>Short広告
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>

         <li class="p-frntTxnmy__item">
          <label for="tiktokAds">
           <input type="checkbox" id="tiktokAds" name="term[]" value="tiktokAds">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             TikTok広告
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>

         <li class="p-frntTxnmy__item">
          <label for="instagramAds">
           <input type="checkbox" id="instagramAds" name="term[]" value="instagramAds">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             Instagram<br>リール広告
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>

         <li class="p-frntTxnmy__item">
          <label for="facebookAds">
           <input type="checkbox" id="facebookAds" name="term[]" value="facebookAds">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             Facebook広告
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>

         <li class="p-frntTxnmy__item">
          <label for="XAds">
           <input type="checkbox" id="XAds" name="term[]" value="XAds">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             X広告
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>

         <li class="p-frntTxnmy__item">
          <label for="cm">
           <input type="checkbox" id="cm" name="term[]" value="cm">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             CM
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>

         <li class="p-frntTxnmy__item">
          <label for="taxiAds">
           <input type="checkbox" id="taxiAds" name="term[]" value="taxiAds">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             タクシー広告動画
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>

         <li class="p-frntTxnmy__item">
          <label for="googleAds">
           <input type="checkbox" id="googleAds" name="term[]" value="googleAds">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             Google広告<br>（ディスプレイ・P-MAX）
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>

         <li class="p-frntTxnmy__item">
          <label for="yahooAds">
           <input type="checkbox" id="yahooAds" name="term[]" value="yahooAds">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             Yahoo!広告
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>

         <li class="p-frntTxnmy__item">
          <label for="lineAds">
           <input type="checkbox" id="lineAds" name="term[]" value="lineAds">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             LINE広告
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>

         <li class="p-frntTxnmy__item">
          <label for="vodAds">
           <input type="checkbox" id="vodAds" name="term[]" value="vodAds">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             VOD動画広告
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>
        </ul>
       </li>
      </ul>
     </article>

     <article class="p-frntSrch__txnmy p-frntTxnmy">
      <ul class="p-frntTxnmy__prntsLists">
       <li class="p-frntTxnmy__prntsItem">

        <label for="recruitVideo">
         <input type="checkbox" id="recruitVideo" name="termParents[]" value="recruitVideo"><span>採用動画</span>
        </label>

        <ul class="p-frntTxnmy__lists">

         <li class="p-frntTxnmy__item">
          <label for="businessIntro">
           <input type="checkbox" id="businessIntro" name="term[]" value="businessIntro">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             事業紹介動画<br>（求職者向け）
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>

         <li class="p-frntTxnmy__item">
          <label for="officeIntro">
           <input type="checkbox" id="officeIntro" name="term[]" value="officeIntro">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             オフィス紹介
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>

         <li class="p-frntTxnmy__item">
          <label for="companyInfo">
           <input type="checkbox" id="companyInfo" name="term[]" value="companyInfo">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             企業説明会用動画
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>

         <li class="p-frntTxnmy__item">
          <label for="conceptMovie">
           <input type="checkbox" id="conceptMovie" name="term[]" value="conceptMovie">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             コンセプトムービー
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>

         <li class="p-frntTxnmy__item">
          <label for="employeeInterview">
           <input type="checkbox" id="employeeInterview" name="term[]" value="employeeInterview">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             社員インタビュー
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>
        </ul>
       </li>
      </ul>
     </article>

     <article class="p-frntSrch__txnmy p-frntTxnmy">
      <ul class="p-frntTxnmy__prntsLists">
       <li class="p-frntTxnmy__prntsItem">

        <label for="snsVideo">
         <input type="checkbox" id="snsVideo" name="termParents[]" value="snsVideo"><span>SNS動画</span>
        </label>

        <ul class="p-frntTxnmy__lists">

         <li class="p-frntTxnmy__item">
          <label for="youtube">
           <input type="checkbox" id="youtube" name="term[]" value="youtube">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             YouTube
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>

         <li class="p-frntTxnmy__item">
          <label for="youtubeShort">
           <input type="checkbox" id="youtubeShort" name="term[]" value="youtubeShort">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             YouTube Short
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>

         <li class="p-frntTxnmy__item">
          <label for="tiktok">
           <input type="checkbox" id="tiktok" name="term[]" value="tiktok">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             TikTok
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>

         <li class="p-frntTxnmy__item">
          <label for="instagram">
           <input type="checkbox" id="instagram" name="term[]" value="instagram">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             Instagram リール
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>

         <li class="p-frntTxnmy__item">
          <label for="facebook">
           <input type="checkbox" id="facebook" name="term[]" value="facebook">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             Facebook
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>

         <li class="p-frntTxnmy__item">
          <label for="X">
           <input type="checkbox" id="X" name="term[]" value="X">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             X
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>
        </ul>
       </li>
      </ul>
     </article>

     <article class="p-frntSrch__txnmy p-frntTxnmy">
      <ul class="p-frntTxnmy__prntsLists">
       <li class="p-frntTxnmy__prntsItem">

        <label for="trainingVideo">
         <input type="checkbox" id="trainingVideo" name="termParents[]" value="trainingVideo"><span>研修用動画</span>
        </label>

        <ul class="p-frntTxnmy__lists">

         <li class="p-frntTxnmy__item">
          <label for="manualVideo">
           <input type="checkbox" id="manualVideo" name="term[]" value="manualVideo">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             マニュアル動画
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>

         <li class="p-frntTxnmy__item">
          <label for="innerBranding">
           <input type="checkbox" id="innerBranding" name="term[]" value="innerBranding">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             インナーブラン<br>ディング動画
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>

         <li class="p-frntTxnmy__item">
          <label for="generalMeeting">
           <input type="checkbox" id="generalMeeting" name="term[]" value="generalMeeting">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             社員総会
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>

         <li class="p-frntTxnmy__item">
          <label for="staffInterview">
           <input type="checkbox" id="staffInterview" name="term[]" value="staffInterview">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             従業員インタビュー動画
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>
        </ul>
       </li>
      </ul>
     </article>

     <article class="p-frntSrch__txnmy p-frntTxnmy">
      <ul class="p-frntTxnmy__prntsLists">
       <li class="p-frntTxnmy__prntsItem">

        <label for="promotionVideo">
         <input type="checkbox" id="promotionVideo" name="termParents[]" value="promotionVideo"><span>プロモーション動画</span>
        </label>

        <ul class="p-frntTxnmy__lists">

         <li class="p-frntTxnmy__item">
          <label for="ProductServicePR">
           <input type="checkbox" id="ProductServicePR" name="term[]" value="ProductServicePR">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             商品・サービスPR
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>

         <li class="p-frntTxnmy__item">
          <label for="corporatePR">
           <input type="checkbox" id="corporatePR" name="term[]" value="corporatePR">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             企業PR
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>

         <li class="p-frntTxnmy__item">
          <label for="storeFacility">
           <input type="checkbox" id="storeFacility" name="term[]" value="storeFacility">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             店舗・施設紹介動画
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>


         <li class="p-frntTxnmy__item">
          <label for="branding">
           <input type="checkbox" id="branding" name="term[]" value="branding">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             ブランディング動画
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>


         <li class="p-frntTxnmy__item">
          <label for="PV">
           <input type="checkbox" id="PV" name="term[]" value="PV">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             プロモーションビデオ<br>（PV）
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>

         <li class="p-frntTxnmy__item">
          <label for="review">
           <input type="checkbox" id="review" name="term[]" value="review">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             事例紹介<br>ユーザーの声動画
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>

         <li class="p-frntTxnmy__item">
          <label for="seminar">
           <input type="checkbox" id="seminar" name="term[]" value="seminar">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             セミナー動画
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>

         <li class="p-frntTxnmy__item">
          <label for="webinar">
           <input type="checkbox" id="webinar" name="term[]" value="webinar">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             ウェビナー動画
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>
        </ul>
       </li>
      </ul>
     </article>

     <article class="p-frntSrch__txnmy p-frntTxnmy">
      <ul class="p-frntTxnmy__prntsLists">
       <li class="p-frntTxnmy__prntsItem">

        <label for="wedding">
         <input type="checkbox" id="wedding" name="termParents[]" value="wedding"><span>結婚式</span>
        </label>

       </li>
      </ul>
     </article>

     <article class="p-frntSrch__txnmy p-frntTxnmy">
      <ul class="p-frntTxnmy__prntsLists">
       <li class="p-frntTxnmy__prntsItem">

        <label for="lifeEvent">
         <input type="checkbox" id="lifeEvent" name="termParents[]" value="lifeEvent"><span>ライフイベント動画</span>
        </label>

        <ul class="p-frntTxnmy__lists">

         <li class="p-frntTxnmy__item">
          <label for="anniversaries">
           <input type="checkbox" id="anniversaries" name="term[]" value="anniversaries">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             お祝い・記念日動画
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>

         <li class="p-frntTxnmy__item">
          <label for="pet">
           <input type="checkbox" id="pet" name="term[]" value="pet">
           <div class="p-frntTxnmy__srchBtn">
            <p class="p-frntTxnmy__term">
             ペット動画
            </p>
            <figure class="p-frntTxnmy__img">
             <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
            </figure>
           </div>
          </label>
         </li>
        </ul>
       </li>
      </ul>
     </article>

     <article class="p-frntSrch__txnmy p-frntTxnmy">
      <ul class="p-frntTxnmy__prntsLists">
       <li class="p-frntTxnmy__prntsItem">

        <label for="others">
         <input type="checkbox" id="others" name="termParents[]" value="others"><span>その他</span>
        </label>
       </li>
      </ul>
     </article>

    </section>


    <section class="p-frnt__search p-frntSrch">
     <h2 class="p-frntSrch__ttl">表現方法から探す</h2>

     <article class="p-frntSrch__txnmy p-frntTxnmy">

      <ul class="p-frntTxnmy__lists">

       <li class="p-frntTxnmy__item">
        <label for="liveAction">
         <input type="checkbox" id="liveAction" name="term[]" value="liveAction">
         <div class="p-frntTxnmy__srchBtn">
          <p class="p-frntTxnmy__term">
           実写
          </p>
          <figure class="p-frntTxnmy__img">
           <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
          </figure>
         </div>
        </label>
       </li>

       <li class="p-frntTxnmy__item">
        <label for="animation">
         <input type="checkbox" id="animation" name="term[]" value="animation">
         <div class="p-frntTxnmy__srchBtn">
          <p class="p-frntTxnmy__term">
           アニメーション
          </p>
          <figure class="p-frntTxnmy__img">
           <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
          </figure>
         </div>
        </label>
       </li>

       <li class="p-frntTxnmy__item">
        <label for="cg">
         <input type="checkbox" id="cg" name="term[]" value="cg">
         <div class="p-frntTxnmy__srchBtn">
          <p class="p-frntTxnmy__term">
           CG
          </p>
          <figure class="p-frntTxnmy__img">
           <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
          </figure>
         </div>
        </label>
       </li>

       <li class="p-frntTxnmy__item">
        <label for="drone">
         <input type="checkbox" id="drone" name="term[]" value="drone">
         <div class="p-frntTxnmy__srchBtn">
          <p class="p-frntTxnmy__term">
           ドローン撮影
          </p>
          <figure class="p-frntTxnmy__img">
           <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
          </figure>
         </div>
        </label>
       </li>
      </ul>
     </article>
    </section>



    <section class="p-frnt__search p-frntSrch">
     <h2 class="p-frntSrch__ttl">価格帯から探す</h2>

     <article class="p-frntSrch__txnmy p-frntTxnmy">

      <ul class="p-frntTxnmy__lists">

       <li class="p-frntTxnmy__item">
        <label for="under10man">
         <input type="checkbox" id="under10man" name="term[]" value="under10man">
         <div class="p-frntTxnmy__srchBtn">
          <p class="p-frntTxnmy__term">
           10万円未満
          </p>
          <figure class="p-frntTxnmy__img">
           <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
          </figure>
         </div>
        </label>
       </li>

       <li class="p-frntTxnmy__item">
        <label for="10manOrMoreAndUnder30man">
         <input type="checkbox" id="10manOrMoreAndUnder30man" name="term[]" value="10manOrMoreAndUnder30man">
         <div class="p-frntTxnmy__srchBtn">
          <p class="p-frntTxnmy__term">
           10万円以上30万円未満
          </p>
          <figure class="p-frntTxnmy__img">
           <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
          </figure>
         </div>
        </label>
       </li>

       <li class="p-frntTxnmy__item">
        <label for="30manOrMoreAndUnder100man">
         <input type="checkbox" id="30manOrMoreAndUnder100man" name="term[]" value="30manOrMoreAndUnder100man">
         <div class="p-frntTxnmy__srchBtn">
          <p class="p-frntTxnmy__term">
           30万円以上100万円未満
          </p>
          <figure class="p-frntTxnmy__img">
           <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
          </figure>
         </div>
        </label>
       </li>

       <li class="p-frntTxnmy__item">
        <label for="100manOrMore">
         <input type="checkbox" id="100manOrMore" name="term[]" value="100manOrMore">
         <div class="p-frntTxnmy__srchBtn">
          <p class="p-frntTxnmy__term">
           100万円以上
          </p>
          <figure class="p-frntTxnmy__img">
           <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
          </figure>
         </div>
        </label>
       </li>
      </ul>

     </article>
    </section>

    <section class="p-frnt__search p-frntSrch">
     <h2 class="p-frntSrch__ttl">動画尺から探す</h2>

     <article class="p-frntSrch__txnmy p-frntTxnmy">

      <ul class="p-frntTxnmy__lists">

       <li class="p-frntTxnmy__item">
        <label for="short">
         <input type="checkbox" id="short" name="term[]" value="short">
         <div class="p-frntTxnmy__srchBtn">
          <p class="p-frntTxnmy__term">
           ショート動画
          </p>
          <figure class="p-frntTxnmy__img">
           <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
          </figure>
         </div>
        </label>
       </li>

       <li class="p-frntTxnmy__item">
        <label for="under3min">
         <input type="checkbox" id="under3min" name="term[]" value="under3min">
         <div class="p-frntTxnmy__srchBtn">
          <p class="p-frntTxnmy__term">
           短尺動画（3分未満）
          </p>
          <figure class="p-frntTxnmy__img">
           <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
          </figure>
         </div>
        </label>
       </li>

       <li class="p-frntTxnmy__item">
        <label for="under10min">
         <input type="checkbox" id="under10min" name="term[]" value="under10min">
         <div class="p-frntTxnmy__srchBtn">
          <p class="p-frntTxnmy__term">
           中尺動画（10分未満）
          </p>
          <figure class="p-frntTxnmy__img">
           <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
          </figure>
         </div>
        </label>
       </li>

       <li class="p-frntTxnmy__item">
        <label for="10minOrMore">
         <input type="checkbox" id="10minOrMore" name="term[]" value="10minOrMore">
         <div class="p-frntTxnmy__srchBtn">
          <p class="p-frntTxnmy__term">
           長尺動画（10分以上）
          </p>
          <figure class="p-frntTxnmy__img">
           <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
          </figure>
         </div>
        </label>
       </li>
      </ul>
     </article>
    </section>

    <section class="p-frnt__search p-frntSrch">
     <h2 class="p-frntSrch__ttl">業種から探す</h2>

     <article class="p-frntSrch__txnmy p-frntTxnmy">

      <ul class="p-frntTxnmy__lists">

       <li class="p-frntTxnmy__item">
        <label for="short">
         <input type="checkbox" id="short" name="term[]" value="short">
         <div class="p-frntTxnmy__srchBtn">
          <p class="p-frntTxnmy__term">
           買取
          </p>
          <figure class="p-frntTxnmy__img">
           <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
          </figure>
         </div>
        </label>
       </li>

       <li class="p-frntTxnmy__item">
        <label for="under3min">
         <input type="checkbox" id="under3min" name="term[]" value="under3min">
         <div class="p-frntTxnmy__srchBtn">
          <p class="p-frntTxnmy__term">
           不動産
          </p>
          <figure class="p-frntTxnmy__img">
           <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
          </figure>
         </div>
        </label>
       </li>

       <li class="p-frntTxnmy__item">
        <label for="under10min">
         <input type="checkbox" id="under10min" name="term[]" value="under10min">
         <div class="p-frntTxnmy__srchBtn">
          <p class="p-frntTxnmy__term">
           フィットネス
          </p>
          <figure class="p-frntTxnmy__img">
           <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
          </figure>
         </div>
        </label>
       </li>

       <li class="p-frntTxnmy__item">
        <label for="10minOrMore">
         <input type="checkbox" id="10minOrMore" name="term[]" value="10minOrMore">
         <div class="p-frntTxnmy__srchBtn">
          <p class="p-frntTxnmy__term">
           塾・教育
          </p>
          <figure class="p-frntTxnmy__img">
           <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
          </figure>
         </div>
        </label>
       </li>

       <li class="p-frntTxnmy__item">
        <label for="10minOrMore">
         <input type="checkbox" id="10minOrMore" name="term[]" value="10minOrMore">
         <div class="p-frntTxnmy__srchBtn">
          <p class="p-frntTxnmy__term">
           その他
          </p>
          <figure class="p-frntTxnmy__img">
           <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
          </figure>
         </div>
        </label>
       </li>
      </ul>

     </article>
    </section>

    <section class="p-frnt__search p-frntSrch">
     <h2 class="p-frntSrch__ttl">業種から探す</h2>

     <article class="p-frntSrch__txnmy p-frntTxnmy">

      <ul class="p-frntTxnmy__lists">

       <li class="p-frntTxnmy__item">
        <p class="p-frntTxnmy__term">
         買取
        </p>
        <figure class="p-frntTxnmy__img">
         <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
        </figure>
       </li>

       <li class="p-frntTxnmy__item">
        <p class="p-frntTxnmy__term">
         不動産
        </p>
        <figure class="p-frntTxnmy__img">
         <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
        </figure>
       </li>

       <li class="p-frntTxnmy__item">
        <p class="p-frntTxnmy__term">
         フィットネス
        </p>
        <figure class="p-frntTxnmy__img">
         <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
        </figure>
       </li>

       <li class="p-frntTxnmy__item">
        <p class="p-frntTxnmy__term">
         塾・教育
        </p>
        <figure class="p-frntTxnmy__img">
         <img src='<?php echo get_template_directory_uri() ?>/assets/images/img_term01.png' alt='テスト' width='72' height='45'>
        </figure>
       </li>

       <li class="p-frntTxnmy__item">
        <p class="p-frntTxnmy__term">
         その他
        </p>
        <figure class="p-frntTxnmy__img">
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
   </div>


  </main>
 </div>
</div>

<?php get_footer(); ?>