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
        </div>
    </section>

    @php

        $Allb = DB::table('projects')
            ->select('id','title', 'description', 'title_en', 'description_en', 'code', 'created_at')
            ->orderBy('created_at', 'desc')
            ->when($dir !== 'all', function ($query) use ($dir) {
                return $query->where('dir', $dir);
            })
            ->limit(11)
            ->get();
        $Allbn = $Allb->count();

    @endphp;

    @if($Allbn>0)
       <ul id="projects" class="projects">
    @endif

    @php
        $n = 1;
        foreach ($Allb as $Alb) {
            if($n<11){
                $id = $Alb->id;
                $title = $Alb->title;
                $description = $Alb->description;
                $title_en = $Alb->title_en;
				$description_en = $Alb->description_en;
                $code = $Alb->code;
				$created_at = $Alb->created_at;

                echo "<li>$code</li>";

            }
            $n++;
        }
    @endphp

    @if($Allbn>0)
        </ul>
    @endif
    @if($n==12)
        <section id="next_div2" onMouseOver=projects('{{$dir}}','2') >
            <a href=## onclick=projects('{{$dir}}','2') rel="noopener noreferrer">
                <h3>{{__('messages.next')}} </h3>
            </a>
        </section>
    @endif

    <script async src="//www.instagram.com/embed.js"></script>
@endsection
