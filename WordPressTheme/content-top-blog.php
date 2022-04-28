<!-- ブログカード出力 -->
<?php
$terms = get_the_terms($post->ID, 'custom_category'); //ターム一覧抽出
?>

<div class="p-top-blog__card">
  <a href="<?php the_permalink(); ?>" class="p-blog-card">

 <!-- 更新日から７日以内かつ、最新2件のみNEWマークを表示 -->
 <?php
    $days = 7; //日付設定
    $limit = 2; //表示数
    $current_posts = $the_query->current_post; //現在の表示件数（何件目か）
    if (newMark_condition_numTime($days, $limit, $current_posts) && $paged == 1):
    ?>
    <div class="p-blog-card__label">New</div>
    <?php
    endif;
    ?>

    <figure class="p-blog-card__img">
      <?php echo get_card_image("blog"); ?>
    </figure>
    <div class="p-blog-card__body">
      <p class="p-blog-card__title"><?php the_title(); ?></p>
      <p class="p-blog-card__text"><?php echo get_the_excerpt(); ?></p>
      <div class="p-blog-card__info">
      <?php if ($terms) : ?>
        <?php if ($terms[1]) : ?>
          <p class="p-blog-card__category"><span>複数カテゴリ</span></p>
        <?php else : ?>
          <p class="p-blog-card__category"><span><?php echo esc_html($terms[0]->name); ?></span></p>
        <?php endif; ?>
      <?php else : ?>
        <p class="p-blog-card__category"><span>未分類</span></p>
      <?php endif; ?>
        <time class="p-blog-card__date" datetime="<?php the_time('Y-m-d') ?>">"<?php the_time('Y.m.d') ?></time>
      </div>
    </div>
  </a>
</div>