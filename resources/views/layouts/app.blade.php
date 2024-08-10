<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benzatch - @yield("title")</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Upright:wght@400;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body>
    @include("layouts.header")
    <main>
        @yield("content")
    </main>

    <script>
        <!-- JavaScript to toggle menu visibility -->
        document.getElementById('menu-button').addEventListener('click', function() {
            const menu = document.getElementById('menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
