@extends("layouts/app")

@section("nouislider")
    <link rel="stylesheet" href="/css/lightbox.min.css">
@endsection

@php
    $house = DB::table('houses')
        ->select('id','title', 'area', 'price', 'floors', 'rooms', 'works', 'other_works', 'description')
        ->where('id', '=', $id)
        ->first();

    $title = $house->title;
    $area = $house->area;
    $price = $house->price;
    $floors = $house->floors;
    $rooms = $house->rooms;
    $works = $house->works;
    $other_works = $house->other_works;
    $description = $house->description;

    $other_works = str_replace('</td></tr>',', грн</td></tr>', $other_works);
    $other_works = str_replace('<td>, грн</td></tr>','</tr>', $other_works);


$covers = DB::table('house_photos')
        ->select('photo_path')
        ->where('is_cover', 1)
        ->where('house_id', $id)
        ->where('width', 0)
        ->get();

    foreach ($covers as $cover) {
        $photo_path = $cover->photo_path;
    }

@endphp

@section("title")
    {{$title}}
@endsection

@section("content")
    <section class="section">
        <div class="container">
            <div class="house-details">
                <form  action="{{ url('/houses-adm-edit') }}" method="post">
                    @csrf
                    <input type="hidden" value="{{$id}}" type="text" name="id">
                    <input class="project-input" placeholder="Назва" value="{{$title}}" type="text" name="title">
                    <img class="img-card" src="/storage/{{ $photo_path }}" alt="House Photo">
                    <b>Площа:</b>
                    <input class="project-input" placeholder="{{__('messages.house-area')}}: {{$area}}" value="{{$area}}" type="number" step="0.01" name="area">
                    <b>Кімнати:</b>
                    <input class="project-input" placeholder="{{__('messages.rooms')}}: {{$rooms}} " value="{{$rooms}}" type="number"  name="rooms">
                    <b>Поверхи:</b>
                    <input class="project-input" placeholder="{{__('messages.floors')}}: {{$floors}} " value="{{$floors}}" type="number" step="0.5"  name="floors">
                    <b>Ціна:</b>
                    <input class="project-input" placeholder="{{__('messages.price')}}: {{$price}}:  " value="{{$price}}" type="number" step="0.01"  name="price">

                    @php
                        $photos = DB::table('house_photos')
                            ->select('photo_path','width')
                            ->where('is_cover', '!=', 1)
                            ->where('house_id', $id)
                            ->orderby('id', 'asc')
                            ->get();

                        if($photos->count() > 0){
                            echo"<ul class=\"photos\">";
                            $n=0;
                            foreach ($photos as $photo) {
                                if($n==0){
                                    $fscover="";
                                    $fbcover="";
                                    $big="";
                                }
                                $photo_path = $photo->photo_path;
                                $width = $photo->width;
                                if($width==150){$fscover=$photo_path;}
                                else if($width==300){$fbcover=$photo_path;}
                                else {$big = $photo_path;}
                                if($n==2){


                                     echo"<li><a href=\"/storage/$big\" data-lightbox=\"gallery\" style=\"display: block; width: 125px;\">
                                        <img class=\"img-card150\" width=\"125\" height=\"auto\"
                                     srcset=\"/storage/$fscover 1x, /storage/$fbcover 2x\"
                                     sizes=\"(max-width: 600px) 150px, 300px\"
                                     src=\"/storage/$fscover\"
                                     alt=\"$title \"></a><li>";
                                     $n=0;
                                }

                                $n++;
                            }
                            echo"</ul>";
                        }
                    @endphp

                    <h2>{{__('messages.price_included')}}</h2>
                    <textarea rows="12" class="project-input" type="text" name="works">{{$works}}</textarea>

                    <h2>{{__('messages.price_noncluded')}}</h2>
                    <textarea rows="5" class="project-input" type="text" name="other_works">{{$other_works}}</textarea>

                    <textarea rows="6" class="project-input" type="text" name="description">{{$description}}</textarea>


                    <input class="project-input" placeholder="пароль"  type="text" name="pwd">
                    <br>
                    <button class="project-button" type="submit">Редагувати</button>
                </form><br><br>
                <form id="db{{$id}}" action="{{ url('/houses-adm-delete') }}" method="post">
                    @csrf
                    <input class="project-input-delete"  type="text" name="pwd">
                    <input type="hidden" value="{{$id}}" type="text" name="id">
                    <button class="project-button-delete" type="submit">Видалити</button>
                </form>

                <br><br>
            </div>
            <br><br>
        </div>
    </section>



@endsection


