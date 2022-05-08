<?php get_header(); ?>
<section class="l-blog-detail">
  <div class="p-blog-detail">
    <div class="p-blog-detail__inner l-inner">
      <div class="p-blog-detail__body">
        <h1 class="p-blog-detail__title"><?php the_title(); ?></h1>
        <div class="p-blog-detail__head">
          <time class="p-blog-detail__date" datetime="<?php the_time('c'); ?>"><?php the_time('Y/n/j'); ?></time>
          <?php
          if ($terms = get_the_terms($post->ID, 'custom_category')) {
            if ($terms[0]) {
              echo '<div class="p-blog-detail__category">' . $terms[0]->name . '</div>';
            }
          }
          ?>
        </div>

        <?php
        if (have_posts()) :
          while (have_posts()) : the_post();
            the_content();
          endwhile;
        endif;
        ?>

      </div>
      <div class="p-blog-detail__link">
        <p class="p-blog-detail__prev"><a href="#">prev</a></p>
        <p class="p-blog-detail__list"><a href="<?php echo esc_url(home_url('blog')) ?>">一覧</a></p>
        <p class="p-blog-detail__next"><a href="#">next</a></p>
      </div>

      <?php
      $related_posts_args = array(
        'post_type'      => 'blog',
        'post_status'    => 'publish',
        'posts_per_page' => 4,
        'orderby'        => 'rand', // 表示中の投稿を除外
        'post__not_in'   => array($post->ID), // 表示中の投稿を除外
        'tax_query'      => array(
          array(
            'taxonomy' => 'custom_category', //カスタムタクソノミー
            'fields'   => 'term_id', //該当の分類
            'terms'    => wp_get_object_terms($post->ID, 'custom_category', array('fields' => 'ids')),
          ),
        ),
      );

      $related_posts_query = new WP_Query($related_posts_args);
      if ($related_posts_query->have_posts()) :
      ?>

        <div class="p-blog-detail__related p-blog-related">
          <p class="p-blog-related__title">関連記事</p>
          <div class="p-blog-related__body">
            <?php
            while ($related_posts_query->have_posts()) :
              $related_posts_query->the_post();
            ?>

              <?php
              ?>
              <div class="p-blog-related__card">
                <a href="" class="p-blog-card">
                  <?php
                  $days = 7; //日付設定
                  $limit = 2; //表示数
                  $current_posts = $the_query->current_post; //現在の表示件数（何件目か）
                  if (newMark_condition_numTime($days, $limit, $current_posts) && $paged == 1) :
                  ?>
                    <div class="p-blog-card__label">New</div>
                  <?php
                  endif;
                  ?>
                  <div class="p-blog-card__img">
                    <?php the_post_thumbnail('large'); ?>
                  </div>
                  <div class="p-blog-card__body">
                    <p class="p-blog-card__title"><?php the_title(); ?></p>
                    <p class="p-blog-card__text"><?php the_excerpt(); ?></p>
                    <div class="p-blog-card__info">

                      <?php
                      if ($terms = get_the_terms($post->ID, 'custom_category')) {
                        if ($terms[0]) {
                          echo '<p class="p-blog-card__category">' . $terms[0]->name . '</p>';
                        }
                      }
                      ?>
                      <time class="p-blog-card__date" datetime="<?php the_time('c'); ?>"><?php the_time('Y/n/j'); ?></time>
                    </div>
                  </div>
                </a>
              </div>

            <?php
            endwhile;
            wp_reset_postdata();
            ?>
          </div>
        </div>
      <?php
      endif;
      ?>
    </div>
  </div>
</section>

<!-- お問い合わせセクション表示 -->
<?php get_template_part('content-contact'); ?>

<?php get_footer(); ?>