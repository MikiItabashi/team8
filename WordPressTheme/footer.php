<footer class="p-footer">
    <div class="p-footer__inner">
        <div class="p-footer__container">
            <div class="p-footer__logo">
                <a href="<?php echo esc_url(home_url('/')) ?>">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/logo.svg" alt="ロゴ">
                </a>
            </div>
            <nav class="p-footer__nav p-footer-nav">
                <div class="u-hidden-pc">
                    <ul class="p-footer-nav__items">
                        <li class="p-footer-nav__item"><a href="<?php echo esc_url(home_url('/')) ?>"><span class="p-footer-nav__text">トップ</span></a></li>
                        <li class="p-footer-nav__item"><a href="<?php echo esc_url(home_url('news')) ?>"><span class="p-footer-nav__text">お知らせ</span></a></li>
                        <li class="p-footer-nav__item"><a href="<?php echo esc_url(home_url('content')) ?>"><span class="p-footer-nav__text">事業内容</span></a></li>
                        <li class="p-footer-nav__item"><a href="<?php echo esc_url(home_url('overview')) ?>"><span class="p-footer-nav__text">企業概要</span></a></li>
                        <li class="p-footer-nav__item"><a href="<?php echo esc_url(home_url('blog')) ?>"><span class="p-footer-nav__text">ブログ</span></a></li>
                        <li class="p-footer-nav__item"><a href="<?php echo esc_url(home_url('contact')) ?>"><span class="p-footer-nav__text">お問い合わせ</span></a></li>
                    </ul>
                </div>
                <div class="u-hidden-sp">
                    <ul class="p-footer-nav__items">
                        <li class="p-footer-nav__item"><a href="<?php echo esc_url(home_url('content')) ?>"><span class="p-footer-nav__text">事業内容</span></a></li>
                        <li class="p-footer-nav__item"><a href="<?php echo esc_url(home_url('works')) ?>"><span class="p-footer-nav__text">制作実績</span></a></li>
                        <li class="p-footer-nav__item"><a href="<?php echo esc_url(home_url('overview')) ?>"><span class="p-footer-nav__text">企業概要</span></a></li>
                        <li class="p-footer-nav__item"><a href="<?php echo esc_url(home_url('blog')) ?>"><span class="p-footer-nav__text">自社メディア</span></a></li>
                        <li class="p-footer-nav__item"><a href="<?php echo esc_url(home_url('contact')) ?>"><span class="p-footer-nav__text">お問い合わせ</span></a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <p class="p-footer__copyright"><small>&copy; 2021 CodeUps Inc.</small></p>
    </div>
    <a href="#" class="c-to-top js-to-top"></a>
</footer>
<?php wp_footer(); ?>
</body>

</html>