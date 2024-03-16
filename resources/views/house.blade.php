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
                       ->select('photo_path', 'width')
                       ->where('is_cover', '!=', 1)
                       ->where('house_id', $id)
                       ->orderBy('id', 'asc')
                       ->get();

                   $sorted_photos = [
                       '150' => [],
                       '300' => [],
                       'other' => []
                   ];

                   foreach ($photos as $photo) {
                       $photo_path = $photo->photo_path;
                       $width = $photo->width;

                       if ($width == 150) {
                           $sorted_photos['150'][] = $photo_path;
                       } elseif ($width == 300) {
                           $sorted_photos['300'][] = $photo_path;
                       } else {
                           $sorted_photos['other'][] = $photo_path;
                       }
                   }

                   echo "<ul class=\"photos\">";
                   foreach ($sorted_photos['150'] as $key => $photo) {
                       $fscover = $photo;
                       $fbcover = isset($sorted_photos['300'][$key]) ? $sorted_photos['300'][$key] : '';
                       $big = isset($sorted_photos['other'][$key]) ? $sorted_photos['other'][$key] : '';

                       echo "<li><a href=\"/storage/$big\" data-lightbox=\"gallery\" style=\"display: block; width: 125px;\">
                           <img class=\"img-card150\" width=\"125\" height=\"auto\"
                           srcset=\"/storage/$fscover 1x, /storage/$fbcover 2x\"
                           sizes=\"(max-width: 600px) 150px, 300px\"
                           src=\"/storage/$fscover\"
                           alt=\"$title \"></a><li>";
                   }
                   echo "</ul>";


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

    <button type="button" class="order-button" data-modal-open>{{__('messages.order-h')}}</button>
    <br /><br /><br /><br />

@endsection
@section("modal-window")
    <script>

        const refs = {
            openModalBtn: document.querySelector("[data-modal-open]"),
            closeModalBtn: document.querySelector("[data-modal-close]"),
            modal: document.querySelector("[data-modal]"),
        };

        function toggleModal() {
            refs.modal.classList.toggle("is-hidden");
        }

        (() => {
            refs.openModalBtn.addEventListener("click", toggleModal);
            refs.closeModalBtn.addEventListener("click", toggleModal);
        })();
    </script>
@endsection
<div class="backdrop is-hidden" data-modal>
    <div class="modal">
        <button type="button" class="close-button modal__close" data-modal-close>
            <svg width="11" height="11" class="close-button__image">
                <use href="/images/icons.svg#close-blank"></use>
            </svg>
        </button>

        <div class="contact">
            <h2 class="contact__header">{{__('messages.recall')}}</h2>

            <label class="contact__label">
                <span class="contact__title">{{__('messages.name')}}</span>
                <span class="contact__block">
                    <input class="contact__input" type="text" id="username" required/>
                    <svg class="contact__icon" width="12" height="12">
                      <use href="/images/icons.svg#icon-username"></use>
                    </svg>
                  </span>
            </label>
            <label class="contact__label">
                <span class="contact__title">{{__('messages.tel')}}</span>
                <span class="contact__block">
                    <input class="contact__input" type="tel" id="tel" required/>
                    <svg class="contact__icon" width="13" height="13">
                      <use href="/images/icons.svg#icon-tel"></use>
                    </svg>
                  </span>
            </label>

            <input  type="hidden" id="link" value="{{ Request::url() }}"/>

            <label class="contact__label">
                <span class="contact__title">{{__('messages.comment')}}</span>
                <textarea class="contact__input contact__textarea" id="comment" placeholder="{{__('messages.e-text')}}"></textarea>
            </label>
            <button class="order-button" onclick="order_add()">{{__('messages.send')}}</button>


        </div>
    </div>
</div>

