<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <!--Styles-->
    <link rel="stylesheet" href="{{ url('/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrap">
        <header>
            <nav class="navbar navbar-expand">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/"><img src="{{ url('/img/logo.png') }}" width="229px" height="91px"></a>
                    <ul class="navbar-nav">
                        <li class="nav-item {{ request()->segment(1) == '' ? 'active' : '' }}">
                            <a class="nav-link" href="/">Trang chủ</a>
                        </li>
                        <li class="nav-item {{ request()->segment(1) == 'su-kien' ? 'active' : '' }}">
                            <a class="nav-link" href="/su-kien">Sự kiện</a>
                        </li>
                        <li class="nav-item {{ request()->segment(1) == 'lien-he' ? 'active' : '' }}">
                            <a class="nav-link" href="/lien-he">Liên hệ</a>
                        </li>
                    </ul>
                    <span class="navbar-text">
                        <img src="{{ url('/img/phone-white.png') }}" width="28px"> &nbsp; 0123456789
                    </span>
                </div>
            </nav>
        </header>
        <main class="p-5">
            @yield('content')
        </main>
    </div>
</body>

</html>
