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
        wp_enqueue_script('jquery','http://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js', array(), '3.6.1');
        wp_enqueue_script('js',get_template_directory_uri().'/js/main.js',array(),'3.6.1');
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
            'eat_in' => 'Eat_In',
            'take_out' => 'Take_Out',
        ));
    });

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

    function hamburger_site_theme_add_editor_styles(){//投稿記事ページにcssを表示
        add_editor_style(get_template_directory_uri() . "/css/editor-style.css");
    }
    add_action('admin_init', 'hamburger_site_theme_add_editor_styles');

    function remcat_function($link){//URLから/tag/を消す処理の実行
        return str_replace( "/tag/" , "/", $link);
    }
    add_filter('user_trailingslashit' , 'remcat_function');

    function remcat_flush_rules(){//WordPressのルーティング（パーマリンク）ルールをリセットするために使用
        global $wp_rewrite;
        $wp_rewrite->flush_rules();//←を呼び出す事で新しいルールを適用
    }
    add_action('init' , 'remcat_flush_rules');

    //ページネーションの変更
    function pagination($pages = '', $range = 8){//現在のページ数、総ページ数
        $showitems = ($range * 1) +1;
        global $paged;
        if(empty($paged)) $paged = 1;
        if($pages == ''){
            global $wp_query;
            $pages = $wp_query -> max_num_pages;
            if(!$pages){
                $pages = 1;
            }
        }
        if(1 != $pages){
            //画像を使う時用に、テーマのパスを取得
            $img_pass = get_template_directory_uri();
            echo "<div class = \"p-pagination__inner u-display__flex c-text--small-gray p-contents\">";
            //「1/2」の表示　現在のページ数/総ページ数
            echo "<div class = \"p-pagination__inner--left c-text--number\">"."page&nbsp;" . $paged."/". $pages. "</div>";
            //「前へ」を表示
            if($paged > 1){ echo "<div><a href='".get_pagenum_link($paged - 1)."' class = \"p-pagination__inner--sm\"><img src=\"".$img_pass."/img/icon/pagination_prev.png\" alt=\"前へのアイコン\"></img><span class=\"p-pagination__inner--text u-font--normal u-text__left u-font--bold\">前へ</span></a></div>";
            }else {
                    echo "<div></div>";
                }
            //ページ番号を出力
            echo "<ul class = \"p-pagination__inner--center c-text--number\">\n";
            for($i = 1; $i <= $pages; $i++){
                if(1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems)){
                    echo ($paged == $i)? "<li class=\"c-text--numbers-list-current\">".$i."</li>":
                        "<li class=\"c-text--numbers-list\"><a href='".get_pagenum_link($i)."'> ".$i."</a></li>"; 
                }
            }
            echo "</ul>\n";
            //「次へ」を表示
            if($paged < $pages) echo "<div><a href='".get_pagenum_link($paged + 1)."' class=\"p-pagination__inner--sm\"><span class=\"p-pagination__inner--text u-font--normal u-text__right u-font--bold\">次へ</span><img src=\"".$img_pass."/img/icon/pagination_next.png\" alt=\"次へのアイコン\"></img></a></div>";
            echo "</div>\n";
        }
    }

    remove_filter('pre_term_description', 'wp_filter_kses');//カテゴリーやタグの説明文をHTMLに変換

?>