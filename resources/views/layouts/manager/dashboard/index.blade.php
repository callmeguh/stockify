<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Manajer</title>
</head>
<body>
    <p>Selamat datang pak manager</p>

    <!-- Tombol Logout -->
    <form action="{{ route('logout') }}" method="POST" style="margin-top:20px;">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
