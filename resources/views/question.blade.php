@extends("layouts/app")
@section("title")
    {{__('messages.home')}}
@endsection
@section("content")

    <div class="question">
        <h1 class="question__header">{{__('messages.que-tit')}}</h1>
        <br />
        <span class="question__title">{{__('messages.que-desc')}}</span>
        <br /><br /><br />

        <label class="question__label">
            <span class="question__title">{{__('messages.name')}}</span>
            <span class="question__block">
                    <input class="question__input" type="text" id="username" required/>
                    <svg class="question__icon" width="12" height="12">
                      <use href="/images/icons.svg#icon-username"></use>
                    </svg>
                  </span>
        </label>
        <label class="question__label">
            <span class="question__title">{{__('messages.tel')}}</span>
            <span class="question__block">
                    <input class="question__input" type="tel" id="tel" required/>
                    <svg class="question__icon" width="13" height="13">
                      <use href="/images/icons.svg#icon-tel"></use>
                    </svg>
                  </span>
        </label>
        <label class="question__label">
            <span class="question__title">{{__('messages.house-area')}}</span>
            <span class="question__block">
                    <input class="question__input" type="number" id="area" value="0" required/>
                    <svg class="question__icon" width="13" height="13">
                      <use href="/images/icons.svg#icon-house"></use>
                    </svg>
                  </span>
        </label>

        <input type="radio" name="option" value="previous0"> Останній варіант0: xxx <br>
        <input type="radio" name="option" value="previous"> Останній варіант: xxx <br>
        <input type="radio" name="option" value="new">
        Новий варіант: <input type="text" id="new_option">


        <button class="order-button" onclick="q_add()">{{__('messages.send')}}</button>

    </div>

@endsection
