<?php get_header(); ?>

<main class="p-search">
 <div class="p-search__inner">

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
   if (isset($_GET['s']) && !empty($_GET['s']) && !isset($_GET['termSlug']) && !isset($_GET['termLists'])) :
    $noNeedLoop = true;
    // echo '010101010101';
    $serchword = get_search_query();
    global $wpdb;
    /* ------------------------------
     1. ACFフィールドの全フィールド名取得
    複数ある・名称がわからない前提で個別に振られるField Keys（field_XXX（ID）からフィールド名を取得
    ※特定のフィールドのみ検索する場合はこの項目はスキップ
    ------------------------------ */
    $acf_fields = $wpdb->get_results($wpdb->prepare(
     "
	SELECT *
	FROM wp_postmeta
	WHERE meta_value LIKE %s",
     $wpdb->esc_like('field_') . '%'
    ), ARRAY_A);

    // var_dump($acf_fields);

    //取得した情報を整理する
    $acf_keys = array();
    foreach ($acf_fields as $acf_field) {
     $acf_field_name = $acf_field['meta_key'];

     //そのままだとフィールド名の前にアンダーバーがついているので削除
     $acf_field_name = ltrim($acf_field_name, '_');

     //綺麗にしたものを配列に格納
     array_push($acf_keys, $acf_field_name);
    }

    // var_dump($acf_keys);


    $acf_keys = array_unique($acf_keys);
    $acf_keys = array_values($acf_keys); //配列番号を振り直し

    // var_dump($acf_keys);


    /* ------------------------------
2. ACFの項目に検索キーワードが含まれるかチェック
------------------------------ */
    $i = '0'; //最初の配列番号
    $acf_keynum = count($acf_keys); //取得したACFのフィールド名の数 計算
    // var_dump($acf_keys);
    // var_dump($acf_keynum);
    $acf_check = array();

    while ($acf_keynum > $i) {
     //FROMに検索したいデータベーステーブル
     //meta_key に 検索したいフィールド
     //meta_value に検索したいキーワードを設定
     //    $check = $wpdb->get_results($wpdb->prepare(
     //     "
     // SELECT *
     // FROM wp_postmeta
     // WHERE
     // meta_key = '" . $acf_keys[$i] . "'
     // AND
     // meta_value = '" . $serchword . "'
     // "
     //    ), ARRAY_A);



     $check = $wpdb->get_results($wpdb->prepare(
      "
     SELECT *
     FROM wp_postmeta
     WHERE
     meta_key = '" . esc_sql($acf_keys[$i]) . "'
     AND
     meta_value LIKE '%" . esc_sql($serchword) . "%'
     "
     ), ARRAY_A);


     // var_dump($acf_keys[$i]);
     // var_dump($serchword);
     // var_dump($check);
     //検索結果を$acf_checkに格納
     foreach ($check as $checkpost) {
      //投稿IDを取得
      $post_id = $checkpost['post_id'];
      // var_dump($post_id);

      //値を取得
      $meta_value = $checkpost['meta_value'];
      // var_dump($post_id);

      //公開済みのページのみに絞り込み
      if (get_post_status($post_id) == 'publish' && get_post_type($post_id) == 'works_case') {
       if (!empty($meta_value)) {
        //値が空のものは除外する
        array_push($acf_check, $post_id);
       }
      }
     }
     $i++; //次の配列へ
    }
    // var_dump($acf_check);

    //重複削除（複数フィールドで同じ投稿IDがHITした場合を考慮）
    $result_acf = array_unique($acf_check);
    $result_acf = array_values($result_acf); //配列番号を振り直し

    // var_dump($result_acf);

    /* ------------------------------
3. 通常の検索（タイトル・本文）の項目に検索キーワードが含まれるかチェック
※不要の場合はスキップ
------------------------------ */
    //タイトル
    $result_title = array();
    $check_title = $wpdb->get_results($wpdb->prepare(
     "
    SELECT ID FROM wp_posts
    WHERE
	post_title LIKE '%" . esc_sql($serchword) . "%'
	AND
	post_status = 'publish'
 AND
 post_type = 'works_case'
    "
    ), ARRAY_A);
    //検索結果を$result_titleに格納
    foreach ($check_title as $checkpost) {
     array_push($result_title, $checkpost['ID']);
    }

    //本文
    $result_content = array();
    $check_content = $wpdb->get_results($wpdb->prepare(
     "
    SELECT ID FROM wp_posts
    WHERE
	post_content LIKE '%" . esc_sql($serchword) . "%'
	AND
	post_status = 'publish'
 AND
 post_type = 'works_case'
    "
    ), ARRAY_A);
    //検索結果を$result_titleに格納
    foreach ($check_content as $checkpost) {
     array_push($result_content, $checkpost['ID']);
    }


    /* ------------------------------
4. 出力用にデータ合体
------------------------------ */
    //検索結果データを結合
    $result_post = $result_acf + $result_title + $result_content;

    //重複削除
    $result_post = array_unique($result_post);
    $result_post = array_values($result_post); //配列番号を振り直し

    // var_dump($result_post);
   ?>


    <?php if (!empty($result_post)) : ?>
     <!-- 今回はリスト形式で出力しています。-->
     <ul>
      <?php
      foreach ($result_post as $postid) :
       $post = get_post($postid, OBJECT);
       // var_dump($post);
      ?>
       <!-- get_template_part()での出力も可能です -->
       <li><a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></li>
      <?php endforeach; ?>
     </ul>
    <?php else : //検索結果0件だった場合の処理　
    ?>
     <div>
      <p>「<?php echo $serchword; ?>」の記事はありません</p>
     </div>
    <?php endif; ?>


    <!-- <//?php
    if (have_posts()) :
     while (have_posts()) : the_post();
    ?>

      <div class="p-srchRslt__card">
       <figure class="p-srchRslt__cardMovie">
        <//?php
        $hoge = get_field('info_movie');
        if ($hoge) :
         echo $embed_code = wp_oembed_get($hoge);
        endif;
        ?>
       </figure>
       <a href="<//?php the_permalink(); ?>">
        <p class="p-srchRslt__cardTxt">
         <//?php
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
         ?>
         <//?php the_title(); ?>
        </p>
       </a>
      </div>

     <//?php endwhile; ?>
    <//?php else : ?>
     <p class="p-search__noResult">
      申し訳ありませんが、お探しの制作実績は見つかりませんでした。<br>
      条件を変えてお試しください。
     </p>

    <//?php endif; ?> -->




   <?php
   // search.phpのメインループ機能を使わず条件を決めてサブループで検索する場合
   elseif ((isset($_GET['s']) && empty($_GET['s'])) || !isset($_GET['s'])) :
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

     $args03 = array(
      'post_type' => 'works_case',
      'post_status' => 'publish',
      'paged' => $paged,
      'posts_per_page' => 9, // 表示件数
      'orderby'     => 'date',
      'order' => 'DESC',
     );
     $the_query = new WP_Query($args03);
    ?>


    <?php
    // フリーワード検索に値がなくて別ページからターム絞り込みしてきた場合
    elseif (isset($_GET['s']) && !empty($_GET['s'])  && isset($_GET['termSlug']) && !isset($_GET['termLists']) || !isset($_GET['s'])  && isset($_GET['termSlug']) && !isset($_GET['termLists'])) :

     // echo '040404040404';

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
      $args04 = array(
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
         'operator' => 'IN',
         'include_children' => true,
        )
       )
      );
      $the_query = new WP_Query($args04);
      // var_dump($the_query);
     } else {
      $noNeedLoop = true;
     }

    ?>

    <?php
    // フリーワード検索に値がなくて複数ターム絞り込みした場合
    elseif (isset($_GET['s']) && empty($_GET['s'])  && !isset($_GET['termSlug']) && isset($_GET['termLists']) || (!isset($_GET['s'])  && !isset($_GET['termSlug']) && isset($_GET['termLists']))) :

     // echo '0505050505';

     $sTermLists = $_GET['termLists'];
     // var_dump($sTermLists);
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
     // var_dump(count($termLists) > 0);
     // var_dump($txnmyLists);
     // 選択したタームの投稿があれば以下の処理をする
     if (count($termLists) > 0) {
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
        'operator' => 'IN',
        'include_children' => false,
       );
      }
      $args05 = array(
       'post_type' => 'works_case',
       'post_status' => 'publish',
       'paged' => $paged,
       'posts_per_page' => 9, // 表示件数
       'orderby'     => 'date',
       'order' => 'DESC',
       'tax_query' => $taxArgs,
      );
      // var_dump($args04);
      $the_query = new WP_Query($args05);
      // var_dump($the_query);
     } else {
      $noNeedLoop = true;
     }
    ?>

    <?php endif; ?>


    <?php if ($noNeedLoop == false) : ?>
     <?php if ($the_query->have_posts()) : ?>
      <?php while ($the_query->have_posts()) : $the_query->the_post();  ?>
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

    <?php else : ?>
     <p class="p-search__noResult">
      申し訳ありませんが、お探しの制作実績は見つかりませんでした。<br>
      条件を変えてお試しください。
     </p>

    <?php endif; ?>

   <?php endif; ?>




  </div>

  <?php wp_reset_postdata(); ?>

  <?php if ($noNeedLoop == false) : ?>
   <div class="l-search__pageNavi">
    <?php wp_pagenavi(['query' => $the_query]); ?>
   </div>
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