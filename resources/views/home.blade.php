<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a   href="{{ route('auth.socialite.redirect','google') }}" >
    login with Gmail

</a>
<hr>
<a   href="{{ route('auth.socialite.redirect','facebook') }}" >
    login with facebook

</a>
</body>
</html>