@extends("layouts/app")
@section("title")
    {{__('messages.past-projects')}}
@endsection
@section("content")
    <section class="section">
        <div class="container">

            <form class="project-form" action="{{ url('/projects-adm') }}" method="post">
                @csrf
                <label class="project-label" for="dir">Розділ:</label>
                <select class="project-input" type="dir" name="dir" id="dir">
                    <option value="all">Всі</option>
                    <option value="buildings">Будинки</option>
                    <option value="relax">Альтанки і бесідки</option>
                    <option value="furniture">Меблі, фурнітура</option>
                    <option value="gardens">Качелі/Воль'єри</option>
                    <option value="cabins">Туалети</option>
                    <option value="playgrounds">Дит. майданчики</option>
                </select>
                <label for="code">Код з інстаграм:</label>
                     <textarea class="project-input" name="code" id="code" rows="5" cols="33"></textarea>
                <br>
                <label class="project-label" for="title">Назва (необов'язково):</label>
                <input class="project-input" type="text" name="title" id="title">
                <br>
                <label class="project-label" for="description">Опис (необов'язково):</label>
                <input class="project-input" type="text" name="description" id="description">
                <br>
                <label class="project-label" for="title_en">Назва (англ.) (необов'язково):</label>
                <input class="project-input" type="text" name="title_en" id="title_en">
                <br>
                <label class="project-label" for="description_en">Опис (англ.) (необов'язково):</label>
                <input class="project-input" type="text" name="description_en" id="description_en">
                <br>
                <button class="project-button" type="submit">Додати</button>
            </form>
            <ul>
                <li class="project-card-title">
                    <a href="/projects">
                        <h1 class="project-title">{{__('messages.past-projects')}}</h1>
                    </a>
                </li>
                @if($dir == "all" || $dir == "buildings")
                    <li class="project-card">
                        <a href="/projects/buildings">
                            <h2 class="project-title">{{ __('messages.t1') }}</h2>
                        </a>
                    </li>
                @endif
                @if($dir == "all" || $dir == "relax")
                    <li class="project-card">
                        <a href="/projects/relax">
                            <h2 class="project-title">{{ __('messages.t2') }}</h2>
                        </a>
                    </li>
                @endif
                @if($dir == "all" || $dir == "furniture")
                    <li class="project-card">
                        <a href="/projects/furniture">
                            <h2 class="project-title">{{ __('messages.t3') }}</h2>
                        </a>
                    </li>
                @endif
                @if($dir == "all" || $dir == "gardens")
                    <li class="project-card">
                        <a href="/projects/gardens">
                            <h2 class="project-title">{{ __('messages.t4') }}</h2>
                        </a>
                    </li>
                @endif
                @if($dir == "all" || $dir == "cabins")
                    <li class="project-card">
                        <a href="/projects/cabins">
                            <h2 class="project-title">{{ __('messages.t5') }}</h2>
                        </a>
                    </li>
                @endif
                @if($dir == "all" || $dir == "playgrounds")
                    <li class="project-card">
                        <a href="/projects/playgrounds">
                            <h2 class="project-title">{{ __('messages.t6') }}</h2>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </section>
    <script async src="//www.instagram.com/embed.js"></script>
@endsection
