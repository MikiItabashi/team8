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
	if (is_post_type_archive('blog') || is_tax('custom_category') || $categoryName == 'blog' || $categoryName == 'works') :
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

/**************************************************************
 * パンくずリスト
 **************************************************************/
// 記事タイトルを非表示
function foo_pop($trail)
{
	if (is_single()) {
		array_shift($trail->trail);
	}
}
add_action('bcn_after_fill', 'foo_pop');

// 詳細ページ
function bcn_add($bcnObj)
{
	// デフォルト投稿の詳細ページかどうか
	if (is_singular('works')) {
		// 制作実績
		$bcnObj->add(new bcn_breadcrumb('制作実績詳細', null, array('archive', 'post-clumn-archive', 'current-item')));
		$trail_tmp = clone $bcnObj->trail[1];
		$bcnObj->trail[1] = clone $bcnObj->trail[0];
		$bcnObj->trail[0] = clone $bcnObj->trail[2];
		$bcnObj->trail[2] = $trail_tmp;
	} elseif (is_singular('blog')) {
		// ブログ
		$bcnObj->add(new bcn_breadcrumb('ブログ記事詳細', null, array('archive', 'post-clumn-archive', 'current-item')));
		$trail_tmp = clone $bcnObj->trail[1];
		$bcnObj->trail[1] = clone $bcnObj->trail[0];
		$bcnObj->trail[0] = clone $bcnObj->trail[2];
		$bcnObj->trail[2] = $trail_tmp;
	}
	return $bcnObj;
}
add_action('bcn_after_fill', 'bcn_add');



/**************************************************************
 * 下層ページトップ画像の取得
 **************************************************************/
add_filter(
	'ys_get_header_post_thumbnail',
	function ($thumbnail) {
		// カスタム投稿タイプのアーカイブページの場合に画像(img)タグを返す.
		if (is_post_type_archive('works')) {
			// return '<img src="[画像URL]" alt="[画像alt]" />';
			return 'aaa';
		}
		// 変更しない場合はnullを返す.
		return null;
	}
);


/* 投稿と固定ページ一覧にサムネイルの列を追加 */
// function add_posts_columns_thumbnail($columns)
// {
// 	$columns['thumbnail'] = 'サムネイル';

// 	echo '<style>
// 	.fixed .column-thumbnail {width: 120px;}</style>';
// 	return $columns;
// }
// add_filter('manage_posts_columns', 'add_posts_columns_thumbnail');
// add_filter('manage_pages_columns', 'add_posts_columns_thumbnail');

// /* サムネイルを表示 */
// function custom_posts_columns_thumbnail($column_name, $post_id)
// {
// 	if ('thumbnail' == $column_name) {
// 		$thumb = get_the_post_thumbnail($post_id, 'small', array('style' => 'width:100px;height:auto;'), 'thumbnail');
// 		echo ($thumb) ? $thumb : '－';
// 	}
// }
// add_action('manage_posts_custom_column', 'custom_posts_columns_thumbnail', 10, 2);
// add_action('manage_pages_custom_column', 'custom_posts_columns_thumbnail', 10, 2);

/****************************************************************
* 記事にNEWマークを条件指定で表示するための条件判断関数
*****************************************************************/
/**
* 指定した日数以内の指定件数の最新記事にNEWマークを表示
**/
function newMark_condition_numTime($days, $limit, $current_post)
{
  $today = date_i18n('U');
  $entry_day = get_the_time('U');
  $difference_time = date('U', ($today - $entry_day)) / 86400;
  if ($days > $difference_time) :
    if ($limit > $current_post) :
      return true;
    else :
      return false;
    endif;
  else :
    return false;
  endif;
}