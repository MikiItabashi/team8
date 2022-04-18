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

	wp_enqueue_style('swiper', 'https://unpkg.com/swiper/swiper-bundle.min.css', array(), '1.0.1', 'all');
	wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.1', 'all');

	wp_enqueue_script('swiper', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), '1.0.1', true);
	wp_enqueue_script('mv-swiper', get_template_directory_uri() . '/assets/js/mv-swiper.js', array('jquery'), '1.0.1', true);
	wp_enqueue_script('top-works-swiper', get_template_directory_uri() . '/assets/js/top-works-swiper.js', array('jquery'), '1.0.1', true);
	wp_enqueue_script('works-detail-swiper', get_template_directory_uri() . '/assets/js/works-detail-swiper.js', array('jquery'), '1.0.1', true);
	wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0.1', true);
}
add_action('wp_enqueue_scripts', 'my_script_init');




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
 * メニューの登録
 *
 * 参考：https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
 */


/**
 * ウィジェットの登録
 *
 * @codex http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_sidebar
 */
// function my_widget_init() {
// 	register_sidebar(
// 		array(
// 			'name'          => 'サイドバー',
// 			'id'            => 'sidebar',
// 			'before_widget' => '<div id="%1$s" class="p-widget %2$s">',
// 			'after_widget'  => '</div>',
// 			'before_title'  => '<div class="p-widget__title">',
// 			'after_title'   => '</div>',
// 		)
// 	);
// }
// add_action( 'widgets_init', 'my_widget_init' );


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
 * 抜粋文の文字数の変更
 *
 * @param int $length 変更前の文字数.
 * @return int $length 変更後の文字数.
 */
function my_excerpt_length($length)
{
	return 80;
}
add_filter('excerpt_length', 'my_excerpt_length', 999);


/**
 * 抜粋文の省略記法の変更
 *
 * @param string $more 変更前の省略記法.
 * @return string $more 変更後の省略記法.
 */
function my_excerpt_more($more)
{
	return '...';
}
add_filter('excerpt_more', 'my_excerpt_more');


/**
 * お問い合わせフォームの送信後にサンクスページへ飛ばす
 *
 * @param string $more 変更前の省略記法.
 * @return string $more 変更後の省略記法.
 */
//お問い合わせと送信完了（固定ページ）のスラッグをセットする
$contact = 'contact';
$thanks = 'contact/thanks';
add_action('wp_footer', 'redirect_thanks_page');
function redirect_thanks_page()
{
	global $contact;
	global $thanks;

	if (is_page($contact)) {
?>
		<script>
			document.addEventListener('wpcf7mailsent', function(event) {
				location = '<?php echo home_url('/' . $thanks); ?>'; // 遷移先のURL
			}, false);
		</script>
<?php }
}

/**************************************************************
* アーカイブページの、各カード型情報のサムネイル画像を表示
**************************************************************/
function get_card_image($categoryName = null)
{
  global $post;
  if (is_post_type_archive('blog') || is_tax('custom_category') || $categoryName == 'blog') :
    if (has_post_thumbnail($post->ID)) :
      return get_the_post_thumbnail($post->ID, 'full');
    //画像登録されていない場合、ノーイメージ画像を表示
    else :
      return '<img src="' . esc_url(get_template_directory_uri()) . '/assets/images/common/noimg.png" alt="登録画像無し" />';
    endif;

  else :
    return '<img src="' . esc_url(get_template_directory_uri()) . '/assets/images/common/noimg.png" alt="登録画像無し" />';
  endif;
}
