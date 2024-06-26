<form method="get" id="searchform" class="searchform" action="<?php echo esc_url(home_url()); ?>">
 <div class="searchform__box">
  <input type="text" name="s" id="s" placeholder="キーワードで検索する">
  <button type="submit">
   <img src="<?php echo get_template_directory_uri() ?>/assets/images/ico_search.png" alt="search" width="17" height="20">
  </button>
 </div>

</form>