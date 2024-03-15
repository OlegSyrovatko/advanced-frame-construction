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
                <h1>{{ $title }}</h1>
                <img class="img-card" src="/storage/{{ $photo_path }}" alt="House Photo">

                <ul class="opt">
                    <li><b> {{__('messages.house-area')}}: {{$area}} м2</b></li>
                    <li><b> {{__('messages.rooms')}}: {{$rooms}}  </b></li>
                    <li><b> {{__('messages.floors')}}: {{$floors}}  </b></li>
                    <li><b> {{__('messages.price')}}: {{$price}}  {{__('messages.uah')}} </b></li>
                </ul>
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
                {!! $works !!}
                <h2>{{__('messages.price_noncluded')}}</h2>
                {!! $other_works !!}

                <br />
                {!! $description !!}

            </div>

        </div>
    </section>


@endsection
