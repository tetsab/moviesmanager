<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account</title>
    <script src="/assets/js/account.js"></script>
</head>
<body>
    <div class="mt-6 grid grid-cols-2 gap-2">
        <div class="rounder">
            <img src="/images/site/Login.png" alt="">
        </div>

        <div class="flex items-center justify-center bg-gray-950">
            <div class="rounded-md w-full max-w-sm">
                <div class="btn-group flex text-stone-400 font-bold px-4 py-2 items-center justify-center space-x-4" role="group">
                    <button 
                        type="button" 
                        class="btn flex-1 px-4 py-2 text-stone-400 bg-purple-500/20 hover:bg-stone-800 transition-all"
                        onclick="setMode('login')">
                        Login
                    </button>
                    <button 
                        type="button" 
                        class="btn flex-1 px-4 py-2 text-stone-400 bg-purple-500/20 hover:bg-stone-800 transition-all"
                        onclick="setMode('register')">
                        Register
                    </button>
                </div>

                <div id="account-section">
                    <?php
                    // Default login
                    $mode = $_GET['mode'] ?? 'login';

                    if ($mode === 'login') {
                        require '../views/partials/_login.php';
                    } elseif ($mode === 'register') {
                        require '../views/partials/_register.php';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
