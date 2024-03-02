@extends("layouts/app")
@section("title")
    Список контактів
@endsection
@section("content")

    <br /><br /><br />

    <div class="container">

        <br /><br /><br /><br /><br />
        <h1><a href="/admafc">Головне меню</a></h1><br />

    @php
        $Alls = DB::table('contacts')->select('id', 'username', 'tel', 'area', 'comment', 'created_at')->
        orderBy('created_at', 'desc')->
        get();
        $nra = $Alls->count();
        if($nra>0 ){
            echo"<div class=\"advantage-card-title\"  style=\"margin-top: 20px;\">
                    <h1>Список контактів</h1>
                </div>";
                foreach ($Alls as $All) {
                    $id = $All->id;
                    $username = $All->username;
                    $tel = $All->tel;
                    $area = $All->area;
                    $comment = $All->comment;
                    $created_at = $All->created_at;
                    echo"<div class=\"advantage-card\" id=$id>
                        <h2 class=\"advantage-title\">$username</h2>
                        <span class=\"advantage-description\">$tel</span>
                        <span class=\"advantage-description\">Площа: $area</span>
                        <br>
                        $comment<br>
                        $created_at<br><br><br>
                        <input type=text id=\"pwd$id\">
                        <a onclick=deleteContact('$id')>Видалити</a><br>
                    </div>";
                }
            echo"
            </div>";
        }
    @endphp

@endsection
