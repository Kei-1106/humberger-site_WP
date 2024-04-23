            <nav class = "l-sidebar c-background-color__orange-verylight l-sidebar__hamburger l-sidebar__hamburger-close">
                <div class = "l-header__hamburger--pc">Menu</div>
                <?php wp_nav_menu(array(
                    'theme_location' => 'sidebar',
                    'container' => 'nav',
                    'menu_class' => 'l-sidebar__inner c-list',
                    'add_li_class' => 'l-sidebar__title u-font--bold',
                    'add_a_class' => '',
                )); ?>
            </nav>
        <div class = "l-main-hide-contents"></div>
    </div>
</body>
</html>