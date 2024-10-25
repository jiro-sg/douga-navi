<?php get_header(); ?>

<main class="p-search">
 <div class="p-search__inner">

  <!-- <//?php var_dump(urldecode($_SERVER['QUERY_STRING'])); ?> -->
  <?php $queryStringArray = explode("&", urldecode($_SERVER['QUERY_STRING'])); ?>
  <!-- <//?php var_dump($queryStringArray); ?> -->

  <?php
  $sParaNum = 0;
  $newQueryString = "";
  foreach ($queryStringArray as $queryStringkeyVal) {
   $queryStringkey_val = explode("=", $queryStringkeyVal);
   if ($queryStringkey_val[0] == "s") {
    $sParaNum += 1;
   }
  };
  ?>

  <?php if (!isset($_GET['s']) && !isset($_GET['txnmySlug']) && !isset($_GET['termId']) && !isset($_GET['termLists'])) : ?>

   <h1 class="p-search__ttl">動画実績を探す</h1>

  <?php
  elseif (isset($_GET['termSlug']) && !isset($_GET['s'])) :
   $termSlug = $_GET['termSlug'];
   $txnmySlug = $_GET['txnmySlug'];
   // var_dump($termSlug);
   $termObjectLIsts = get_terms(array(
    'slug' => $termSlug,
    'hide_empty' => false,
   ));
   // var_dump($termObjectLIsts);
   $termIDLists = array();
   $termNameLists = array();
   foreach ($termObjectLIsts as $termObjectItem) {
    $termIDLists[] = $termObjectItem->term_id;
    $termNameLists[] = $termObjectItem->name;
   }
  ?>

   <h1 class="p-search__ttl">
    <?php
    foreach ($termNameLists as $termNameItem) {
     echo $termNameItem;
    }
    ?>一覧</h1>

   <?php
   $termdescriptionLists = array();
   foreach ($termIDLists as $termItem) {
    $termdescriptionLists[] = term_description($termItem, $txnmySlug);
   }
   foreach ($termdescriptionLists as $termdescriptionItem) :
    if (!empty($termdescriptionItem)) :
   ?>
     <p class="p-search__explain"><?php echo $termdescriptionItem; ?></p>
   <?php endif;
   endforeach;
   ?>

  <?php
  elseif (isset($_GET['s']) ||  isset($_GET['termLists'])) :
  ?>

   <h1 class="p-search__ttl">動画実績を探す</h1>

  <?php else : ?>

   <h1 class="p-search__ttl">動画実績を探す</h1>

  <?php endif; ?>



  <article class="p-search__cnditins p-srchCnditin">
   <div class="p-srchCnditin__ttlBox js-searchBtnAccdin">
    <h2 class="p-srchCnditin__ttl">動画事例を絞り込む</h2>
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
   if (isset($_GET['s']) && !empty($_GET['s']) && !isset($_GET['termSlug']) && !isset($_GET['termLists'])) :
    $wpPageNavi = false;
    $noNeedLoop = false;
    // echo '010101010101';
    // $serchword = get_search_query();
    // global $wpdb;
   ?>


    <?php
    $searchWord = get_search_query();

    $metaKey = 'date';

    if (isset($_GET['date'])) { //価格順
     $orderSet = $_GET['date'];
     $metaKey = 'date';
    } elseif (isset($_GET['info_price'])) { //新着順
     $orderSet = $_GET['info_price'];
     $metaKey = 'info_price';
    } else {
     $orderSet = 'DESC';
    }

    // var_dump($orderSet);

    if ($metaKey === 'date') {
     $args01 =   array(
      'post_type' => array('works_case'),
      'post_status' => 'publish',
      'paged' => $paged,
      'posts_per_page' => 9,
      'orderby' => 'date',
      'order' => $orderSet,
      's' => $searchWord,
     );
    } else {
     $args01 =   array(
      'post_type' => array('works_case'),
      'post_status' => 'publish',
      'paged' => $paged,
      'posts_per_page' => 9,
      'meta_key' => $metaKey,
      'orderby' => 'meta_value_num',
      // 'orderby' => 'meta_value',
      'order' => $orderSet,
      's' => $searchWord,
     );
    };

    $the_query = new WP_Query($args01);
    ?>

    <?php
    if ($the_query->have_posts()) : ?>

     <div class="p-srchRslt__show">

      <p class="p-srchRslt__count">
       検索結果<span class="p-srchRslt__count--large"><?php echo $the_query->found_posts; ?></span>件
      </p>

      <div class="p-srchRslt__sortWrppr js-sortTab">

       <p class="p-srchRslt__sortHeading">
        並び替える
       </p>

       <input type="hidden" form="search-form" name="s" value="<?php echo $searchWord ?>">
       <div class="p-srchRslt__sortSelect">
        <ul class="p-srchRslt__sortList">
         <!-- <li class="p-srchRslt__sortItem">
          <button type="submit" form="search-form" name="date" value="DESC">
           新しい順
          </button>
         </li>
         <li class="p-srchRslt__sortItem">
          <button type="submit" form="search-form" name="date" value="ASC">
           古い順
          </button>
         </li> -->
         <li class="p-srchRslt__sortItem">
          <button type="submit" form="search-form" name="info_price" value="ASC">
           価格の低い順
          </button>
         </li>
         <li class="p-srchRslt__sortItem">
          <button type="submit" form="search-form" name="info_price" value="DESC">
           価格の高い順
          </button>
         </li>
        </ul>
       </div>

      </div>
     </div>

     <div class="p-srchRslt__Wrppr">
      <?php
      while ($the_query->have_posts()) : $the_query->the_post();
      ?>

       <div class="p-srchRslt__card">
        <figure class="p-srchRslt__cardMovie">
         <!-- <//?php
        $hoge = get_field('info_movie');
        if ($hoge) :
         echo $embed_code = wp_oembed_get($hoge);
        endif;
        ?> -->
         <?php get_template_part('_inc/youtube'); ?>
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
         <p class="p-srchRslt__industrory">
          <span>
           業種：<?php echo get_field('info_business'); ?>
          </span>
         </p>
         <p class="p-srchRslt__price">
          <?php $info_price = get_field('info_price'); ?>
          <span>
           <?php if (is_numeric($info_price)): ?>
            価格：&yen;<?php echo number_format($info_price); ?>
           <?php else: ?>
            価格：
           <?php endif; ?>
          </span>
         </p>
         <p class="p-srchRslt__toDetail">
          詳細を見る
         </p>
        </a>
       </div>

      <?php endwhile; ?>
     </div>
    <?php else : ?>


     <p class="p-search__noResult">
      申し訳ありませんが、お探しの制作実績は見つかりませんでした。<br>
      条件を変えてお試しください。
     </p>

    <?php endif; ?>





   <?php

   // search.phpのメインループ機能を使わず条件を決めてサブループで検索する場合
   elseif ((isset($_GET['s']) && empty($_GET['s'])) || (isset($_GET['s']) && $sParaNum > 1) || !isset($_GET['s'])) :
    $wpPageNavi = true;
    // echo '0202020202';
    //投稿がない場合は変数$noNeedLoopがtrueとなりサブループを回さずに、
    // 代わりに検索ヒットしない旨のメッセージを表示する
    $noNeedLoop = false;
   ?>

    <?php
    // フリーワード検索もターム絞り込みもない場合
    // ↓
    //動画実績を絞り込みせず全部表示する
    if ((isset($_GET['s']) && empty($_GET['s']) && !isset($_GET['termSlug']) && !isset($_GET['termLists'])) || (!isset($_GET['s'])  && !isset($_GET['termSlug']) && !isset($_GET['termLists']))) :

     // echo '0303030303';

     $metaKey = 'date';

     if (isset($_GET['date'])) { //価格順
      $orderSet = $_GET['date'];
      $metaKey = 'date';
     } elseif (isset($_GET['info_price'])) { //新着順
      $orderSet = $_GET['info_price'];
      $metaKey = 'info_price';
     } else {
      $orderSet = 'desc';
     }

     // var_dump($orderSet);

     if ($metaKey === 'date') {
      $args03 = array(
       'post_type' => 'works_case',
       'post_status' => 'publish',
       'paged' => $paged,
       'posts_per_page' => 9, // 表示件数
       'orderby'     => 'date',
       'order' => $orderSet,
      );
     } else {
      $args03 = array(
       'post_type' => 'works_case',
       'post_status' => 'publish',
       'paged' => $paged,
       'posts_per_page' => 9, // 表示件数
       'meta_key' => $metaKey,
       // 'orderby'     => array('meta_value_num' => $orderSet),
       'orderby'     => 'meta_value_num',
       'order' => $orderSet,
      );
     }
     $the_query = new WP_Query($args03);
    ?>


    <?php
    // フリーワード検索に値がなくて別ページからターム絞り込みしてきた場合
    elseif (isset($_GET['s']) && !empty($_GET['s'])  && isset($_GET['termSlug']) && !isset($_GET['termLists']) || !isset($_GET['s'])  && isset($_GET['termSlug']) && !isset($_GET['termLists'])) :

     // echo '040404040404';

     $metaKey = 'date';

     if (isset($_GET['date'])) { //価格順
      $orderSet = $_GET['date'];
      $metaKey = 'date';
     } elseif (isset($_GET['info_price'])) { //新着順
      $orderSet = $_GET['info_price'];
      $metaKey = 'info_price';
     } else {
      $orderSet = 'desc';
     }

     // var_dump($orderSet);

     $txnmySlug = $_GET['txnmySlug'];
     $termSlug = $_GET['termSlug'];
     // var_dump($txnmySlug);
     // var_dump($termSlug);
     $termObjects = get_terms(array(
      'slug' => $termSlug,
     ));
     // 選択したタームの投稿があれば以下の処理をする
     if (count($termObjects) > 0) {
      // var_dump($termObjects);
      $txnmyLists = array();
      foreach ($termObjects as $termObject) {
       $txnmyLists[] = $termObject->taxonomy;
       // var_dump($termObject->taxonomy);
      }
      // var_dump($txnmyLists);
      if ($metaKey === 'date') {
       $args04 = array(
        'post_type' => 'works_case',
        'post_status' => 'publish',
        'paged' => $paged,
        'posts_per_page' => 9, // 表示件数
        'orderby'     => 'date',
        'order' => $orderSet,
        'tax_query' => array(
         array(
          'taxonomy' => $txnmySlug, //タクソノミーを指定
          'field' => 'slug',
          'terms' => array($termSlug), //ターム名をスラッグで指定する
          'operator' => 'IN',
          'include_children' => true,
         )
        )
       );
      } else {
       $args04 = array(
        'post_type' => 'works_case',
        'post_status' => 'publish',
        'paged' => $paged,
        'posts_per_page' => 9, // 表示件数
        'meta_key' => $metaKey,
        'orderby'     => 'meta_value_num',
        'order' => $orderSet,
        'tax_query' => array(
         array(
          'taxonomy' => $txnmySlug, //タクソノミーを指定
          'field' => 'slug',
          'terms' => array($termSlug), //ターム名をスラッグで指定する
          'operator' => 'IN',
          'include_children' => true,
         )
        )
       );
      }
      $the_query = new WP_Query($args04);
      // var_dump($the_query);
     } else {
      $noNeedLoop = true;
     }

    ?>

    <?php
    // フリーワード検索に値がなくて複数ターム絞り込みした場合
    elseif (isset($_GET['s']) && (empty($_GET['s']) || $sParaNum > 1)  && !isset($_GET['termSlug']) && isset($_GET['termLists']) || (!isset($_GET['s'])  && !isset($_GET['termSlug']) && isset($_GET['termLists']))) :

     // echo '0505050505';
     $metaKey = 'date';

     if (isset($_GET['date'])) { //価格順
      $orderSet = $_GET['date'];
      $metaKey = 'date';
     } elseif (isset($_GET['info_price'])) { //新着順
      $orderSet = $_GET['info_price'];
      $metaKey = 'info_price';
     } else {
      $orderSet = 'desc';
     }

     // var_dump($metaKey);
     // var_dump($orderSet);

     $termLists = $_GET['termLists'];
     // var_dump($termLists);
     $txnmyLists = array();
     foreach ($termLists as $termItem) {
      // var_dump($termItem);
      $termObjects = get_terms(array(
       'slug' => $termItem,
      ));
      // var_dump($termObjects);
      foreach ($termObjects as $termObject) {
       $txnmyLists[] = $termObject->taxonomy;
       $taxnmyName = $termObject->taxonomy;
       $termLists[$taxnmyName][] = $termItem;
      }
     }
     // var_dump(count($termLists) > 0);
     // var_dump($txnmyLists);
     // 選択したタームの投稿があれば以下の処理をする
     if (count($termObjects) > 0) {
      $txnmyUniqueLists = array_unique($txnmyLists);
      $taxArgs = array();
      foreach ($txnmyUniqueLists as $txnmyUniqueItem) {
       $txnmyChildTerm = array();
       foreach ($termLists[$txnmyUniqueItem] as $termItem) {
        // var_dump($termItem);
        $txnmyChildTerm[] = $termItem;
       }
       // var_dump($txnmyChildTerm);
       $taxArgs[] = array(
        'relation' => 'AND',
        'taxonomy' => $txnmyUniqueItem, //タクソノミーを指定
        'field' => 'slug',
        'terms' => $txnmyChildTerm, //ターム名をスラッグで指定する
        'operator' => 'IN',
        'include_children' => false,
       );
      }

      if ($metaKey === 'date') {
       // var_dump('ppp');
       $args05 = array(
        'post_type' => 'works_case',
        'post_status' => 'publish',
        'paged' => $paged,
        'posts_per_page' => 9, // 表示件数
        'orderby'     => 'date',
        'order' => $orderSet,
        'tax_query' => $taxArgs,
       );
      } else {
       // var_dump('mmm');
       $args05 = array(
        'post_type' => array('works_case'),
        'post_status' => 'publish',
        'paged' => $paged,
        'posts_per_page' => 9, // 表示件数
        'meta_key' => $metaKey,
        // 'orderby' => array('meta_value_num' => $orderSet),
        'orderby' => 'meta_value_num',
        'order' => $orderSet,
        'tax_query' => $taxArgs,
       );
      }
      // var_dump($args05);
      // var_dump($the_query);
      $the_query = new WP_Query($args05);
      // var_dump($the_query);
     } else {
      $noNeedLoop = true;
     }
    ?>

    <?php endif; ?>

    <?php if ($noNeedLoop == false) : ?>

     <?php if ($the_query->have_posts()) : ?>

      <div class="p-srchRslt__show">

       <p class="p-srchRslt__count">
        検索結果<span class="p-srchRslt__count--large"><?php echo $the_query->found_posts; ?></span>件
       </p>

       <div class="p-srchRslt__sortWrppr js-sortTab">

        <p class="p-srchRslt__sortHeading">
         並び替える
        </p>

        <div class="p-srchRslt__sortSelect">
         <ul class="p-srchRslt__sortList">
          <!-- <li class="p-srchRslt__sortItem">
           <button type="submit" form="search-form" name="date" value="DESC">
            新しい順
           </button>
          </li>
          <li class="p-srchRslt__sortItem">
           <button type="submit" form="search-form" name="date" value="ASC">
            古い順
           </button>
          </li> -->
          <li class="p-srchRslt__sortItem">
           <button type="submit" form="search-form" name="info_price" value="ASC">
            価格の低い順
           </button>
          </li>
          <li class="p-srchRslt__sortItem">
           <button type="submit" form="search-form" name="info_price" value="DESC">
            価格の高い順
           </button>
          </li>
         </ul>
        </div>

       </div>
      </div>

      <div class="p-srchRslt__Wrppr">

       <?php while ($the_query->have_posts()) : $the_query->the_post();  ?>
        <div class="p-srchRslt__card">
         <figure class="p-srchRslt__cardMovie">
          <!-- <//?php
                        $hoge = get_field('info_movie');
                        if ($hoge) :
                          echo $embed_code = wp_oembed_get($hoge);
                        endif;
                        ?> -->
          <?php get_template_part('_inc/youtube'); ?>
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
          <p class="p-srchRslt__industrory">
           <span>
            業種：<?php echo get_field('info_business'); ?>
           </span>
          </p>
          <p class="p-srchRslt__price">
           <?php $info_price = get_field('info_price'); ?>
           <span>
            <?php if (is_numeric($info_price)): ?>
             価格：&yen;<?php echo number_format($info_price); ?>
            <?php else: ?>
             価格：
            <?php endif; ?>
           </span>
          </p>
          <p class="p-srchRslt__toDetail">
           詳細を見る
          </p>
         </a>
        </div>

       <?php endwhile; ?>
      </div>

     <?php else : ?>

      <p class="p-search__noResult">
       申し訳ありませんが、お探しの制作実績は見つかりませんでした。<br>
       条件を変えてお試しください。
      </p>

     <?php endif; ?>

    <?php else : ?>
     <p class="p-search__noResult">
      申し訳ありませんが、お探しの制作実績は見つかりませんでした。<br>
      条件を変えてお試しください。
     </p>

    <?php endif; ?>

   <?php else: ?>
    <!-- <//?php echo '070707'; ?> -->

   <?php endif; ?>


  </div>


  <!-- <//?php if ($wpPageNavi == false) : ?> -->
  <!-- <div class="l-search__pageNavi"> -->
  <!-- <//?php wp_pagenavi(); ?> -->
  <!-- </div> -->
  <!-- <//?php else : ?> -->

  <?php if ($noNeedLoop == false) : ?>
   <div class="l-search__pageNavi">
    <!-- <//?php wp_pagenavi(['query' => $the_query]); ?> -->
    <!-- 自作ページネーションここから -->
    <?php
    $plane_url = strtok(get_pagenum_link(), '?');
    // var_dump($plane_url);
    $all_query = http_build_query($_GET);
    // var_dump($all_query);
    $trimming_query = preg_replace('/%5B[0-9]*%5D/', '%5B%5D', $all_query);
    // var_dump($trimming_query);
    $big = 999999999; // need an unlikely integer
    $pagerPaged = max(get_query_var('paged', 1), 1);
    // var_dump('pager_paged=' . $pagerPaged);
    $args = array(
     'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
     'total' => $the_query->max_num_pages /*全ページ数 */,
     'current' =>  $pagerPaged/*現在のページ数*/,
     'show_all' => FALSE,
     'end_size' => 1,
     'mid_size' => 2,
     'prev_next' => FALSE,
     'type' => 'array',
    );
    $navs = paginate_links($args);
    ?>
    <!-- </ /?php var_dump($navs); ?> -->
    <ul class="c-pagination">
     <?php if ($pagerPaged === 2) : ?>
      <!-- </ /?php var_dump($plane_url . '?' . $trimming_query); ?> -->
      <li class="previouspostslink">
       <!-- </ /?php previous_posts_link('<span>' . "«" . '</span>'); ?> -->
       <a href="<?php echo $plane_url . '?' . $trimming_query; ?>"></a>
      </li>
     <?php elseif ($pagerPaged > 2): ?>
      <?php $previousPage = $pagerPaged - 1; ?>
      <?php $previousURL = $plane_url . 'page/' . $previousPage . '/?' . $trimming_query; ?>
      <!-- </ /?php var_dump($previousURL); ?> -->
      <li class="previouspostslink">
       <!-- </ /?php previous_posts_link('<span>' . "«" . '</span>'); ?> -->
       <a href="<?php echo esc_url($previousURL); ?>"></a>
      </li>
     <?php endif; ?>

     <?php
     if (!empty($navs)) {
      foreach ($navs as $nav) :
       $transPage = strip_tags($nav);
       $transURL = $plane_url . 'page/' . $transPage . '/?' . $trimming_query;
     ?>
       <li class="c-pagination__number<?php if ($pagerPaged == $transPage) echo ' current'; ?>">
        <?php if (is_numeric($transPage)) : ?>
         <a href="<?php echo esc_url($transURL); ?>">
          <span>
           <?php echo $transPage; ?>
          </span>
         </a>
        <?php else: ?>
         <span><?php echo esc_html($transPage); ?></span>
        <?php endif; ?>
       </li>
     <?php
      endforeach;
     }
     ?>

     <?php if ($paged < $the_query->max_num_pages) : ?>
      <li class="nextpostslink">
       <?php $nextPage = $pagerPaged + 1; ?>
       <?php $nextURL = $plane_url . 'page/' . $nextPage . '/?' . $trimming_query; ?>
       <!-- </ /?php var_dump($nextURL); ?> -->
       <!-- <//?php next_posts_link('<span>' . "»" . '</span>') ?> -->
       <a href="<?php echo esc_url($nextURL) ?>"></a>
      </li>
     <?php endif; ?>
    </ul>
    <!-- 自作ページネーションここまで -->
   </div>
  <?php endif; ?>
  <!-- <//?php endif; ?> -->
  <?php wp_reset_postdata(); ?>


  </ /?php endwhile; // メインループ終了 ?>

  <div class="p-search__cta">

   <div class="p-search__ctaBanner c-ctaBanner02">
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

   <div class="p-search__ctaBtn">
    <a href="<?php echo esc_url(home_url('/')); ?>">ホームへ戻る</a>
   </div>

  </div>


 </div>
</main>


<?php get_footer(); ?>