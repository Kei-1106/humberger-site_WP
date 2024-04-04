<?php get_header(); ?>
            <main>
                <div class="p-archive p-archive__mainvisual c-background-color__black">
                    <div class="p-archive__inner c-background-color__black"></div>
                    <div class="p-archive__title--left c-title--site-sub u-font--bold u-font--roboto">Menu:</div>
                    <div class="p-archive__title--right c-title--site-bottom">チーズバーガー</div>
                </div>
                <div class="l-wrapper">
                    <section class="p-article__heading">
                        <h2 class="p-article__heading--top c-title--small">小見出しが入ります</h2>
                        <p class="c-text--item">
                            テキストが入ります。テキストが入ります。
                            テキストが入ります。テキストが入ります。
                            テキストが入ります。テキストが入ります。
                            テキストが入ります。テキストが入ります。
                            テキストが入ります。テキストが入ります。
                            テキストが入ります。テキストが入ります。
                            テキストが入ります。テキストが入ります。
                            テキストが入ります。テキストが入ります。
                            テキストが入ります。テキストが入ります。
                            テキストが入ります。テキストが入ります。
                            テキストが入ります。テキストが入ります。
                            テキストが入ります。テキストが入ります。
                        </p>
                    </section>
                    <section class="p-content p-group u-gap--sub u-padding--left u-display__column">
                    <?php if( have_posts())://投稿データがあるかないかの条件分岐
                        while( have_posts())://表示する投稿データがあれば繰り返し処理開始
                            the_post();?><!--ループ処理に必要なカウント処理等-->
                            <div id = "post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <a href="<?php the_permalink(); ?>">
                                    <figure class=" u-display__flex c-background-color__brown u-display__column">
                                            <img src=<?php the_post_thumbnail('full',['class' => 'c-img__item']); ?></img>
                                        <figcaption class="p-content__inner">
                                            <h3 class="p-content__inner--top c-text--top"><?php echo get_the_title(); ?></h3>
                                            <span class="p-content__inner--small c-text--medium u-text__bold">小見出しが入ります</span>
                                            <p class="p-content__inner--medium c-text--small">
                                            テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
                                            テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
                                            テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
                                            テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
                                            </p>
                                            <div class="p-content__inner--bottom">
                                                <div class="c-text--small-gray c-button">詳しく見る</div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>
                        <?php endwhile;//繰り返し処理ここまで。投稿データがあればwhileに戻る。なければ終了
                        else: ?><!--投稿データがなければ-->
                    <p>表示する記事はありません</p>
                    <?php endif; ?><!---条件分岐終了-->
                </section>
                    <section class="p-pagination">
                    <?php if($wp_query -> max_num_page >1)://ページが超える場合に処理 ?>
                        <div class="p-pagination__inner u-display__flex c-text--small-gray p-content">
                            <div>
                                <span class="p-pagination__inner--left c-text--number">page 1/10</span>
                                <a href="">
                                    <img src="img/pagination_previous.png" alt="previous"><span class="p-pagination__inner--text u-font--normal"> 前へ</span>
                                </a>
                            </div>
                            <div class="p-pagination__inner--center c-text--number">
                                <span class="c-text--number-list c-text--number-current">1</span>
                                <a class="c-text--number-list" href="">2</a>
                                <a class="c-text--number-list" href="">3</a>
                                <a class="c-text--number-list" href="">4</a>
                                <a class="c-text--number-list" href="">5</a>
                                <a class="c-text--number-list" href="">6</a>
                                <a class="c-text--number-list" href="">7</a>
                                <a class="c-text--number-list" href="">8</a>
                                <a class="c-text--number-list" href="">9</a>
                            </div>
                            <a href=""><span class="p-pagination__inner--text u-font--normal">次へ </span><img src="img/pagination_next.png" alt="next"></img></a>
                        </div>
                        <?php endif; ?>
                    </section>    
                </div>
                <?php get_footer(); ?>
            </main>
        </div>
        <?php get_sidebar(); ?>
