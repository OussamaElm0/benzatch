<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benzatch - @yield("title")</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Upright:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body>
    @include("layouts.header")
    <main>
        @yield("content")
    </main>
    @include("layouts.footer")
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    @vite("resources/js/app.js")
    @vite("resources/js/typed.js")
</body>
</html>
