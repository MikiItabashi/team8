<?php get_header(); ?>

<!-- カテゴリリスト表示 -->
<div class="l-category-list">
  <div class="c-category-list">
    <ul class="c-category-list__items l-inner">

      <li class="c-category-list__item">
        <a class="c-category-list__link current" href="<?php echo esc_url( home_url('works') ); ?>">
          <span>ALL</span>
        </a>
      </li>
      <?php
      $terms = get_terms( 'custom_category_works' );
      if ( $terms ) {
        foreach ( $terms as $term ) :
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
            $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
            $args = array(
            'post_type' => 'works',
            'post_status' => 'publish',
            'posts_per_page' => 9,
            'paged' => $paged,
            );
            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post();
                include 'content-archive-works.php';
            endwhile;
            endif;
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="l-pagination">
    <div class="c-pagination">
      <div class="c-pagination__inner l-inner">
        <ul class="c-pagination__list">
          <li class="c-pagination__item c-pagination__item--prev-next">PREV</li>
          <li class="">
            <ul class="c-pagination__numberlist">
              <li class="c-pagination__item c-pagination__item--number current">1</li>
              <li class="c-pagination__item c-pagination__item--number">2</li>
              <li class="c-pagination__item c-pagination__item--number">3</li>
              <li class="c-pagination__item c-pagination__item--number">4</li>
            </ul>
          </li>
          <li class="c-pagination__item c-pagination__item--prev-next">NEXT</li>
        </ul>
      </div>
    </div>
  </div>

<!-- お問い合わせセクション表示 -->
<?php get_template_part( 'content-contact' ); ?>

<?php get_footer(); ?>