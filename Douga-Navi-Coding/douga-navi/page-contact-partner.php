<?php get_header(); ?>
<main class="l-main">
 <!-- パンくずリスト -->
 <?php get_template_part('_inc/breadcrumb'); ?>
 <!-- // -->
 <div class="p-contact l-contact">
  <div class="p-contact__inner l-inner">
   <h2 class="p-contact__title c-secTtl01">協業に関するお問い合わせ</h2>
   <p class="p-contact__explain">協業に関するお問い合わせは下記フォームよりお願いいたします。
   </p>
   <!-- <p class="p-contact__explain02">協業に関するお問い合わせは<a href="">こちら</a></p> -->

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