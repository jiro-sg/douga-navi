<?php get_header(); ?>
<div class="p-contact l-contact">
 <div class="p-contact__inner l-inner">
  <h2 class="p-contact__title c-secTtl01">お問い合わせフォーム</h2>
  <p class="p-contact__explain">ご相談・お見積もりは無料です。 専門スタッフが丁寧にご用件をお伺いいたします。お気軽にご相談ください</p>

  <div class="p-contact__form p-form">
   <?php the_content(); ?>

   <!-- <div class="p-form__inner">
    <dl class="p-form__wrap">
     <dt class="p-form__label">お名前<span>（必須）</span></dt>
     <dd class="p-form__input p-form-input">
      <input type="text" placeholder="例）動画太郎">
     </dd>
    </dl>
    <dl class="p-form__wrap">
     <dt class="p-form__label">貴社名</dt>
     <dd class="p-form__input p-form-input">
      <input type="text" placeholder="例）xxx@douganavi.biz">
     </dd>
    </dl>
    <dl class="p-form__wrap">
     <dt class="p-form__label">電話番号<span>（必須）</span></dt>
     <dd class="p-form__input p-form-input">
      <input type="tel" placeholder="例）09012345678">
     </dd>
    </dl>
    <dl class="p-form__wrap">
     <dt class="p-form__label">メールアドレス<span>（必須）</span></dt>
     <dd class="p-form__input p-form-input">
      <input type="email" placeholder="例）xxx@douganavi.biz">
     </dd>
    </dl>
    <dl class="p-form__wrap">
     <dt class="p-form__label">メールマガジン</dt>
     <dd class="p-form__checkbox p-form-checkbox">
      <label><input type="checkbox" name="sns" value=""><span>動画ナビからのお役立ち情報を希望する</span></label>
     </dd>
    </dl>
    <dl class="p-form__wrap">
     <dt class="p-form__label">相談内容</dt>
     <dd class="p-form__checkbox p-form-checkbox">
      <label><input type="checkbox" name="sns" value=""><span>動画制作について</span></label>
      <label><input type="checkbox" name="sns" value=""><span>動画を使ったマーケティングについて</span></label>
      <label><input type="checkbox" name="sns" value=""><span>その他</span></label>
     </dd>
    </dl>
    <dl class="p-form__wrap p-form__wrap--textarea">
     <dt class="p-form__label">備考</dt>
     <dd class="p-form__textarea p-form-textarea">
      <textarea name="message"></textarea>
     </dd>
    </dl>
    <div class="p-form__wrap p-form__wrap--confirm">
     <div class="p-form__checkbox p-form-checkbox">
      <label><input type="checkbox" name="sns" value=""><span>入力内容に問題がないかのご確認</span></label>
     </div>
    </div>
    <div class="p-form__submit p-form-submit">
     <input type="submit" value="お問い合わせ内容を送信する">
    </div>
   </div> -->
   <p class="p-form__policy">
    <a href="<?php echo esc_url(home_url('/policy/')); ?>"><span>個人情報保護方針</span>について同意したものとみなされます</a>
   </p>
  </div>


 </div>
</div>


<?php get_footer(); ?>