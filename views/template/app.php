<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Movies Manager</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body class="bg-gray-950 text-stone-200">
        <header class="bg-gray-950">
            <nav class="mx-auto max-w-screen-lg flex justify-between py-4">
                <div class="font-bold text-xl tracking-wide"><img src="images/Logo.svg" alt="logo site" style="max-width: 45px;"></div>
                <ul class="flex space-x-4 font-bold">
                    <li><a href="/" class="text-purple-500 bg-opacity-30 btn bg-purple-900  hover:bg-purple-700 hover:underline">Explore</a></li>
                    <?php if(auth()): ?>
                        <li><a href="/my-books" class="text-purple-500 bg-opacity-30 btn bg-purple-900  hover:bg-purple-700 hover:underline">My Movies</a></li>
                    <?php endif;?>
                </ul>
                <ul class="flex items-center space-x-2">
                    <?php if (auth()) :?>
                        <li>Hello, <?=auth()->name?>!</li>
                        <li><a href="/logout" class="bg-opacity-30 hover:underline">
                            <img src="icons/sign-out-light.svg" class="opacity-70 hover:opacity-100" alt="icon sign out" style="max-width: 25px;"></a>
                        </li>
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