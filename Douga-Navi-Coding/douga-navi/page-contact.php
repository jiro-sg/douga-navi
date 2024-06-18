<?php get_header(); ?>
<div class="p-contact">
 <div class="p-contact__inner">
  <form class="p-contact__form p-form" action="">
   <dl class="p-form__wrap">
    <dt class="p-form__label">名前<span>必須</span></dt>
    <dd class="p-form__input p-form-input">
     <input type="text">
    </dd>
   </dl>
   <dl class="p-form__wrap">
    <dt class="p-form__label">電話番号<span>必須</span></dt>
    <dd class="p-form__input p-form-input">
     <input type="tel">
    </dd>
   </dl>
   <dl class="p-form__wrap">
    <dt class="p-form__label">メールアドレス<span>必須</span></dt>
    <dd class="p-form__input p-form-input">
     <input type="email">
    </dd>
   </dl>
   <dl class="p-form__wrap">
    <dt class="p-form__label">住所</dt>
    <dd class="p-form__select p-form-select">
     <select>
      <option hidden>選択してください</option>
      <option value="東京">東京</option>
      <option value="大阪">大阪</option>
      <option value="福岡">福岡</option>
      <option value="その他">その他</option>
     </select>
    </dd>
   </dl>
   <dl class="p-form__wrap">
    <dt class="p-form__label">カテゴリ</dt>
    <dd class="p-form__radio p-form-radio">
     <label><input type="radio" name="category" value="ホームページ制作"><span>ホームページ制作</span></label>
     <label><input type="radio" name="category" value="SNS運用"><span>SNS運用</span></label>
     <label><input type="radio" name="category" value="その他"><span>その他</span></label>
    </dd>
   </dl>
   <dl class="p-form__wrap">
    <dt class="p-form__label">お持ちのSNS</dt>
    <dd class="p-form__checkbox p-form-checkbox">
     <label><input type="checkbox" name="sns" value="Twitter"><span>Twitter</span></label>
     <label><input type="checkbox" name="sns" value="Instagram"><span>Instagram</span></label>
     <label><input type="checkbox" name="sns" value="Facebook"><span>Facebook</span></label>
     <label><input type="checkbox" name="sns" value="YouTube"><span>YouTube</span></label>
     <label><input type="checkbox" name="sns" value="その他"><span>その他</span></label>
    </dd>
   </dl>
   <dl class="p-form__wrap p-form__wrap--textarea">
    <dt class="p-form__label">お問い合わせ内容<span>必須</span></dt>
    <dd class="p-form__textarea p-form-textarea">
     <textarea name="message"></textarea>
    </dd>
   </dl>
   <div class="p-form__submit p-form-submit">
    <input type="submit" value="送信">
   </div>
  </form>
 </div>
</div>


<?php get_footer(); ?>