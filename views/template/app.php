<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Book Wise</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-stone-950 text-stone-200">
        <header class="bg-red-950">
            <nav class="mx-auto max-w-screen-lg flex justify-between py-4">
                <div class="font-bold text-xl tracking-wide">Book Wise</div>
                <ul class="flex space-x-4 font-bold">
                    <li><a href="/" class="text-lime-500">Explore</a></li>
                    <?php if(auth()): ?>
                        <li><a href="/my-books" class="hover:underline">My Books</a></li>
                    <?php endif;?>
                </ul>
                <ul>
                    <?php if (auth()) :?>
                        <li>Hello, <?=auth()->name?>!</li>
                        <li><a href="/logout" class="hover:underline">Logout</a></li>
                    <?php else: ?>
                        <li><a href="/login" class="hover:underline">Login</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </header>

        <main class="mx-auto max-w-screen-lg space-y-6">
            <?php if ($message = flash()->get('message')): ?>
                <div class="border-green-800 bg-green-900 text-green-400 px-4 py-1 rounded-md border-2 text-sm font-bold">
                    <?=$message?>
                </div>
            <? endif; ?>
            <?php require "../views/{$view}.view.php";?>
        </main>
    </body>
</html>