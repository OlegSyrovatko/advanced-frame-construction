@extends("layouts/app")
@section("title")
    {{__('messages.past-projects')}}
@endsection
@section("content")
    <section class="section">
        <div class="container">

            <form class="project-form" style="" action="{{ url('/projects-adm') }}" method="post">
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
                <textarea class="project-input" name="code" rows="5" cols="33" placeholder="Код з інстаграм"></textarea>
                <br>
                <input class="project-input" type="text" name="title" placeholder="Назва (необов'язково)" >
                <br>
                <input class="project-input" type="text" name="description" placeholder="Опис (необов'язково)">
                <br>
                <input class="project-input" type="text" name="title_en" placeholder="Назва (англ.) (необов'язково)">
                <br>
                <input class="project-input" type="text" name="description_en" placeholder="Опис (англ.) (необов'язково)">
                <br>
                <input class="project-input" placeholder="пароль"  type="text" name="pwd">
                <button class="project-button" type="submit">Додати</button>
            </form>
            <ul>
                <li class="project-card-title">
                    <a href="/projects-adm">
                        <h1 class="project-title-adm">{{__('messages.past-projects')}}</h1>
                    </a>
                </li>
                @if($dir == "all" || $dir == "buildings")
                    <li class="project-card">
                        <a href="/projects-adm/buildings">
                            <h2 class="project-title-adm">{{ __('messages.t1') }}</h2>
                        </a>
                    </li>
                @endif
                @if($dir == "all" || $dir == "relax")
                    <li class="project-card">
                        <a href="/projects-adm/relax">
                            <h2 class="project-title-adm">{{ __('messages.t2') }}</h2>
                        </a>
                    </li>
                @endif
                @if($dir == "all" || $dir == "furniture")
                    <li class="project-card">
                        <a href="/projects-adm/furniture">
                            <h2 class="project-title-adm">{{ __('messages.t3') }}</h2>
                        </a>
                    </li>
                @endif
                @if($dir == "all" || $dir == "gardens")
                    <li class="project-card">
                        <a href="/projects-adm/gardens">
                            <h2 class="project-title-adm">{{ __('messages.t4') }}</h2>
                        </a>
                    </li>
                @endif
                @if($dir == "all" || $dir == "cabins")
                    <li class="project-card">
                        <a href="/projects-adm/cabins">
                            <h2 class="project-title-adm">{{ __('messages.t5') }}</h2>
                        </a>
                    </li>
                @endif
                @if($dir == "all" || $dir == "playgrounds")
                    <li class="project-card">
                        <a href="/projects-adm/playgrounds">
                            <h2 class="project-title-adm">{{ __('messages.t6') }}</h2>
                        </a>
                    </li>
                @endif
            </ul>

<script>
    function edit(b, h, d){
    document.getElementById(b).style.display = 'block';
    document.getElementById(h).style.display = 'none';
    document.getElementById(d).style.display = 'none';
}
</script>
            @php

                $totalProjects = DB::table('projects')->when($dir !== 'all', function ($query) use ($dir) {
                    return $query->where('dir', $dir);
                })->count();
                $totalPages = ceil($totalProjects / 10);

                $projects = DB::table('projects')
                ->select('id','title', 'description', 'title_en', 'description_en', 'code', 'dir', 'created_at')
                ->orderBy('created_at', 'desc')
                ->when($dir !== 'all', function ($query) use ($dir) {
                    return $query->where('dir', $dir);
                })
                ->skip(($page - 1) * 10)
                ->take(10)
                ->get();
                $Allbn = $projects->count();
                $hasNextPage = $page < $totalPages;
                $hasPreviousPage = $page > 1;
            @endphp

            @if($Allbn>0)
                <ul class="projects">
                    @endif

                    @php

                        foreach ($projects as $Alb) {

                                $id = $Alb->id;
                                $title = $Alb->title;
                                $description = $Alb->description;
                                $title_en = $Alb->title_en;
                                $description_en = $Alb->description_en;
                                $code = $Alb->code;
                                $dirid = $Alb->dir;
                                $created_at = $Alb->created_at;

                                echo "<li>";

                                echo"$code<br />";
                    @endphp
                    <div class="project-menu">
                        <form id="ef{{$id}}" style="display: none;" action="{{ url('/projects-adm-edit') }}" method="post">
                            @csrf
                            <input type="hidden" value="{{$id}}" type="text" name="id">
                            <select class="project-input" type="dir" name="dir">
                                <option value="all">Всі</option>
                                <option value="buildings" @php if($dirid == "buildings")echo "selected" @endphp>Будинки</option>
                                <option value="relax" @php if($dirid == "relax")echo "selected" @endphp>Альтанки і бесідки</option>
                                <option value="furniture" @php if($dirid == "furniture")echo "selected" @endphp>Меблі, фурнітура</option>
                                <option value="gardens" @php if($dirid == "gardens")echo "selected" @endphp>Качелі/Воль'єри</option>
                                <option value="cabins" @php if($dirid == "cabins")echo "selected" @endphp>Туалети</option>
                                <option value="playgrounds" @php if($dirid == "playgrounds")echo "selected" @endphp>Дит. майданчики</option>
                            </select>

                            <input class="project-input" placeholder="Назва (необов'язково)" value="{{$title}}" type="text" name="title">
                            <br>
                            <input class="project-input" placeholder="Опис (необов'язково):" value="{{$description}}" type="text" name="description">
                            <br>
                            <input class="project-input" placeholder="Назва (англ.) (необов'язково)" value="{{$title_en}}" type="text" name="title_en">
                            <br>
                            <input class="project-input" placeholder="Опис (англ.) (необов'язково)" value="{{$description_en}}" type="text" name="description_en">
                            <br>
                            <input class="project-input" placeholder="пароль"  type="text" name="pwd">
                            <br>
                            <button class="project-button" type="submit">Редагувати</button>
                        </form>
                        <a id="eb{{$id}}" class="project-button" onclick=edit('ef{{$id}}','eb{{$id}}','db{{$id}}')>Редагувати</a>

                        <form id="db{{$id}}" action="{{ url('/projects-adm-delete') }}" method="post">
                            @csrf
                            <input class="project-input-delete"  type="text" name="pwd">
                            <input type="hidden" value="{{$id}}" type="text" name="id">
                            <button class="project-button-delete" type="submit">Видалити</button>
                        </form>
                    </div>
                    @php
                        echo "<br /><br /><br /></li>";
                    }
                    @endphp

                    @if($Allbn>0)
                </ul>
            @endif
            @if($hasPreviousPage)
                <a class="next" href="{{ url('projects-adm/'.$dir.'/'.($page-1)) }}">{{ __('messages.back') }}</a>
            @endif

            @if($hasNextPage)
                <a class="next" href="{{ url('projects-adm/'.$dir.'/'.($page+1)) }}">{{ __('messages.next') }}</a>
            @endif

        </div>
    </section>
    <script async src="//www.instagram.com/embed.js"></script>
@endsection
