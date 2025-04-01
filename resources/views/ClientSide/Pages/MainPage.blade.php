<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="MainPage.css">
    <title>Client Page</title>
</head>
<body>
    <h1>Client ni  siya</h1>
    <form action="{{route('LogoutClient')}}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
