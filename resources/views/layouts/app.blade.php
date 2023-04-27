<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>@yield("title")</title>


</head>
@include("inc.header")

<body class="antialiased">
<main class="py-16 lg:py-20">
        <h1 style="color: #08e88b"><div style="text-align: center; margin: 10px;" >
                    @yield("content")
                </div></h1>
</main>
</body>

@include("inc.footer")
</html>
