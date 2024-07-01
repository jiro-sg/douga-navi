<?php get_header(); ?>
<main class="l-main">
 <div class="p-search-detail l-search-detail">
  <div class="p-search-detail__inner">
   <!-- パンくずリスト -->
   <?php get_template_part('_inc/breadcrumb'); ?>
   <!-- // -->
   <div class="p-search-detail__wrap">
    <div class="u-desktop">
     <aside class="p-sidebar">
      <?php get_sidebar(); ?>
     </aside>
    </div>
    <div class="p-search-detail__main">
     <section class="p-searchDetail l-searchDetail">
      <h2 class="p-searchDetail__title"><?php the_title(); ?></h2>
      <div class="p-searchDetail__movie">
       <?php //youtube動画をWordPressのカスタムフィールドで挿入したい
       $hoge = get_field('info_movie');
       if ($hoge) :
        echo $embed_code = wp_oembed_get($hoge);
       endif; ?>
      </div>
      <ul class="p-searchDetail__items">
       <?php
       // 投稿の ID を取得
       $post_id = get_the_ID();
       // 取得するタクソノミーのリスト
       $taxonomies = array('purpose', 'expression_method', 'price_range', 'video_length', 'industry');
       foreach ($taxonomies as $taxonomy) {
        // タクソノミーに紐づくタームの一覧を取得
        $terms = get_the_terms($post_id, $taxonomy);
        if (!empty($terms) && !is_wp_error($terms)) {
         // 親タームの一覧を取得
         $parent_terms = array();
         // 子タームの一覧を取得
         $child_terms = array();
         // タームを親タームと子タームに分ける
         foreach ($terms as $term) {
          if ($term->parent == 0) {
           $parent_terms[] = $term;
          } else {
           $child_terms[] = $term;
          }
         }
         // 親タームと子タームのどちらかが存在する場合のみ表示
         if (!empty($parent_terms) || !empty($child_terms)) {
          // 親タームを表示
          if (!empty($parent_terms)) {
           foreach ($parent_terms as $term) {
            echo '<li>' . $term->name . '</li>';
           }
          }
          // 子タームを表示
          if (!empty($child_terms)) {
           foreach ($child_terms as $term) {
            echo '<li>' . $term->name . '</li>';
           }
          }
         }
        }
       }
       ?>
      </ul>
      <dl class="p-searchDetail__lists">
       <div class="p-searchDetail__list">
        <dt class="p-searchDetail__term">業種</dt>
        <dd class="p-searchDetail__desc"><?php the_field('info_business'); ?></dd>
       </div>
       <div class="p-searchDetail__list">
        <dt class="p-searchDetail__term">利用シーン</dt>
        <dd class="p-searchDetail__desc"><?php the_field('info_scene'); ?></dd>
       </div>
       <div class="p-searchDetail__list">
        <dt class="p-searchDetail__term">映像表現</dt>
        <dd class="p-searchDetail__desc"><?php the_field('info_expression'); ?></dd>
       </div>
       <div class="p-searchDetail__list">
        <dt class="p-searchDetail__term">動画尺</dt>
        <dd class="p-searchDetail__desc"><?php the_field('info_length'); ?></dd>
       </div>
       <div class="p-searchDetail__list">
        <dt class="p-searchDetail__term">制作費用</dt>
        <dd class="p-searchDetail__desc"><?php the_field('info_price'); ?></dd>
       </div>
       <div class="p-searchDetail__list">
        <dt class="p-searchDetail__term">備考</dt>
        <dd class="p-searchDetail__desc p-searchDetail__desc--explain"><?php the_field('info_others'); ?></dd>
       </div>
      </dl>
      <div class="p-searchDetail__btnWrap">
       <a class="p-searchDetail__btn" href="<?php echo esc_url(home_url('/contact/')); ?>">この事例と同様の動画制作を<br class="u-mobile">見積り（無料）</a>
      </div>
      <div class="p-searchDetail__cta p-flowCTA">
       <div class="p-searchDetail__ctaBanner p-flowCTA__banner c-ctaBanner">
        <p class="c-ctaBanner__txt">動画制作・動画集客に関することはお気軽にご相談ください。
        </p>
        <p class="c-ctaBanner__txt">専任スタッフがすぐに<br class="u-mobile">ご連絡いたします。</p>
        <div class="c-ctaBanner__btn">
         <a href="<?php echo esc_url(home_url('/contact/')); ?>">まずは無料相談してみる</a>
        </div>
       </div>
       <!-- <div class="p-searchDetail__previousBtn">
        </div> -->
       <div class="p-flowCTA__btn">
        <a href="javascript:history.back()">前のページに戻る</a>
        <!-- <a href="<//?php echo esc_url(home_url('/')); ?>">ホームへ戻る</a> -->
       </div>
      </div>
     </section>
    </div>
   </div>
  </div>
 </div>
</main>

<?php get_footer(); ?>