<!-- 制作実績カード出力 -->
<?php
$terms = get_the_terms( $post->ID, 'custom_category_works' ); // ターム一覧抽出
?>
<li class="p-works__item">
  <a href="<?php the_permalink(); ?>" class="p-works__link">
    <div class="p-works__img">
      <?php echo get_card_image( "works" ); ?>
    </div>
    <div class="p-works__title"><?php the_title(); ?></div>
  </a>
  <a class="p-works__category" href="<?php the_permalink(); ?>">
    <span><?php echo esc_html( $terms[0]->name ); ?></span>
  </a>
</li>