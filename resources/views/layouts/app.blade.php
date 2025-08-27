<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} @yield('title')</title>

    <link rel="icon"
        href="https://www.opinionbox.com/wp-content/themes/institucional/assets/ico/apple-touch-icon-144-precomposed-2.png"
        type="image/png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <style>
        .custom-gradient {
            background-image: linear-gradient(135deg, rgb(119, 119, 119)0%, rgb(155, 81, 224) 100%);
        }

        .main-background {
            background-image: linear-gradient(135deg,
                    #9b51e0 20%,
                    rgb(0, 0, 0) 100%);
        }

        .main-text-color {
            color: rgb(255, 245, 137);
        }

        .main-font {
            font-family: 'Poppins'
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>

<body class="h-dvh w-full bg-gray-200 box-border main-font">
    <header>

    </header>
    <main class="h-full w-full flex flex-col justify-center items-center ">
        @yield('content')
    </main>

    <footer>

    </footer>

</body>

</html>
