@extends("layouts/app")
@section("title")
    Роботи та характеристика
@endsection
@section("content")

    <section class="section">
        <div class="container">
            <br /><br /><br /><br /><br />
            <h1><a href="/admafc">Головне меню</a></h1><br />
            <form class="work-form" action="{{ url('/works') }}" method="post">
                @csrf
                <input class="work-input" type="text" name="title" placeholder="Назва (обов'язково)" >
                <br>
                <textarea class="work-input" name="description" placeholder="Опис (необов'язково)" rows="9" cols="40" ></textarea>
                <br>
                <label for="included">
                    <input class="work-input" checked type="checkbox" name="included" id="included" style="width: 18px; height: 18px;">
                    включено в ціну по замовчуванню
                </label>
                <input class="work-input" placeholder="пароль"  type="text" name="pwd">
                <button class="work-button" type="submit">Додати</button>
            </form>
            @php
                $works = DB::table('works')
                ->select('id','title', 'description', 'included')
                ->where('included', 1)
                ->orderBy('place', 'asc')
                ->get();
            @endphp

            <ul id="sortable-list" class="works" style="">
                @foreach ($works as $work)
                    <li data-work-id="{{ $work->id }}">
                        <form  action="{{ url('/works-edit') }}" method="post">
                            @csrf
                            <input type="hidden" value="{{$work->id}}" type="text" name="id">

                            <input class="work-input" type="text" name="title" placeholder="Назва (обов'язково)" value="{{$work->title}}" >
                            <br>
                            <textarea class="work-input" name="description" placeholder="Опис (необов'язково)" rows="7" cols="45" >{{$work->description}}</textarea>
                            <br>
                            <label for="included">
                                <input class="work-input" {{ $work->included==1 ? "checked" : "" }}  type="checkbox" name="included" id="included" style="width: 18px; height: 18px;">
                                включено в ціну
                            </label>

                            <input class="work-input-delete" type="text" name="pwd">
                            <button class="work-button" type="submit">Змінити</button>
                        </form>

                        <form id="db{{$work->id}}" action="{{ url('/works-delete') }}" method="post">
                            @csrf
                            <input class="work-input-delete"  type="text" name="pwd">
                            <input type="hidden" value="{{$work->id}}" type="text" name="id">
                            <button class="work-button-delete" type="submit">Видалити</button>
                        </form>

                        <br>
                    </li>
                @endforeach
            </ul>
            <br><br><br><br>
            @php
                $works = DB::table('works')
                ->select('id','title', 'description', 'included')
                ->where('included', 0)
                ->orderBy('place', 'asc')
                ->get();
            @endphp

            <ul id="sortable-list2" class="works">
                @foreach ($works as $work)
                    <li data-work-id2="{{ $work->id }}">
                        <form  action="{{ url('/works-edit') }}" method="post">
                            @csrf
                            <input type="hidden" value="{{$work->id}}" type="text" name="id">

                            <input class="work-input" type="text" name="title" placeholder="Назва (обов'язково)" value="{{$work->title}}" >
                            <br>
                            <textarea class="work-input" name="description" placeholder="Опис (необов'язково)" rows="7" cols="45" >{{$work->description}}</textarea>
                            <br>
                            <label for="included">
                                <input class="work-input" {{ $work->included==1 ? "checked" : "" }}  type="checkbox" name="included" id="included" style="width: 18px; height: 18px;">
                                включено в ціну
                            </label>

                            <input class="work-input-delete" type="text" name="pwd">
                            <button class="work-button" type="submit">Змінити</button>
                        </form>
                        <form id="db{{$work->id}}" action="{{ url('/works-delete') }}" method="post">
                            @csrf
                            <input class="work-input-delete"  type="text" name="pwd">
                            <input type="hidden" value="{{$work->id}}" type="text" name="id">
                            <button class="work-button-delete" type="submit">Видалити</button>
                        </form>
                    </li>
                @endforeach
            </ul>
            <br><br><br><br>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const list = document.getElementById('sortable-list');
            const list2 = document.getElementById('sortable-list2');
            const sortable = new Sortable(list, {
                animation: 150,
                onUpdate: function (event) {
                        const itemEl = event.item;

                        const newOrder = {};
                        Array.from(list.children).forEach((item, index) => {
                            const workId = item.dataset.workId;
                            newOrder[workId] = index + 1;
                        });
                    var formData = {
                        newOrder: newOrder,
                    };

                    $.ajax({
                        type: 'POST',
                        url: '/works-update-order',
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        cache: false
                    });

                }
            });

            const sortable2 = new Sortable(list2, {
                animation: 150,
                onUpdate: function (e) {
                    const itemEl2 = e.item;
                    const newIndex2 = e.newIndex;
                    const workId2 = itemEl2.dataset.workId2;

                    const newOrder2 = {};
                    Array.from(list2.children).forEach((item, index) => {
                        const workId2 = item.dataset.workId2;
                        newOrder2[workId2] = index + 1;
                    });
                    var formData = {
                        newOrder: newOrder2,
                    };

                    $.ajax({
                        type: 'POST',
                        url: '/works-update-order',
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        cache: false
                    });

                }
            });

        });
    </script>
@endsection
