<div class="backdrop is-hidden" data-modal>
    <div class="modal">
        <button type="button" class="close-button" data-modal-close>
            <svg width="11" height="11" class="close-button__image">
                <use href="./images/icons.svg#close-blank"></use>
            </svg>
        </button>

        <div class="contact">
            <h2 class="modal__title">Залиште свої дані, ми вам передзвонимо</h2>
            <form name="contact-form">
                <label class="contact__label">
                    <span class="contact__title">Ім'я</span>
                    <span class="contact__block">
                <input class="contact__input" type="text" name="contact-username" />
                <svg class="contact__icon" width="12" height="12">
                  <use href="./images/icons.svg#icon-username"></use>
                </svg>
              </span>
                </label>
                <label class="contact__label">
                    <span class="contact__title">Телефон</span>
                    <span class="contact__block">
                <input class="contact__input" type="tel" name="contact-tel" />
                <svg class="contact__icon" width="13" height="13">
                  <use href="./images/icons.svg#icon-tel"></use>
                </svg>
              </span>
                </label>
                <label class="contact__label">
                    <span class="contact__title">Пошта</span>
                    <span class="contact__block">
                <input class="contact__input" type="email" name="contact-email" />
                <svg class="contact__icon" width="15" height="12">
                  <use href="./images/icons.svg#icon-eml"></use>
                </svg>
              </span>
                </label>
                <label class="contact__label">
                    <span class="contact__title">Коментар</span>
                    <textarea class="contact__input contact__textarea" name="comment" placeholder="Введіть текст"></textarea>
                </label>

                <label class="checkbox">
                    <input class="checkbox__input visually-hidden" type="checkbox" name="contact-checkbox" value="terms" />
                    <span class="checkbox__icon"></span>
                    <span class="checkbox__text">Погоджуюся з розсилкою та приймаю <a href="#">Умови договору</a></span>
                </label>

                <button class="order-button" type="submit">Відправити</button>
            </form>

        </div>
    </div>
</div>
