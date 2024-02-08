<header class="header">
    <section class="container header__container">
        <a class="link header__logo" href="/">AFC</a>
        <button type="button" class="menu__toggle js-open-menu"
                aria-expanded="false"
                aria-controls="mobile-menu"
        >
            <svg width="24" height="16" class="menu__icon">
                <use href="./images/icons.svg#icon-menu"></use>
            </svg>
        </button>
        <nav class="nav">
            <ul class="nav__list ">
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
        <div class="menu__container js-menu-container js-close-menu" id="mobile-menu">
            <button type="button" class="menu__close-button" data-modal-close>
                <svg width="19" height="19" class="menu__close-button-image">
                    <use href="images/icons.svg#close-blank"></use>
                </svg>
            </button>
            <nav>
                <ul class="menu__nav__li ">
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
                            class="soc-li"
                        >
                            <svg
                                class="social__icon"
                                aria-label="Іконка Instagram"
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
