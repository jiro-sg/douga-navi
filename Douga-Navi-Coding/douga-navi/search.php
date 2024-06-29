<?php get_header(); ?>

<main class="p-search">
 <div class="p-search__inner">

  <?php if (!isset($_GET['s']) && !isset($_GET['txnmySlug']) && !isset($_GET['termId']) && !isset($_GET['termLists'])) : ?>

   <h1 class="p-search__ttl">動画実績を探す</h1>

  <?php
  elseif (isset($_GET['termSlug']) && isset($_GET['txnmySlug']) && !isset($_GET['s'])) :
   $termSlug = $_GET['termSlug'];
   $txnmySlug = $_GET['txnmySlug'];
   $termObject = get_term_by('slug', $termSlug, $txnmySlug);
   $termID = $termObject->term_id;
   $termName = $termObject->name;
  ?>

   <h1 class="p-search__ttl"><?php echo $termName; ?>の検索結果一覧</h1>

   <?php if (term_description($termID, $txnmySlug)) : ?>
    <p class="p-search__explain"><?php echo term_description($termID, $txnmySlug); ?></p>
   <?php endif; ?>

  <?php
  elseif (isset($_GET['s']) ||  isset($_GET['termLists'])) :
  ?>

   <h1 class="p-search__ttl">動画実績を探す</h1>

  <?php else : ?>

   <h1 class="p-search__ttl">動画実績を探す</h1>

  <?php endif; ?>

  <article class="p-search__cnditins p-srchCnditin">
   <div class="p-srchCnditin__ttlBox js-searchBtnAccdin">
    <h2 class="p-srchCnditin__ttl">カテゴリーから<br class="u-mobile">動画制作実績を探す</h2>
   </div>

   <div class="p-srchCnditin__formBox">
    <form method="get" id="search-form" action="<?php echo esc_url(home_url('/')); ?>">
     <input type="hidden" class="field" name="s">

     <?php
     $txnmySlugLists = array('purpose', 'expression_method', 'price_range', 'video_length', 'industry');
     foreach ($txnmySlugLists as $txnmySlugItem) :
      $taxObject = get_taxonomy($txnmySlugItem);
     ?>
      <dl class="p-srchCnditin__defLists">

       <dt class="p-srchCnditin__defTerm">
        <span><?php echo $taxObject->label; ?></span>
       </dt>
       <dd class="p-srchCnditin__defDescr">
        <?php
        $txnmySlug = $txnmySlugItem;
        $hierarchyArray = array();
        $termListsA = get_terms($txnmySlug, array('hide_empty' => false, 'parent' => 0));
        foreach ($termListsA as $termItemA) {
         $termItemA_id = $termItemA->term_id;
         $termListsB = get_terms($txnmySlug, array('hide_empty' => false, 'parent' => $termItemA_id));
         array_push($hierarchyArray, count($termListsB));
        }
        $hierarchyCheck = array_sum($hierarchyArray);
        // var_dump($hierarchyCheck);

        // タームが１つでも存在する場合
        if (!empty($termListsA)) :
         // タームが親子関係の２階層ある場合
         if ($hierarchyCheck > 0) :
        ?>


          <?php foreach ($termListsA as $termItemA) :
           $termItemA_id = $termItemA->term_id;
           $termItemA_slug = $termItemA->slug;
           $termItemA_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemA_id, 'termSlug' => $termItemA_slug), home_url('/find/'));
           // var_dump($termItemA);
           // var_dump(count(get_term_children($termItemA_id, $txnmySlug)));
          ?>

           <ul class="p-srchCnditin__prntsTermLists">
            <li class="p-srchCnditin__prntsTermItem">

             <div class="p-srchCnditin__prntsTermBox">
              <label for="<?php echo esc_html($termItemA_slug); ?>">
               <input type="checkbox" id="<?php echo esc_html($termItemA_slug); ?>" name="termLists[]" value="<?php echo esc_html($termItemA_slug); ?>">
               <span class="p-srchCnditin__prntsTermName"><?php echo $termItemA->name; ?></span>
              </label>
              <?php if (count(get_term_children($termItemA_id, $txnmySlug)) > 0) : ?>
               <span class="p-srchCnditin__accdionBtn js-srchAccrdin"></span>
              <?php endif; ?>
             </div>

             <?php if (count(get_term_children($termItemA_id, $txnmySlug)) > 0) : ?>
              <div class="p-srchCnditin__termBox">
               <ul class="p-srchCnditin__termLists">
                <?php
                $termListsC = get_terms($txnmySlug, array('hide_empty' => false, 'parent' => $termItemA_id));
                foreach ($termListsC as $termItemC) :
                 $termItemC_id = $termItemC->term_id;
                 $termItemC_slug = $termItemC->slug;
                 $termItemC_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemC_id, 'termSlug' => $termItemC_slug), home_url('/find/'));
                ?>

                 <li class="p-srchCnditin__termItem">
                  <label for="<?php echo esc_html($termItemC_slug); ?>">
                   <input type="checkbox" name="termLists[]" id="<?php echo esc_html($termItemC_slug); ?>" value="<?php echo esc_html($termItemC_slug); ?>"><span><?php echo $termItemC->name; ?></span>
                  </label>
                 </li>
                <?php endforeach; ?>
               </ul>
              </div>
             <?php endif; ?>

            </li>
           </ul>
          <?php endforeach; ?>

         <?php else : ?>

          <div class="p-srchCnditin__termBox">
           <ul class="p-srchCnditin__termLists">

            <?php
            // タームが１階層しかない場合
            foreach ($termListsA as $termItemA) :
             $termItemA_id = $termItemA->term_id;
             $termItemA_slug = $termItemA->slug;
             $termItemA_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemA_id, 'termSlug' => $termItemA_slug), home_url('/find/'));
            ?>

             <li class="p-srchCnditin__termItem">
              <label for="<?php echo esc_html($termItemA_slug); ?>">
               <input type="checkbox" name="termLists[]" id="<?php echo esc_html($termItemA_slug); ?>" value="<?php echo esc_html($termItemA_slug); ?>"><span><?php echo $termItemA->name; ?></span>
              </label>
             </li>
            <?php endforeach; ?>

           </ul>
          </div>


        <?php
         endif;
        endif;
        ?>
       </dd>
      </dl>
     <?php endforeach; ?>

     <div class="p-srchCnditin__btnWrppr">

      <button type="reset" class="p-srchCnditin__cancellBtn">カテゴリーの選択を解除する</button>
      <button type="submit" class="p-srchCnditin__submitBtns">カテゴリーごとに検索する</button>
     </div>
    </form>
   </div>

  </article>



  </ /?php while (have_posts()) : the_post(); // メインループ開始 ?>
  <div class="p-search__result p-srchRslt">
   <?php
   $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
   // var_dump($paged);

   ?>


   <?php
   // search.phpのメインループ機能でフリーワード検索する場合
   if (isset($_GET['s']) && !isset($_GET['termLists']) && !isset($_GET['termSlug'])) :
    if (have_posts()) :
     while (have_posts()) : the_post();
   ?>

      <div class="p-srchRslt__card">
       <figure class="p-srchRslt__cardMovie">
        <?php
        $hoge = get_field('info_movie');
        if ($hoge) :
         echo $embed_code = wp_oembed_get($hoge);
        endif;
        ?>
       </figure>
       <a href="<?php the_permalink(); ?>">
        <p class="p-srchRslt__cardTxt">
         <!-- <//?php
         $termsInfomation = get_the_terms($the_query->ID, 'purpose');
         if ($termsInfomation) {
          foreach ($termsInfomation as $termsInfo) {
           echo $termsInfo->name;
           echo '<br>';
          }
         }
         $termsInfomation = get_the_terms($the_query->ID, 'expression_method');
         if ($termsInfomation) {
          foreach ($termsInfomation as $termsInfo) {
           echo $termsInfo->name;
           echo '<br>';
          }
         }
         $termsInfomation = get_the_terms($the_query->ID, 'price_range');
         if ($termsInfomation) {
          foreach ($termsInfomation as $termsInfo) {
           echo $termsInfo->name;
           echo '<br>';
          }
         }
         $termsInfomation = get_the_terms($the_query->ID, 'video_length');
         if ($termsInfomation) {
          foreach ($termsInfomation as $termsInfo) {
           echo $termsInfo->name;
           echo '<br>';
          }
         }
         $termsInfomation = get_the_terms($the_query->ID, 'industry');
         if ($termsInfomation) {
          foreach ($termsInfomation as $termsInfo) {
           echo $termsInfo->name;
           echo '<br>';
          }
         }
         ?> -->
         <?php the_title(); ?>
        </p>
       </a>
      </div>

     <?php endwhile; ?>
    <?php else : ?>
     <p class="p-search__noResult">
      申し訳ありませんが、お探しの制作実績は見つかりませんでした。<br>
      条件を変えてお試しください。
     </p>

    <?php endif; ?>
   <?php else :
    // search.phpのメインループ機能を使わずサブループで投稿を絞り込み検索する場合
    $subLoopPosts = true;
    // サブループで回す投稿があるかないかの判定キーとして$subLoopPostsを設定

    if (isset($_GET['termLists'])) {
     $sTermLists = $_GET['termLists'];
     // var_dump(count($sTermLists));
     $txnmyLists = array();
     foreach ($sTermLists as $sTermItem) {
      $termObjects = get_terms(array(
       'slug' => $sTermItem,
      ));
      foreach ($termObjects as $termObject) {
       $txnmyLists[] = $termObject->taxonomy;
       $taxnmyName = $termObject->taxonomy;
       $termLists[$taxnmyName][] = $sTermItem;
      }
     }
     // 選択したタームの投稿があれば以下の処理をする
     if (count($sTermLists) == count($txnmyLists)) {
      // var_dump($txnmyLists);
      $txnmyUniqueLists = array_unique($txnmyLists);
      $taxArgs = array(
       'relation' => 'AND',
      );
      foreach ($txnmyUniqueLists as $txnmyUniqueItem) {
       $txnmyChildTerm = array();
       foreach ($termLists[$txnmyUniqueItem] as $termItem) {
        // var_dump($termItem);
        $txnmyChildTerm[] = $termItem;
       }
       // var_dump($txnmyChildTerm);
       $taxArgs[] = array(
        'taxonomy' => $txnmyUniqueItem, //タクソノミーを指定
        'field' => 'slug',
        'terms' => $txnmyChildTerm, //ターム名をスラッグで指定する
        'operator' => 'AND',
        'include_children' => false,
       );
      }
      $args02 = array(
       'post_type' => 'works_case',
       'post_status' => 'publish',
       'paged' => $paged,
       'posts_per_page' => 9, // 表示件数
       'orderby'     => 'date',
       'order' => 'DESC',
       'tax_query' => $taxArgs,
      );
      // var_dump($args02);
      $the_query = new WP_Query($args02);
      // var_dump($taxArgs);
      if (!$the_query->have_posts()) {
       $subLoopPosts = false;
      }
      // var_dump($the_query);
     } else {
      $subLoopPosts = false;
     }
    } elseif (isset($_GET['txnmySlug']) && isset($_GET['termSlug'])) {
     $txnmySlug = $_GET['txnmySlug'];
     $termSlug = $_GET['termSlug'];
     $txnmyLists = array();
     $termObjects = get_terms(array(
      'slug' => $termSlug,
     ));
     foreach ($termObjects as $termObject) {
      $txnmyLists[] = $termObject->taxonomy;
     }
     // var_dump($txnmyLists);
     // 選択したタームの投稿があれば以下の処理をする
     if (count($txnmyLists) != 0) {
      $args03 = array(
       'post_type' => 'works_case',
       'post_status' => 'publish',
       'paged' => $paged,
       'posts_per_page' => 9, // 表示件数
       'orderby'     => 'date',
       'order' => 'DESC',
       'tax_query' => array(
        array(
         'taxonomy' => $txnmySlug, //タクソノミーを指定
         'field' => 'slug',
         'terms' => array($termSlug), //ターム名をスラッグで指定する
         'operator' => 'AND',
         'include_children' => true,
        )
       )
      );
      $the_query = new WP_Query($args03);
     } else {
      $subLoopPosts = false;
     }
    } else {
     $args04 = array(
      'post_type' => 'works_case',
      'post_status' => 'publish',
      'paged' => $paged,
      'posts_per_page' => 9, // 表示件数
      'orderby'     => 'date',
      'order' => 'DESC',
     );
     $the_query = new WP_Query($args04);
    }
    // var_dump($subLoopPosts);
   ?>

    <?php if ($subLoopPosts == true) :

    ?>


     <?php
     // var_dump($the_query);
     if ($the_query->have_posts()) :
      while ($the_query->have_posts()) : $the_query->the_post();
     ?>


       <div class="p-srchRslt__card">
        <figure class="p-srchRslt__cardMovie">
         <?php
         $hoge = get_field('info_movie');
         if ($hoge) :
          echo $embed_code = wp_oembed_get($hoge);
         endif;
         ?>
        </figure>
        <a href="<?php the_permalink(); ?>">
         <p class="p-srchRslt__cardTxt">
          <!-- <//?php
          $termsInfomation = get_the_terms($the_query->ID, 'purpose');
          if ($termsInfomation) {
           foreach ($termsInfomation as $termsInfo) {
            echo $termsInfo->name;
            echo '<br>';
           }
          }
          $termsInfomation = get_the_terms($the_query->ID, 'expression_method');
          if ($termsInfomation) {
           foreach ($termsInfomation as $termsInfo) {
            echo $termsInfo->name;
            echo '<br>';
           }
          }
          $termsInfomation = get_the_terms($the_query->ID, 'price_range');
          if ($termsInfomation) {
           foreach ($termsInfomation as $termsInfo) {
            echo $termsInfo->name;
            echo '<br>';
           }
          }
          $termsInfomation = get_the_terms($the_query->ID, 'video_length');
          if ($termsInfomation) {
           foreach ($termsInfomation as $termsInfo) {
            echo $termsInfo->name;
            echo '<br>';
           }
          }
          $termsInfomation = get_the_terms($the_query->ID, 'industry');
          if ($termsInfomation) {
           foreach ($termsInfomation as $termsInfo) {
            echo $termsInfo->name;
            echo '<br>';
           }
          }
          ?> -->
          <?php the_title(); ?>
         </p>
        </a>
       </div>

     <?php
      endwhile;
     endif;
     ?>

    <?php else : ?>

     <p class="p-search__noResult">
      申し訳ありませんが、お探しの制作実績は見つかりませんでした。<br>
      条件を変えてお試しください。
     </p>

    <?php endif; ?>

   <?php endif;
   // search.phpのメインループを使うかサブループで絞り込むのかの判定
   ?>
  </div>

  <?php
  wp_reset_postdata();
  if (isset($_GET['termLists']) || isset($_GET['termSlug'])) :
   if ($subLoopPosts == true) :
  ?>
    <div class="l-search__pageNavi">
     <?php wp_pagenavi(['query' => $the_query]); ?>
    </div>
   <?php endif; ?>
  <?php endif; ?>


  </ /?php endwhile; // メインループ終了 ?>

  <div class="p-search__cta">

   <div class="p-search__ctaBanner c-ctaBanner">
    <p class="c-ctaBanner__txt">動画制作・動画集客に関することはお気軽にご相談ください。
    </p>
    <p class="c-ctaBanner__txt">専任スタッフがすぐに<br class="u-mobile">ご連絡いたします。</p>
    <div class="c-ctaBanner__btn">
     <a href="<?php echo esc_url(home_url('/contact/')); ?>">まずは無料相談してみる</a>
    </div>
   </div>

   <div class="p-search__ctaBtn">
    <a href="<?php echo esc_url(home_url('/')); ?>">ホームへ戻る</a>
   </div>

  </div>


 </div>
</main>


<?php get_footer(); ?>