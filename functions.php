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
    add_action('wp_enqueue_scripts','hamburger_site_script')
    ?>