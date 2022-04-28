<?php get_header(); ?>

  <section class="p-mv">
    <div class="swiper-container p-mv__container js-mv-swiper">
      <div class="swiper-wrapper p-mv__wrapper">
        <!-- メイン画像のタイトルをmv1、mv2、mv3とすることでループ処理 -->
        <div class="swiper-slide p-mv__slide">
          <div class="slide-img p-mv__img l-mv__img">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/top/mv1@2x.jpg" alt="メインビジュアル画像1枚目">
          </div>
        </div>
        <div class="swiper-slide p-mv__slide">
          <div class="slide-img p-mv__img l-mv__img">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/top/mv2@2x.jpg" alt="メインビジュアル画像2枚目">
          </div>
        </div>
        <div class="swiper-slide p-mv__slide">
          <div class="slide-img p-mv__img l-mv__img">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/top/mv3@2x.jpg" alt="メインビジュアル画像3枚目">
          </div>
        </div>
      </div>
      <div class="p-mv__titleblock">
        <h1 class="p-mv__title">メインタイトルが入ります</h1>
        <span class="p-mv__subtitle">サブタイトルが入ります</span>
      </div>
    </div>
  </section>
  <div class="l-top-news">
    <!-- トップページニュース欄 -->
    <article id="top-news" class="l-top-news p-top-news">
      <div class="p-top-news__inner l-inner">
        <div class="p-top-news__wrapper">
          <div class="p-top-news__content">
            <div class="p-news">
              <div class="p-news__wrapper">
                <div class="p-news__header">
                  <time class="p-news__date" datetime="2020-07-20">2020.07.20</time>
                  <div class="p-news__category">お知らせ</div>
                </div>
                <div class="p-news__titleblock">
                  <a href="#" class="p-news__title">
                    <h3> 記事タイトルが入ります。記事タイトルが入ります。記事タイトルが入ります。 </h3>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="p-top-news__btnblock">
            <a href="#" class="c-btn--half">すべて見る</a>
          </div>
        </div>
      </div>
    </article>
  </div>
  <section class="l-top-content">
    <!-- content 事業内容 -->
    <div class="p-top-content">
      <div class="p-top-content__inner">
        <div class="p-top-content__header l-inner">
          <div class="c-title">
            <h2 class="c-title__ja"> 事業内容 </h2>
            <p class="c-title__en"> content </p>
          </div>
        </div>
        <div class="p-top-content__wrapper">
          <ul class="p-top-content__items">
            <li class="p-top-content__item">
              <a href="#" class="p-top-content__link">
                <div class="p-top-content__img">
                  <img src="<?php echo get_template_directory_uri() ?>/assets/images/content/content1@2x.jpg" alt="事業内容コンテンツ『経営理念ページへ』リンク">
                </div>
                <div class="p-top-content__textblock">
                  <p class="p-top-content__text">経営理念ページへ</p>
                </div>
              </a>
            </li>
            <li class="p-top-content__item">
              <a href="#" class="p-top-content__link">
                <div class="p-top-content__img">
                  <img src="<?php echo get_template_directory_uri() ?>/assets/images/content/content2@2x.jpg" alt="事業内容コンテンツ『理念1へ』リンク">
                </div>
                <div class="p-top-content__textblock">
                  <p class="p-top-content__text">理念1へ</p>
                </div>
              </a>
            </li>
            <li class="p-top-content__item">
              <a href="#" class="p-top-content__link">
                <div class="p-top-content__img">
                  <img src="<?php echo get_template_directory_uri() ?>/assets/images/content/content3@2x.jpg" alt="事業内容コンテンツ『理念2へ』リンク">
                </div>
                <div class="p-top-content__textblock">
                  <p class="p-top-content__text">理念2へ</p>
                </div>
              </a>
            </li>
            <li class="p-top-content__item">
              <a href="#" class="p-top-content__link">
                <div class="p-top-content__img">
                  <img src="<?php echo get_template_directory_uri() ?>/assets/images/content/content4@2x.jpg" alt="事業内容コンテンツ『理念3へ』リンク">
                </div>
                <div class="p-top-content__textblock">
                  <p class="p-top-content__text">理念3へ</p>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <section class="l-top-works">
    <div class="p-top-works">
      <div class="p-top-works__inner">
        <div class="p-top-works__head">
          <div class="c-title">
            <h2 class="c-title__ja"> 制作実績 </h2>
            <p class="c-title__en c-title__en--right"> Works </p>
          </div>
        </div>
        <div class="p-top-works__wrapper">
          <div class="p-top-works__body">
            <div class="p-top-works__slider">
              <!-- Slider main container -->
              <div class="swiper-custom-parent">
                <div class="swiper js-top-works-swiper">
                  <!-- Additional custom wrapper -->
                  <!-- Additional required wrapper -->
                  <div class="swiper-wrapper">
                    <!-- Slides -->
                    <?php
                    $top_works = SCF::get('top-works');
                    foreach( $top_works as $fields ):
                      $top_works = wp_get_attachment_image_src( $fields[ 'top-works__img' ] , 'full' );
                    ?>
                    <div class="swiper-slide">
                      <img class="swiper-slide-img" src="<?php echo $top_works[0]; ?>" alt="制作実績イメージ画像">
                    </div>
                    <?php endforeach; ?>
                  </div>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
              </div>
            </div>
            <div class="p-top-works__content">
              <p class="p-top-works__title"><?php the_field('works-title'); ?></p>
              <p class="p-top-works__text"><?php the_field('works-text'); ?></p>
              <div class="p-top-works__btn">
                <a href="<?php echo esc_url( home_url('works') ) ?>" class="c-btn--black">詳しく見る</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="l-top-overview">
    <div class="p-top-overview">
      <div class="p-top-overview__inner">
        <div class="p-top-overview__head">
          <div class="c-title">
            <h2 class="c-title__ja"> 企業概要 </h2>
            <p class="c-title__en"> Overview </p>
          </div>
        </div>
        <div class="p-top-overview__wrapper">
          <div class="p-top-overview__body">
            <div class="p-top-overview__img">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/top/overview-img.jpg" alt="企業概要イメージ画像">
            </div>
            <div class="p-top-overview__content">
              <p class="p-top-overview__title"><?php the_field('overview-title'); ?></p>
              <p class="p-top-overview__text"><?php the_field('overview-text'); ?></p>
              <div class="p-top-overview__btn">
                <a href="<?php echo esc_url( home_url('overview') ) ?>" class="c-btn--black">詳しく見る</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="l-top-blog">
    <div class="p-top-blog">
      <div class="l-inner">
        <div class="p-top-blog__head">
          <div class="c-title">
            <h2 class="c-title__ja"> ブログ </h2>
            <p class="c-title__en c-title__en--right"> Blog </p>
          </div>
        </div>
        <div class="p-top-blog__body">
          <div class="p-top-blog__card">
            <a href="" class="p-blog-card">
              <div class="p-blog-card__label">New</div>
              <div class="p-blog-card__img">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/blog/blog-img1.jpg" alt="サムネイル画像">
              </div>
              <div class="p-blog-card__body">
                <p class="p-blog-card__title">タイトルが入ります。タイトルが入ります。</p>
                <p class="p-blog-card__text">説明文が入ります。説明文が入ります。説明文が入ります。</p>
                <div class="p-blog-card__info">
                  <p class="p-blog-card__category">カテゴリ</p>
                  <time class="p-blog-card__date" datetime="2021-07-20">2021.07.20</time>
                </div>
              </div>
            </a>
          </div>
          <div class="p-top-blog__card">
            <a href="" class="p-blog-card">
              <div class="p-blog-card__label">New</div>
              <div class="p-blog-card__img">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/blog/blog-img1.jpg" alt="サムネイル画像">
              </div>
              <div class="p-blog-card__body">
                <p class="p-blog-card__title">タイトルが入ります。タイトルが入ります。</p>
                <p class="p-blog-card__text">説明文が入ります。説明文が入ります。説明文が入ります。</p>
                <div class="p-blog-card__info">
                  <p class="p-blog-card__category">カテゴリ</p>
                  <time class="p-blog-card__date" datetime="2021-07-20">2021.07.20</time>
                </div>
              </div>
            </a>
          </div>
          <div class="p-top-blog__card">
            <a href="" class="p-blog-card">
              <div class="p-blog-card__label">New</div>
              <div class="p-blog-card__img">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/blog/blog-img1.jpg" alt="サムネイル画像">
              </div>
              <div class="p-blog-card__body">
                <p class="p-blog-card__title">タイトルが入ります。タイトルが入ります。</p>
                <p class="p-blog-card__text">説明文が入ります。説明文が入ります。説明文が入ります。</p>
                <div class="p-blog-card__info">
                  <p class="p-blog-card__category">カテゴリ</p>
                  <time class="p-blog-card__date" datetime="2021-07-20">2021.07.20</time>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="p-top-blog__btn">
          <a href="#" class="c-btn--black">詳しく見る</a>
        </div>
      </div>
    </div>
  </section>

<!-- お問い合わせセクション表示 -->
<?php get_template_part('content-contact'); ?>

<?php get_footer(); ?>