<!doctype html>
<html class="scroll-smooth" lang="sk">
<head>
    <meta charset="utf-8"/>
    <meta title="stranka id-design" name="id-design" content="width=device-width, initial-scale=1.0" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ID-design</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="text-center">
@include("../components/header")
@include("../components/banner")
@include("../components/landing")
@include("../components/service")
@include("../components/numbers")
@include("../components/supply")
@include("../components/about")
@include("../components/contact")
@include("../components/map")
@include("../components/mail")
@include("../components/project")
@include("../components/footer")
</body>
</html>
