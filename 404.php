<?php get_header(); ?>
            <main>
                <div class = "p-archive p-archive__mainvisual c-background-color__black">
                    <div class = "p-archive__inner c-background-color__black"></div>
                    <div class = "p-archive__title--left c-title--site-sub u-font--bold u-font--roboto">Menu:</div>
                    <div class = "p-archive__title--right c-title--site-bottom"><?php single_cat_title(); ?></div>
                </div>
                <div class = "l-wrapper">
                    <div class = "p-page404">
                        <h1 class = "c-page404__title">404 NOT FOUND</h1>
                        <h2 class = "c-page404__sub">お探しのページは見つかりませんでした</h2>
                        <p class = "c-page404__text">お探しのページは見つかりませんでした。<br>ご指定いただいたURLはすでに削除されたか、間違っている可能性があります。</p>
                        <div class = "c-page404__button"><a href="<?php echo esc_url(home_url( '/' )); ?>">TOPへ戻る</a></div>
                    </div>
                </div>
                <?php get_footer(); ?>
            </main>
        </div>
        <?php get_sidebar(); ?>
