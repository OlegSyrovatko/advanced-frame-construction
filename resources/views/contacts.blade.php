@extends("layouts/app")
@section("title")
    {{__('messages.contacts')}}
@endsection
@section("content")
    <section class="section" >
        <div class="container">
            <div class="contacts__block">
                <img src="/images/logo-no-board.png" width="238" height="238" alt="Advanced Frame Construction Logo">
                <h2 class="contacts__title visually-hidden">{{__('messages.contacts')}}</h2>
                <ul class="list">
                    <li>
                        <p class="contacts__title">{{__('messages.tels')}}
                        <p class="contacts__item">
                            <a class="link contacts__link" href="tel:+380684421138" rel="noopener noreferrer nofollow">
                                <svg
                                    class="contacts__icon"
                                    aria-label="{{__('messages.label-tel')}}"
                                    width="24"
                                    height="24"
                                >
                                    <use href="/images/icons.svg#icon-smartphone"></use>
                                </svg>
                                <span class="contacts__text">+38 068 442 1138</span>
                            </a>
                        </p><br />
                        <p class="contacts__item">
                            <a class="link contacts__link" href="tel:+380684421137" rel="noopener noreferrer nofollow">
                                <svg
                                    class="contacts__icon"
                                    aria-label="{{__('messages.label-tel')}}"
                                    width="24"
                                    height="24"
                                >
                                    <use href="/images/icons.svg#icon-smartphone"></use>
                                </svg>
                                <span class="contacts__text">+38 068 442 1137</span>
                            </a>
                        </p><br />
                        <p class="contacts__item">
                            <a class="link contacts__link" href="tel:+380978160003" rel="noopener noreferrer nofollow">
                                <svg
                                    class="contacts__icon"
                                    aria-label="{{__('messages.label-tel')}}"
                                    width="24"
                                    height="24"
                                >
                                    <use href="/images/icons.svg#icon-smartphone"></use>
                                </svg>
                                <span class="contacts__text">+38 097 816 0003</span>
                            </a>
                        </p>
                    </li>
                    <li>
                        <p class="contacts__title">E-mail
                        <p class="contacts__item">
                            <a class="link contacts__link" rel="noopener noreferrer nofollow" href="mailto:oleh92makarenko@gmail.com">
                                <svg
                                    class="contacts__icon"
                                    aria-label="E-mail"
                                    width="24"
                                    height="24"
                                >
                                    <use href="/images/icons.svg#icon-envelop"></use>
                                </svg>
                                <span class="contacts__text">oleh92makarenko@gmail.com</span>
                            </a>
                        </p>
                    </li>
                    <li>
                        <p class="contacts__title">{{__('messages.address')}}
                        <p class="contacts__item">
                            <a class="link contacts__link" target="_blank" rel="noopener noreferrer nofollow" href="https://www.google.com/maps/search/Хотинівка,+Шевченка,+9/@51.1555194,31.5357538,2215m/data=!3m1!1e3?hl=ru&entry=ttu">
                                <svg
                                    class="contacts__icon"
                                    aria-label="{{__('messages.address')}}"
                                    width="24"
                                    height="24"
                                >
                                    <use href="/images/icons.svg#icon-location"></use>
                                </svg>
                                <span class="contacts__text">{{__('messages.address-e')}}</span>
                            </a>
                        </p>
                    </li>


                </ul>


            </div>
            <div class="contacts__container-map">
                <iframe
                    class="contacts__map"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4822.530391187656!2d31.53688159726772!3d51.154529236940576!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x412b2fcb7472f227%3A0x8ede38b3f54ea64c!2sAdvanced%20Frame%20Constructions!5e1!3m2!1suk!2sua!4v1708278335787!5m2!1suk!2sua"
                    style="border: 0"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                ></iframe>
            </div>
        </div>
    </section>

@endsection
