$(function(){
    $('input[type="submit"].c-search--button').on("click", function(){//検索ボタンクリック時に
        var search_catch = $('input[type="text"].c-search').val();//検索フォームの文字を格納
        sessionStorage.setItem('key', search_catch);
    });
});

$(function(){
    var keep_search = sessionStorage.getItem('key');//格納した文字を呼び出し
    $(".c-search").val(keep_search);
});

$(function(){
    //フォーカス時にアイコンを消す
    $(".c-search").focus(function(){
        $(".c-icon").addClass("c-icon--focus");
    });
    //フォーカスが外れた時、空ならばアイコンを表示
    $(".c-search").blur(function(){
        if($(this).val() == ""){
            $(".c-icon").removeClass("c-icon--focus");
        }
    });
});

$(function(){
    if($('input[type="text"].c-search').val().length !== 0){
        $(".c-icon").addClass("c-icon--focus");
    }
});

$(function(){
const ham = $(".js-hamburger");
var durationSideMenu = 300;

ham.on('click', function(){
    $(".l-sidebar__hamburger").toggleClass("l-sidebar__hamburger-active");
    $(".l-header__hamburger").toggleClass("l-header__hamburger-active");
    $(".l-main-hide-contents").toggleClass("l-main-hide-contents-active");
    $(".l-header").toggleClass("l-header-active");
    $(".p-content").toggleClass("p-content-active");
    $(".c-button--secondary").toggleClass("c-button--secondary-active");
    $(".l-footer__inner").toggleClass("l-footer__inner-active");
    });
});

$(function(){
    const ham = $(".js-hamburger");
    var durationSideMenu = 200;
    
    ham.on('click', function(){
        });
    });