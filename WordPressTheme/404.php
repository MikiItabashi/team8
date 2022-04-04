<?php get_header(); ?>

<section class="l-inner">
    <div class="l-404">
        <div class="p-404">
            <h1 class="p-404__head">404 Not Found</h1>
            <p class="p-404__text"><span>お探しのページは</span><span>見つかりませんでした。</span></p>
            <div class="p-404__btn">
                <a href="<?php echo esc_url(home_url('/')) ?>" class="c-btn--black">TOPへ</a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>