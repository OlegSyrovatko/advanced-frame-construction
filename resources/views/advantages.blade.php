@extends("layouts/app")
@section("title")
    {{__('messages.advantages')}}
@endsection
@section("content")
    <section class="section">
        <div class="container">

            <div class="advantage-card-title">
                <h1 class="advantages-title">{{__('messages.advantages')}}</h1><br />
                {{__('messages.dream')}}<br /><br />
                {{__('messages.do-dream')}}<br /><br />
                {{__('messages.advantages-lot')}}
            </div>
            <div class="advantage-card">
                <h2 class="advantage-title">{{__('messages.time')}}</h2>
                <span class="advantage-description">{{__('messages.time-e')}}</span>
            </div>
            <div class="advantage-card">
                <h2 class="advantage-title">{{__('messages.long-y')}}</h2>
                <span class="advantage-description">{{__('messages.long-y-e')}}</span>
            </div>
            <div class="advantage-card">
                <h2 class="advantage-title">{{__('messages.constr')}}</h2>
                <span class="advantage-description">{{__('messages.constr-e')}}</span>
            </div>
            <div class="advantage-card">
                <h2 class="advantage-title">{{__('messages.doing')}}</h2>
                <span class="advantage-description">{{__('messages.doing-e')}}</span>
            </div>
            <div class="advantage-card">
                <h2 class="advantage-title">{{__('messages.reability')}}</h2>
                <span class="advantage-description">{{__('messages.reability-e')}}</span>
            </div>
            <div class="advantage-card">
                <h2 class="advantage-title">{{__('messages.tele')}}</h2>
                <span class="advantage-description">{{__('messages.tele-e')}}</span>
            </div>
            <div class="advantage-card">
                <h2 class="advantage-title">{{__('messages.eco')}}</h2>
                <span class="advantage-description">{{__('messages.eco-e')}}</span>
            </div>
            <div class="advantage-card">
                <h2 class="advantage-title">{{__('messages.clear')}}</h2>
                <span class="advantage-description">{{__('messages.clear-e')}}</span>
            </div>
        </div>
    </section>

@endsection
