<form  role = "search" class = "l-header__search p-search-box u-display__flex--right" method = "get" action = "<?php echo esc_url(home_url( '/' )); ?>">
    <div class = "p-search-box__inner">
        <div class = "p-search-box__inner--icon c-icon"></div>
        <label for="s"><?php echo __( '', 'hamburger-site_wp' ); ?></label>
        <input type = "text" class="p-search-box__inner--text c-search" value = "<?php echo get_search_query(); ?>" name = "s" title = "検索したいキーワードを入力してください" placeholder = "" id = "s"/>
    </div>
    <input type = "submit" name = "submit" value = "検索" class = "c-search--button c-background-color__orange-verylight"/>
</form>