<?php get_header(); ?>

<main class="p-about">
 <!-- パンくずリスト -->
 <?php get_template_part('_inc/breadcrumb'); ?>
 <!-- // -->
 <section class="p-about__fv p-aboutFv">
  <picture>
   <source srcset='<?php echo get_template_directory_uri() ?>/assets/images/aboutFV_pc.jpg' media='(min-width: 768px)'>
   <img src='<?php echo get_template_directory_uri() ?>/assets/images/aboutFV_sp.jpg' alt='課題解決から納品まで、ワンストップでプロが伴走！' width='1279' height='474'>
  </picture>

  <div class="p-aboutFv__sntnc">
   <h1 class="p-aboutFv__ttl"><span class="p-aboutFv__ttl--blue">動画の企画</span>から<span class="p-aboutFv__ttl--blue">納品</span>まで、<br><span class="p-aboutFv__ttl--orangeLine">ワンストップでプロが伴走！</span></h1>
   <p class="p-aboutFv__lead">集客課題解決もご相談ください</p>
  </div>

  <div class="p-aboutFv__btn">
   <a href="<?php echo esc_url(home_url('/contact')); ?>">まずは無料相談してみる</a>
  </div>
 </section>

 <section class="p-about__navi p-aboutNavi">
  <div class="l-inner">
   <h2 class="p-aboutNavi__ttl">動画制作ナビとは？</h2>
   <div class="p-aboutNavi__txtWrppr">

    <p class="p-aboutNavi__txt">動画制作ナビは現役クリエイティブエージェンシー所属の専任ディレクターが、お客様の課題解決に向けて最適なプランをご提案し、厳選されたプロのパートナーと連携して高品質な動画を制作いたします。</p>
    <p class="p-aboutNavi__txt">専任ディレクターが窓口となり、制作進行から納品までスムーズなコミュニケーションを実現。明瞭な料金設定と効率的な制作体制で、安心してスピーディーに動画制作を依頼できます。</p>
    <p class="p-aboutNavi__txt">結婚式やお祝い事、ペット動画などライフイベントにおける動画制作も対応しております！動画動画制作に関するお悩みは、お気軽に【動画制作ナビ】へご相談ください！</p>
   </div>
  </div>
 </section>

 <section class="p-about__prblm p-aboutPrblm">
  <div class="l-inner">

   <h2 class="p-aboutPrblm__ttl c-secTtl01"><span>動画制作のこんなお悩み、ありませんか？</span></h2>

   <div class="p-aboutPrblm__cardWrppr">

    <div class="p-aboutPrblm__cardBox">
     <h3 class="p-aboutPrblm__cardTtl">どのように依頼をしたら<br class="u-desktop">よいか分からない</h3>
     <figure class="p-aboutPrblm__cardImg">
      <img src="<?php echo get_template_directory_uri() ?>/assets/images/ico_trouble01.webp" alt="どのように依頼をしたらよいか分からない">
     </figure>
     <p class="p-aboutPrblm__cardTxt">初めて動画制作を行うのでどのように進めればよいか分からない。</p>
    </div>

    <div class="p-aboutPrblm__cardBox">
     <h3 class="p-aboutPrblm__cardTtl">動画制作のコストを<br class="u-desktop">抑えたい</h3>
     <figure class="p-aboutPrblm__cardImg">
      <img src="<?php echo get_template_directory_uri() ?>/assets/images/ico_trouble02.webp" alt="動画制作のコストを抑えたい">
     </figure>
     <p class="p-aboutPrblm__cardTxt">現在のコストが適切か分からない。<br class="u-desktop">パフォーマンスは落としたくない。</p>
    </div>

    <div class="p-aboutPrblm__cardBox">
     <h3 class="p-aboutPrblm__cardTtl">動画を活用した<br class="u-desktop">マーケティングを行いたい</h3>
     <figure class="p-aboutPrblm__cardImg">
      <img src="<?php echo get_template_directory_uri() ?>/assets/images/ico_trouble03.webp" alt="動画を活用したマーケティングを行いたい">
     </figure>
     <p class="p-aboutPrblm__cardTxt">動画を活用したマーケティングで集客効率を上げたい。</p>
    </div>
   </div>
  </div>
 </section>

 <section class="p-about__result p-aboutRslt">
  <div class="l-inner">
   <h2 class="p-aboutRslt__ttl"><span>そのお悩み、動画制作ナビで<br class="u-mobile">全て解決できます！</span></h2>
   <p class="p-aboutRslt__lead">動画制作ナビが選ばれる理由</p>

   <div class="p-aboutRslt__cardWrppr">

    <div class="p-aboutRslt__cardBox c-card01">

     <div class="c-card01__sntnc">
      <p class="c-card01__num">POINT01</p>
      <h3 class="c-card01__ttl">初めてでも安心！専任コンサルタントが<br>ヒアリング対応</h3>
      <p class="c-card01__txt">動画制作の依頼は明確なビジョンと目標が重要です。動画の用途や目的をヒアリングさせていただき、イメージされている動画制作を行います。具体的なイメージが出来ていない場合もイメージを具体化させるためのご提案を致します。</p>
     </div>

     <figure class="c-card01__img">
      <img src="<?php echo get_template_directory_uri() ?>/assets/images/img_result01-pc.jpg" alt="初めてでも安心！専任コンサルタントがヒアリング対応" width="313" height="177">
     </figure>

    </div>

    <div class="p-aboutRslt__cardBox c-card01">

     <div class="c-card01__sntnc">
      <p class="c-card01__num">POINT02</p>
      <h3 class="c-card01__ttl">パフォーマンスを落とさない適切なコスト削減</h3>
      <p class="c-card01__txt">単に動画の制作を行うのではなく、動画の用途や目的を理解させていただいたうえで動画制作を行います。目的に応じて、削減できる制作コストを算出致しますので、適切なコスト削減の提案が可能です。</p>
     </div>

     <figure class="c-card01__img">
      <img src="<?php echo get_template_directory_uri() ?>/assets/images/img_result02-pc.jpg" alt="パフォーマンスを落とさない適切なコスト削減" width="313" height="177">
     </figure>

    </div>

    <div class="p-aboutRslt__cardBox c-card01">

     <div class="c-card01__sntnc">
      <p class="c-card01__num">POINT03</p>
      <h3 class="c-card01__ttl">動画を使ったマーケティング施策もご相談ください</h3>
      <p class="c-card01__txt">累計15,000社以上のマーケティング・集客支援実績があり、目的から逆算した動画制作のご提案を強みとしています。企業規模、業種、用途、オンラインサービス・店舗型サービスを問わずあらゆるシーンごとで動画を活用した集客パフォーマンス改善のご提案を致します。</p>
     </div>

     <figure class="c-card01__img">
      <img src="<?php echo get_template_directory_uri() ?>/assets/images/img_result03-pc.jpg" alt="動画を使ったマーケティング施策もご相談ください" width="313" height="177">
     </figure>

    </div>
   </div>


  </div>
 </section>
 <section class="p-about__exmpl p-aboutExmpl">
  <div class="p-about__inner l-inner">

   <h2 class="p-aboutExmpl__ttl c-secTtl01">動画制作事例</h2>

   <div class="p-aboutExmpl__cardWrppr">
    <?php while (have_posts()) : the_post(); // メインループ開始 
        ?>
    <?php
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $the_query = new WP_Query();
          $param = array(
            'posts_per_page' => '6', //表示件数。-1なら全件表示
            'post_type' => 'works_case', //カスタム投稿タイプの名称を入れる←ここ変える(投稿だったらpost.カスタム投稿ならslug名)
            'post_status' => 'publish', //取得するステータス。publishなら一般公開のもののみ
            'order' => 'DESC',
            'orderby' => 'date',
            'paged' => $paged
          );
          $the_query->query($param);
          if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
          ?>

    <div class="p-aboutExmpl__movieCard">

     <figure>
      <!-- <//?php
                        $hoge = get_field('info_movie');
                        if ($hoge) :
                          echo $embed_code = wp_oembed_get($hoge);
                        endif; ?> -->
      <?php get_template_part('_inc/youtube'); ?>



     </figure>

     <a href="<?php the_permalink(); ?>">
      <p class="p-aboutExmpl__cardTxt">
       <?php the_title(); ?>
      </p>
      <p class="p-aboutExmpl__toDetail">
       詳細を見る
      </p>
     </a>
    </div>

    <?php
            endwhile;
          endif; ?>
    <?php endwhile; // メインループ終了 
        ?>
   </div>

   <!-- <div class="l-pagenavi">
    <?php wp_pagenavi(['query' => $the_query]); ?>
    <?php wp_reset_postdata()
    ?>
   </div> -->

  </div>
 </section>

 <section class="p-about_voice p-aboutVoice">

  <div class="l-inner">

   <h2 class="p-aboutVoice__ttl c-secTtl01">お客様の声</h2>

   <div class="p-aboutVoice__cardWrppr">

    <div class="p-aboutVoice__cardBox c-card02">
     <div class="c-card02__sntnc">
      <?php $value = get_post_meta($post->ID, 'customer_name', true); ?>
      <?php if (!empty($value)) : ?>
      <h3 class="c-card02__ttl"><?php the_field('customer_name'); ?></h3>
      <p class="c-card02__txt"><?php the_field('customer_voice'); ?></p>
     </div>

     <figure class="c-card02__img">
      <!-- <//?php
              $hoge = get_field('customer_movie');
              if ($hoge) :
                echo $embed_code = wp_oembed_get($hoge);
              endif; ?> -->
      <?php get_template_part('_inc/youtube_customer'); ?>

     </figure>
     <?php endif; ?>
    </div>

    <div class="p-aboutVoice__cardBox c-card02">
     <div class="c-card02__sntnc">
      <?php $value = get_post_meta($post->ID, 'customer_name2', true); ?>
      <?php if (!empty($value)) : ?>
      <h3 class="c-card02__ttl"><?php the_field('customer_name2'); ?></h3>
      <p class="c-card02__txt"><?php the_field('customer_voice2'); ?></p>
     </div>

     <figure class="c-card02__img">
      <!-- <//?php
              $hoge = get_field('customer_movie2');
              if ($hoge) :
                echo $embed_code = wp_oembed_get($hoge);
              endif; ?> -->
      <?php get_template_part('_inc/youtube_customer2'); ?>

     </figure>
     <?php endif; ?>
    </div>
   </div>

   <div class="p-aboutVoice__cta">

    <div class="p-aboutVoice__ctaBanner c-ctaBanner c-ctaBanner02">
     <p class="c-ctaBanner02__copy">かんたん30秒！</p>
     <p class="c-ctaBanner__txt">動画制作・動画集客に関することはお気軽にご相談ください。
     </p>
     <p class="c-ctaBanner__txt">専任スタッフがすぐに<br class="u-mobile">ご連絡いたします。</p>
     <div class="c-ctaBanner__btn">
      <a href="<?php echo esc_url(home_url('/contact')); ?>">まずは無料相談してみる</a>
     </div>
    </div>

   </div>

  </div>
 </section>

 <div class="p-about__bgPaleBlue">

  <section class="p-about__flow p-aboutFlow">
   <div class="l-inner">
    <h2 class="p-aboutFlow__ttl c-secTtl01">ご依頼の流れ</h2>

    <div class="p-aboutFlow__cardWrppr">

     <div class="p-aboutFlow__card">
      <h3 class="p-aboutFlow__cardTtl"><span class="p-aboutFlow__cardTtl--num">01</span> | お問い合わせ</h3>

      <div class="p-aboutFlow__cardImgBox">
       <figure class="p-aboutFlow__cardImg">
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/ico_about-flow01.png" alt="お問い合わせ" width="190" height="146">
       </figure>
      </div>
      <p class="p-aboutFlow__cardTxt">まずはお気軽にお問い合わせください。専任オペレーターがご対応致します。</p>
     </div>

     <div class="p-aboutFlow__card">
      <h3 class="p-aboutFlow__cardTtl"><span class="p-aboutFlow__cardTtl--num">02</span> | ヒアリング</h3>

      <div class="p-aboutFlow__cardImgBox">
       <figure class="p-aboutFlow__cardImg">
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/ico_about-flow02.png" alt="ヒアリング" width="190" height="146">
       </figure>
      </div>
      <p class="p-aboutFlow__cardTxt">ご用件をお伺いいたします。ご依頼内容が固まっている場合はお伝えください。ご依頼内容が具体化していない場合は当社からご提案も可能です。</p>
     </div>

     <div class="p-aboutFlow__card">
      <h3 class="p-aboutFlow__cardTtl"><span class="p-aboutFlow__cardTtl--num">03</span> | 無料見積</h3>

      <div class="p-aboutFlow__cardImgBox">
       <figure class="p-aboutFlow__cardImg">
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/ico_about-flow03.png" alt="無料見積" width="190" height="146">
       </figure>
      </div>
      <p class="p-aboutFlow__cardTxt">お話させていただいた内容をもとに無料でお見積りを提出させていただきます。</p>
     </div>

    </div>

   </div>
  </section>

  <section class="p-about__QA p-aboutQA">
   <div class="l-inner">
    <h2 class="p-aboutQA__ttl c-secTtl01">よくある質問</h2>

    <ol class="p-aboutQA__lists">

     <li class="p-aboutQA__item">
      <dl class="p-aboutQA__dfntin">
       <dt class="p-aboutQA__term">
        <p class="p-aboutQA__number">Q1.</p>
       </dt>
       <dd class="p-aboutQA__discr">
        <p class="p-aboutQA__question">企画から相談できますか？</p>
        <p class="p-aboutQA__answer">企画からもご対応いたします。作りたい映像のイメージが漠然としている状態でもお気軽にご相談ください。</p>
       </dd>
      </dl>
     </li>

     <li class="p-aboutQA__item">
      <dl class="p-aboutQA__dfntin">
       <dt class="p-aboutQA__term">
        <p class="p-aboutQA__number">Q2.</p>
       </dt>
       <dd class="p-aboutQA__discr">
        <p class="p-aboutQA__question">撮影のみや編集のみなど部分的な依頼はできますか？</p>
        <p class="p-aboutQA__answer">映像制作過程における一領域のみも対応可能です。お気軽にご相談ください。</p>
       </dd>
      </dl>
     </li>

     <li class="p-aboutQA__item">
      <dl class="p-aboutQA__dfntin">
       <dt class="p-aboutQA__term">
        <p class="p-aboutQA__number">Q3.</p>
       </dt>
       <dd class="p-aboutQA__discr">
        <p class="p-aboutQA__question">撮影依頼できる地域に制限はありますか？</p>
        <p class="p-aboutQA__answer">全国にプロの制作パートナーのネットワークを展開しておりますので、全国対応可能です。</p>
       </dd>
      </dl>
     </li>

     <li class="p-aboutQA__item">
      <dl class="p-aboutQA__dfntin">
       <dt class="p-aboutQA__term">
        <p class="p-aboutQA__number">Q4.</p>
       </dt>
       <dd class="p-aboutQA__discr">
        <p class="p-aboutQA__question">サイト上に作りたいイメージに合った動画事例の掲載が無いんですが依頼できますか？</p>
        <p class="p-aboutQA__answer">可能です。サイトに掲載できる事例には限りがあります。お打ち合わせではお見せできる非公開事例等もございますのでお気軽にご相談ください。</p>
       </dd>
      </dl>
     </li>

    </ol>



   </div>
  </section>

 </div>

 <div class="p-about__cta02 p-aboutCTA02">
  <div class="l-inner">

   <div class="p-aboutCTA02__banner c-ctaBanner">
    <p class="c-ctaBanner__txt">動画制作・動画集客に関することはお気軽にご相談ください。
    </p>
    <p class="c-ctaBanner__txt">専任スタッフがすぐに<br class="u-mobile">ご連絡いたします。</p>
    <div class="c-ctaBanner__btn">
     <a href="<?php echo esc_url(home_url('/contact')); ?>">まずは無料相談してみる</a>
    </div>
   </div>


  </div>
 </div>


</main>


<?php get_footer(); ?>