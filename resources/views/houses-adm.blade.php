@extends("layouts/app")
@section("title")
    Адміністрування
@endsection
@section("content")
    <section class="section">
        <div class="container">
            <br /><br /><br /><br /><br />
            <h1><a href="/admafc">Головне меню</a></h1><br />
            @if(session('success'))
                <b style="color: #4caf50">{{ session('success')  }}</b>
            @endif
            <form class="house-form" action="{{ route('houses-store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <label for="title">Назва будинку:</label>
                <input class="house-input" type="text" name="title" id="title" required>

                <label for="area">Площа:</label>
                <input class="house-input" type="number" step="0.01" name="area" id="area" required>

                <label for="price">Ціна:</label>
                <input class="house-input" type="number" step="0.01" name="price" id="price" required>

                <label for="description">Опис:</label>
                <textarea class="house-input" name="description" id="description" required><b>Зверніть увагу!</b>
<p>Проект та візуалізація входять у вартість за умови подальшого замовлення будинку.</p>
<p>Вартість дійсна на момент подачі пропозиції і уточняється в день оплати. </p>
<p>Кінцева вартість за пропозицією визначається після розробки проектної документації, візуалізації та погодження специфікації. </p>
</textarea>

                <label for="photos">Фотографії будинку:</label>
                <input class="house-input" type="file" name="photos[]" id="photos" multiple accept="image/*" required>

                <label for="cover_photo">Обрати обкладинку альбому:</label>
                <input class="house-input" type="file" name="cover_photo" id="cover_photo" accept="image/*">
                <input type="hidden" name="works" value="default_value_for_works">
                <input type="hidden" name="other_works" value="default_value_for_other_works">
                <button class="house-button" type="submit">Додати</button>
            </form>
        </div>
    </section>
@endsection
