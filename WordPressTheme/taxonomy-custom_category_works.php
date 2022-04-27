<?php get_header(); ?>
<!-- カテゴリリスト表示 -->
<div class="l-category-list">
  <div class="c-category-list">
    <ul class="c-category-list__items l-inner">

      <li class="c-category-list__item">
        <a class="c-category-list__link" href="<?php echo esc_url(home_url('works')); ?>">
          <span>ALL</span>
        </a>
      </li>
      <?php
      $terms = get_terms('custom_category_works');
      if ($terms) {
        foreach ($terms as $term) :
          include 'content-category.php';
        endforeach;
      }
      ?>
    </ul>
  </div>
</div>

<div class="l-works">
    <div class="p-works">
      <div class="p-works__inner l-inner">
        <div class="p-works__wrapper">
          <ul class="p-works__list">
            <?php
            $terms_obj = get_queried_object(); //現在のタクソノミー情報取得
            $terms_slug = $terms_obj->slug; //現在のタクソノミーslug取得
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $args = array(
              'post_type' => 'works',
              'post_status' => 'publish',
              'posts_per_page' => 9,
              'paged' => $paged,
              'tax_query' => array(
                array(
                  'taxonomy' => 'custom_category_works',
                  'field' => 'slug',
                  'terms' => $terms_slug,
                ),
              ),
            );
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) :
              while ($the_query->have_posts()) : $the_query->the_post();
                include 'content-archive-works.php';
              endwhile;
            endif;
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>

<!-- お問い合わせセクション表示 -->
<?php get_template_part('content-contact'); ?>

<?php get_footer(); ?>