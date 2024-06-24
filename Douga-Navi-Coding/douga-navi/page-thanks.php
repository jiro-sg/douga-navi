<?php get_header(); ?>

<div class="p-thanks l-thanks">
 <div class="p-thanks__img">
  <picture>
   <source srcset='<?php echo get_template_directory_uri() ?>/assets/images/aboutFV_pc.jpg' media='(min-width: 768px)'>
   <img src='<?php echo get_template_directory_uri() ?>/assets/images/aboutFV_sp.jpg' alt='課題解決から納品まで、ワンストップでプロが伴走！' width='1279' height='474'>
  </picture>
 </div>
 <div class="l-inner">

  <div class="p-thanks__wrap">
   <div class="p-thanks__title">お問い合わせ<span>ありがとうございました。</span></div>
   <p class="p-thanks__text">
    メッセージは送信されました。
    返信が必要な場合は後ほど担当者よりご連絡いたします。
   </p>
   <p class="p-thanks__text02">
    <!-- 3秒後にトップページに遷移します。 -->
   </p>
  </div>
 </div>



</div>

<?php get_footer(); ?>