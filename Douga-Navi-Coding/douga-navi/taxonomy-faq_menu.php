<?php

/**
 * Template Name: よくある質問
 *
 */
?>
<?php get_header(); ?>


<div class="p-faq-category l-faq-category">
 <div class="l-inner">
  <div class="p-faq-category__wrap">
   <h2 class="p-faq-category__title c-secTtl02">カテゴリごとによくある<br class="u-mobile">ご質問を検索する</h2>
   <ul class="p-faq-category__items">


    <?php get_template_part('_inc/faq_category'); ?>


   </ul>
  </div>
 </div>

</div>

<section class="p-faq l-faq">

 <div class="p-faq__inner l-inner">
  <h2 class="p-faq__title c-secTtl01">よくある質問</h2>
  <div class="p-faq__wrap">


   <?php
      if (wp_is_mobile()) {
        $num = -1; // スマホの表示数(全件は-1)
      } else {
        $num = -1; // PCの表示数(全件は-1)
      }
      $paged = get_query_var('paged') ? get_query_var('paged') : 1;
      $type = get_query_var('faq_menu'); // タクソノミーのスラッグ
      $args = [
        'post_type' => 'faq',
        'paged' => $paged,
        'posts_per_page' => $num,
        'tax_query' => array(
          array(
            'taxonomy' => 'faq_menu', // タクソノミーのスラッグ
            'field' => 'slug', // ターム名をスラッグで指定する（変更不要）
            'terms' => $type,
          ),
        )
      ];
      $wp_query = new WP_Query($args);
      if (have_posts()) : while (have_posts()) : the_post();
      ?>


   <dl class="p-faq__item">
    <dt class="p-faq__question">
     <?php the_title(); ?>
    </dt>
    <dd class="p-faq__answer">
     <?php if (CFS()->get('answer')) : ?>
     <?php echo CFS()->get('answer'); ?>
     <?php endif; ?>
    </dd>
    </dd>
   </dl>
   <?php endwhile;
      else : ?>
   <?php endif ?>
   <?php wp_reset_postdata(); ?>

  </div>
 </div>
 <div class="p-faq__banner c-ctaBanner">
  <p class="c-ctaBanner__txt">動画制作・動画集客に関することはお気軽にご相談ください。<br>専任スタッフがすぐにご連絡いたします。
  </p>
  <div class="c-ctaBanner__btn">
   <a href="#">まずは無料相談してみる</a>
  </div>
 </div>
 <div class="p-faq__return c-returnBtn">
  <a href="#">ホームへ戻る</a>
 </div>

</section>




<?php get_footer(); ?>