jQuery(function($) { // この中であればWordpressでも「$」が使用可能になる

    var topBtn = $('.js-to-top');
    topBtn.hide();

    // ボタンの表示設定
    $(window).scroll(function() {
        if ($(this).scrollTop() > 70) {
            // 指定px以上のスクロールでボタンを表示
            topBtn.fadeIn();
        } else {
            // 画面が指定pxより上ならボタンを非表示
            topBtn.fadeOut();
        }
    });

    // ボタンをクリックしたらスクロールして上に戻る
    topBtn.click(function() {
        $('body,html').animate({
            scrollTop: 0
        }, 300, 'swing');
        return false;
    });

    // ヘッダー
    $(window).on('scroll', function() {
        if (($('.p-mv').height() || $('.c-subHero').height()) < $(this).scrollTop()) {
            $('.p-header').css('background', 'rgba(17,17,17,1)');
        } else {
            $('.p-header').css('background', 'rgba(17,17,17,0.5)');
        }
    });

    //ドロワーメニュー
    $('.navbar_toggle').on('click', function() {
        $(this).toggleClass('open');
        $('.menu').toggleClass('open');
    });

    // スムーススクロール (絶対パスのリンク先が現在のページであった場合でも作動)
    $(document).on('click', 'a[href*="#"]', function() {
        let time = 300;
        let header = $('header').innerHeight();
        let target = $(this.hash);
        if (!target.length) return;
        let targetY = target.offset().top - header;
        setTimeout(function() {
            $('html,body').animate({ scrollTop: targetY }, time);
        }, 0);
        return false;
    });

    //ナビバートグル
    $('.js-hamburger').on('click', function() {
        if ($('.js-hamburger').hasClass('is-open')) {
            $('.js-drawer-nav').fadeOut();
            $(this).removeClass('is-open');
            $(".p-header__inner").removeClass('is-open');
            $("html").removeClass("is-fixed");
        } else {
            $('.js-drawer-nav').fadeIn();
            $(this).addClass('is-open');
            $(".p-header__inner").addClass('is-open');
            $("html").addClass("is-fixed");
        }
    });
    //ページ内リンクをクリックで閉じる
    $('.js-drawer-nav a[href]').on('click', function(event) {
        $('.js-hamburger').removeClass('is-open');
        $('.js-drawer-nav').fadeOut();
        $("html").removeClass("is-fixed");
    });
    //resizeイベント
    $(window).resize(function() {
        if (window.matchMedia('(min-width: 768px)').matches) {
            $('.js-hamburger').removeClass('is-open');
            $('.js-drawer-nav').fadeOut();
            $("html").removeClass("is-fixed");
        }
    });
});