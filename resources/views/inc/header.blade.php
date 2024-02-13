<header class="header">
    <section class="container header__container">
        <a class="link header__logo" href="/">
            <img class="header__logo__img" src="/images/logo_small_negate.png" width="50" height="36" alt="{{__('messages.logo')}}">
            AFC
        </a>
        <a class="tel-item" href="tel:+380684421138">
            <svg class="smartphone" width="14" height="16">
                <use href="/images/icons.svg#icon-smartphone"></use>
            </svg>
            <span>+38 068 442 1138</span>
        </a>
        <div class="langs">
            @if (App::isLocale('en'))<img loading="lazy" width="22" height="14" src="/images/flag-en.png" title = "english language" alt = "english language">
            @else <a class="enover" href="/en" title = "english language"></a>
            @endif
            @if (App::isLocale('ua'))<img loading="lazy" width="22" height="14" src="/images/flag-uk.gif" title = "українська мова" alt = "українська мова">
            @else <a class="uaover" href="/ua" title = "українська мова"></a>
            @endif
        </div>
        <button type="button" class="menu__toggle js-open-menu"
                aria-expanded="false"
                aria-controls="mobile-menu"
        >
            <svg width="24" height="16" class="menu__icon">
                <use href="/images/icons.svg#icon-menu"></use>
            </svg>
        </button>
        <nav class="nav">
            <ul class="nav__list ">
                <li>
                    <a @if(request()->is('/') || request()->is('en') || request()->is('ua')) class="active" @endif href="/" >{{__('messages.home')}} </a>
                </li>
                <li>
                    <a @if(request()->is('about') || request()->is('about/en') || request()->is('about/ua')) class="active" @endif href="/about">{{__('messages.about-us')}}</a>
                </li>
                <li>
                    <a @if(request()->is('advantages') || request()->is('advantages/en') || request()->is('advantages/ua')) class="active" @endif href="/advantages">{{__('messages.advantages')}}</a>
                </li>
                <li>
                    <a @if(request()->is('catalogue')) class="active" @endif href="/catalogue">{{__('messages.catalogue')}}</a>
                </li>
                <li>
                    <a @if(request()->is('projects')) class="active" @endif href="/projects">{{__('messages.past-projects')}}</a>
                </li>
                <li>
                    <a @if(request()->is('contacts')) class="active" @endif href="/contacts">{{__('messages.contacts')}}</a>
                </li>
                <li>
                    <a @if(request()->is('question')) class="active" @endif href="/question">{{__('messages.questionnaire')}}</a>
                </li>
                <li>
                    <a
                        href="https://www.instagram.com/"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        <svg
                            class="social__icon"
                            aria-label="{{__('messages.icon_insta')}}"
                            width="12"
                            height="12"
                        >
                            <use href="/images/icons.svg#icon-instagram"></use>
                        </svg>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="menu__container js-menu-container js-close-menu" id="mobile-menu">
            <button type="button" class="menu__close-button" data-close>
                <svg width="19" height="19" class="menu__close-button-image">
                    <use href="/images/icons.svg#close-blank"></use>
                </svg>
            </button>
            <nav>
                <ul class="menu__nav__li ">
                    <li>
                        <a @if(request()->is('/') || request()->is('en') || request()->is('ua')) class="active" @endif href="/" >@php request()->is('/en') @endphp {{__('messages.home')}}</a>
                    </li>
                    <li>
                        <a @if(request()->is('about') || request()->is('about/en') || request()->is('about/ua')) class="active" @endif href="/about">{{__('messages.about-us')}}</a>
                    </li>
                    <li>
                        <a @if(request()->is('advantages') || request()->is('advantages/en') || request()->is('advantages/ua')) class="active" @endif href="/advantages">{{__('messages.advantages')}}</a>
                    </li>
                    <li>
                        <a @if(request()->is('catalogue')) class="active" @endif href="/catalogue">{{__('messages.catalogue')}}</a>
                    </li>
                    <li>
                        <a @if(request()->is('projects')) class="active" @endif href="/projects">{{__('messages.past-projects')}}</a>
                    </li>
                    <li>
                        <a @if(request()->is('contacts')) class="active" @endif href="/contacts">{{__('messages.contacts')}}</a>
                    </li>
                    <li>
                        <a @if(request()->is('question')) class="active" @endif href="/question">{{__('messages.questionnaire')}}</a>
                    </li>
                    <li>
                        <a
                            href="https://www.instagram.com/"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="soc-li"
                        >
                            <svg
                                class="social__icon"
                                aria-label="{{__('messages.icon_insta')}}"
                                width="14"
                                height="14"
                            >
                                <use href="/images/icons.svg#icon-instagram"></use>
                            </svg> <span>Instagram</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
</header>
