@extends("layouts/app")
@section("title")
    {{__('messages.home')}}
@endsection
@section("content")

    <section class="section hero">
        <div class="container">
            <h1 class="hero__title">Advanced Frame Construction</h1><br>
            {{__('messages.do-house')}}<br><br>
            <button type="button" class="order-button" data-modal-open>{{__('messages.order')}}</button>
        </div>
    </section>

    @include("inc.adv")

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
