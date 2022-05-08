<!-- ブログカード出力 -->
<?php
$terms = get_the_terms($post->ID, 'custom_category'); //ターム一覧抽出
?>

<div class="p-sub-blog__card">
  <a href="<?php the_permalink(); ?>" class="p-blog-card">
    <figure class="p-blog-card__img">
      <?php echo get_card_image("blog"); ?>
    </figure>
    <div class="p-blog-card__body">
      <p class="p-blog-card__title"><?php the_title(); ?></p>
      <p class="p-blog-card__text"><?php echo get_the_excerpt(); ?></p>
      <div class="p-blog-card__info">
        <p class="p-blog-card__category"><?php echo esc_html($terms[0]->name); ?></p>
        <time class="p-blog-card__date" datetime="<?php the_time('Y-m-d') ?>"><?php the_time('Y.m.d') ?></time>
      </div>
    </div>
  </a>
</div>