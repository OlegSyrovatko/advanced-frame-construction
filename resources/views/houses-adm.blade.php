@extends("layouts/app")
@section("title")
    Адміністрування - будинки
@endsection
@section("content")
    <section class="section">
        <div class="container">
            <br /><br /><br /><br /><br />
            <h1><a href="/admafc">Головне меню</a></h1><br />
            <script>
                function add(b, h){
                    document.getElementById(b).style.display = 'block';
                    document.getElementById(h).style.display = 'none';
                }
            </script>

            <a id="eb" class="house-button" onclick=add('ef','eb')>Додати</a>
            @if(session('success'))
                <b style="color: #4caf50">{{ session('success')  }}</b>
            @endif
            <form id="ef" class="house-form" style="display: none;" action="{{ route('houses-store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="title"><b>Назва будинку:</b></label>
                <input class="house-input" type="text" name="title" id="title" required>

                <label for="area"><b>Площа:</b></label>
                <input class="house-input" type="number" step="0.01" name="area" id="area" required>
                <label for="rooms"><b>Кімнат:</b></label>
                <input class="house-input" type="number"  name="rooms" id="rooms" required value="1">
                <label for="floors"><b>Поверхів:</b></label>
                <input class="house-input" type="number" step="0.5" name="floors" id="floors" required value="1">


                @php
                    $works = DB::table('works')
                    ->select('id','title', 'description')
                    ->orderBy('place', 'asc')
                    ->where('included', 1)
                    ->get();
                    $worksn = $works->count();
                    foreach ($works as $work) {
                        $id = $work->id;
                        $title = $work->title;
                        $description = $work->description;

                        $rows=1;
                        $deslen=strlen($description);
                        if($deslen>50){$rows=2;}
                        if($deslen>100){$rows=3;}
                        if($deslen>170){$rows=4;}
                        if($deslen>250){$rows=5;}
                        if($deslen>300){$rows=6;}
                        echo"
                        <label for=\"in$id\">
                            <input class=\"house-input\" checked type=\"checkbox\" name=\"in$id\" id=\"in$id\" style=\"width: 16px; height: 16px;\">
                            $title
                             <textarea class=\"house-input\" rows=\"$rows\" name=\"tin$id\" >$description</textarea>
                        </label><br>";
                    }
                @endphp
                <label for="price"><b>Ціна:</b></label>
                <input class="house-input" type="number" step="0.01" name="price" id="price" required>
                <br><b>Не включено в ціну</b><br>
                @php
                    $works = DB::table('works')
                    ->select('id','title')
                    ->orderBy('place', 'asc')
                    ->where('included', 0)
                    ->get();
                    $worksn = $works->count();
                    foreach ($works as $work) {
                        $id = $work->id;
                        $title = $work->title;
                        echo"
                            <input class=\"house-input\" checked type=\"checkbox\" name=\"out$id\" id=\"out$id\" style=\"margin-bottom:0px; width: 16px; height: 16px;\">
                             <textarea class=\"house-input\" rows=\"$rows\" name=\"tout$id\" style=\"margin-bottom:0px;\">$title</textarea>
                             <label for=\"pout$id\">Ціна/примітка:</label>
                                <input class=\"house-input\" type=\"text\" name=\"pout$id\" id=\"pout$id\">
                        <br>";
                    }
                @endphp
                <label for="description"><b>Примітка:</b></label>
                <textarea class="house-input" rows="5" name="description" id="description" required><b>Зверніть увагу!</b>
<p>Проект та візуалізація входять у вартість за умови подальшого замовлення будинку.</p>
<p>Вартість дійсна на момент подачі пропозиції і уточняється в день оплати. </p>
<p>Кінцева вартість за пропозицією визначається після розробки проектної документації, візуалізації та погодження специфікації. </p>
</textarea>
                <label for="cover_photo"><b>Обрати обкладинку будинку:</b></label>
                <input class="house-input" type="file" name="cover_photo" id="cover_photo" accept="image/*" required>

                <label for="photos">Фотографії будинку:</label>
                <input class="house-input" type="file" name="photos[]" id="photos" multiple accept="image/*">

                <input class="work-input-delete" type="text" name="pwd">
                <button class="house-button" type="submit">Додати</button>
            </form>
            @php
                $houses = DB::table('houses')
                ->select('id','title', 'area', 'price', 'floors', 'rooms')
                ->orderBy('price', 'asc')
                ->get();
                $housesn = $houses->count();
                if($housesn>0){
                    echo"<ul id=\"houses\">";
                }

                foreach ($houses as $house) {
                    $id = $house->id;
                    $title = $house->title;
                    $area = $house->area;
                    $price = $house->price;
                    $floors = $house->floors;
                    $rooms = $house->rooms;

                     $covers = DB::table('house_photos')
                        ->select('photo_path','width')
                        ->where('is_cover', 1)
                        ->where('house_id', $id)
                        ->where(function ($query) {
                            $query->where('width', 150)
                                  ->orWhere('width', 300);
                        })
                        ->get();
                        $fscover="";
                        $fbcover="";
                        foreach ($covers as $cover) {
                            $photo_path = $cover->photo_path;
                            $width = $cover->width;
                            if($width==150){$fscover=$photo_path;}
                            if($width==300){$fbcover=$photo_path;}
                        }

                    echo"<li class=\"card\" ><a href=\"/\"> <b>$title</b>";
                    @endphp
                     @if ($covers->count() > 0)
                    <img class="img-card"
                        srcset="{{ asset(url('storage/' . $fscover)) }} 1x, {{ asset(url('storage/' . $fbcover)) }} 2x"
                        sizes="(max-width: 600px) 150px, 300px"
                        src="{{ asset(url('storage/' . $fscover)) }}"
                        alt="Image Description"
                    >

                    @else
                        <p>No cover photos found.</p>
                    @endif
                    @php
                    echo"<ul class=\"opt\">
                            <li>" . __('messages.house-area') . ": $area м2</li>
                            <li>" . __('messages.rooms') . ": $rooms  </li>
                            <li>" . __('messages.floors') . ": $floors  </li>
                            <li> " . __('messages.price') . ": $price " . __('messages.uah') . ".</li>
                         </ul>
                    </a></li>";
                }
                if($housesn>0){
                    echo"</ul>";
                }
            @endphp
        </div>
    </section>
@endsection
