<?php get_header(); ?>
            <main>
                <div class = "p-archive p-archive__mainvisual c-background-color__black">
                    <div class = "p-archive__inner c-background-color__black"></div>
                    <div class = "p-archive__title--left c-title--site-sub u-font--bold u-font--roboto">Menu:</div>
                    <div class = "p-archive__title--right c-title--site-bottom"><?php single_cat_title(); ?></div>
                </div>
                <div class = "l-wrapper">
                    <?php if( is_category() && category_description()): ?>
                        <section class = "p-article__heading">
                            <?php echo category_description(); ?>
                        </section>
                    <?php else: ?>
                    <?php if( is_tag() && tag_description()): ?>
                        <section class = "p-article__heading">
                            <?php echo tag_description(); ?>
                        </section>
                    <?php else: ?>
                        <section class = "p-article__heading">
                            <h2 class = "p-article__heading--top c-title--small">小見出しが入ります</h2>
                            <p class = "c-text--item">
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
                    <?php endif; ?>
                    <?php endif; ?>
                    <section class = "p-content p-group u-gap--sub u-padding--left u-display__column">
                    <?php if( have_posts())://投稿データがあるかないかの条件分岐
                        while( have_posts())://表示する投稿データがあれば繰り返し処理開始
                        the_post(); ?><!--ループ処理に必要なカウント処理等-->
                        <div id = "post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <a href = "<?php the_permalink(); ?>">
                                <figure class = "u-display__flex c-background-color__brown u-display__column">
                                        <?php if(has_post_thumbnail()): ?>
                                            <?php the_post_thumbnail('full',['class' => 'c-img__item']); ?>
                                        <?php else: ?>
                                            <img src="<?php echo esc_url( get_template_directory_uri()); ?>/img/noimage.png" alt = "Noimage" class = "c-img__item"/>
                                        <?php endif; ?>
                                    <figcaption class = "p-content__inner">
                                        <h3 class = "p-content__inner--top c-text--top"><?php echo get_the_title(); ?></h3>
                                        <span class = "p-content__inner--small c-text--medium"><?php echo  mb_strimwidth(str_replace( ' ', '</span><p>', get_the_excerpt()), 0, 200, '...', 'UTF-8' ); ?></p>
                                        <div class = "p-content__inner--bottom">
                                            <button class = "c-text--small-gray c-button">詳しく見る</button>
                                        </div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                    <?php endwhile; ?><!--繰り返し処理ここまで。投稿データがあればwhileに戻る。なければ終了-->
                        <section class = "p-pagination">
                                <?php if( function_exists('pagination') ){ // 関数が定義されていたらtrueになる
                                pagination();
                                } ?>
                        </section>    
                    <?php else: ?><!--投稿データがなければ-->
                        <h2>表示する記事はありません</h2>
                    <?php endif; ?><!---条件分岐終了-->
                    </section>
                </div>
                <?php get_footer(); ?>
            </main>
        </div>
        <?php get_sidebar(); ?>
