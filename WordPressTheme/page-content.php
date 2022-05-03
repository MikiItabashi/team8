<?php get_header(); ?>

<div class="l-sub-content">
  <div class="p-sub-content">
    <div class="p-sub-content__inner l-inner">
      <div class="p-sub-content__head">
        <p class="p-sub-content__title"><?php esc_html(the_field('content__top-title')); ?></p>
        <p class="p-sub-content__text"><?php esc_html(the_field('content__top-text')); ?></p>
      </div>
      <ul class="p-sub-content__items p-sub-content-list">

        <!-- 繰り返しフィールド読み込み -->
        <?php
        $contentgroup = SCF::get('content__group');
        foreach ($contentgroup as $fields) {
          $imgurl = wp_get_attachment_image_src($fields['content__image'], 'full');
        ?>

          <li class="p-sub-content-list__item p-sub-content-item" id="<?php echo esc_html($fields['content__title']); ?>">
            <div class="p-sub-content-item__img">
              <img src="<?php echo esc_url($imgurl[0]); ?>" alt="<?php echo esc_html($fields['content__title']); ?>">
            </div>
            <div class="p-sub-content-item__desc">
              <p class="p-sub-content-item__title"><?php echo esc_html($fields['content__title']); ?></p>
              <p class="p-sub-content-item__text"><?php echo esc_html($fields['content__text']); ?></p>
            </div>
          </li>
        <?php } ?>

      </ul>
    </div>
  </div>
</div>

<!-- お問い合わせセクション表示 -->
<?php get_template_part('content-contact'); ?>

<?php get_footer(); ?>