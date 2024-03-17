<!DOCTYPE html>
<html lang="langulage_attributes();">
<head>
    <meta charset="UTF-8">
    <title>ハンバーガーサイト</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="description" content="ハンバーガーサイト">
    <meta name="viewport" content="width=device-width, initial-scale">
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="https://ajax.googleapis.com">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="scss/style.scss">
    <link href="https://use.fontawesome.com/releases/v6.1.2/css/all.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,700;1,100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700;900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body>
    <div class="u-display__flex u-position">
        <div class="u-display">
            <header class="l-header c-background-color__orange-light">
                    <h1 class="c-logo u-align">
                        <a href="#">Hamburger</a>
                    </h1>
                    <div class="u-display__flex--center"></div>
                <form action="archive-search.html" method="get" class="l-header__search p-search-box u-display__flex--right">
                    <div class="p-search-box__inner">
                        <div class="p-search-box__inner--icon c-icon"></div>
                        <input type="text" class="p-search-box__inner--text c-search" value="" name="search" title="検索" placeholder="">
                    </div>
                    <input type="submit" name="submit" value="検索" class="c-search--button c-background-color__orange-verylight">
                </form>
                <div class="l-header__hamburger c-button__hamburger js-hamburger">
                    <span></span>
                    <span>Menu</span>
                    <span></span>
                </div>
            </header>