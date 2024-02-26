@extends("layouts/app")
@section("title")
    Роботи та характеристика
@endsection
@section("content")

    <section class="section">
        <div class="container">

            <form class="project-form" action="{{ url('/works') }}" method="post">
                @csrf
                <label for="place">Місце в переліку, чим менше, тим вище</label>
                <input class="project-input" type="number" name="place" id="place">
                <br>
                <input class="project-input" type="text" name="title" placeholder="Назва (обов'язково)" >
                <br>
                <textarea class="project-input" name="description" placeholder="Опис (необов'язково)" rows="9" cols="40" ></textarea>
                <br>
                <label for="included">
                    <input class="project-input" checked type="checkbox" name="included" id="included" style="width: 18px; height: 18px;">
                    включено в ціну по замовчуванню
                </label>
                <input class="project-input" placeholder="пароль"  type="text" name="pwd">
                <button class="project-button" type="submit">Додати</button>
            </form>
            @php
                $works = DB::table('works')
                ->select('id','place','title', 'description', 'included')
                ->where('included', 1)
                ->orderBy('place', 'asc')
                ->get();
            @endphp

            <div id="sortable-list" class="projects" style="flex-direction: row; justify-content: center; flex-wrap: wrap;">
                @foreach ($works as $work)
                    <div data-work-id="{{ $work->id }}" style="width: 363px;">
                        {{ $work->title }}
                    </div>
                @endforeach
            </div>
            <br><br><br><br>
            @php
                $works = DB::table('works')
                ->select('id','place','title', 'description', 'included')
                ->where('included', 0)
                ->orderBy('place', 'asc')
                ->get();
            @endphp

            <div id="sortable-list2" class="projects" style="flex-direction: row; justify-content: center; flex-wrap: wrap;">
                @foreach ($works as $work)
                    <div data-work-id2="{{ $work->id }}" style="width: 363px;">
                        {{ $work->title }}
                    </div>
                @endforeach
            </div>
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

                        // Отримайте всі нові позиції у вигляді об'єкта { workId: newIndex }
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
                        url: '/update-order',
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        cache: false,
                        success: function success(data) {
                            console.log(data);
                        }
                    });

                }
            });
            /*
            const sortable = new Sortable(list, {
                animation: 150,
                onUpdate: function (event) {
                    const itemEl = event.item;
                    const newIndex = event.newIndex;
                    const workId = itemEl.dataset.workId;
                    console.log('Updated: ' + workId + ', New Index: ' + newIndex);
                    // Add your AJAX logic here to update the server with the new order
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var formData = {
                        workId: workId,
                        newIndex: newIndex,
                        included: 0,
                    };
                    $.ajax({
                        type: 'POST',
                        url: '/update-order',
                        data: formData,
                        cache: false,
                        success: function success(data) {
                            console.log(data);
                        }
                    });
                }
            });
            */
            const sortable2 = new Sortable(list2, {
                animation: 150,
                onUpdate: function (event) {
                    const itemEl2 = event.item;
                    const newIndex2 = event.newIndex;
                    const workId2 = itemEl2.dataset.workId2;
                    console.log('Updated2: ' + workId2 + ', New Index2: ' + newIndex2);
                    // Add your AJAX logic here to update the server with the new order
                }
            });
        });
    </script>
@endsection
