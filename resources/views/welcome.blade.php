<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ibnu Halim Mustofa</title>

        <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::asset('css/icons/flaticon.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    </head>
    <body class="bg-image bg-top sm:bg-center bg-no-repeat bg-cover bg-fixed">
        <div class="mx-auto sm:w-full min-h-screen flex flex-col sm:justify-center">
            <h1 class="mt-6 sm:mt-0 uppercase text-blue-one text-5xl font-bold text-center tracking-widest" style="font-size: 5.65rem">
                <span class="block">Coming</span>
                <span class="block -mt-10">Soon</span>
            </h1>
            <h2 class="text-center mt-8 text-3xl text-blue-two tracking-wider">
                <span class="block">
                    I will launch my new website
                </span>
                <span>very soon!</span>
            </h2>
            <ul class="block mt-6 text-center">
                <li class="inline-block mx-3">
                    <a href="https://github.com/ibnuhalimm" target="_blank" class="block text-pink-one hover:text-pink-two p-1">
                        <i class="flaticon-github"></i>
                    </a>
                </li>
                <li class="inline-block mx-3">
                    <a href="mailto:ibnuhalimm@gmail.com" target="_blank" class="block text-pink-one hover:text-pink-two p-1">
                        <i class="flaticon-email"></i>
                    </a>
                </li>
                <li class="inline-block mx-3">
                    <a href="https://linkedin.com/in/ibnuhalimm" target="_blank" class="block text-pink-one hover:text-pink-two p-1">
                        <i class="flaticon-linkedin"></i>
                    </a>
                </li>
                <li class="inline-block mx-3">
                    <a href="https://instagram.com/ibnuisdev" target="_blank" class="block text-pink-one hover:text-pink-two p-1">
                        <i class="flaticon-instagram"></i>
                    </a>
                </li>
                <li class="inline-block mx-3">
                    <a href="https://twitter.com/ibnuisdev" target="_blank" class="block text-pink-one hover:text-pink-two p-1">
                        <i class="flaticon-twitter"></i>
                    </a>
                </li>
            </ul>
            <p class="text-gray-600 sm:text-gray-400 mt-32 sm:mt-40 text-center text-xs tracking-wider">
                Credits Image By pawel-czerwinski (Unsplash)
            </p>
        </div>
    </body>
</html>
