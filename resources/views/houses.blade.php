@extends("layouts/app")
@section("title")
    {{ __('messages.houses') }}
@endsection


@section("nouislider")
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>

@endsection

@section("content")
    <section class="section">
        <div class="container">

            {{view('inc.ranges')}}
            <ul id="houses"> </ul>
        </div>
        @php
            $houses = DB::table('houses')
            ->select('id', 'area', 'price', 'floors', 'rooms')
            ->get();
            $minMaxValues = [
                'area' => [
                    'min' => $houses->min('area'),
                    'max' => $houses->max('area'),
                ],
                'price' => [
                    'min' => $houses->min('price'),
                    'max' => $houses->max('price'),
                ],
                'floors' => [
                    'min' => $houses->min('floors'),
                    'max' => $houses->max('floors'),
                ],
                'rooms' => [
                    'min' => $houses->min('rooms'),
                    'max' => $houses->max('rooms'),
                ],
            ];


        @endphp
        <div class="unhid" id="mi1"><?=$minMaxValues['area']['min']?></div>
        <div class="unhid" id="ma1"><?=$minMaxValues['area']['max']?></div>
        <div class="unhid" id="mi2"><?=$minMaxValues['rooms']['min']?></div>
        <div class="unhid" id="ma2"><?=$minMaxValues['rooms']['max']?></div>
        <div class="unhid" id="mi3"><?=$minMaxValues['floors']['min']?></div>
        <div class="unhid" id="ma3"><?=$minMaxValues['floors']['max']?></div>
        <div class="unhid" id="mi4"><?=$minMaxValues['price']['min']?></div>
        <div class="unhid" id="ma4"><?=$minMaxValues['price']['max']?></div>
        <script src="/js/notiflix-loading-aio.js"></script>
        <script>
            Notiflix.Loading.init();
            function houses(mi1,ma1,mi2,ma2,mi3,ma3,mi4,ma4) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                Notiflix.Loading.circle('{{__('messages.loading')}}');
                var formData = {
                    mi1: mi1,
                    ma1: ma1,
                    mi2: mi2,
                    ma2: ma2,
                    mi3: mi3,
                    ma3: ma3,
                    mi4: mi4,
                    ma4: ma4,
                };

                $.ajax({
                    type: 'POST',
                    url: '/houses-query',
                    data: formData,
                    cache: false,
                    success: function success(data) {
                        Notiflix.Loading.remove();
                        document.getElementById("houses").innerHTML = data;
                        renderRanges(mi1,ma1,mi2,ma2,mi3,ma3,mi4,ma4);

                    },
                    error: function(xhr, status, error) {
                        Notiflix.Loading.remove();
                        console.error('Error:', error);
                    }
                });

            }


            function renderRanges(mi1,ma1,mi2,ma2,mi3,ma3,mi4,ma4) {

                var rangeSlider1 = document.getElementById('range-slider1');
                noUiSlider.create(rangeSlider1, {
                    start: [mi1, ma1],
                    connect: true,
                    range: {
                        'min': mi1,
                        'max': ma1
                    },
                    tooltips: [true, true],
                    format: {
                        to: function (value) {
                            return value.toFixed(0);
                        },
                        from: function (value) {
                            return parseFloat(value);
                        }
                    }
                });

                var rangeSlider2 = document.getElementById('range-slider2');
                noUiSlider.create(rangeSlider2, {
                    start: [mi2, ma2],
                    connect: true,
                    range: {
                        'min': mi2,
                        'max': ma2
                    },
                    tooltips: [true, true],
                    format: {
                        to: function (value) {
                            return value.toFixed(0);
                        },
                        from: function (value) {
                            return value;
                        }
                    }
                });

                var rangeSlider3 = document.getElementById('range-slider3');
                noUiSlider.create(rangeSlider3, {
                    start: [mi3, ma3],
                    connect: true,
                    range: {
                        'min': mi3,
                        'max': ma3
                    },
                    tooltips: [true, true],
                    format: {
                        to: function (value) {
                            return value.toFixed(0);
                        },
                        from: function (value) {
                            return value;
                        }
                    }
                });


                var rangeSlider4 = document.getElementById('range-slider4');
                noUiSlider.create(rangeSlider4, {
                    start: [mi4, ma4],
                    connect: true,
                    range: {
                        'min': mi4,
                        'max': ma4
                    },
                    tooltips: [true, true],
                    format: {
                        to: function (value) {
                            value = value / 1000;
                            return value.toFixed(0);
                        },
                        from: function (value) {
                            return value;
                        }
                    }
                });

                const debounceHouses = _.debounce(gohouses, 500);

                rangeSlider1.noUiSlider.on('update', function (values, handle) {
                    document.getElementById('mi1').innerHTML = values[0];
                    document.getElementById('ma1').innerHTML = values[1];
                    debounceHouses();

                });
                rangeSlider2.noUiSlider.on('update', function (values) {
                    document.getElementById('mi2').innerHTML = values[0];
                    document.getElementById('ma2').innerHTML = values[1];
                    debounceHouses();
                });
                rangeSlider3.noUiSlider.on('update', function (values) {
                    document.getElementById('mi3').innerHTML = values[0];
                    document.getElementById('ma3').innerHTML = values[1];
                    debounceHouses();
                });
                rangeSlider4.noUiSlider.on('update', function (values) {
                    document.getElementById('mi4').innerHTML = values[0];
                    document.getElementById('ma4').innerHTML = values[1];
                    debounceHouses();
                });
            }
            function gohouses(){
                const mi1 = parseFloat(document.getElementById("mi1").innerHTML);
                const ma1 = parseFloat(document.getElementById("ma1").innerHTML);
                const mi2 = parseFloat(document.getElementById("mi2").innerHTML);
                const ma2 = parseFloat(document.getElementById("ma2").innerHTML);
                const mi3 = parseFloat(document.getElementById("mi3").innerHTML);
                const ma3 = parseFloat(document.getElementById("ma3").innerHTML);
                const mi4 = parseFloat(document.getElementById("mi4").innerHTML);
                const ma4 = parseFloat(document.getElementById("ma4").innerHTML);

                houses(mi1,ma1,mi2,ma2,mi3,ma3,mi4,ma4);
            }
            window.onload = function() {
                houses(<?=$minMaxValues['area']['min']?>,
                    <?=$minMaxValues['area']['max']?>,
                    <?=$minMaxValues['rooms']['min']?>,
                    <?=$minMaxValues['rooms']['max']?>,
                    <?=$minMaxValues['floors']['min']?>,
                    <?=$minMaxValues['floors']['max']?>,
                    <?=$minMaxValues['price']['min']?>,
                    <?=$minMaxValues['price']['max']?>);
            };


        </script>


    </section>
@endsection
