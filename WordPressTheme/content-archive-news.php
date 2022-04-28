<!-- ニュース記事 -->
<div class="p-news__wrapper">
  <div class="p-news__header">
    <time class="p-news__date" datetime="<?php the_time('Y.m.d'); ?>"><?php the_time('Y.m.d'); ?></time>
    <div class="p-news__category"><?php the_category(); ?></div>
  </div>
  <div class="p-news__titleblock">
    <div class="p-news__title">
      <h3> <?php the_title(); ?> </h3>
    </div>
  </div>
</div>