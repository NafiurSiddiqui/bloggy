<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home -Bloggy</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <nav class="">
        <h1 class="font-bold text-2xl">Katya's Bloggy 💕 </h1>
        <ul class="borderTest">
            <li>All Posts</li>
            <li>Topics</li>
        </ul>
    </nav>
    <main class="borderTest">
        <section>
            Featured Posts
        </section>
        <section>
            What's hot Posts
        </section>

        <section>
            All Posts
        </section>


        <aside>
            Trending Posts?
        </aside>

    </main>

    <footer class="borderTest">
        The footer
    </footer>
    </body>
</html>
