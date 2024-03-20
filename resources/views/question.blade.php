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
            <span class="question__title">{{__('messages.que1')}}</span><br>
            <span class="question__block">
            <input type="radio" name="option" id="o1-1" value="{{__('messages.que1-1')}}">
            <label for="o1-1" > {{__('messages.que1-1')}}</label> <br>

            <input type="radio" name="option" id="o1-2" value="{{__('messages.que1-2')}}">
            <label for="o1-2" > {{__('messages.que1-2')}}</label> <br>


            <input type="radio" name="option" value="new"> {{__('messages.other')}}:
             <input type="text"  id="new_option">
            </span>
        </label>


        <br><br><br>
        <input type="radio" name="option2" value="previous02" class="option2"> Останній варіант02: xxx <br>
        <input type="radio" name="option2" value="previous2" class="option2"> Останній варіант2: xxx <br>
        <input type="radio" name="option2" value="new2" class="option2">
        Новий варіант2: <input type="text" id="xxx2" class="new_option2">
        <button class="order-button" onclick="q_add()">{{__('messages.send')}}</button>

    </div>
    <script>
        var inputField = document.getElementById('new_option');
        var previousOptionRadio = document.querySelector('input[value="previous"]');
        var newOptionRadio = document.querySelector('input[value="new"]');

        inputField.addEventListener('input', function() {
            if (inputField.value.trim() !== '') {
                newOptionRadio.checked = true;
            } else {
                previousOptionRadio.checked = true;
            }
        });
        var inF = document.getElementById('xxx2');
        var prF = document.querySelector('input[value="previous2"]');
        var newO = document.querySelector('input[value="new2"]');

        inF.addEventListener('input', function() {
            if (inF.value.trim() !== '') {
                newO.checked = true;
            } else {
                prF.checked = true;
            }
        });
    </script>
@endsection
