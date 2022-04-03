<?php get_header(); ?>

<div class="l-overview">
  <div class="p-overview">
    <div class="p-overview__inner l-inner">
      <dl>
        <!-- 繰り返しフィールド読み込み -->
        <?php
        $overviewgroup = SCF::get('overview__group');
        foreach ($overviewgroup as $fields) {
        ?>

          <div class="p-overview__list">
            <dt class="p-overview__title"><?php echo esc_html($fields['overview__title']); ?></dt>
            <dd class="p-overview__text"><?php echo esc_html($fields['overview__text']); ?></dd>
          </div>

        <?php } ?>
      </dl>
    </div>
  </div>
</div>

<div class="l-google-map">
  <div class="c-google-map__inner">
    <div class="c-google-map__wrapper">
      <?php esc_html(the_field('overview__map')); ?>
    </div>
  </div>
</div>


<!-- お問い合わせセクション表示 -->
<?php get_template_part('content-contact'); ?>

<?php get_footer(); ?>