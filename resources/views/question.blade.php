@extends("layouts/app")
@section("title")
    {{__('messages.questionnaire')}}
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
                    <input class="question__input" placeholder="{{__('messages.your-answ')}}" type="text" id="username" required/>
                    <svg class="question__icon" width="12" height="12">
                      <use href="/images/icons.svg#icon-username"></use>
                    </svg>
                  </span>
        </label>
        <label class="question__label">
            <span class="question__title">{{__('messages.tel')}}</span>
            <span class="question__block">
                    <input class="question__input" placeholder="{{__('messages.your-answ')}}" type="tel" id="tel" required/>
                    <svg class="question__icon" width="13" height="13">
                      <use href="/images/icons.svg#icon-tel"></use>
                    </svg>
                  </span>
        </label>
        <div class="question__label question__item">
            <span class="question__title-item">{{__('messages.que1')}}</span>
            <label>
                <input type="radio" name="option" value="{{__('messages.que1-1')}}">
                {{__('messages.que1-1')}}
            </label>
            <label>
                <input type="radio" name="option" value="{{__('messages.que1-2')}}">
                {{__('messages.que1-2')}}
            </label>
            <label>
                <input type="radio" name="option" value="{{__('messages.que1-3')}}">
                {{__('messages.que1-3')}}
            </label>
            <label>
                <input type="radio" name="option" value="{{__('messages.que1-4')}}">
                {{__('messages.que1-4')}}
            </label>
            <label>
                <input type="radio" name="option" value="{{__('messages.que1-5')}}">
                {{__('messages.que1-5')}}
            </label>
            <label>
                <input type="radio" name="option" value="new"> {{__('messages.other')}}:
                <input type="text" class="question__input-item" id="new_option">
            </label>
        </div>
        <div class="question__label question__item">
            <span class="question__title-item">{{__('messages.que2')}}</span>
            <label>
                <input type="radio" name="option2" value="{{__('messages.que2-1')}}">
                {{__('messages.que2-1')}}
            </label>
            <label>
                <input type="radio" name="option2" value="{{__('messages.que2-2')}}">
                {{__('messages.que2-2')}}
            </label>
        </div>
        <div class="question__label question__item">
            <span class="question__title-item">{{__('messages.que3')}}</span>
            <label>
                <input type="radio" name="option3" value="{{__('messages.que3-1')}}">
                {{__('messages.que3-1')}}
            </label>
            <label>
                <input type="radio" name="option3" value="{{__('messages.que3-2')}}">
                {{__('messages.que3-2')}}
            </label>
            <label>
                <input type="radio" name="option3" value="{{__('messages.que3-3')}}">
                {{__('messages.que3-3')}}
            </label>
            <label>
                <input type="radio" name="option3" value="{{__('messages.que3-4')}}">
                {{__('messages.que3-4')}}
            </label>
            <label>
                <input type="radio" name="option3" value="new3"> {{__('messages.other')}}:
                <input type="text"  class="question__input-item" id="new_option3">
            </label>
        </div>
        <div class="question__label question__item">
            <span class="question__title-item">{{__('messages.que4')}}</span>
            <label>
                <input type="radio" name="option4" value="{{__('messages.que4-1')}}">
                {{__('messages.que4-1')}}
            </label>
            <label>
                <input type="radio" name="option4" value="{{__('messages.que4-2')}}">
                {{__('messages.que4-2')}}
            </label>
            <label>
                <input type="radio" name="option4" value="{{__('messages.que4-3')}}">
                {{__('messages.que4-3')}}
            </label>
            <label>
                <input type="radio" name="option4" value="{{__('messages.que4-4')}}">
                {{__('messages.que4-4')}}
            </label>
        </div>
        <label class="question__label question__item">
            <span class="question__title-item">{{__('messages.que5')}}</span>
            <span class="question__block">
                    <input class="question__input-item" placeholder="{{__('messages.your-answ')}}" type="number" id="new_option5"/>
                  </span>
        </label>
        <div class="question__label question__item">
            <span class="question__title-item">{{__('messages.que6')}}</span>
            <label>
                <input type="radio" name="option6" value="{{__('messages.que6-1')}}">
                {{__('messages.que6-1')}}
            </label>
            <label>
                <input type="radio" name="option6" value="{{__('messages.que6-2')}}">
                {{__('messages.que6-2')}}
            </label>
            <label>
                <input type="radio" name="option6" value="new6"> {{__('messages.other')}}:
                <input type="text"  class="question__input-item" id="new_option6">
            </label>
        </div>
        <div class="question__label question__item">
            <span class="question__title-item">{{__('messages.que7')}}</span>
            <label>
                <input type="radio" name="option7" value="{{__('messages.que7-1')}}">
                {{__('messages.que7-1')}}
            </label>
            <label>
                <input type="radio" name="option7" value="{{__('messages.que7-2')}}">
                {{__('messages.que7-2')}}
            </label>
            <label>
                <input type="radio" name="option7" value="{{__('messages.que7-3')}}">
                {{__('messages.que7-3')}}
            </label>
            <label>
                <input type="radio" name="option7" value="{{__('messages.que7-4')}}">
                {{__('messages.que7-4')}}
            </label>
            <label>
                <input type="radio" name="option7" value="new7"> {{__('messages.other')}}:
                <input type="text"  class="question__input-item" id="new_option7">
            </label>
        </div>
        <div class="question__label question__item">
            <span class="question__title-item">{{__('messages.que9')}}</span>
            <label>
                <input type="radio" name="option9" value="{{__('messages.que9-1')}}">
                {{__('messages.que9-1')}}
            </label>
            <label>
                <input type="radio" name="option9" value="{{__('messages.que9-2')}}">
                {{__('messages.que9-2')}}
            </label>
            <label>
                <input type="radio" name="option9" value="{{__('messages.que9-3')}}">
                {{__('messages.que9-3')}}
            </label>
            <label>
                <input type="radio" name="option9" value="{{__('messages.que9-4')}}">
                {{__('messages.que9-4')}}
            </label>
            <label>
                <input type="radio" name="option9" value="{{__('messages.que9-5')}}">
                {{__('messages.que9-5')}}
            </label>
            <label>
                <input type="radio" name="option9" value="{{__('messages.que9-6')}}">
                {{__('messages.que9-6')}}
            </label>
            <label>
                <input type="radio" name="option9" value="{{__('messages.que9-7')}}">
                {{__('messages.que9-7')}}
            </label>
            <label>
                <input type="radio" name="option9" value="{{__('messages.que9-8')}}">
                {{__('messages.que9-8')}}
            </label>
            <label>
                <input type="radio" name="option9" value="{{__('messages.que9-9')}}">
                {{__('messages.que9-9')}}
            </label>

            <label>
                <input type="radio" name="option9" value="new9"> {{__('messages.other')}}:
                <input type="text"  class="question__input-item" id="new_option9">
            </label>
        </div>

        <div class="question__label question__item">
            <span class="question__title-item">{{__('messages.que10')}}</span>
            <label>
                <input type="radio" name="option10" value="{{__('messages.que10-1')}}">
                {{__('messages.que10-1')}}
            </label>
            <label>
                <input type="radio" name="option10" value="{{__('messages.que10-2')}}">
                {{__('messages.que10-2')}}
            </label>
            <label>
                <input type="radio" name="option10" value="{{__('messages.que10-3')}}">
                {{__('messages.que10-3')}}
            </label>
            <label>
                <input type="radio" name="option10" value="{{__('messages.que10-4')}}">
                {{__('messages.que10-4')}}
            </label>
            <label>
                <input type="radio" name="option10" value="{{__('messages.que10-5')}}">
                {{__('messages.que10-5')}}
            </label>
            <label>
                <input type="radio" name="option10" value="new10"> {{__('messages.other')}}:
                <input type="text"  class="question__input-item" id="new_option10">
            </label>
        </div>

        <div class="question__label question__item">
            <span class="question__title-item">{{__('messages.que11')}}</span>
            <label>
                <input type="radio" name="option11" value="{{__('messages.que11-1')}}">
                {{__('messages.que11-1')}}
            </label>
            <label>
                <input type="radio" name="option11" value="{{__('messages.que11-2')}}">
                {{__('messages.que11-2')}}
            </label>
            <label>
                <input type="radio" name="option11" value="{{__('messages.que11-3')}}">
                {{__('messages.que11-3')}}
            </label>
            <label>
                <input type="radio" name="option11" value="{{__('messages.que11-4')}}">
                {{__('messages.que11-4')}}
            </label>
            <label>
                <input type="radio" name="option11" value="{{__('messages.que11-5')}}">
                {{__('messages.que11-5')}}
            </label>
            <label>
                <input type="radio" name="option11" value="{{__('messages.que11-6')}}">
                {{__('messages.que11-6')}}
            </label>
            <label>
                <input type="radio" name="option11" value="new11"> {{__('messages.other')}}:
                <input type="text"  class="question__input-item" id="new_option11">
            </label>
        </div>

        <div class="question__label question__item">
            <span class="question__title-item">{{__('messages.que12')}}</span>
            <label>
                <input type="radio" name="option12" value="{{__('messages.que12-1')}}">
                {{__('messages.que12-1')}}
            </label>
            <label>
                <input type="radio" name="option12" value="{{__('messages.que12-2')}}">
                {{__('messages.que12-2')}}
            </label>
            <label>
                <input type="radio" name="option12" value="{{__('messages.que12-3')}}">
                {{__('messages.que12-3')}}
            </label>

            <label>
                <input type="radio" name="option12" value="new12"> {{__('messages.other')}}:
                <input type="text"  class="question__input-item" id="new_option12">
            </label>
        </div>
        <div class="question__label question__item">
            <span class="question__title-item">{{__('messages.que13')}}</span>
            <label>
                <input type="radio" name="option13" value="{{__('messages.que13-1')}}">
                {{__('messages.que13-1')}}
            </label>
            <label>
                <input type="radio" name="option13" value="{{__('messages.que13-2')}}">
                {{__('messages.que13-2')}}
            </label>
            <label>
                <input type="radio" name="option13" value="{{__('messages.que13-3')}}">
                {{__('messages.que13-3')}}
            </label>

            <label>
                <input type="radio" name="option13" value="new13"> {{__('messages.other')}}:
                <input type="text"  class="question__input-item" id="new_option13">
            </label>
        </div>
        <div class="question__label question__item">
            <span class="question__title-item">{{__('messages.que14')}}</span>
            <label>
                <input type="radio" name="option14" value="{{__('messages.que14-1')}}">
                {{__('messages.que14-1')}}
            </label>
            <label>
                <input type="radio" name="option14" value="{{__('messages.que14-2')}}">
                {{__('messages.que14-2')}}
            </label>
            <label>
                <input type="radio" name="option14" value="{{__('messages.que14-3')}}">
                {{__('messages.que14-3')}}
            </label>
            <label>
                <input type="radio" name="option14" value="{{__('messages.que14-4')}}">
                {{__('messages.que14-4')}}
            </label>
            <label>
                <input type="radio" name="option14" value="new14"> {{__('messages.other')}}:
                <input type="text"  class="question__input-item" id="new_option14">
            </label>
        </div>

        <div class="question__label question__item">
            <span class="question__title-item">{{__('messages.que15')}}</span>
            <label>
                <input type="radio" name="option15" value="{{__('messages.que15-1')}}">
                {{__('messages.que15-1')}}
            </label>
            <label>
                <input type="radio" name="option15" value="{{__('messages.que15-2')}}">
                {{__('messages.que15-2')}}
            </label>
            <label>
                <input type="radio" name="option15" value="{{__('messages.que15-3')}}">
                {{__('messages.que15-3')}}
            </label>
            <label>
                <input type="radio" name="option15" value="new15"> {{__('messages.other')}}:
                <input type="text"  class="question__input-item" id="new_option15">
            </label>
        </div>
        <div class="question__label question__item">
            <span class="question__title-item">{{__('messages.que16')}}</span>
            <label>
                <input type="radio" name="option16" value="{{__('messages.que16-1')}}">
                {{__('messages.que16-1')}}
            </label>
            <label>
                <input type="radio" name="option16" value="{{__('messages.que16-2')}}">
                {{__('messages.que16-2')}}
            </label>
            <label>
                <input type="radio" name="option16" value="{{__('messages.que16-3')}}">
                {{__('messages.que16-3')}}
            </label>
            <label>
                <input type="radio" name="option16" value="{{__('messages.que16-4')}}">
                {{__('messages.que16-4')}}
            </label>
            <label>
                <input type="radio" name="option16" value="new16"> {{__('messages.other')}}:
                <input type="text"  class="question__input-item" id="new_option16">
            </label>
        </div>

        <div class="question__label question__item">
            <span class="question__title-item">{{__('messages.que17')}}</span>
            <label>
                <input type="radio" name="option17" value="{{__('messages.que17-1')}}">
                {{__('messages.que17-1')}}
            </label>
            <label>
                <input type="radio" name="option17" value="{{__('messages.que17-2')}}">
                {{__('messages.que17-2')}}
            </label>
            <label>
                <input type="radio" name="option17" value="new17"> {{__('messages.other')}}:
                <input type="text"  class="question__input-item" id="new_option17">
            </label>
        </div>

        <div class="question__label question__item">
            <span class="question__title-item">{{__('messages.que18')}}</span>
            <label>
                <input type="radio" name="option18" value="{{__('messages.que18-1')}}">
                {{__('messages.que18-1')}}
            </label>
            <label>
                <input type="radio" name="option18" value="{{__('messages.que18-2')}}">
                {{__('messages.que18-2')}}
            </label>
            <label>
                <input type="radio" name="option18" value="new18"> {{__('messages.other')}}:
                <input type="text"  class="question__input-item" id="new_option18">
            </label>
        </div>

        <label class="question__label question__item">
            <span class="question__title-item">{{__('messages.que19')}}</span>
            <span class="question__block">
                    <input class="question__input-item" placeholder="{{__('messages.your-answ')}}"  id="new_option19"/>
                  </span>
        </label>

        <div class="question__label question__item">
            <span class="question__title-item">{{__('messages.que20')}}</span>
            <label>
                <input type="radio" name="option20" value="{{__('messages.que20-1')}}">
                {{__('messages.que20-1')}}
            </label>
            <label>
                <input type="radio" name="option20" value="{{__('messages.que20-2')}}">
                {{__('messages.que20-2')}}
            </label>
            <label>
                <input type="radio" name="option20" value="new20"> {{__('messages.other')}}:
                <input type="text"  class="question__input-item" id="new_option20">
            </label>
        </div>

        <label class="question__label question__item">
            <span class="question__title-item">{{__('messages.que21')}}</span>
            <span class="question__block">
                    <input class="question__input-item" placeholder="{{__('messages.your-answ')}}"  id="new_option21"/>
                  </span>
        </label>


        <button class="order-button" onclick="q_add()">{{__('messages.send')}}</button>
    </div>
    <script>
        var inF1 = document.getElementById('new_option');
        var prF1 = document.querySelector('input[value="{{__('messages.que1-1')}}"]');
        var new1 = document.querySelector('input[value="new"]');

        inF1.addEventListener('input', function() {
            if (inF1.value.trim() !== '') {
                new1.checked = true;
            } else {
                prF1.checked = true;
            }
        });

        var inF3 = document.getElementById('new_option3');
        var prF3 = document.querySelector('input[value="{{__('messages.que3-1')}}"]');
        var new3 = document.querySelector('input[value="new3"]');

        inF3.addEventListener('input', function() {
            if (inF3.value.trim() !== '') {
                new3.checked = true;
            } else {
                prF3.checked = true;
            }
        });

        var inF6 = document.getElementById('new_option6');
        var prF6 = document.querySelector('input[value="{{__('messages.que6-1')}}"]');
        var new6 = document.querySelector('input[value="new6"]');

        inF6.addEventListener('input', function() {
            if (inF6.value.trim() !== '') {
                new6.checked = true;
            } else {
                prF6.checked = true;
            }
        });

        var inF7 = document.getElementById('new_option7');
        var prF7 = document.querySelector('input[value="{{__('messages.que7-4')}}"]');
        var new7 = document.querySelector('input[value="new7"]');

        inF7.addEventListener('input', function() {
            if (inF7.value.trim() !== '') {
                new7.checked = true;
            } else {
                prF7.checked = true;
            }
        });

        var inF9 = document.getElementById('new_option9');
        var prF9 = document.querySelector('input[value="{{__('messages.que9-1')}}"]');
        var new9 = document.querySelector('input[value="new9"]');

        inF9.addEventListener('input', function() {
            if (inF9.value.trim() !== '') {
                new9.checked = true;
            } else {
                prF9.checked = true;
            }
        });

        var inF10 = document.getElementById('new_option10');
        var prF10 = document.querySelector('input[value="{{__('messages.que10-1')}}"]');
        var new10 = document.querySelector('input[value="new10"]');

        inF10.addEventListener('input', function() {
            if (inF10.value.trim() !== '') {
                new10.checked = true;
            } else {
                prF10.checked = true;
            }
        });

        var inF11 = document.getElementById('new_option11');
        var prF11 = document.querySelector('input[value="{{__('messages.que11-3')}}"]');
        var new11 = document.querySelector('input[value="new11"]');

        inF11.addEventListener('input', function() {
            if (inF11.value.trim() !== '') {
                new11.checked = true;
            } else {
                prF11.checked = true;
            }
        });

        var inF12 = document.getElementById('new_option12');
        var prF12 = document.querySelector('input[value="{{__('messages.que12-1')}}"]');
        var new12 = document.querySelector('input[value="new12"]');

        inF12.addEventListener('input', function() {
            if (inF12.value.trim() !== '') {
                new12.checked = true;
            } else {
                prF12.checked = true;
            }
        });

        var inF13 = document.getElementById('new_option13');
        var prF13 = document.querySelector('input[value="{{__('messages.que13-1')}}"]');
        var new13 = document.querySelector('input[value="new13"]');

        inF13.addEventListener('input', function() {
            if (inF13.value.trim() !== '') {
                new13.checked = true;
            } else {
                prF13.checked = true;
            }
        });

        var inF14 = document.getElementById('new_option14');
        var prF14 = document.querySelector('input[value="{{__('messages.que14-1')}}"]');
        var new14 = document.querySelector('input[value="new14"]');

        inF14.addEventListener('input', function() {
            if (inF14.value.trim() !== '') {
                new14.checked = true;
            } else {
                prF14.checked = true;
            }
        });

        var inF15 = document.getElementById('new_option15');
        var prF15 = document.querySelector('input[value="{{__('messages.que15-1')}}"]');
        var new15 = document.querySelector('input[value="new15"]');

        inF15.addEventListener('input', function() {
            if (inF15.value.trim() !== '') {
                new15.checked = true;
            } else {
                prF15.checked = true;
            }
        });

        var inF16 = document.getElementById('new_option16');
        var prF16 = document.querySelector('input[value="{{__('messages.que16-1')}}"]');
        var new16 = document.querySelector('input[value="new16"]');

        inF16.addEventListener('input', function() {
            if (inF16.value.trim() !== '') {
                new16.checked = true;
            } else {
                prF16.checked = true;
            }
        });

        var inF17 = document.getElementById('new_option17');
        var prF17 = document.querySelector('input[value="{{__('messages.que17-1')}}"]');
        var new17 = document.querySelector('input[value="new17"]');

        inF17.addEventListener('input', function() {
            if (inF17.value.trim() !== '') {
                new17.checked = true;
            } else {
                prF17.checked = true;
            }
        });

        var inF18 = document.getElementById('new_option18');
        var prF18 = document.querySelector('input[value="{{__('messages.que18-1')}}"]');
        var new18 = document.querySelector('input[value="new18"]');

        inF18.addEventListener('input', function() {
            if (inF18.value.trim() !== '') {
                new18.checked = true;
            } else {
                prF18.checked = true;
            }
        });


        var inF20 = document.getElementById('new_option20');
        var prF20 = document.querySelector('input[value="{{__('messages.que20-2')}}"]');
        var new20 = document.querySelector('input[value="new20"]');

        inF20.addEventListener('input', function() {
            if (inF20.value.trim() !== '') {
                new20.checked = true;
            } else {
                prF20.checked = true;
            }
        });

    </script>
@endsection
