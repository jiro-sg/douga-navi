<?php get_header(); ?>


<div class="p-faq-category l-faq-category">
 <div class="l-inner">
  <div class="p-faq-category__wrap">
   <h2 class="p-faq-category__title c-secTtl02">カテゴリごとによくある<br class="u-mobile">ご質問を検索する</h2>
   <ul class="p-faq-category__items">

    <?php get_template_part('_inc/faq_category'); ?>


   </ul>
  </div>
 </div>

</div>

<section class="p-faq l-faq">

 <div class="p-faq__inner l-inner">
  <h2 class="p-faq__title c-secTtl01">よくある質問</h2>
  <div class="p-faq__wrap">

   <!-- <dl class="p-faq__item">
    <dt class="p-faq__question">動画制作ナビは映像クリエイターマッチングサイトですか？</dt>
    <dd class="p-faq__answer">動画制作ナビはマッチングサイトではございません。動画制作ナビのスタッフがご納品まで対応いたします。</dd>
   </dl> -->


   <?php
   $the_query = new WP_Query();
   $param = array(
    'posts_per_page' => '-1', //表示件数。-1なら全件表示
    'post_type' => 'faq', //カスタム投稿タイプの名称を入れる←ここ変える(投稿だったらpost.カスタム投稿ならslug名)
    'post_status' => 'publish', //取得するステータス。publishなら一般公開のもののみ
    'order' => 'DESC'
   );
   $the_query->query($param);
   if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
   ?>







     <dl class="p-faq__item">
      <dt class="p-faq__question">
       <?php the_title(); ?>
      </dt>
      <dd class="p-faq__answer">
       <?php if (CFS()->get('answer')) : ?>
        <?php echo CFS()->get('answer'); ?>
       <?php endif; ?>
      </dd>
      </dd>
     </dl>




   <?php
    endwhile;
   endif;
   wp_reset_postdata()
   ?>



   <!-- <dl class="p-faq__item">
    <dt class="p-faq__question">クリエイターマッチングサイトやクラウドソーシングサービスとは何が違いますか？</dt>
    <dd class="p-faq__answer">動画制作ナビのディレクターは現役クリエイティブエージェンシーのメンバーです。単に映像を作るだけではなくお客様の課題解決の観点で、お問い合わせ内容に応じたご提案が可能です。ニーズに応じて最適なプロの映像制作パートナーと動画制作ナビのディレクターがご納品まで対応致しますので、コミュニケーション、費用、品質、スピードにも自信がございますのでお気軽にご相談ください。</dd>
   </dl>
   <dl class="p-faq__item">
    <dt class="p-faq__question">法人以外も利用できますか？</dt>
    <dd class="p-faq__answer">個人でのご利用も歓迎しております。イベントや結婚式の動画作成等、お気軽にご相談ください。</dd>
   </dl>
   <dl class="p-faq__item">
    <dt class="p-faq__question">サイト上に作りたいイメージに合った動画事例の掲載が無いんですが依頼できますか？</dt>
    <dd class="p-faq__answer">サイトに掲載できる事例には限りがあります。お打ち合わせではお見せできる非公開事例等もございますのでお気軽にご相談ください。</dd>
   </dl>
   <dl class="p-faq__item">
    <dt class="p-faq__question">相談はどのように進めればよいですか？</dt>
    <dd class="p-faq__answer">お問い合わせフォームよりお問い合わせください。サイト内で事例を検索いただき、作りたい動画に近しいものがございましたら、お問い合わせ時にお伝えいただけますとスムーズにご案内が可能です。</dd>
   </dl>
   <dl class="p-faq__item">
    <dt class="p-faq__question">企画から相談できますか？</dt>
    <dd class="p-faq__answer">企画からもご対応いたします。作りたい映像のイメージが漠然としている状態でもお気軽にご相談ください。</dd>
   </dl>
   <dl class="p-faq__item">
    <dt class="p-faq__question">撮影のみや編集のみなど部分的な依頼はできますか？</dt>
    <dd class="p-faq__answer">映像制作過程における一領域のみも対応可能です。お気軽にご相談ください。</dd>
   </dl>
   <dl class="p-faq__item">
    <dt class="p-faq__question">全国にプロの制作パートナーのネットワークを展開しておりますので、全国対応可能です。</dt>
    <dd class="p-faq__answer">撮影依頼できる地域に制限はありますか？</dd>
   </dl>
   <dl class="p-faq__item">
    <dt class="p-faq__question">費用は事前にわかりますか？</dt>
    <dd class="p-faq__answer">サイトに掲載している事例毎に参考価格を掲載させていただいておりますが、要件により金額は変動いたしますのでお客様ごとにお見積りさせていただいております。</dd>
   </dl>
   <dl class="p-faq__item">
    <dt class="p-faq__question">急ぎで納品してほしいです。</dt>
    <dd class="p-faq__answer">お急ぎの案件もご相談ください。ご提示いただいた条件が難しい場合も「こういった形であれば対応可能」というように代替案の提示を可能なかぎりさせていただきます。</dd>
   </dl>
   <dl class="p-faq__item">
    <dt class="p-faq__question">発注はどのように進めればよいですか？</dt>
    <dd class="p-faq__answer">ますはヒアリングをさせていただきお見積りを提出いたしますのでお問い合わせください。ご発注の際は弊社見積担当へご連絡ください。</dd>
   </dl>
   <dl class="p-faq__item">
    <dt class="p-faq__question">納品形式はどのようになりますか？</dt>
    <dd class="p-faq__answer">データでのご納品となります。その他の形態でのご納品ご希望の際はご相談ください。</dd>
   </dl> -->
  </div>
 </div>
 <div class="p-faq__banner c-ctaBanner">
  <p class="c-ctaBanner__txt">動画制作・動画集客に関することはお気軽にご相談ください。<br>専任スタッフがすぐにご連絡いたします。
  </p>
  <div class="c-ctaBanner__btn">
   <a href="#">まずは無料相談してみる</a>
  </div>
 </div>
 <div class="p-faq__return c-returnBtn">
  <a href="#">ホームへ戻る</a>
 </div>

</section>




<?php get_footer(); ?>