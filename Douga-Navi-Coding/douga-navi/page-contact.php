<?php get_header(); ?>
<main class="l-main">
 <!-- パンくずリスト -->
 <?php get_template_part('_inc/breadcrumb'); ?>
 <!-- // -->
 <div class="p-contact l-contact">
  <div class="p-contact__inner l-inner">
   <h2 class="p-contact__title c-secTtl01">お問い合わせフォーム</h2>
   <p class="p-contact__explain">ご相談・お見積もりは無料です。 専門スタッフが丁寧にご用件をお伺いいたします。お気軽にご相談ください</p>

   <div class="p-contact__form p-form">

    <?php the_content(); ?>

    <p class="p-form__policy">
     <a href="<?php echo esc_url(home_url('/policy/')); ?>"><span>個人情報保護方針</span>について同意したものとみなされます</a>
    </p>
   </div>


  </div>
 </div>
</main>


<?php get_footer(); ?>