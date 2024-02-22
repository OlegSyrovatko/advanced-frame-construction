<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title")</title>
    <link rel="stylesheet" href="/css/main.css">

    <link
        rel="apple-touch-icon"
        sizes="144x144"
        href="./apple-touch-icon.png"
    />
    <link
        rel="icon"
        type="image/png"
        sizes="32x32"
        href="./favicon-32x32.png"
    />
    <link
        rel="icon"
        type="image/png"
        sizes="16x16"
        href="./favicon-16x16.png"
    />
    <link rel="manifest" href="./site.webmanifest" />
    @include('sweetalert::alert')
</head>
<body>
<script src="/js/app-before.js"></script>
@include("inc.header")

@include("inc.messages")


@yield("content")


@include("inc.modal")


{{--@include("inc.footer") --}}



<script src="/js/mobile-menu.js"></script>
<script src="/js/modal.js"></script>
<script src="/js/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>
</html>
