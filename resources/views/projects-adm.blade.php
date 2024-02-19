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

@endsection
