<?php

/**
 * Functions
 */


/**
 * WordPress標準機能
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support
 */
function my_setup()
{
 add_theme_support('post-thumbnails'); /* アイキャッチ */
 add_theme_support('automatic-feed-links'); /* RSSフィード */
 add_theme_support('title-tag'); /* タイトルタグ自動生成 */
 add_theme_support(
  'html5',
  array( /* HTML5のタグで出力 */
   'search-form',
   'comment-form',
   'comment-list',
   'gallery',
   'caption',
  )
 );
}
add_action('after_setup_theme', 'my_setup');


/**
 * CSSとJavaScriptの読み込み
 *
 * @codex https://wpdocs.osdn.jp/%E3%83%8A%E3%83%93%E3%82%B2%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%E3%83%A1%E3%83%8B%E3%83%A5%E3%83%BC
 */
function my_script_init()
{
 //フォント
 wp_enqueue_style('font', '//fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap', array(), '1.0.1');
 wp_enqueue_style('font2', '//fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap', array(), '1.0.1');
 // jQueryの読み込み
 wp_deregister_script('jquery');
 wp_enqueue_script('jquery', '//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', "", "1.0.1");
 wp_enqueue_style('swiper', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', array(), '1.0.1', 'all');
 wp_enqueue_style('my', get_template_directory_uri() . '/assets/css/styles.css', array(), '1.0.1', 'all');

 wp_enqueue_script('gsap', '//cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js', array(), '3.11.5', true);
 wp_enqueue_script('gsap2', '//cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/ScrollTrigger.min.js', array('gsap'), '3.11.5', true);
 wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array('jquery'), '1.0.1', true);
 wp_enqueue_script('my', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0.1', true);
}
add_action('wp_enqueue_scripts', 'my_script_init');



/**
 * アーカイブタイトル書き換え
 *
 * @param string $title 書き換え前のタイトル.
 * @return string $title 書き換え後のタイトル.
 */
function my_archive_title($title)
{

 if (is_home()) { /* ホームの場合 */
  $title = 'ブログ';
 } elseif (is_category()) { /* カテゴリーアーカイブの場合 */
  $title = '' . single_cat_title('', false) . '';
 } elseif (is_tag()) { /* タグアーカイブの場合 */
  $title = '' . single_tag_title('', false) . '';
 } elseif (is_post_type_archive()) { /* 投稿タイプのアーカイブの場合 */
  $title = '' . post_type_archive_title('', false) . '';
 } elseif (is_tax()) { /* タームアーカイブの場合 */
  $title = '' . single_term_title('', false);
 } elseif (is_search()) { /* 検索結果アーカイブの場合 */
  $title = '「' . esc_html(get_query_var('s')) . '」の検索結果';
 } elseif (is_author()) { /* 作者アーカイブの場合 */
  $title = '' . get_the_author() . '';
 } elseif (is_date()) { /* 日付アーカイブの場合 */
  $title = '';
  if (get_query_var('year')) {
   $title .= get_query_var('year') . '年';
  }
  if (get_query_var('monthnum')) {
   $title .= get_query_var('monthnum') . '月';
  }
  if (get_query_var('day')) {
   $title .= get_query_var('day') . '日';
  }
 }
 return $title;
};
add_filter('get_the_archive_title', 'my_archive_title');


/**
 * 投稿タイプごとに異なるアーカイブの表示件数を指定
 * 
 * 参考：https://webcreatetips.com/coding/152/
 */
// function change_posts_per_page($query) {
//   if ( is_admin() || ! $query->is_main_query() )
//   return;
//   if ( $query->is_post_type_archive('works') ) {
//     $query->set( 'posts_per_page', '6' );
//   }
// 	if ( $query->is_tax('works_category') ) { 	
// 		$query->set( 'posts_per_page', '6' );
// 	}
// }
// add_action( 'pre_get_posts', 'change_posts_per_page' );


/**
 * メニューの登録
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
 */
// function my_menu_init() {
// 	register_nav_menus(
// 		array(
// 			'global'  => 'ヘッダーメニュー',
// 			'utility' => 'ユーティリティメニュー',
// 			'drawer'  => 'ドロワーメニュー',
// 		)
// 	);
// }
// add_action( 'init', 'my_menu_init' );


/**
 * 管理メニューの「投稿」に関する表示を「NEWS（任意）」に変更
 *
 * 参考：https://wordpress-web.and-ha.com/change-management-screen-post/
 */
// function change_post_menu_label()
// {
// 	global $menu;
// 	global $submenu;
// 	$menu[5][0] = 'NEWS';
// 	$submenu['edit.php'][5][0] = 'NEWS一覧';
// 	$submenu['edit.php'][10][0] = '新しいNEWS';
// 	$submenu['edit.php'][16][0] = 'タグ';
// }


/**
 * 管理画面上の「投稿」に関する表示を「NEWS」に変更
 *
 * 参考：https://wordpress-web.and-ha.com/change-management-screen-post/
 */
// function change_post_object_label()
// {
// 	global $wp_post_types;
// 	$labels = &$wp_post_types['post']->labels;
// 	$labels->name = 'NEWS';
// 	$labels->singular_name = 'NEWS';
// 	$labels->add_new = _x('追加', 'NEWS');
// 	$labels->add_new_item = 'NEWSの新規追加';
// 	$labels->edit_item = 'NEWSの編集';
// 	$labels->new_item = '新規NEWS';
// 	$labels->view_item = 'NEWSを表示';
// 	$labels->search_items = 'NEWSを検索';
// 	$labels->not_found = '記事が見つかりませんでした';
// 	$labels->not_found_in_trash = 'ゴミ箱に記事は見つかりませんでした';
// }
// add_action('init', 'change_post_object_label');
// add_action('admin_menu', 'change_post_menu_label');

//============================================================

// URLスラッグの自動生成　投稿のタイトルをIDにする
function custom_auto_post_slug_for_posts($slug, $post_ID, $post_status, $post_type)
{
 if ($post_type == 'post') {
  $slug = $post_ID;
 }
 return $slug;
}
add_filter('wp_unique_post_slug', 'custom_auto_post_slug_for_posts', 10, 4);

/* カスタム投稿タイプのスラッグを「{カスタム投稿タイプ}-ID」で採番 */
function custom_auto_post_slug_for_recipe($slug, $post_ID, $post_status, $post_type)
{
 if ($post_type == 'recipe') {
  $slug = utf8_uri_encode($post_type) . '-' . $post_ID;
 }
 return $slug;
}
add_filter('wp_unique_post_slug', 'custom_auto_post_slug_for_recipe', 10, 4);


//===================================
// Contact Form 7の自動pタグ,brタグ無効
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false()
{
 return false;
}
//===================================

//// 管理画面メニューの並び替え
function my_custom_menu_order($menu_order)
{
 if (!$menu_order) return true;
 return array(
  'index.php', //ダッシュボード
  'separator1', //セパレータ１
  'edit.php', //投稿
  'edit.php?post_type=search', //カスタムポスト
  'edit.php?post_type=faq', //カスタムポスト
  'upload.php', //メディア 
  'separator2', //セパレータ２
  'edit.php?post_type=page', //固定ページ
  'edit-comments.php', //コメント
  'separator-last', //最後のセパレータ
  'themes.php', //外観
  'plugins.php', //プラグイン
  'users.php', //ユーザー
  'tools.php', //ツール
  'options-general.php', //設定
 );
}
add_filter('custom_menu_order', 'my_custom_menu_order');
add_filter('menu_order', 'my_custom_menu_order');

//==========================================================
//ログイン画面カスタマイズ
function my_login_logo()
{
?>
 <style type="text/css">
  #login h1 a,
  .login h1 a {
   background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/logo.svg');
   width: 193px;
   background-size: cover;
  }

  body.login {
   background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/top/top_fv1.jpg');
   background-size: cover;
   width: 100%;
   height: auto;
   position: relative;
  }

  body.login::before {
   content: '';
   width: 100%;
   height: 100vh;
   background-color: rgba(255, 255, 255, 0.7);
   position: absolute;
   top: 0;
   left: 0;
   z-index: -1;
  }
 </style>
<?php
}
add_action('login_enqueue_scripts', 'my_login_logo');

function my_login_stylesheet()
{
 wp_enqueue_style('custom-login', get_stylesheet_directory_uri() . '/style-login.css');
}
add_action('login_enqueue_scripts', 'my_login_stylesheet');
//==========================================================

//if (current_user_can(!'administrator')) {
// 管理者以外の場合

// 管理画面からメインメニューを非表示にする
//	function remove_menus()
//	{
//		remove_menu_page('index.php'); // ダッシュボード
//		remove_menu_page('edit.php'); // 投稿
//		remove_menu_page('edit.php?post_type=information'); // カスタム投稿タイプ名
//		remove_menu_page('upload.php'); // メディア
//		remove_menu_page('edit.php?post_type=page'); // 固定ページ
//		remove_menu_page('edit-comments.php'); // コメント
//		remove_menu_page('themes.php'); // 外観
//		remove_menu_page('plugins.php'); // プラグイン
//		remove_menu_page('users.php'); // ユーザー
//		remove_menu_page('tools.php'); // ツール
//		remove_menu_page('options-general.php'); // 設定 
//	}
//	add_action('admin_menu', 'remove_menus', 999);
//}

// 管理画面からプラグインメニューを非表示にする
//function remove_plugins_menus()
//{
//	if (!current_user_can('administrator')) {
//		remove_menu_page('wpcf7'); // Contact Form 7
//		remove_menu_page('ai1wm_export'); // All-in-One WP Migration
//		remove_menu_page('cptui_main_menu'); // Custom Post Type UI
//		remove_menu_page('edit.php?post_type=acf-field-group'); // Advanced Custom Fields. メインメニュー.
//		remove_menu_page('cptui_main_menu'); // Custom Post Type UI. メインメニュー.
//		remove_menu_page('edit.php?post_type=smart-custom-fields'); // Custom Post Type UI. メインメニュー.
//	}
//}
//add_action('admin_menu', 'remove_plugins_menus');


//==========================================================
//エディタを非表示にする
function remove_wysiwyg()
{
 remove_post_type_support('faq', 'editor');
 remove_post_type_support('faq', 'editor');
 //複数ある場合は追記する
}
add_action('init', 'remove_wysiwyg');

//==========================================================

//管理画面にタクソノミー名を表示
function my_custom_column($columns)
{
 $columns['faq_menu'] = 'カテゴリ';
 return $columns;
}
add_filter('manage_faq_posts_columns', 'my_custom_column');

function my_custom_column_id($column_name, $id)
{
 $terms = get_the_terms($id, $column_name);
 if ($terms && !is_wp_error($terms)) {
  $menu_terms = array();
  foreach ($terms as $term) {
   $menu_terms[] = $term->name;
  }
  echo join(", ", $menu_terms);
 }
}
add_action('manage_faq_posts_custom_column', 'my_custom_column_id', 10, 2);
//==========================================================
//デフォルトの投稿を非表示にする
function remove_menus()
{
 remove_menu_page('edit.php');
}
add_action('admin_menu', 'remove_menus');
