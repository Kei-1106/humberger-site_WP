<nav class="l-sidebar c-background-color__orange-verylight l-sidebar__hamburger l-sidebar__hamburger-close">
                <div class="l-header__hamburger--pc">Menu</div>
                <?php wp_nav_menu(array(
                    'theme_location' => 'sidebar',
                    'container' => 'nav',
                    'menu_class' => 'l-sidebar__inner c-list',
                    'add_li_class' => 'l-sidebar__title u-font--bold',
                    'add_a_class' => '',
                ));?>
                <?php if( have_post())://投稿データがあるかないかの条件分岐
                    while( have_post())://表示する投稿データがあれば繰り返し処理開始
                        the_post();//ループ処理に必要なカウント処理等
                        
                    endwhile;//繰り返し処理ここまで。投稿データがあればwhileに戻る。なければ終了
                    else:?><!--投稿データがなければ-->
                <p>表示する記事はありません</p>
                <?php endif; ?><!---条件分岐終了-->
                <ul class="l-sidebar__inner c-list">
                    <li class="l-sidebar__title u-font--bold">
                        <a href="archive.html">バーガー</a>
                    </li>
                    <ul class="l-sidebar__list c-list__item">
                        <li><a href="#">ハンバーガー</a></li>
                        <li class="l-sidebar__item"><a href="single.html">チーズバーガー</a></li>
                        <li class="l-sidebar__item"><a href="single.html">テリヤキバーガー</a></li>
                        <li class="l-sidebar__item"><a href="single.html">アボガドバーガー</a></li>
                        <li class="l-sidebar__item"><a href="single.html">フィッシュバーガー</a></li>
                        <li class="l-sidebar__item"><a href="single.html">ベーコンバーガー</a></li>
                        <li class="l-sidebar__item"><a href="single.html">チキンバーガー</a></li>
                    </ul>
                    <li class="l-sidebar__title u-font--bold">
                        <a href="archive.html">サイド</a>
                    </li>
                    <ul class="l-sidebar__list c-list__item">
                        <li ><a href="">ポテト</a></li>
                        <li class="l-sidebar__item"><a href="single.html">サラダ</a></li>
                        <li class="l-sidebar__item"><a href="single.html">ナゲット</a></li>
                        <li class="l-sidebar__item"><a href="single.html">コーン</a></li>
                    </ul>
                    <li class="l-sidebar__title u-font--bold">
                        <a href="archive.html">ドリンク</a>
                    </li>
                    <ul class="l-sidebar__list c-list__item">
                        <li><a href="#">コーラ</a></li>
                        <li class="l-sidebar__item"><a href="single.html">ファンタ</a></li>
                        <li class="l-sidebar__item"><a href="single.html">オレンジ</a></li>
                        <li class="l-sidebar__item"><a href="single.html">アップル</a></li>
                        <li class="l-sidebar__item"><a href="single.html">紅茶(Ice/Hot)</a></li>
                        <li class="l-sidebar__item"><a href="single.html">コーヒー(Ice/Hot)</a></li>
                    </ul>
                </ul>
            </nav>
        <div class="l-main-hide-contents"></div>
    </div>
</body>
</html>