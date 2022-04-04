<?php get_header(); ?>

<section class="l-inner">
  <div class="l-thanks">
    <div class="p-thanks">
      <h1 class="p-thanks__head"><?php the_title(); ?></h1>
      <p class="p-thanks__text"><span>3営業日以内に</span><span>返信させて頂きます。</span></p>
      <div class="p-thanks__btn">
        <a href="<?php echo esc_url(home_url('/')) ?>" class="c-btn--black">TOPへ</a>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>