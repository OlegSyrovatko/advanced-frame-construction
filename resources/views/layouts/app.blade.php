<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title")</title>
    <link rel="stylesheet" href="/css/main.css">

    <link
        rel="apple-touch-icon"
        sizes="144x144"
        href="./apple-touch-icon.png"
    />
    <link
        rel="icon"
        type="image/png"
        sizes="32x32"
        href="./favicon-32x32.png"
    />
    <link
        rel="icon"
        type="image/png"
        sizes="16x16"
        href="./favicon-16x16.png"
    />
    <link rel="manifest" href="./site.webmanifest" />

</head>
<body>
@include("inc.header")

@include("inc.messages")

<div style="margin-top: 70px; display: flex; gap: 10px;">
    <div style="width: 70%;">@yield("content")</div>
    <div style="width: 25%;">@include("inc.aside")</div>
</div>
@include("inc.footer")

<div class="menu__container js-menu-container js-close-menu" id="mobile-menu">
    <button type="button" class="menu__close-button" data-modal-close>
        <svg width="19" height="19" class="menu__close-button-image">
            <use href="images/icons.svg#close-blank"></use>
        </svg>
    </button>
    <div class="menu__content">
        <nav class="menu__nav">
            <ul class="menu__nav__list ">
                <li>
                    <a @if(request()->is('/')) class="active" @endif href="/" >Головна </a>
                </li>
                <li>
                    <a @if(request()->is('about')) class="active" @endif href="/about">Про нас</a>
                </li>
                <li>
                    <a @if(request()->is('advantages')) class="active" @endif href="/advantages">Наші переваги</a>
                </li>
                <li>
                    <a @if(request()->is('catalogue')) class="active" @endif href="/catalogue">Каталог</a>
                </li>
                <li>
                    <a @if(request()->is('projects')) class="active" @endif href="/projects">Минулі проекти</a>
                </li>
                <li>
                    <a @if(request()->is('contacts')) class="active" @endif href="/contacts">Контакти</a>
                </li>
                <li>
                    <a @if(request()->is('question')) class="active" @endif href="/question">Анкета</a>
                </li>
                <li>
                    <a @if(request()->is('items')) class="active" @endif href="/items">Items</a>
                </li>
                <li>
                    <a
                        href="https://www.instagram.com/"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        <svg
                            class="social__icon"
                            aria-label="Іконка Instagram"
                            width="12"
                            height="12"
                        >
                            <use href="/images/icons.svg#icon-instagram"></use>
                        </svg>
                    </a>
                </li>
            </ul>
        </nav>
        <div>


        </div>
    </div>
</div>
<script type="module" src="./js/app.js"></script>
<script src="./js/mobile-menu.js"></script>
</body>
</html>
