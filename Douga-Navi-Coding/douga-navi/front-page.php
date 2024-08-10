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

        <?php
        $txnmyLists = array("purpose", "expression_method", "price_range", "video_length", "industry");
        $rcmndTermLists = array();
        foreach ($txnmyLists as $txnmyItem) {
          $termLists = get_terms($txnmyItem, 'hide_empty=0');
          foreach ($termLists as $termItem) {
            $rcmndBool = get_field('category_rcmndBool', $txnmyItem . '_' . $termItem->term_id);
            if ($rcmndBool) {
              // var_dump($termItem);
              $rcmndTermLists[$termItem->slug] = get_field("category_recomendNumber", $termItem->taxonomy . '_' . $termItem->term_id);
            }
          }
        };
        asort($rcmndTermLists);
        // var_dump($rcmndTermLists);
        ?>
        <?php if (count($rcmndTermLists) > 0) : ?>
          <section class="p-frnt__rcmnd p-frntRcmnd">
            <h2 class="p-frntRcmnd__ttl">オススメ情報</h2>
            <div class="p-frntRcmnd__cardWrppr">
              <?php foreach ($rcmndTermLists as $key => $val) : ?>
                <?php $rcmndTerms = get_terms(array('slug' => $key)); ?>
                <?php foreach ($rcmndTerms as $rcmndTerm) : ?>
                  <div class="p-frntRcmnd__card">
                    <?php $termColor = get_field("category_color", $rcmndTerm->taxonomy . '_' . $rcmndTerm->term_id); ?>
                    <?php $fontColor = get_field("category_txtColor", $rcmndTerm->taxonomy . '_' . $rcmndTerm->term_id); ?>
                    <?php if (get_field("category_name", $rcmndTerm->taxonomy . '_' . $rcmndTerm->term_id)) {
                      $cardTtl = strip_tags(get_field("category_name", $rcmndTerm->taxonomy . '_' . $rcmndTerm->term_id));
                    } else {
                      $cardTtl = strip_tags($rcmndTerm->name);
                    }; ?>
                    <h3 class="p-frntRcmnd__cardTtl" style="background-color:<?php echo $termColor; ?>; color:<?php echo $fontColor; ?> ">
                      <span>
                        <?php echo $cardTtl; ?>
                      </span>
                    </h3>
                    <div class="p-frntRcmnd__cardBody">
                      <div class="p-frntRcmnd__cardBodyWrppr">
                        <div class="p-frntRcmnd__sntnc">
                          <p class="p-frntRcmnd__cardTxt">
                            <?php if (get_field("category_recomendTxt", $rcmndTerm->taxonomy . '_' . $rcmndTerm->term_id)) {
                              echo the_field("category_recomendTxt", $rcmndTerm->taxonomy . '_' . $rcmndTerm->term_id);
                            }; ?>
                          </p>
                        </div>
                        <?php $termImg = get_field("category_image", $rcmndTerm->taxonomy . '_' . $rcmndTerm->term_id); ?>
                        <figure class="p-frntRcmnd__img">
                          <img src='<?php if ($termImg) {
                                      echo $termImg;
                                    } ?>' alt='<?php echo $cardTtl; ?>' width='192' height='106'>
                        </figure>
                      </div>
                      <?php
                      $termItem_id = $rcmndTerm->term_id;
                      $termItem_slug = $rcmndTerm->slug;
                      $termItem_link = add_query_arg(array('txnmySlug' => $rcmndTerm->taxonomy, 'termId' => $termItem_id, 'termSlug' => $termItem_slug), home_url('/find/'));
                      ?>
                      <div class="p-frntRcmnd__cardBtn">
                        <a href="<?php echo esc_url($termItem_link); ?>" style="border-color:<?php if ($termColor) {
                                                                                                echo $termColor;
                                                                                              }; ?>"> 詳しく見る</a>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php endforeach; ?>
            </div>
          </section>
        <?php endif; ?>

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
        </div>


      </div>


    </main>
  </div>
</div>

<?php get_footer(); ?>