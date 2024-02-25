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
                ->orderBy('included', 'desc')
                ->orderBy('place', 'asc')
                ->get();

            @endphp


                <ul class="projects" style="flex-direction: row; justify-content: center; flex-wrap: wrap;">

                    @php

                        foreach ($works as $work) {
                            $id = $work->id;
                            $place = $work->place;
                            $title = $work->title;
                            $description = $work->description;
                            $included = $work->included;
                                echo "<li style=\"width: 363px;\">";
                    @endphp
                    <div style="margin: 0; width: 300px; max-width: 300px; padding: 20px; border: 1px solid #ccc; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                    <form  action="{{ url('/works-edit') }}" method="post">
                        @csrf
                        <input type="hidden" value="{{$id}}" type="text" name="id">
                        <input class="project-input" type="number" name="place" value="{{$place}}">
                        <br>
                        <input class="project-input" type="text" name="title" placeholder="Назва (обов'язково)" value="{{$title}}" >
                        <br>
                        <textarea class="project-input" name="description" placeholder="Опис (необов'язково)" rows="7" cols="45" >{{$description}}</textarea>
                        <br>
                        <label for="included">
                            <input class="project-input" {{ $included==1 ? "checked" : "" }}  type="checkbox" name="included" id="included" style="width: 18px; height: 18px;">
                            включено в ціну по замовчуванню
                        </label>
                        <input class="project-input" placeholder="пароль"  type="text" name="pwd">
                        <button class="project-button" type="submit">Змінити</button>
                    </form><br>
                    <form id="db{{$id}}" action="{{ url('/works-delete') }}" method="post">
                        @csrf
                        <input class="project-input-delete"  type="text" name="pwd">
                        <input type="hidden" value="{{$id}}" type="text" name="id">
                        <button class="project-button-delete" type="submit">Видалити</button>
                    </form>
                    </div>
                    @php
                        echo "</li>";
                    }
                    @endphp
                </ul>
        </div>
    </section>

@endsection
