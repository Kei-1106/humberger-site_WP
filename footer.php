        <footer class="l-footer">
    <?php if(has_nav_menu('footer')){
        wp_nav_menu(
            array(
                'theme_location' => 'footer',
                'menu_class' => 'l-footer__inner u-display__flex u-position c-text--bottom',
                'item_wrap' => '<ul class="%2$s">%3$s</ul>',
                )
            );
        } ?>
                    <p class="c-text u-align">Copyright:&nbsp;RaiseTech</p>
                </footer>
