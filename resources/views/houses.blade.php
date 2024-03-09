@extends("layouts/app")
@section("title")
   {{ __('messages.houses') }}
@endsection

@section("nouislider")
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.js"></script>
@endsection

@section("content")


    <section class="section">
        <div class="container">


            <br /><br /><br /><br />

            <section id="houses">
                <div class="card-ranges">{{view('inc.ranges')}}</div>
                {{view('inc.ranges-results')}}
            </section>
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

        <script>

            var minRangeValue1 = <?= $minMaxValues['area']['min'] ?>;
            var maxRangeValue1 = <?= $minMaxValues['area']['max'] ?>;
            var rangeSlider1 = document.getElementById('range-slider1');
            noUiSlider.create(rangeSlider1, {
                start: [minRangeValue1, maxRangeValue1],
                connect: true,
                range: {
                    'min': minRangeValue1,
                    'max': maxRangeValue1
                },
                tooltips: [true, true],
                format: {
                    to: function(value) {
                        return value.toFixed(0);
                    },
                    from: function(value) {
                        return parseFloat(value);
                    }
                }
            });

            // Оновлення значень при зміні першого регулятора
            rangeSlider1.noUiSlider.on('update', function (values, handle) {
                // document.getElementById('min-range-value1').innerHTML = 'Min: ' + values[0];
                // document.getElementById('max-range-value1').innerHTML = 'Max: ' + values[1];
                // document.getElementById('current-range-value1').innerHTML = 'Current: ' + values[handle];
            });


            var minRangeValue2 = <?= $minMaxValues['rooms']['min'] ?>;
            var maxRangeValue2 = <?= $minMaxValues['rooms']['max'] ?>;
            var rangeSlider2 = document.getElementById('range-slider2');
            noUiSlider.create(rangeSlider2, {
                start: [minRangeValue2, maxRangeValue2],
                connect: true,
                range: {
                    'min': minRangeValue2,
                    'max': maxRangeValue2
                },
                tooltips: [true, true],
                format: {
                    to: function(value) {
                        return value.toFixed(0);
                    },
                    from: function(value) {
                        return value;
                    }
                }
            });


            var minRangeValue3 = <?= $minMaxValues['floors']['min'] ?>;
            var maxRangeValue3 = <?= $minMaxValues['floors']['max'] ?>;
            var rangeSlider3 = document.getElementById('range-slider3');
            noUiSlider.create(rangeSlider3, {
                start: [minRangeValue3, maxRangeValue3],
                connect: true,
                range: {
                    'min': minRangeValue3,
                    'max': maxRangeValue3
                },
                tooltips: [true, true],
                format: {
                    to: function(value) {
                        return value.toFixed(0);
                    },
                    from: function(value) {
                        return value;
                    }
                }
            });

            var minRangeValue4 = <?= $minMaxValues['price']['min'] ?>;
            var maxRangeValue4 = <?= $minMaxValues['price']['max'] ?>;
            var rangeSlider4 = document.getElementById('range-slider4');
            noUiSlider.create(rangeSlider4, {
                start: [minRangeValue4, maxRangeValue4],
                connect: true,
                range: {
                    'min': minRangeValue4,
                    'max': maxRangeValue4
                },
                tooltips: [true, true],
                format: {
                    to: function(value) {
                        value = value/1000;
                        return value.toFixed(0);
                    },
                    from: function(value) {
                        return value;
                    }
                }
            });
</script>
    </section>
@endsection
