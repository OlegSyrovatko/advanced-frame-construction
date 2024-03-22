<p>Привіт</p>
<p>ім'я {{ $username }}</p>
<p>телефон {{ $tel }}</p>
@foreach($datalist as $item)
<p> {{ $item }}</p>
@endforeach
