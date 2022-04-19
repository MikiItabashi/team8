<?php get_header(); ?>

<section class="l-works-detail-header">
  <section class="p-works-detail-header">
    <div class="p-works-detail-header__inner l-inner-800w">
      <h1 class="p-works-detail-header__title"><?php the_title(); ?> 制作実績</h1>
      <div class="p-works-detail-header__info">
        <time class="p-works-detail-header__time" datetime="<?php the_time( 'Y-m-d' ) ?>"><?php the_time( 'Y/m/d' ) ?></time>
        <?php
        $terms = get_the_terms( $post->ID, 'custom_category' ); // ターム一覧抽出
        ?>
        <div class="p-works-detail-header__category"><?php echo esc_html( $terms[0]->name ); ?></div>
      </div>
    </div>
  </section>
</section>
<div class="l-works-detail-slider">
  <div class="l-works-slider p-works-detail-slider">
    <div class="p-works-detail-slider__inner l-inner-800w">
      <div class="swiper-container p-works-detail-slider__container--main js-works-slider">
        <div class="swiper-wrapper p-works-detail-slider__wrapper--main">
        <?php
        $works_imgs = SCF::get('works-detail-slider');
        foreach( $works_imgs as $fields ):
          $works_img = wp_get_attachment_image_src( $fields[ 'works-detail-slider__img' ] , 'full' );
        ?>
        <figure class="swiper-slide p-works-detail-slider__img--main">
          <img src="<?php echo $works_img[0]; ?>" alt="制作実績">
        </figure>
        <?php endforeach; ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
      <div class="swiper-container p-works-detail-slider__container--thumbnail js-works-thumbnail">
        <div class="swiper-wrapper  p-works-detail-slider__wrapper--thumbnail">
        <?php
        $works_imgs = SCF::get('works-detail-slider');
        foreach( $works_imgs as $fields ):
          $works_img = wp_get_attachment_image_src( $fields[ 'works-detail-slider__img' ] , 'full' );
        ?>
          <figure class="swiper-slide  p-works-detail-slider__img--thumbnail">
            <img src="<?php echo $works_img[0]; ?>" alt="制作実績">
          </figure>
        <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="l-works-detail-text">
  <!-- テキストコンテンツ -->
  <section class="p-works-textarea">
    <div class="p-works-textarea__inner l-inner-800w">
      <?php
      $works_textarea = SCF::get( 'works-detail-textarea' );
      foreach( $works_textarea as $fields ):
      ?>
      <h2 class="p-works-textarea__title"><?php echo $fields[ 'works-detail-textarea__title' ]; ?></h2>
      <p class="p-works-textarea__text"><?php echo $fields[ 'works-detail-textarea__text' ]; ?></p>
      <?php endforeach; ?>
    </div>
  </section>
</div>
<div class="l-pagePrevNext">
<div class="c-pagePrevNext">
  <ul class="c-pagePrevNext__items">
    <?php
    $prev_post = get_previous_post();
    if( !empty( $prev_post ) ):
      $prev_url = get_permalink( $prev_post->ID );
    ?>
    <li class="c-pagePrevNext__item"><a href="<?php echo esc_url( $prev_url ); ?>">prev</a></li>
    <?php endif; ?>
    <li class="c-pagePrevNext__item c-pagePrevNext__item--archive"><a href="<?php echo esc_url( home_url('works') ); ?>">一覧</a></li>
    <?php
    $next_post = get_next_post();
    if( !empty( $next_post ) ):
      $next_url = get_permalink( $next_post->ID );
    ?>
    <li class="c-pagePrevNext__item"><a href="<?php echo esc_url( $next_url ); ?>">next</a></li>
    <?php endif; ?>
  </ul>
</div>
</div>
<section class="l-works-detail-other">
<!-- データリスト -->
<!-- 表示内容 -->
  <div class="p-works-detail-other">
    <div class="p-works-detail-other__inner l-inner">
      <h2 class="p-works-detail-other__header">関連記事</h2>
      <div class="p-works-detail-other__wrapper">
        <ul class="p-works-detail-other__list">
        <?php
        // 同じカテゴリ記事を4件呼び出す
        // ページID取得
        $post_data = get_post();
        $ID        = $post_data->ID;
        $query = new WP_Query(
        array(
            'post_status' => 'publish',
            'post_type'      => 'works',
            'category_name'  => $cat->slug,
            'post__not_in'   => array( $ID ),
            'posts_per_page' => 4,
          )
        );
        if( $query->have_posts() ):
          while( $query->have_posts() ): $query->the_post();
        ?>
          <li class="p-works-detail-other__item">
            <a href="<?php the_permalink(); ?>" class="p-works-detail-other__link">
              <div class="p-works-detail-other__img">
                <?php echo get_card_image("works"); ?>
              </div>
            <div class="p-works-detail-other__title"><?php the_title(); ?></div>
            </a>
            <a class="p-works-detail-other__category" href="<?php the_permalink(); ?>">
              <span><?php echo esc_html( $terms[0]->name ); ?></span>
            </a>
          </li>
          <?php
            endwhile;
          endif;
          wp_reset_postdata();
          ?>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- お問い合わせセクション表示 -->
<?php get_template_part('content-contact'); ?>

<?php get_footer(); ?>