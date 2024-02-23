@extends("layouts/app")
@section("title")
    {{__('messages.past-projects')}}
@endsection
@section("content")
    <section class="section">
        <div class="container">
            <ul>
                <li class="project-card-title">
                    <a href="/projects">
                        <h1 class="project-title">{{__('messages.past-projects')}}</h1>
                        {{__('messages.proj-head')}}
                    </a>
                </li>
                @if($dir == "all" || $dir == "buildings")
                    <li class="project-card">
                        <a href="/projects/buildings">
                            <h2 class="project-title">{{ __('messages.t1') }}</h2>
                            <span class="project-description">{{ __('messages.t1-e') }}</span>
                        </a>
                    </li>
                @endif
                @if($dir == "all" || $dir == "relax")
                    <li class="project-card">
                        <a href="/projects/relax">
                            <h2 class="project-title">{{ __('messages.t2') }}</h2>
                            <span class="project-description">{{ __('messages.t2-e') }}</span>
                        </a>
                    </li>
                @endif
                @if($dir == "all" || $dir == "furniture")
                    <li class="project-card">
                        <a href="/projects/furniture">
                            <h2 class="project-title">{{ __('messages.t3') }}</h2>
                            <span class="project-description">{{ __('messages.t3-e') }}</span>
                        </a>
                    </li>
                @endif
                @if($dir == "all" || $dir == "gardens")
                    <li class="project-card">
                        <a href="/projects/gardens">
                            <h2 class="project-title">{{ __('messages.t4') }}</h2>
                            <span class="project-description">{{ __('messages.t4-e') }}</span>
                        </a>
                    </li>
                @endif
                @if($dir == "all" || $dir == "cabins")
                    <li class="project-card">
                        <a href="/projects/cabins">
                            <h2 class="project-title">{{ __('messages.t5') }}</h2>
                            <span class="project-description">{{ __('messages.t5-e') }}</span>
                        </a>
                    </li>
                @endif
                @if($dir == "all" || $dir == "playgrounds")
                    <li class="project-card">
                        <a href="/projects/playgrounds">
                            <h2 class="project-title">{{ __('messages.t6') }}</h2>
                            <span class="project-description">{{ __('messages.t6-e') }}</span>
                        </a>
                    </li>
                @endif
            </ul>

            @php

                $totalProjects = DB::table('projects')->when($dir !== 'all', function ($query) use ($dir) {
                    return $query->where('dir', $dir);
                })->count();
                $totalPages = ceil($totalProjects / 10);

                $projects = DB::table('projects')
                ->select('id','title', 'description', 'title_en', 'description_en', 'code', 'created_at')
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
                            $created_at = $Alb->created_at;
                            $lan = App::currentLocale();

                            if($title){
                                $title_e = "<h2>$title</h2>";
                            }
                            else{
                                $title_e = "";
                            }
                            if($description){
                                $description_e = "<p>$description</p>";
                            }
                            else{
                                $description_e = "";
                            }

                            if($lan == "en"){
                                if($title_en){
                                    $title_e = "<h2>$title_en</h2>";
                                }
                                else{
                                    $title_e = "";
                                }
                                if($description_en){
                                    $description_e = "<p>$description_en</p>";
                                }
                                else{
                                    $description_e = "";
                                }
                            }

                            echo "<li>
                                $title_e
                                $description_e
                                $code
                            </li>";
                        }
                    @endphp

           @if($Allbn>0)
                </ul>
            @endif
            @if($hasPreviousPage)
                <a class="next" href="{{ url('projects/'.$dir.'/'.($page-1)) }}">{{ __('messages.back') }}</a>
            @endif

            @if($hasNextPage)
                <a class="next" href="{{ url('projects/'.$dir.'/'.($page+1)) }}">{{ __('messages.next') }}</a>
            @endif

        </div>
    </section>

    <script async src="//www.instagram.com/embed.js"></script>
@endsection
