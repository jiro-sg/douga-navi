<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
 <!-- Google Tag Manager -->
 <script>
 (function(w, d, s, l, i) {
  w[l] = w[l] || [];
  w[l].push({
   'gtm.start': new Date().getTime(),
   event: 'gtm.js'
  });
  var f = d.getElementsByTagName(s)[0],
   j = d.createElement(s),
   dl = l != 'dataLayer' ? '&l=' + l : '';
  j.async = true;
  j.src =
   'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
  f.parentNode.insertBefore(j, f);
 })(window, document, 'script', 'dataLayer', 'GTM-WPLFTNCL');
 </script>
 <!-- End Google Tag Manager -->
 <meta charset="<?php bloginfo('charset'); ?>">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta name="format-detection" content="telephone=no">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link rel=”icon” href=“/image/favicon.ico”>
 <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">

 <!-- //3秒後にトップページへ自動遷移する -->
 <?php if (is_404()) : ?>
 <meta http-equiv="refresh" content=" 3; url=<?php echo esc_url(home_url("/")); ?>">
 <?php endif; ?>
 <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
 <!-- Google Tag Manager (noscript) -->
 <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WPLFTNCL" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
 <!-- End Google Tag Manager (noscript) -->
 <?php wp_body_open(); ?>
 <header class="p-header">
  <div class="p-header__inner">
   <div class="p-header__aboveRow">

    <div class="p-header__aboveLeft">
     <a href="<?php echo esc_url(home_url()); ?>" class="p-header__logoLink">
      <figure class="p-header__logo">
       <img src="<?php echo get_template_directory_uri() ?>/assets/images/logo01.svg" alt="動画制作ナビ" width="156" height="28">
      </figure>
     </a>
     <div class="p-header__searchBox">
      <?php get_search_form(); ?>
     </div>
    </div>
    <div class="p-header__aboveRight">
     <div class="p-header__drawerBtn js-drawerOpen">
      <figure>
       <img src="<?php echo get_template_directory_uri() ?>/assets/images/ico_search.png" alt="検索欄" width="17" header="20">
      </figure>
     </div>
     <div class="p-header__cntctInfo">
      <a href="tel:0120571500" class="p-header__tel">0120-571-500</a>
      <p class="p-header__bsnssHours"> （受付時間：平日10:00～18:30）</p>
     </div>
     <div class="p-header__cntctBtnBox">
      <a href="<?php echo esc_url(home_url('/contact/')); ?>">無料相談</a>
     </div>
    </div>

   </div>
   <div class="p-header__belowRow">

    <div class="p-header__drawerAbove">
     <div class="p-header__drawerSearchForm">
      <?php get_search_form(); ?>
     </div>
     <div class="p-header__closeBtn js-drawerClose">
      <span></span>
      <span></span>
     </div>
    </div>

    <div class="p-header__drawerBelow">
     <div class="p-header__drawerCntctBtn">
      <a href="#">まずは無料相談してみる</a>
     </div>

     <nav class="p-header__nav">
      <ul class="p-header__navLists">

       <li class="p-header__navItem">
        <a href="<?php echo esc_url(home_url()); ?>">ホーム</a>
       </li>

       <li class="p-header__navItem">
        <a href="<?php echo esc_url(home_url('/search/')); ?>
        ">制作実績から探す</a>
       </li>

       <!-- <li class="p-header__navItem">
        <a href="<//?php echo esc_url(home_url()); ?>
        ">価格</a>
       </li> -->

       <li class="p-header__navItem">
        <a href="<?php echo esc_url(home_url('/about/')); ?>">動画制作ナビとは</a>
       </li>

       <li class="p-header__navItem">
        <a href="<?php echo esc_url(home_url('/flow/')); ?>">ご利用の流れ</a>
       </li>

       <li class="p-header__navItem">
        <a href="<?php echo esc_url(home_url('/faq/')) ?>">よくあるご質問</a>
       </li>
      </ul>

      <ul class="p-header__txnmyLists">
       <li class="p-header__txnmyItem">
        <div class="p-header__txnmyBox js-drawerAccdin">
         <p class="p-header__txnmyName">用途から探す</p><span class="p-header__txnmyAccdinBtn"></span>
        </div>
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

        <ul class="p-header__prntsTermLists">
         <?php foreach ($termListsA as $termItemA) :
            $termItemA_id = $termItemA->term_id;
            $termItemA_slug = $termItemA->slug;
            $termItemA_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemA_id, 'termSlug' => $termItemA_slug), home_url('/search/'));
           ?>
         <li class="p-header__prntsTermItem">
          <a href="<?php echo esc_url($termItemA_link); ?>"><?php echo $termItemA->name; ?></a>

          <ul class="p-header__termLists">
           <?php
              $termListsC = get_terms($txnmySlug, array('hide_empty' => false, 'parent' => $termItemA_id));
              foreach ($termListsC as $termItemC) :
               $termItemC_id = $termItemC->term_id;
               $termItemC_slug = $termItemC->slug;
               $termItemC_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemC_id, 'termSlug' => $termItemC_slug), home_url('/search/'));
              ?>
           <li class="p-header__termItem">
            <a href="<?php echo esc_url($termItemC_link); ?>"><?php echo $termItemC->name; ?></a>
           </li>
           <?php endforeach; ?>
          </ul>
         </li>
         <?php endforeach; ?>

        </ul>
        <?php else : ?>
        <ul class="p-header__termLists">
         <?php
           // タームが１階層しかない場合
           foreach ($termListsA as $termItemA) :
            $termItemA_id = $termItemA->term_id;
            $termItemA_slug = $termItemA->slug;
            $termItemA_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemA_id, 'termSlug' => $termItemA_slug), home_url('/search/'));
           ?>
         <li class="p-header__termItem">
          <a href="<?php echo esc_url($termItemA_link); ?>"><?php echo $termItemA->name; ?></a>
         </li>
         <?php endforeach; ?>
        </ul>
        <?php
         endif;
        endif;
        ?>
       </li>
      </ul>

      <ul class="p-header__txnmyLists">
       <li class="p-header__txnmyItem">
        <div class="p-header__txnmyBox js-drawerAccdin">
         <p class="p-header__txnmyName">表現方法から探す</p><span class="p-header__txnmyAccdinBtn"></span>
        </div>
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

        <ul class="p-header__prntsTermLists">
         <?php foreach ($termListsA as $termItemA) :
            $termItemA_id = $termItemA->term_id;
            $termItemA_slug = $termItemA->slug;
            $termItemA_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemA_id, 'termSlug' => $termItemA_slug), home_url('/search/'));
            // var_dump($termItemA);
           ?>
         <li class="p-header__prntsTermItem">
          <a href="<?php echo esc_url($termItemA_link); ?>"><?php echo $termItemA->name; ?></a>

          <ul class="p-header__termLists">
           <?php
              $termListsC = get_terms($txnmySlug, array('hide_empty' => false, 'parent' => $termItemA_id));
              foreach ($termListsC as $termItemC) :
               $termItemC_id = $termItemC->term_id;
               $termItemC_slug = $termItemC->slug;
               $termItemC_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemC_id, 'termSlug' => $termItemC_slug), home_url('/search/'));
              ?>
           <li class="p-header__termItem">
            <a href="<?php echo esc_url($termItemC_link); ?>"><?php echo $termItemC->name; ?></a>
           </li>
           <?php endforeach; ?>

          </ul>
         </li>
         <?php endforeach; ?>

        </ul>
        <?php else : ?>
        <ul class="p-header__termLists">
         <?php
           // タームが１階層しかない場合
           foreach ($termListsA as $termItemA) :
            $termItemA_id = $termItemA->term_id;
            $termItemA_slug = $termItemA->slug;
            $termItemA_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemA_id, 'termSlug' => $termItemA_slug), home_url('/search/'));
           ?>
         <li class="p-header__termItem">
          <a href="<?php echo esc_url($termItemA_link); ?>"><?php echo $termItemA->name; ?></a>
         </li>
         <?php endforeach; ?>
        </ul>
        <?php
         endif;
        endif;
        ?>
       </li>
      </ul>

      <ul class="p-header__txnmyLists">
       <li class="p-header__txnmyItem">
        <div class="p-header__txnmyBox js-drawerAccdin">
         <p class="p-header__txnmyName">価格帯から探す</p><span class="p-header__txnmyAccdinBtn"></span>
        </div>
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

        <ul class="p-header__prntsTermLists">
         <?php foreach ($termListsA as $termItemA) :
            $termItemA_id = $termItemA->term_id;
            $termItemA_slug = $termItemA->slug;
            $termItemA_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemA_id, 'termSlug' => $termItemA_slug), home_url('/search/'));
            // var_dump($termItemA);
           ?>
         <li class="p-header__prntsTermItem">
          <a href="<?php echo esc_url($termItemA_link); ?>"><?php echo $termItemA->name; ?></a>

          <ul class="p-header__termLists">
           <?php
              $termListsC = get_terms($txnmySlug, array('hide_empty' => false, 'parent' => $termItemA_id));
              foreach ($termListsC as $termItemC) :
               $termItemC_id = $termItemC->term_id;
               $termItemC_slug = $termItemC->slug;
               $termItemC_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemC_id, 'termSlug' => $termItemC_slug), home_url('/search/'));
              ?>
           <li class="p-header__termItem">
            <a href="<?php echo esc_url($termItemC_link); ?>"><?php echo $termItemC->name; ?></a>
           </li>
           <?php endforeach; ?>
          </ul>
         </li>
         <?php endforeach; ?>

        </ul>
        <?php else : ?>
        <ul class="p-header__termLists">
         <?php
           // タームが１階層しかない場合
           foreach ($termListsA as $termItemA) :
            $termItemA_id = $termItemA->term_id;
            $termItemA_slug = $termItemA->slug;
            $termItemA_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemA_id, 'termSlug' => $termItemA_slug), home_url('/search/'));
           ?>
         <li class="p-header__termItem">
          <a href="<?php echo esc_url($termItemA_link); ?>"><?php echo $termItemA->name; ?></a>
         </li>
         <?php endforeach; ?>
        </ul>
        <?php
         endif;
        endif;
        ?>
       </li>
      </ul>

      <ul class="p-header__txnmyLists">
       <li class="p-header__txnmyItem">
        <div class="p-header__txnmyBox js-drawerAccdin">
         <p class="p-header__txnmyName">動画尺から探す</p><span class="p-header__txnmyAccdinBtn"></span>
        </div>
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

        <ul class="p-header__prntsTermLists">
         <?php foreach ($termListsA as $termItemA) :
            $termItemA_id = $termItemA->term_id;
            $termItemA_slug = $termItemA->slug;
            $termItemA_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemA_id, 'termSlug' => $termItemA_slug), home_url('/search/'));
            // var_dump($termItemA);
           ?>
         <li class="p-header__prntsTermItem">
          <a href="<?php echo esc_url($termItemA_link); ?>"><?php echo $termItemA->name; ?></a>

          <ul class="p-header__termLists">
           <?php
              $termListsC = get_terms($txnmySlug, array('hide_empty' => false, 'parent' => $termItemA_id));
              foreach ($termListsC as $termItemC) :
               $termItemC_id = $termItemC->term_id;
               $termItemC_slug = $termItemC->slug;
               $termItemC_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemC_id, 'termSlug' => $termItemC_slug), home_url('/search/'));
              ?>
           <li class="p-header__termItem">
            <a href="<?php echo esc_url($termItemC_link); ?>"><?php echo $termItemC->name; ?></a>
           </li>
           <?php endforeach; ?>
          </ul>
         </li>
         <?php endforeach; ?>

        </ul>
        <?php else : ?>
        <ul class="p-header__termLists">
         <?php
           // タームが１階層しかない場合
           foreach ($termListsA as $termItemA) :
            $termItemA_id = $termItemA->term_id;
            $termItemA_slug = $termItemA->slug;
            $termItemA_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemA_id, 'termSlug' => $termItemA_slug), home_url('/search/'));
           ?>
         <li class="p-header__termItem">
          <a href="<?php echo esc_url($termItemA_link); ?>"><?php echo $termItemA->name; ?></a>
         </li>
         <?php endforeach; ?>
        </ul>
        <?php
         endif;
        endif;
        ?>
       </li>
      </ul>

      <ul class="p-header__txnmyLists">
       <li class="p-header__txnmyItem">
        <div class="p-header__txnmyBox js-drawerAccdin">
         <p class="p-header__txnmyName">業種から探す</p><span class="p-header__txnmyAccdinBtn"></span>
        </div>
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

        <ul class="p-header__prntsTermLists">
         <?php foreach ($termListsA as $termItemA) :
            $termItemA_id = $termItemA->term_id;
            $termItemA_slug = $termItemA->slug;
            $termItemA_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemA_id, 'termSlug' => $termItemA_slug), home_url('/search/'));
            // var_dump($termItemA);
           ?>
         <li class="p-header__prntsTermItem">
          <a href="<?php echo esc_url($termItemA_link); ?>"><?php echo $termItemA->name; ?></a>

          <ul class="p-header__termLists">
           <?php
              $termListsC = get_terms($txnmySlug, array('hide_empty' => false, 'parent' => $termItemA_id));
              foreach ($termListsC as $termItemC) :
               $termItemC_id = $termItemC->term_id;
               $termItemC_slug = $termItemC->slug;
               $termItemC_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemC_id, 'termSlug' => $termItemC_slug), home_url('/search/'));
              ?>
           <li class="p-header__termItem">
            <a href="<?php echo esc_url($termItemC_link); ?>"><?php echo $termItemC->name; ?></a>
           </li>
           <?php endforeach; ?>
          </ul>
         </li>
         <?php endforeach; ?>

        </ul>
        <?php else : ?>
        <ul class="p-header__termLists">
         <?php
           // タームが１階層しかない場合
           foreach ($termListsA as $termItemA) :
            $termItemA_id = $termItemA->term_id;
            $termItemA_slug = $termItemA->slug;
            $termItemA_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemA_id, 'termSlug' => $termItemA_slug), home_url('/search/'));
           ?>
         <li class="p-header__termItem">
          <a href="<?php echo esc_url($termItemA_link); ?>"><?php echo $termItemA->name; ?></a>
         </li>
         <?php endforeach; ?>
        </ul>
        <?php
         endif;
        endif;
        ?>
       </li>
      </ul>
     </nav>
    </div>

   </div>


  </div>
 </header>