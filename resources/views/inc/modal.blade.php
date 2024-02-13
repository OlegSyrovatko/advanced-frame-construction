<div class="backdrop is-hidden" data-modal>
    <div class="modal">
        <button type="button" class="close-button modal__close" data-modal-close>
            <svg width="11" height="11" class="close-button__image">
                <use href="./images/icons.svg#close-blank"></use>
            </svg>
        </button>

        <div class="contact">
            <h2 class="contact__header">{{__('messages.recall')}}</h2>
            <form name="contact-form" action="{{ url('/subscribe') }}" method="post">
                @csrf
                <label class="contact__label">
                    <span class="contact__title">{{__('messages.name')}}</span>
                    <span class="contact__block">
                        <input class="contact__input" type="text" name="username" required/>
                        <svg class="contact__icon" width="12" height="12">
                          <use href="./images/icons.svg#icon-username"></use>
                        </svg>
                      </span>
                </label>
                <label class="contact__label">
                    <span class="contact__title">{{__('messages.tel')}}</span>
                    <span class="contact__block">
                        <input class="contact__input" type="tel" name="tel" required/>
                        <svg class="contact__icon" width="13" height="13">
                          <use href="./images/icons.svg#icon-tel"></use>
                        </svg>
                      </span>
                </label>
                <label class="contact__label">
                    <span class="contact__title">{{__('messages.house-area')}}</span>
                    <span class="contact__block">
                        <input class="contact__input" type="number" name="area" />
                        <svg class="contact__icon" width="13" height="13">
                          <use href="./images/icons.svg#icon-house"></use>
                        </svg>
                      </span>
                </label>
                <label class="contact__label">
                    <span class="contact__title">{{__('messages.comment')}}</span>
                    <textarea class="contact__input contact__textarea" name="comment" placeholder="{{__('messages.e-text')}}"></textarea>
                </label>
                <button class="order-button" type="submit">{{__('messages.send')}}</button>
            </form>

        </div>
    </div>
</div>
