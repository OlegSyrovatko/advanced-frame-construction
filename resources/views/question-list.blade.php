@extends("layouts/app")
@section("title")
    Список анкет
@endsection
@section("content")

    <br /><br /><br />

    <div class="container">

        <br /><br /><br /><br /><br />
        <h1><a href="/admafc">Головне меню</a></h1><br />

    @php
        $Alls = DB::table('questions')->select('id', 'username', 'tel', 'data', 'created_at')->
        orderBy('created_at', 'desc')->
        get();
        $nra = $Alls->count();
    @endphp

    @if($nra>0 )
        <div style="margin-top: 20px;">
            <h1>Список анкет</h1>
            @foreach ($Alls as $All)
                <div class="advantage-card" id={{$All->id}} style="text-align: left;">
                    <h2 class="advantage-title">{{$All->username}}</h2>
                    <h3 class="advantage-title">{{$All->tel}}</h3>
                    <span class="advantage-description">{!! $All->data !!}</span>
                    <br>
                    {{$All->created_at}}<br><br><br>
                    <input type=text id="pwd{{$All->id}}">
                    <a onclick=deleteQueston('{{$All->id}}')>Видалити</a><br>
                </div>
            @endforeach
        </div>
    @endif


@endsection
