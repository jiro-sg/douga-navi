<div class="p-sidebar__coupon p-sideCupn u-desktop">
 <?php $value = get_post_meta($post->ID, 'top_banner', true); ?>
 <a href="<?php the_field('top_banner_link'); ?>">
  <!-- <div class="p-sideCupn__main">
      <p class="p-sideCupn__subCatch">初めての注文で使える！</p>
      <p class="p-sideCupn__catch">クーポン配布中</p>
    </div>
    <p class="p-sideCupn__lead u-desktop">今すぐクーポンを受け取る</p>
    <p class="p-sideCupn__lead u-mobile">今すぐお得なクーポンを受け取る！</p> -->
  <?php if (!empty($value)) : ?>
  <div class="p-sideCupn__img">
   <img src="<?php the_field('top_banner'); ?>">
  </div>


  <?php endif; ?>
 </a>

</div>

<nav class="p-sidebar__navi p-sideNavi">
 <article class="p-sideNavi__txnmy">
  <h2 class="p-sideNavi__ttl">用途から探す</h2>
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

  <ul class="p-sideNavi__lists">

   <?php foreach ($termListsA as $termItemA) :
            $termItemA_id = $termItemA->term_id;
            $termItemA_slug = $termItemA->slug;
            $termItemA_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemA_id, 'termSlug' => $termItemA_slug), home_url('/find/'));
            // var_dump($termItemA);
          ?>
   <li class="p-sideNavi__item">
    <a href="<?php echo esc_url($termItemA_link); ?>"><?php echo $termItemA->name; ?></a>
    <ul class="p-sideNavi__childLists">

     <?php
                $termListsC = get_terms($txnmySlug, array('hide_empty' => false, 'parent' => $termItemA_id));
                foreach ($termListsC as $termItemC) :
                  $termItemC_id = $termItemC->term_id;
                  $termItemC_slug = $termItemC->slug;
                  $termItemC_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemC_id, 'termSlug' => $termItemC_slug), home_url('/find/'));
                ?>
     <li class="p-sideNavi__childItem">
      <a href="<?php echo esc_url($termItemC_link); ?>"><?php echo $termItemC->name; ?></a>
     </li>
     <?php endforeach; ?>

    </ul>
   </li>
   <?php endforeach; ?>

  </ul>
  <?php else : ?>
  <ul class="p-sideNavi__lists">
   <?php
          // タームが１階層しかない場合
          foreach ($termListsA as $termItemA) :
            $termItemA_id = $termItemA->term_id;
            $termItemA_slug = $termItemA->slug;
            $termItemA_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemA_id, 'termSlug' => $termItemA_slug), home_url('/find/'));
          ?>
   <li class="p-sideNavi__item">
    <a href="<?php echo esc_url($termItemA_link); ?>"><?php echo $termItemA->name; ?></a>
   </li>
   <?php endforeach; ?>
  </ul>
  <?php
      endif;
    endif;
    ?>
 </article>

 <article class="p-sideNavi__txnmy">
  <h2 class="p-sideNavi__ttl">表現方法から探す</h2>
  <?php
    $txnmySlug = "expression_method";
    $hierarchyArray = array();
    //$termListsA = get_terms($txnmySlug, array($txnmySlug => false, 'parent' => 0));
    $termListsA = get_terms($txnmySlug, array('hide_empty' => false, 'parent' => 0));
    foreach ($termListsA as $termItemA) {
      $termItemA_id = $termItemA->term_id;
      //$termListsB = get_terms($txnmySlug, array($txnmySlug => false, 'parent' => $termItemA_id));
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
  <ul class="p-sideNavi__lists">

   <?php foreach ($termListsA as $termItemA) :
            $termItemA_id = $termItemA->term_id;
            $termItemA_slug = $termItemA->slug;
            $termItemA_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemA_id, 'termSlug' => $termItemA_slug), home_url('/find/'));
            // var_dump($termItemA);
          ?>
   <li class="p-sideNavi__item">
    <a href="<?php echo esc_url($termItemA_link); ?>"><?php echo $termItemA->name; ?></a>
    <ul class="p-sideNavi__childLists">

     <?php
                $termListsC = get_terms($txnmySlug, array('hide_empty' => false, 'parent' => $termItemA_id));
                foreach ($termListsC as $termItemC) :
                  $termItemC_id = $termItemC->term_id;
                  $termItemC_slug = $termItemC->slug;
                  $termItemC_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemC_id, 'termSlug' => $termItemC_slug), home_url('/find/'));
                ?>
     <li class="p-sideNavi__childItem">
      <a href="<?php echo esc_url($termItemC_link); ?>"><?php echo $termItemC->name; ?></a>
     </li>
     <?php endforeach; ?>

    </ul>
   </li>
   <?php endforeach; ?>


  </ul>
  <?php else : ?>
  <ul class="p-sideNavi__lists">
   <?php
          // タームが１階層しかない場合
          foreach ($termListsA as $termItemA) :
            $termItemA_id = $termItemA->term_id;
            $termItemA_slug = $termItemA->slug;
            $termItemA_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemA_id, 'termSlug' => $termItemA_slug), home_url('/find/'));
          ?>
   <li class="p-sideNavi__item">
    <a href="<?php echo esc_url($termItemA_link); ?>"><?php echo $termItemA->name; ?></a>
   </li>
   <?php endforeach; ?>
  </ul>
  <?php
      endif;
    endif;
    ?>
 </article>

 <article class="p-sideNavi__txnmy">
  <h2 class="p-sideNavi__ttl">価格帯から探す</h2>
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
  <ul class="p-sideNavi__lists">

   <?php foreach ($termListsA as $termItemA) :
            $termItemA_id = $termItemA->term_id;
            $termItemA_slug = $termItemA->slug;
            $termItemA_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemA_id, 'termSlug' => $termItemA_slug), home_url('/find/'));
            // var_dump($termItemA);
          ?>
   <li class="p-sideNavi__item">
    <a href="<?php echo esc_url($termItemA_link); ?>"><?php echo $termItemA->name; ?></a>
    <ul class="p-sideNavi__childLists">

     <?php
                $termListsC = get_terms($txnmySlug, array('hide_empty' => false, 'parent' => $termItemA_id));
                foreach ($termListsC as $termItemC) :
                  $termItemC_id = $termItemC->term_id;
                  $termItemC_slug = $termItemC->slug;
                  $termItemC_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemC_id, 'termSlug' => $termItemC_slug), home_url('/find/'));
                ?>
     <li class="p-sideNavi__childItem">
      <a href="<?php echo esc_url($termItemC_link); ?>"><?php echo $termItemC->name; ?></a>
     </li>
     <?php endforeach; ?>

    </ul>
   </li>
   <?php endforeach; ?>


  </ul>
  <?php else : ?>
  <ul class="p-sideNavi__lists">
   <?php
          // タームが１階層しかない場合
          foreach ($termListsA as $termItemA) :
            $termItemA_id = $termItemA->term_id;
            $termItemA_slug = $termItemA->slug;
            $termItemA_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemA_id, 'termSlug' => $termItemA_slug), home_url('/find/'));
          ?>
   <li class="p-sideNavi__item">
    <a href="<?php echo esc_url($termItemA_link); ?>"><?php echo $termItemA->name; ?></a>
   </li>
   <?php endforeach; ?>
  </ul>
  <?php
      endif;
    endif;
    ?>
 </article>

 <article class="p-sideNavi__txnmy">
  <h2 class="p-sideNavi__ttl">動画尺から探す</h2>
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
  <ul class="p-sideNavi__lists">

   <?php foreach ($termListsA as $termItemA) :
            $termItemA_id = $termItemA->term_id;
            $termItemA_slug = $termItemA->slug;
            $termItemA_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemA_id, 'termSlug' => $termItemA_slug), home_url('/find/'));
            // var_dump($termItemA);
          ?>
   <li class="p-sideNavi__item">
    <a href="<?php echo esc_url($termItemA_link); ?>"><?php echo $termItemA->name; ?></a>
    <ul class="p-sideNavi__childLists">

     <?php
                $termListsC = get_terms($txnmySlug, array('hide_empty' => false, 'parent' => $termItemA_id));
                foreach ($termListsC as $termItemC) :
                  $termItemC_id = $termItemC->term_id;
                  $termItemC_slug = $termItemC->slug;
                  $termItemC_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemC_id, 'termSlug' => $termItemC_slug), home_url('/find/'));
                ?>
     <li class="p-sideNavi__childItem">
      <a href="<?php echo esc_url($termItemC_link); ?>"><?php echo $termItemC->name; ?></a>
     </li>
     <?php endforeach; ?>

    </ul>
   </li>
   <?php endforeach; ?>


  </ul>
  <?php else : ?>
  <ul class="p-sideNavi__lists">
   <?php
          // タームが１階層しかない場合
          foreach ($termListsA as $termItemA) :
            $termItemA_id = $termItemA->term_id;
            $termItemA_slug = $termItemA->slug;
            $termItemA_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemA_id, 'termSlug' => $termItemA_slug), home_url('/find/'));
          ?>
   <li class="p-sideNavi__item">
    <a href="<?php echo esc_url($termItemA_link); ?>"><?php echo $termItemA->name; ?></a>
   </li>
   <?php endforeach; ?>
  </ul>
  <?php
      endif;
    endif;
    ?>
 </article>

 <article class="p-sideNavi__txnmy">
  <h2 class="p-sideNavi__ttl">業種から探す</h2>
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
  <ul class="p-sideNavi__lists">

   <?php foreach ($termListsA as $termItemA) :
            $termItemA_id = $termItemA->term_id;
            $termItemA_slug = $termItemA->slug;
            $termItemA_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemA_id, 'termSlug' => $termItemA_slug), home_url('/find/'));
            // var_dump($termItemA);
          ?>
   <li class="p-sideNavi__item">
    <a href="<?php echo esc_url($termItemA_link); ?>"><?php echo $termItemA->name; ?></a>
    <ul class="p-sideNavi__childLists">

     <?php
                $termListsC = get_terms($txnmySlug, array('hide_empty' => false, 'parent' => $termItemA_id));
                foreach ($termListsC as $termItemC) :
                  $termItemC_id = $termItemC->term_id;
                  $termItemC_slug = $termItemC->slug;
                  $termItemC_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemC_id, 'termSlug' => $termItemC_slug), home_url('/find/'));
                ?>
     <li class="p-sideNavi__childItem">
      <a href="<?php echo esc_url($termItemC_link); ?>"><?php echo $termItemC->name; ?></a>
     </li>
     <?php endforeach; ?>

    </ul>
   </li>
   <?php endforeach; ?>


  </ul>
  <?php else : ?>
  <ul class="p-sideNavi__lists">
   <?php
          // タームが１階層しかない場合
          foreach ($termListsA as $termItemA) :
            $termItemA_id = $termItemA->term_id;
            $termItemA_slug = $termItemA->slug;
            $termItemA_link = add_query_arg(array('txnmySlug' => $txnmySlug, 'termId' => $termItemA_id, 'termSlug' => $termItemA_slug), home_url('/find/'));
          ?>
   <li class="p-sideNavi__item">
    <a href="<?php echo esc_url($termItemA_link); ?>"><?php echo $termItemA->name; ?></a>
   </li>
   <?php endforeach; ?>
  </ul>
  <?php
      endif;
    endif;
    ?>
 </article>


</nav>