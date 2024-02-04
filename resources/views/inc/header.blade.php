<header class="header">
    <section class="container header__container">
        <a class="link header__logo" href="/">AFC</a>
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
    </section>
</header>
