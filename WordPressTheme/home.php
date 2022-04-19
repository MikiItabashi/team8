<?php get_header(); ?>

  <div class="l-inner">
    <div class="l-news-list">
      <div class="p-news-list">
        <div class="p-news-list__items">

        <!-- ニュース記事一覧表示 -->
        <?php
        if( have_posts() ):
          while( have_posts() ): the_post();
        ?>
          <div class="p-news-list__item">
            <div class="p-news">
              <div class="p-news__wrapper">
                <div class="p-news__header">
                  <time class="p-news__date" datetime="<?php the_time( 'Y-m-d' ) ?>"><?php the_time( 'Y.m.d' ) ?></time>
                    <div class="p-news__category">お知らせ</div>
                </div>
                <div class="p-news__titleblock">
                  <a href="#" class="p-news__title">
                    <h3><?php the_title() ?></h3>
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php
          endwhile;
        endif;
        ?>
        </div>
      </div>
    </div>
  </div>

<!-- お問い合わせセクション表示 -->
<?php get_template_part('content-contact'); ?>

<?php get_footer(); ?>