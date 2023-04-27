<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>@yield("title")</title>
</head>
<body class="antialiased">
<main class="md:min-h-screen md:flex md:items-center md:justify-center py-16 lg:py-20">
<div class="container">
    <div class="text-center">
        <a href="{{ route("home") }}" class="inline-block" rel="home">
            <img class="mb-4" src="https://w-dog.ru/wallpapers/1/50/438770697847240/za-kot-noutbuk.jpg" alt="" width="300" height="150">
        </a>
    </div>
</div>
    <h1 style="color: #08e88b"><div style="text-align: center;">@yield("content")</div></h1>
</main>
</body>
</html>
