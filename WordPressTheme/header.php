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