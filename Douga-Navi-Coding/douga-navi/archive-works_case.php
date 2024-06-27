<?php get_header(); ?>

<main class="p-search">
 <div class="p-search__inner">

  <h1 class="p-search__ttl">YouTube・動画一覧</h1>
  <p class="p-search__explain">コンテンツタイトルの説明文が入りますコンテンツタイトルの説明文が入りますコンテンツタイトルの説明文が入りますコンテンツタイトルの説明文が入りますコンテンツタイトルの説明文が入りますコンテンツタイトルの</p>

  <article class="p-search__cnditins p-srchCnditin">

   <h2 class="p-srchCnditin__ttl">カテゴリーから<br class="u-mobile">動画制作実績を探す</h2>

   <!-- <form action="#"> -->


   <dl class="p-srchCnditin__defLists">

    <dt class="p-srchCnditin__defTerm">
     <span>用途から探す</span>
    </dt>
    <dd class="p-srchCnditin__defDescr">
     <?php
     $txnmySlug = "purpose";
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
       ?>
        <ul class="p-srchCnditin__prntsTermLists">
         <li class="p-srchCnditin__prntsTermItem">

          <div class="p-srchCnditin__prntsTermBox">
           <label for="<?php echo esc_html($termItemA_slug); ?>">
            <input type="checkbox" id="<?php echo esc_html($termItemA_slug); ?>" name="termParents[]" value="<?php echo esc_html($termItemA_slug); ?>"><span class="p-srchCnditin__prntsTermName"><?php echo $termItemA->name; ?></span>
           </label><span class="p-srchCnditin__accdionBtn js-srchAccrdin"></span>
          </div>

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
               <input type="checkbox" name="term[]" id="<?php echo esc_html($termItemC_slug); ?>" value="<?php echo esc_html($termItemC_slug); ?>"><span><?php echo $termItemC->name; ?></span>
              </label>
             </li>
            <?php endforeach; ?>
           </ul>
          </div>
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
            <input type="checkbox" name="term[]" id="<?php echo esc_html($termItemA_slug); ?>" value="<?php echo esc_html($termItemA_slug); ?>"><span><?php echo $termItemA->name; ?></span>
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


   <dl class="p-srchCnditin__defLists">

    <dt class="p-srchCnditin__defTerm">
     <span>表現方法から探す</span>
    </dt>
    <dd class="p-srchCnditin__defDescr">
     <?php
     $txnmySlug = "expression_method";
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
       ?>
        <ul class="p-srchCnditin__prntsTermLists">
         <li class="p-srchCnditin__prntsTermItem">

          <div class="p-srchCnditin__prntsTermBox">
           <label for="<?php echo esc_html($termItemA_slug); ?>">
            <input type="checkbox" id="<?php echo esc_html($termItemA_slug); ?>" name="termParents[]" value="<?php echo esc_html($termItemA_slug); ?>"><span class="p-srchCnditin__prntsTermName"><?php echo $termItemA->name; ?></span>
           </label><span class="p-srchCnditin__accdionBtn js-srchAccrdin"></span>
          </div>

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
               <input type="checkbox" name="term[]" id="<?php echo esc_html($termItemC_slug); ?>" value="<?php echo esc_html($termItemC_slug); ?>"><span><?php echo $termItemC->name; ?></span>
              </label>
             </li>
            <?php endforeach; ?>
           </ul>
          </div>
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
            <input type="checkbox" name="term[]" id="<?php echo esc_html($termItemA_slug); ?>" value="<?php echo esc_html($termItemA_slug); ?>"><span><?php echo $termItemA->name; ?></span>
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


   <dl class="p-srchCnditin__defLists">

    <dt class="p-srchCnditin__defTerm">
     <span>価格帯から探す</span>
    </dt>
    <dd class="p-srchCnditin__defDescr">
     <?php
     $txnmySlug = "price_range";
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
       ?>
        <ul class="p-srchCnditin__prntsTermLists">
         <li class="p-srchCnditin__prntsTermItem">

          <div class="p-srchCnditin__prntsTermBox">
           <label for="<?php echo esc_html($termItemA_slug); ?>">
            <input type="checkbox" id="<?php echo esc_html($termItemA_slug); ?>" name="termParents[]" value="<?php echo esc_html($termItemA_slug); ?>"><span class="p-srchCnditin__prntsTermName"><?php echo $termItemA->name; ?></span>
           </label><span class="p-srchCnditin__accdionBtn js-srchAccrdin"></span>
          </div>

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
               <input type="checkbox" name="term[]" id="<?php echo esc_html($termItemC_slug); ?>" value="<?php echo esc_html($termItemC_slug); ?>"><span><?php echo $termItemC->name; ?></span>
              </label>
             </li>
            <?php endforeach; ?>
           </ul>
          </div>
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
            <input type="checkbox" name="term[]" id="<?php echo esc_html($termItemA_slug); ?>" value="<?php echo esc_html($termItemA_slug); ?>"><span><?php echo $termItemA->name; ?></span>
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


   <dl class="p-srchCnditin__defLists">

    <dt class="p-srchCnditin__defTerm">
     <span>動画尺から探す</span>
    </dt>
    <dd class="p-srchCnditin__defDescr">
     <?php
     $txnmySlug = "video_length";
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
       ?>
        <ul class="p-srchCnditin__prntsTermLists">
         <li class="p-srchCnditin__prntsTermItem">

          <div class="p-srchCnditin__prntsTermBox">
           <label for="<?php echo esc_html($termItemA_slug); ?>">
            <input type="checkbox" id="<?php echo esc_html($termItemA_slug); ?>" name="termParents[]" value="<?php echo esc_html($termItemA_slug); ?>"><span class="p-srchCnditin__prntsTermName"><?php echo $termItemA->name; ?></span>
           </label><span class="p-srchCnditin__accdionBtn js-srchAccrdin"></span>
          </div>

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
               <input type="checkbox" name="term[]" id="<?php echo esc_html($termItemC_slug); ?>" value="<?php echo esc_html($termItemC_slug); ?>"><span><?php echo $termItemC->name; ?></span>
              </label>
             </li>
            <?php endforeach; ?>
           </ul>
          </div>
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
            <input type="checkbox" name="term[]" id="<?php echo esc_html($termItemA_slug); ?>" value="<?php echo esc_html($termItemA_slug); ?>"><span><?php echo $termItemA->name; ?></span>
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

   <dl class="p-srchCnditin__defLists">

    <dt class="p-srchCnditin__defTerm">
     <span>業種から探す</span>
    </dt>
    <dd class="p-srchCnditin__defDescr">
     <?php
     $txnmySlug = "industry";
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
       ?>
        <ul class="p-srchCnditin__prntsTermLists">
         <li class="p-srchCnditin__prntsTermItem">

          <div class="p-srchCnditin__prntsTermBox">
           <label for="<?php echo esc_html($termItemA_slug); ?>">
            <input type="checkbox" id="<?php echo esc_html($termItemA_slug); ?>" name="termParents[]" value="<?php echo esc_html($termItemA_slug); ?>"><span class="p-srchCnditin__prntsTermName"><?php echo $termItemA->name; ?></span>
           </label><span class="p-srchCnditin__accdionBtn js-srchAccrdin"></span>
          </div>

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
               <input type="checkbox" name="term[]" id="<?php echo esc_html($termItemC_slug); ?>" value="<?php echo esc_html($termItemC_slug); ?>"><span><?php echo $termItemC->name; ?></span>
              </label>
             </li>
            <?php endforeach; ?>
           </ul>
          </div>
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
            <input type="checkbox" name="term[]" id="<?php echo esc_html($termItemA_slug); ?>" value="<?php echo esc_html($termItemA_slug); ?>"><span><?php echo $termItemA->name; ?></span>
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



   <div class="p-srchCnditin__btnWrppr">

    <button type="reset" class="p-srchCnditin__cancellBtn">カテゴリーの選択を解除する</button>
    <button type="submit" class="p-srchCnditin__submitBtns">カテゴリーごとに検索する</button>
   </div>
   <!-- </form> -->
  </article>



  <div class="p-search__result p-srchRslt">
   </ /?php while (have_posts()) : the_post(); // メインループ開始 ?>
   <?php
   if (isset($_GET['txnmySlug'])) {
    $txnmySlug = $_GET['txnmySlug'];
    // var_dump('タクソノミースラッグ/' . $txnmySlug);
   };
   if (isset($_GET['termId'])) {
    $termId = $_GET['termId'];
    // var_dump('タームID/' . $termId);
   };
   if (isset($_GET['termSlug'])) {
    $termSlug = $_GET['termSlug'];
    // var_dump('タームスラッグ名/' . $termSlug);
   };

   $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
   // var_dump($paged);

   // if (isset($_GET['txnmySlug']) && )

   $args = array(
    'post_type' => 'works_case',
    // 'post_status' => 'publish',
    'paged' => $paged,
    'posts_per_page' => 9, // 表示件数
    'orderby'     => 'date',
    'order' => 'DESC',
    'tax_query' => array(
     'taxonomy' => $txnmySlug, //タクソノミーを指定
     'field' => 'id',
     'terms' => $termId, //ターム名をスラッグで指定する
     // 'operator' => 'IN'

    )
   );

   $the_query = new WP_Query($args);

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
      <p class="p-srchRslt__cardTxt">
       <?php the_title(); ?>
      </p>
     </div>

   <?php
    endwhile;
   endif;
   wp_reset_postdata();
   ?>

   <?php
   wp_pagenavi(['query' => $the_query]);
   // wp_pagenavi();
   ?>

   </ /?php endwhile; // メインループ終了 ?>


  </div>

  <div class="p-search__cta">

   <div class="p-search__ctaBanner c-ctaBanner">
    <p class="c-ctaBanner__txt">動画制作・動画集客に関することはお気軽にご相談ください。
    </p>
    <p class="c-ctaBanner__txt">専任スタッフがすぐに<br class="u-mobile">ご連絡いたします。</p>
    <div class="c-ctaBanner__btn">
     <a href="#">まずは無料相談してみる</a>
    </div>
   </div>

   <div class="p-search__ctaBtn">
    <a href="<?php echo esc_url(home_url('/')); ?>">ホームへ戻る</a>
   </div>

  </div>


 </div>
</main>


<?php get_footer(); ?>