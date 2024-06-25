<?php get_header(); ?>
<div class="p-search-detail">
 <div class="p-search-detail__inner">
  <div class="u-desktop">
   <aside class="p-sidebar">
    <?php get_sidebar(); ?>
   </aside>
  </div>
  <main class="p-search-detail__main">

   <section class="p-searchDetail l-searchDetail">
    <h2 class="p-searchDetail__title"><?php the_title(); ?></h2>
    <div class="p-searchDetail__movie">
     <?php //youtube動画をWordPressのカスタムフィールドで挿入したい
$hoge = get_field('info_movie');
if($hoge):
   echo $embed_code = wp_oembed_get( $hoge );
endif; ?>
    </div>

    <!-- <//?php
    $terms = get_the_terms($post->ID, 'dummy');
    if (!empty($terms)) {
     //記事がタームに登録されている場合の処理
     foreach ($terms as $term) {
      echo $term->name;
     }
    } else {
     //記事がタームに登録されていない場合の処理
    }
    ?> -->

    <ul class="p-searchDetail__items">


     <?php
     // 投稿の ID を取得
     $post_id = get_the_ID();
     // 投稿に紐づくタームの一覧を取得
     $terms = get_the_terms($post_id, 'dummy');

     if (!empty($terms)) {
      // 各タームの親タームの ID を取得
      $parent_ids = [];
      foreach ($terms as $term) {
       $parent_ids[] = $term->parent;
      }
      // 親タームと子タームを分けて出力
      foreach ($terms as $term) {
       if ($term->parent == 0) {
        echo '<li>' . $term->name . '</li>';
       }
      }
      foreach ($terms as $term) {
       if ($term->parent != 0) {
        echo '<li>' . $term->name . '</li>';
       }
      }
     } else {
      // $termsがない場合の処理
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
      <dd class="p-searchDetail__desc"><?php the_field('info_others'); ?></dd>
     </div>
    </dl>

    <div class="p-searchDetail__btnWrap">
     <a class="p-searchDetail__btn" href="<?php echo esc_url(home_url('/contact/')); ?>">この事例と同様の動画制作を<br
       class="u-mobile">見積り（無料）</a>
    </div>

    <div class="p-searchDetail__cta p-flowCTA">
     <div class="p-searchDetail__ctaBanner p-flowCTA__banner c-ctaBanner">
      <p class="c-ctaBanner__txt">動画制作・動画集客に関することはお気軽にご相談ください。
      </p>
      <p class="c-ctaBanner__txt">専任スタッフがすぐに<br class="u-mobile">ご連絡いたします。</p>
      <div class="c-ctaBanner__btn">
       <a href="#">まずは無料相談してみる</a>
      </div>
     </div>
     <div class="p-flowCTA__btn">
      <a href="#">ホームへ戻る</a>
     </div>
    </div>


   </section>
  </main>
 </div>
</div>

<?php get_footer(); ?>