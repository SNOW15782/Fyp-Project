<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ratings</title>
    @vite('resources/css/app.css')
</head>
<body>
    <h1>All Ratings</h1>
    <ul>
        @foreach($ratings as $rating)
            <li>{{ $rating->rating }}</li>
        @endforeach
    </ul>
</body>
</html>
