<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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

</head>
<body>
@include("inc.header")

@include("inc.messages")

<div style="margin-top: 70px; display: flex; gap: 10px;">
    <div style="width: 70%;">@yield("content")</div>
    <div style="width: 25%;">@include("inc.aside")</div>
</div>
@include("inc.footer")
<script type="module" src="./js/app.js"></script>
</body>
</html>