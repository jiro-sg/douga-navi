<?php get_header(); ?>
<main class="l-main">
 <div class="p-search-detail l-search-detail">
  <div class="p-search-detail__inner">
   <!-- パンくずリスト -->
   <?php
   // var_dump(get_the_terms($post->ID, 'purpose'));
   $taxonomies = array('purpose', 'expression_method', 'price_range', 'video_length', 'industry');
   $hasTax = false;
   foreach ($taxonomies as $taxonomy) {
    $termObject = get_the_terms($post->ID, $taxonomy);
    if ($termObject == true) {
     $txnmy = $taxonomy;
     $hasTax = true;
     break;
    }
   }
   if ($hasTax == true) {
    $parentTermIdLists = array();
    $childTermIdLists = array();
    foreach ($termObject as $termItem) {
     if ($termItem->parent == 0) {
      $parentTermIdLists[] = $termItem->term_id;
     } else {
      $parentTermIdLists[] = $termItem->term_id;
     }
    }
    if (count($parentTermIdLists) > 1) {
     $parentTermIdShuffledIndex = shuffle($parentTermIdLists);
     $parentTermId = $parentTermIdLists[$parentTermIdShuffledIndex];
    } else {
     $parentTermId = $parentTermIdLists[0];
    }
    $parentTermName = get_term($parentTermId, $txnmy)->name;
    $parentTermSlug = get_term($parentTermId, $txnmy)->slug;
    // var_dump($parentTermSlug);
    $parentChildIdLists = array();
    if ($termItem->parent == $parentTermId) {
     foreach ($termObject as $termItem) {
      if ($termItem->parent == $parentTermId) {
       $childTermIdLists[] = $termItem->term_id;
      }
     }
     if (count($childTermIdLists) > 1) {
      $childTermIdShuffledIndex = shuffle($childTermIdLists);
      $childTermId = $childTermIdLists[$childTermIdShuffledIndex];
     } else {
      $childTermId = $childTermIdLists[0];
     }
     $childTermName = get_term($childTermId, $txnmy)->name;
     $childTermSlug = get_term($childTermId, $txnmy)->slug;
    } else {
     $noChildTerm = true;
    }
   }
   ?>
   <div class="c-breadcrumb l-breadcrumb">
    <span property="itemListElement" typeof="ListItem">
     <a property="item" typeof="WebPage" title="動画制作ナビへ移動する" href="<?php echo esc_url(home_url()); ?>" class="home">
      <span property="name">ホーム</span>
     </a>
     <meta property="position" content="1">
    </span>
    <span property="itemListElement" typeof="ListItem">
     <a property="item" typeof="WebPage" title="制作事例から探す" href="<?php echo esc_url(home_url('/find/')); ?>" class="archive post-works_case-archive">
      <span property="name">制作事例から探す</span>
     </a>
     <meta property="position" content="2">
    </span>
    <?php if ($hasTax == true) : ?>
    <span property="itemListElement" typeof="ListItem">
     <a property="item" typeof="WebPage" title="<?php echo esc_html($parentTermName); ?>" href="<?php echo add_query_arg(array('txnmySlug' => 'purpose', 'termId' => $parentTermId, 'termSlug' => $parentTermSlug), home_url('/find/')); ?>" class="taxonomy purpose">
      <span property="name"><?php echo esc_html($parentTermName); ?></span>
     </a>
     <meta property="position" content="3">
    </span>
    <?php if ($noChildTerm == false) : ?>
    <span property="itemListElement" typeof="ListItem">
     <a property="item" typeof="WebPage" title="<?php echo esc_html($childTermName); ?>" href="<?php echo add_query_arg(array('txnmySlug' => 'purpose', 'termId' => $childTermId, 'termSlug' => $childTermSlug), home_url('/find/')); ?>" class="taxonomy purpose">
      <span property="name"><?php echo esc_html($childTermName); ?></span>
     </a>
     <meta property="position" content="4">
    </span>
    <?php endif; ?>
    <?php endif; ?>

    <span property="itemListElement" typeof="ListItem">
     <span property="name" class="post post-works_case current-item"><?php the_title(); ?></span>
     <meta property="url" content="http://douga-navi.local/works_case/%e6%a0%aa%e5%bc%8f%e4%bc%9a%e7%a4%berise-agency%e3%80%80%e4%bc%9a%e7%a4%be%e7%b4%b9%e4%bb%8b%e3%83%a0%e3%83%bc%e3%83%93%e3%83%bc/">
     <meta property="position" content="5">
    </span>
   </div> <!-- // -->

   <!-- <//?php get_template_part('_inc/breadcrumb'); ?> -->
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

       <?php get_template_part('_inc/youtube'); ?>

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
            $searchURL = add_query_arg(array('txnmySlug' => $taxonomy, 'termId' => $term->term_id, 'termSlug' => $term->slug), home_url('/find/'));
            echo '<li><a href="' . $searchURL . '">' . $term->name . '</a></li>';
           }
          }
          // 子タームを表示
          if (!empty($child_terms)) {
           foreach ($child_terms as $term) {
            $searchURL = add_query_arg(array('txnmySlug' => $taxonomy, 'termId' => $term->term_id, 'termSlug' => $term->slug), home_url('/find/'));
            echo '<li><a href="' . $searchURL . '">' . $term->name . '<a></li>';
           }
          }
         }
        }
       }
       ?>
      </ul>
      <dl class="p-searchDetail__lists">
       <?php $value = get_post_meta($post->ID, 'info_business', true); ?>
       <?php if (!empty($value)) : ?>
       <div class="p-searchDetail__list">
        <dt class="p-searchDetail__term">業種</dt>
        <dd class="p-searchDetail__desc"><?php the_field('info_business'); ?></dd>
       </div>
       <?php endif; ?>

       <?php $value = get_post_meta($post->ID, 'info_scene', true); ?>
       <?php if (!empty($value)) : ?>
       <div class="p-searchDetail__list">
        <dt class="p-searchDetail__term">利用シーン</dt>
        <dd class="p-searchDetail__desc"><?php the_field('info_scene'); ?></dd>
       </div>
       <?php endif; ?>

       <?php $value = get_post_meta($post->ID, 'info_expression', true); ?>
       <?php if (!empty($value)) : ?>
       <div class="p-searchDetail__list">
        <dt class="p-searchDetail__term">映像表現</dt>
        <dd class="p-searchDetail__desc"><?php the_field('info_expression'); ?></dd>
       </div>
       <?php endif; ?>

       <?php $value = get_post_meta($post->ID, 'info_length', true); ?>
       <?php if (!empty($value)) : ?>
       <div class="p-searchDetail__list">
        <dt class="p-searchDetail__term">動画尺</dt>
        <dd class="p-searchDetail__desc"><?php the_field('info_length'); ?></dd>
       </div>
       <?php endif; ?>

       <?php $value = get_post_meta($post->ID, 'info_price', true); ?>
       <?php if (!empty($value)) : ?>
       <div class="p-searchDetail__list">
        <dt class="p-searchDetail__term">制作費用</dt>
        <dd class="p-searchDetail__desc"><?php the_field('info_price'); ?></dd>
       </div>
       <?php endif; ?>

       <?php $value = get_post_meta($post->ID, 'info_others', true); ?>
       <?php if (!empty($value)) : ?>
       <div class="p-searchDetail__list">
        <dt class="p-searchDetail__term">備考</dt>
        <dd class="p-searchDetail__desc p-searchDetail__desc--explain"><?php the_field('info_others'); ?></dd>
       </div>
       <?php endif; ?>

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