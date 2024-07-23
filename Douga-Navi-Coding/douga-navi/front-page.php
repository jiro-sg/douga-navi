<?php get_header(); ?>
<div class="p-frnt">
 <div class="p-frnt__inner">
  <aside class="p-frnt__sidebar
   p-sidebar">
   <?php get_sidebar(); ?>
  </aside>

  <main class="p-frnt__main">

   <div class="p-frnt__fv p-frntFv">
    <div class="p-frntFv__SwiperBox">
     <!-- Slider main container -->
     <div class="swiper p-frntFv__swiper">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper p-frntFv__swiperWrppr">
       <!-- Slides -->

       <?php
              for ($i = 1; $i <= 6; $i++) {
                $slide_link = get_field('slide_link' . $i);
                $slide_img = get_field('slide_img' . $i);
                $slide_img_sp = get_field('slide_img' . $i . '-sp');

                // 画像が存在する場合のみスライドを出力
                if ($slide_img) {
              ?>
       <!-- Slides -->
       <div class="swiper-slide p-frntFv__swiperSlide">
        <a href="<?php echo esc_url($slide_link); ?>">
         <picture>
          <source srcset='<?php echo esc_url($slide_img); ?>' media='(min-width: 768px)'>
          <img src='<?php echo esc_url($slide_img_sp); ?>' alt='動画制作ナビ' width='837' height='308'>
         </picture>
        </a>
       </div>
       <?php
                }
              }
              ?>

      </div>
     </div>
     <!-- If we need pagination -->
     <div class="swiper-pagination p-frntFv__swiperPgntin"></div>
    </div>
   </div>

   <div class="p-frnt__mainInner">


    <div class="p-frnt__subLink p-frntSubLink">
     <a href="<?php echo esc_url(home_url('/about/')); ?>" class="p-frntSubLink__navi">動画制作ナビとは？</a>
     <a href="<?php echo esc_url('/flow/'); ?>" class="p-frntSubLink__flow">ご利用の流れ</a>
    </div>

    <section class="p-frnt__search p-frntSrch">
     <h2 class="p-frntSrch__ttl">用途から探す</h2>


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
     <article class="p-frntSrch__txnmy p-frntSrchTxnmy">
      <h3 class="p-frntSrchTxnmy__ttl">
       <a href="<?php echo esc_url($termItemA_link); ?>">
        <?php echo $termItemA->name; ?>
       </a>
      </h3>
      <ul class="p-frntSrchTxnmy__lists">
       <?php
                    $termListsC = get_terms($txnmySlug, array('hide_empty' => false, 'parent' => $termItemA_id));
                    foreach ($termListsC as $termItemC) :
                      $termItemC_id = $termItemC->term_id;
                      $termItemC_slug = $termItemC->slug;
                      $termItemC_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemC_id, 'termSlug' => $termItemC_slug), home_url('/find/'));
                    ?>
       <li class="p-frntSrchTxnmy__item">
        <a href="<?php echo esc_url($termItemC_link); ?>">
         <?php
                          if (get_field('category_name', $txnmySlug . '_' .  $termItemC->term_id)) :
                            echo get_field('category_name', $txnmySlug . '_' .  $termItemC->term_id);
                          ?>
         <?php else : ?>

         <p><?php echo $termItemC->name;; ?></p>

         <?php endif; ?>

         <?php if (get_field('category_image', $txnmySlug . '_' . $termItemC->term_id)) : ?>
         <figure class="p-frntSrchTxnmy__img">
          <img src='<?php echo get_field('category_image', $txnmySlug . '_' . $termItemC->term_id); ?>' alt='テスト' width='72' height='45'>
         </figure>
         <?php endif; ?>
        </a>
       </li>
       <?php endforeach; ?>
      </ul>
     </article>
     <?php endforeach; ?>

     <?php else : ?>
     <article class="p-frntSrch__txnmy p-frntSrchTxnmy">

      <ul class="p-frntSrchTxnmy__lists">
       <?php
                  // タームが１階層しかない場合
                  foreach ($termListsA as $termItemA) :
                    $termItemA_id = $termItemA->term_id;
                    $termItemA_slug = $termItemA->slug;
                    $termItemA_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemA_id, 'termSlug' => $termItemA_slug), home_url('/find/'));
                  ?>
       <li class="p-frntSrchTxnmy__item">
        <a href="<?php echo esc_url($termItemA_link); ?>">
         <?php
                        if (get_field('category_name', $txnmySlug . '_' .  $termItemA->term_id)) :
                          echo get_field('category_name', $txnmySlug . '_' .  $termItemA->term_id);
                        ?>
         <?php else : ?>
         <p><?php echo $termItemA->name; ?></p>
         <?php endif; ?>

         <?php if (get_field('category_image', $txnmySlug . '_' . $termItemA->term_id)) : ?>
         <figure class="p-frntSrchTxnmy__img">
          <img src='<?php echo get_field('category_image', $txnmySlug . '_' . $termItemA->term_id); ?>' alt='テスト' width='72' height='45'>
         </figure>
         <?php endif; ?>
        </a>
       </li>
       <?php endforeach; ?>
      </ul>
     </article>
     <?php
            endif;
          endif;
          ?>

    </section>

    <section class="p-frnt__search p-frntSrch">
     <h2 class="p-frntSrch__ttl">表現方法から探す</h2>

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
     <article class="p-frntSrch__txnmy p-frntSrchTxnmy">
      <h3 class="p-frntSrchTxnmy__ttl">
       <a href="<?php echo esc_url($termItemA_link); ?>">
        <?php echo $termItemA->name; ?>
       </a>
      </h3>
      <ul class="p-frntSrchTxnmy__lists">
       <?php
                    $termListsC = get_terms($txnmySlug, array('hide_empty' => false, 'parent' => $termItemA_id));
                    foreach ($termListsC as $termItemC) :
                      $termItemC_id = $termItemC->term_id;
                      $termItemC_slug = $termItemC->slug;
                      $termItemC_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemC_id, 'termSlug' => $termItemC_slug), home_url('/find/'));
                    ?>
       <li class="p-frntSrchTxnmy__item">
        <a href="<?php echo esc_url($termItemC_link); ?>">
         <?php
                          if (get_field('category_name', $txnmySlug . '_' .  $termItemC->term_id)) :
                            echo get_field('category_name', $txnmySlug . '_' .  $termItemC->term_id);
                          ?>
         <?php else : ?>
         <p><?php echo $termItemC->name; ?></p>
         <?php endif; ?>

         <?php if (get_field('category_image', $txnmySlug . '_' . $termItemC->term_id)) : ?>
         <figure class="p-frntSrchTxnmy__img">
          <img src='<?php echo get_field('category_image', $txnmySlug . '_' . $termItemC->term_id); ?>' alt='テスト' width='72' height='45'>
         </figure>
         <?php endif; ?>
        </a>
       </li>
       <?php endforeach; ?>

      </ul>
     </article>
     <?php endforeach; ?>

     <?php else : ?>

     <article class="p-frntSrch__txnmy p-frntSrchTxnmy">

      <ul class="p-frntSrchTxnmy__lists">
       <?php
                  // タームが１階層しかない場合
                  foreach ($termListsA as $termItemA) :
                    $termItemA_id = $termItemA->term_id;
                    $termItemA_slug = $termItemA->slug;
                    $termItemA_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemA_id, 'termSlug' => $termItemA_slug), home_url('/find/'));
                  ?>
       <li class="p-frntSrchTxnmy__item">
        <a href="<?php echo esc_url($termItemA_link); ?>">
         <?php
                        if (get_field('category_name', $txnmySlug . '_' .  $termItemA->term_id)) :
                          echo get_field('category_name', $txnmySlug . '_' .  $termItemA->term_id);
                        ?>
         <?php else : ?>
         <p><?php echo $termItemA->name; ?></p>
         <?php endif; ?>

         <?php if (get_field('category_image', $txnmySlug . '_' . $termItemA->term_id)) : ?>
         <figure class="p-frntSrchTxnmy__img">
          <img src='<?php echo get_field('category_image', $txnmySlug . '_' . $termItemA->term_id); ?>' alt='テスト' width='72' height='45'>
         </figure>
         <?php endif; ?>
        </a>
       </li>
       <?php endforeach; ?>
      </ul>
     </article>

     <?php
            endif;
          endif;
          ?>

    </section>

    <section class="p-frnt__search p-frntSrch">
     <h2 class="p-frntSrch__ttl">価格帯から探す</h2>

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
     <article class="p-frntSrch__txnmy p-frntSrchTxnmy">
      <h3 class="p-frntSrchTxnmy__ttl">
       <a href="<?php echo esc_url($termItemA_link); ?>">
        <?php echo $termItemA->name; ?>
       </a>
      </h3>
      <ul class="p-frntSrchTxnmy__lists">
       <?php
                    $termListsC = get_terms($txnmySlug, array('hide_empty' => false, 'parent' => $termItemA_id));
                    foreach ($termListsC as $termItemC) :
                      $termItemC_id = $termItemC->term_id;
                      $termItemC_slug = $termItemC->slug;
                      $termItemC_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemC_id, 'termSlug' => $termItemC_slug), home_url('/find/'));
                    ?>
       <li class="p-frntSrchTxnmy__item">
        <a href="<?php echo esc_url($termItemC_link); ?>">
         <?php
                          if (get_field('category_name', $txnmySlug . '_' .  $termItemC->term_id)) :
                            echo get_field('category_name', $txnmySlug . '_' .  $termItemC->term_id);
                          ?>
         <?php else : ?>
         <p><?php echo $termItemC->name; ?></p>
         <?php endif; ?>

         <?php if (get_field('category_image', $txnmySlug . '_' . $termItemC->term_id)) : ?>
         <figure class="p-frntSrchTxnmy__img">
          <img src='<?php echo get_field('category_image', $txnmySlug . '_' . $termItemC->term_id); ?>' alt='テスト' width='72' height='45'>
         </figure>
         <?php endif; ?>
        </a>
       </li>
       <?php endforeach; ?>

      </ul>
     </article>
     <?php endforeach; ?>

     <?php else : ?>

     <article class="p-frntSrch__txnmy p-frntSrchTxnmy">

      <ul class="p-frntSrchTxnmy__lists">
       <?php
                  // タームが１階層しかない場合
                  foreach ($termListsA as $termItemA) :
                    $termItemA_id = $termItemA->term_id;
                    $termItemA_slug = $termItemA->slug;
                    $termItemA_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemA_id, 'termSlug' => $termItemA_slug), home_url('/find/'));
                  ?>
       <li class="p-frntSrchTxnmy__item">
        <a href="<?php echo esc_url($termItemA_link); ?>">
         <?php
                        if (get_field('category_name', $txnmySlug . '_' .  $termItemA->term_id)) :
                          echo get_field('category_name', $txnmySlug . '_' .  $termItemA->term_id);
                        ?>
         <?php else : ?>
         <p><?php echo $termItemA->name; ?></p>
         <?php endif; ?>

         <?php if (get_field('category_image', $txnmySlug . '_' . $termItemA->term_id)) : ?>
         <figure class="p-frntSrchTxnmy__img">
          <img src='<?php echo get_field('category_image', $txnmySlug . '_' . $termItemA->term_id); ?>' alt='テスト' width='72' height='45'>
         </figure>
         <?php endif; ?>
        </a>
       </li>
       <?php endforeach; ?>
      </ul>
     </article>

     <?php
            endif;
          endif;
          ?>

    </section>

    <section class="p-frnt__search p-frntSrch">
     <h2 class="p-frntSrch__ttl">動画尺から探す</h2>

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
     <article class="p-frntSrch__txnmy p-frntSrchTxnmy">
      <h3 class="p-frntSrchTxnmy__ttl">
       <a href="<?php echo esc_url($termItemA_link); ?>">
        <?php echo $termItemA->name; ?>
       </a>
      </h3>
      <ul class="p-frntSrchTxnmy__lists">
       <?php
                    $termListsC = get_terms($txnmySlug, array('hide_empty' => false, 'parent' => $termItemA_id));
                    foreach ($termListsC as $termItemC) :
                      $termItemC_id = $termItemC->term_id;
                      $termItemC_slug = $termItemC->slug;
                      $termItemC_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemC_id, 'termSlug' => $termItemC_slug), home_url('/find/'));
                    ?>
       <li class="p-frntSrchTxnmy__item">
        <a href="<?php echo esc_url($termItemC_link); ?>">
         <?php
                          if (get_field('category_name', $txnmySlug . '_' .  $termItemC->term_id)) :
                            echo get_field('category_name', $txnmySlug . '_' .  $termItemC->term_id);
                          ?>
         <?php else : ?>
         <p><?php echo $termItemC->name; ?></p>
         <?php endif; ?>

         <?php if (get_field('category_image', $txnmySlug . '_' . $termItemC->term_id)) : ?>
         <figure class="p-frntSrchTxnmy__img">
          <img src='<?php echo get_field('category_image', $txnmySlug . '_' . $termItemC->term_id); ?>' alt='テスト' width='72' height='45'>
         </figure>
         <?php endif; ?>
        </a>
       </li>
       <?php endforeach; ?>

      </ul>
     </article>
     <?php endforeach; ?>

     <?php else : ?>

     <article class="p-frntSrch__txnmy p-frntSrchTxnmy">

      <ul class="p-frntSrchTxnmy__lists">
       <?php
                  // タームが１階層しかない場合
                  foreach ($termListsA as $termItemA) :
                    $termItemA_id = $termItemA->term_id;
                    $termItemA_slug = $termItemA->slug;
                    $termItemA_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemA_id, 'termSlug' => $termItemA_slug), home_url('/find/'));
                  ?>
       <li class="p-frntSrchTxnmy__item">
        <a href="<?php echo esc_url($termItemA_link); ?>">
         <?php
                        if (get_field('category_name', $txnmySlug . '_' .  $termItemA->term_id)) :
                          echo get_field('category_name', $txnmySlug . '_' .  $termItemA->term_id);
                        ?>
         <?php else : ?>
         <p><?php echo $termItemA->name; ?></p>
         <?php endif; ?>

         <?php if (get_field('category_image', $txnmySlug . '_' . $termItemA->term_id)) : ?>
         <figure class="p-frntSrchTxnmy__img">
          <img src='<?php echo get_field('category_image', $txnmySlug . '_' . $termItemA->term_id); ?>' alt='テスト' width='72' height='45'>
         </figure>
         <?php endif; ?>
        </a>
       </li>
       <?php endforeach; ?>
      </ul>
     </article>

     <?php
            endif;
          endif;
          ?>

    </section>

    <section class="p-frnt__search p-frntSrch">
     <h2 class="p-frntSrch__ttl">業種から探す</h2>

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
     <article class="p-frntSrch__txnmy p-frntSrchTxnmy">
      <h3 class="p-frntSrchTxnmy__ttl">
       <a href="<?php echo esc_url($termItemA_link); ?>">
        <?php echo $termItemA->name; ?>
       </a>
      </h3>
      <ul class="p-frntSrchTxnmy__lists">
       <?php
                    $termListsC = get_terms($txnmySlug, array('hide_empty' => false, 'parent' => $termItemA_id));
                    foreach ($termListsC as $termItemC) :
                      $termItemC_id = $termItemC->term_id;
                      $termItemC_slug = $termItemC->slug;
                      $termItemC_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemC_id, 'termSlug' => $termItemC_slug), home_url('/find/'));
                    ?>
       <li class="p-frntSrchTxnmy__item">
        <a href="<?php echo esc_url($termItemC_link); ?>">
         <?php
                          if (get_field('category_name', $txnmySlug . '_' .  $termItemC->term_id)) :
                            echo get_field('category_name', $txnmySlug . '_' .  $termItemC->term_id);
                          ?>
         <?php else : ?>
         <p><?php echo $termItemC->name; ?></p>
         <?php endif; ?>
         <?php if (get_field('category_image', $txnmySlug . '_' . $termItemC->term_id)) : ?>
         <figure class="p-frntSrchTxnmy__img">
          <img src='<?php echo get_field('category_image', $txnmySlug . '_' . $termItemC->term_id); ?>' alt='テスト' width='72' height='45'>
         </figure>
         <?php endif; ?>
        </a>
       </li>
       <?php endforeach; ?>

      </ul>
     </article>
     <?php endforeach; ?>

     <?php else : ?>

     <article class="p-frntSrch__txnmy p-frntSrchTxnmy">

      <ul class="p-frntSrchTxnmy__lists">
       <?php
                  // タームが１階層しかない場合
                  foreach ($termListsA as $termItemA) :
                    $termItemA_id = $termItemA->term_id;
                    $termItemA_slug = $termItemA->slug;
                    $termItemA_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemA_id, 'termSlug' => $termItemA_slug), home_url('/find/'));
                  ?>
       <li class="p-frntSrchTxnmy__item">
        <a href="<?php echo esc_url($termItemA_link); ?>">
         <?php
                        if (get_field('category_name', $txnmySlug . '_' .  $termItemA->term_id)) :
                          echo get_field('category_name', $txnmySlug . '_' .  $termItemA->term_id);
                        ?>
         <?php else : ?>
         <p><?php echo $termItemA->name; ?></p>
         <?php endif; ?>
         <?php if (get_field('category_image', $txnmySlug . '_' . $termItemA->term_id)) : ?>
         <figure class="p-frntSrchTxnmy__img">
          <img src='<?php echo get_field('category_image', $txnmySlug . '_' . $termItemA->term_id); ?>' alt='テスト' width='72' height='45'>
         </figure>
         <?php endif; ?>
        </a>
       </li>
       <?php endforeach; ?>
      </ul>
     </article>

     <?php
            endif;
          endif;
          ?>

    </section>

    <div class="p-frnt__cta p-frntCTA">

     <div class="p-frntCTA__banner c-ctaBanner02">
      <p class="c-ctaBanner02__copy">かんたん30秒！</p>
      <p class="c-ctaBanner02__txt">動画制作・動画集客に関することはお気軽にご相談ください。
      </p>
      <p class="c-ctaBanner02__txt">専任スタッフがすぐに<br class="u-mobile">ご連絡いたします。</p>
      <div class="c-ctaBanner02__btn">
       <a href="<?php echo esc_url(home_url('/contact/')); ?>">まずは無料相談してみる</a>
      </div>
     </div>
    </div>
   </div>


  </main>
 </div>
</div>

<?php get_footer(); ?>