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
          'post_status' => 'publish',
          'order' => 'DESC',
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
                <?php $value = get_post_meta($post->ID, 'answer', true); ?>
                <?php if (!empty($value)) : ?>
                  <?php the_field('answer'); ?>
                <?php else : ?>

                <?php endif; ?>
              </dd>

            </dl>
          <?php endwhile;
        else : ?>
        <?php endif ?>
        <?php wp_reset_postdata(); ?>

      </div>
    </div>
    <div class="p-faq__banner c-ctaBanner c-ctaBanner02">
      <p class="c-ctaBanner02__copy">かんたん30秒！</p>
      <p class="c-ctaBanner02__txt">動画制作・動画集客に関することはお気軽にご相談ください。
      </p>
      <p class="c-ctaBanner02__txt">専任スタッフがすぐにご連絡いたします。</p>
      <div class="c-labelPc c-ctaBanner02__btns">
        <div class="c-labelPc__body">
          <a class="c-labelPc__tel" href="tel:0120-571-500">
            <div class="c-labelPc__box">通話<br>無料</div>
            <div class="c-labelPc__block">
              <p class="c-labelPc__text">お電話での申し込み</p>
              <p class="c-labelPc__num">0120-571-500</p>
            </div>
          </a>
          <a class="c-labelPc__consult" href="<?php echo esc_url(home_url('/contact/')); ?>">
            <div class="c-labelPc__box">簡単<br>30秒</div>
            <div class="c-labelPc__block">
              <p class="c-labelPc__text">フォームから</p>
              <p class="c-labelPc__text02">無料相談<span>してみる</span></p>
            </div>
          </a>

        </div>
      </div>
    </div>
    <div class="p-faq__return c-returnBtn">
      <a href="<?php echo esc_url(home_url('/')); ?>">ホームへ戻る</a>
    </div>

  </section>
</main>




<?php get_footer(); ?>