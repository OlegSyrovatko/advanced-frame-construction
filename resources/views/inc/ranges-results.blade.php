@php

    $houses = DB::table('houses')
    ->select('id','title', 'area', 'price', 'floors', 'rooms')
    ->orderBy('price', 'asc')
    ->get();

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

        echo"<div class=\"card\" ><a href=\"/\"> <b>$title</b>";
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
    </a></div>";
}
@endphp
