<?php
    //テーマサポート
    add_theme_support( 'menus' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );//アイキャッチ画像を扱えるように記述
    
    //タイトル出力
    function hamburger_site_title( $title ){
        if( is_front_page()/*投稿・固定ページに関わらず、サイトのフロントページが表示されているかを判定する*/ && is_home()/*メインブログページが表示されているかを判定する*/ ){//トップページなら
            $title = get_bloginfo( 'name', 'display' );
        } elseif ( is_singular()/*固定投稿のページかを判定する*/ ){//シングルページなら
            $title = single_post_title('', false );
        }
        return $title;
    }
    add_filter('pre_get_document_title', 'hamburger_site_title');


    function hamburger_site_script(){
        wp_enqueue_style('M+1p','//fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;700&display=swap',array());
        wp_enqueue_style('Roboto','//fonts.googleapis.com/css2?family=Roboto:ital,wght@0,700;1,100&display=swap',array());
        wp_enqueue_style('Noto+Sans+JP','//fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700;900&display=swap',array());
        wp_enqueue_style('font-awesome','//use.fontawesome.com/releases/v6.1.2/css/all.css',array(),'6.1.2');
        wp_enqueue_style('font-awesome','//use.fontawesome.com/releases/v5.6.1/css/all.css',array(),'5.6.1');
        wp_enqueue_style('normalize',get_template_directory_uri().'/css/normalize.css',array(),'8.0.1');
        wp_enqueue_style('hamburger_site',get_template_directory_uri().'/css/hamburger-site.css',array(),'1.0.0');
        wp_enqueue_style('style',get_template_directory_uri().'/style.css',array(),'1.0.0');
    }
    add_action('wp_enqueue_scripts','hamburger_site_script');

    //wp_nav_menuのliにclassを追加
    function add_additional_class_on_li($classes, $item, $args){
        if(isset($args -> add_li_class)){
            $classes['class'] = $args -> add_li_class;
        }
        return $classes;
    }
    add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

    //wp_nav_menuのaにclassを追加
    function add_additional_class_on_a($classes, $item, $args){
        if(isset($args -> add_li_class)){
            $classes['class'] = $args -> add_a_class;
        }
        return $classes;
    }
    add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);

    //メニューに項目を追加
    add_action('after_setup_theme', function(){
        register_nav_menus(array(
            'footer' => 'フッターナビゲーション',
            'sidebar' => 'サイドバーナビゲーション',
            'contents' => 'コンテンツ',
        ));
    });

    //wp_nav_menuの値を追加
    //function my_wp_nav_menu_footer_args(){
        //$args['menu'] = 'footer';
        //$args['menu_class'] = 'l-footer__inner u-display__flex u-position';
        //$args['add_li_class'] = '';
        //$args['add_a_class'] = 'c-text--bottom';
        //return $args;
    //}
    //add_filter('wp_nav_menu_args', 'my_wp_nav_menu_footer_args');

    function hamburger_widgets_init(){
        register_sidebar(
            array(
                'name' => 'カテゴリーのウィジェット',
                'id' => 'category_widget',
                'description' => 'カテゴリー用のウィジェットです',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_titie' => '<h2><li class="l-sidebar__title u-font--bold"></li>',
                'after_title' => "</h2>\n",
            )
            );
    }
    add_action('widgets_init' , 'hamburger_widgets_init');

    function hamburger_site_theme_add_editor_styles(){
        add_editor_style(get_template_directory_url()."/css/editor-style.css");
    }
    add_action('admin_init', 'hamburger_site_theme_add_editor_styles');

    $count_sql = 'SELECT COUNT(*) as cnt FROM テーブル名';

    if(isset($_GET['page']) && is_numeric($_GET['page'])){
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

?>