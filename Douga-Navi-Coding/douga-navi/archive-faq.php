<?php get_header(); ?>
<main class="l-main">
 <!-- パンくずリスト -->
 <?php get_template_part('_inc/breadcrumb'); ?>
 <!-- // -->

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
        $the_query = new WP_Query();
        $param = array(
          'posts_per_page' => '-1', //表示件数。-1なら全件表示
          'post_type' => 'faq', //カスタム投稿タイプの名称を入れる←ここ変える(投稿だったらpost.カスタム投稿ならslug名)
          'post_status' => 'publish', //取得するステータス。publishなら一般公開のもののみ
          'order' => 'DESC'
        );
        $the_query->query($param);
        if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
        ?>




    <dl class="p-faq__item">
     <dt class="p-faq__question">
      <?php the_title(); ?>
     </dt>
     <dd class="p-faq__answer">

      <?php $value = get_post_meta($post->ID, 'answer', true); ?>
      <?php if (!empty($value)) : ?>
      <?php the_field('answer'); ?>
      <?php else : ?>

      <?php endif; ?>
     </dd>
    </dl>




    <?php
          endwhile;
        endif;
        wp_reset_postdata()
        ?>




   </div>
  </div>

  <div class="p-flowCTA">

   <div class="l-inner">

    <div class="p-flowCTA__banner c-ctaBanner">
     <p class="c-ctaBanner__txt">動画制作・動画集客に関することはお気軽にご相談ください。
     </p>
     <p class="c-ctaBanner__txt">専任スタッフがすぐに<br class="u-mobile">ご連絡いたします。</p>
     <div class="c-ctaBanner__btn">
      <a href="#">まずは無料相談してみる</a>
     </div>
    </div>

    <div class="p-flowCTA__btn">
     <a href="<?php echo esc_url(home_url('/')); ?>">ホームへ戻る</a>
    </div>

   </div>

  </div>



  </div>

 </section>

 </div>



 <?php get_footer(); ?>