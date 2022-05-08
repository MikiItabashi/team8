<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&family=Noto+Serif+JP&display=swap" rel="stylesheet">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <header class="l-header p-header">
    <div class="p-header__inner">
      <div class="p-header__logo">
        <a href="<?php echo esc_url(home_url('/')) ?>">
          <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/logo.svg" alt="ロゴ">
        </a>
      </div>
      <div class="p-header__right">
        <nav class="p-header__pc-nav p-pc-nav">
          <ul class="p-pc-nav__items">
            <li class="p-pc-nav__item"><a href="<?php echo esc_url(home_url('news')) ?>">お知らせ</a></li>
            <li class="p-pc-nav__item"><a href="<?php echo esc_url(home_url('content')) ?>">事業内容</a></li>
            <li class="p-pc-nav__item"><a href="<?php echo esc_url(home_url('works')) ?>">制作実績</a></li>
            <li class="p-pc-nav__item"><a href="<?php echo esc_url(home_url('overview')) ?>">企業概要</a></li>
            <li class="p-pc-nav__item"><a href="<?php echo esc_url(home_url('blog')) ?>">ブログ</a></li>
            <li class="p-pc-nav__item p-pc-nav__item--white"><a href="<?php echo esc_url(home_url('contact')) ?>">お問い合わせ</a></li>
          </ul>
        </nav>
        <button class="p-header__drawer c-drawer-icon js-hamburger">
          <span></span>
          <span></span>
          <span></span>
        </button>
      </div>
    </div>
  </header>
  <nav class="l-sp-nav p-sp-nav js-drawer-nav">
    <ul class="p-sp-nav__items">
      <li class="p-sp-nav__item"><a href="<?php echo esc_url(home_url('/')) ?>"><span class="p-sp-nav__text">トップ</span></a></li>
      <li class="p-sp-nav__item"><a href="<?php echo esc_url(home_url('news')) ?>"><span class="p-sp-nav__text">お知らせ</span></a></li>
      <li class="p-sp-nav__item"><a href="<?php echo esc_url(home_url('content')) ?>"><span class="p-sp-nav__text">事業内容</span></a></li>
      <li class="p-sp-nav__item"><a href="<?php echo esc_url(home_url('works')) ?>"><span class="p-sp-nav__text">制作実績</span></a></li>
      <li class="p-sp-nav__item"><a href="<?php echo esc_url(home_url('overview')) ?>"><span class="p-sp-nav__text">企業内容</span></a></li>
      <li class="p-sp-nav__item"><a href="<?php echo esc_url(home_url('blog')) ?>"><span class="p-sp-nav__text">ブログ</span></a></li>
      <li class="p-sp-nav__item"><a href="<?php echo esc_url(home_url('contact')) ?>"><span class="p-sp-nav__text">お問い合わせ</span></a></li>
    </ul>
  </nav>

  <!-- 下層ページタイトル -->
  <?php if (!is_front_page() && !is_single() && !is_404() && !is_page('contact/thanks')) : ?>
    <?php
    $id = get_post_thumbnail_id();
    $img = wp_get_attachment_image_src($id, 'large');
    if (is_post_type_archive('works') || is_tax('custom_category_works')) {
      $img[0] = get_template_directory_uri() . '/assets/images/works/works-hero.jpg';
    } elseif (is_post_type_archive('blog') || is_tax('custom_category')) {
      $img[0] = get_template_directory_uri() . '/assets/images/blog/blog-hero.jpg';
    } elseif (is_home()) {
      $img[0] = get_template_directory_uri() . '/assets/images/news/news-hero.jpg';
    }
    ?>
    <div class="c-subHero" style="background-image: url('<?php echo $img[0]; ?>')">
      <h1>
        <?php if (is_home()) :
          echo 'お知らせ';
        elseif (is_post_type_archive('works') || is_tax('custom_category_works')) :
          echo '制作実績';
        elseif (is_post_type_archive('blog') || is_tax('custom_category')) :
          echo 'ブログ';
        else :
          the_title();
        endif; ?>
      </h1>
    </div>
  <?php endif; ?>

  <!-- BreadcrumbNavXTのパンくずを表示 -->
  <?php if (!is_front_page() && !is_404() && !is_page('contact/thanks')) : ?>
    <div <?php if (is_single()) : ?> class="l-breadcrumb-detail" <?php else : ?> class="l-breadcrumb" <?php endif; ?>>
      <div class="c-breadcrumb">
        <div class="c-breadcrumb__items l-inner">
          <?php
          if (function_exists('bcn_display')) :
            bcn_display();
          endif;
          ?>
        </div>
        </ul>
      </div>
    </div>
  <?php endif; ?>