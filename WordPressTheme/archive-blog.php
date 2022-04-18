<?php get_header(); ?>

<!-- カテゴリリスト表示 -->
<div class="l-category-list">
  <div class="c-category-list">
    <ul class="c-category-list__items l-inner">

      <li class="c-category-list__item">
        <a class="c-category-list__link current" href="<?php echo esc_url(home_url('blog')); ?>">
          <span>ALL</span>
        </a>
      </li>
      <?php
      $terms = get_terms('custom_category');
      if ($terms) {
        foreach ($terms as $term) :
          include 'content-category.php';
        endforeach;
      }
      ?>
    </ul>
  </div>
</div>

<div class="l-sub-blog">
  <div class="p-sub-blog">
    <div class="p-sub-blog__inner l-inner">
      <div class="p-sub-blog__body">
        <?php
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $args = array(
          'post_type' => 'blog',
          'post_status' => 'publish',
          'posts_per_page' => 9,
          'paged' => $paged,
        );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) :
          while ($the_query->have_posts()) : $the_query->the_post();
            include 'content-archive-blog.php';
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