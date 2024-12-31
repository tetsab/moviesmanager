<h1 class="text-stone-400 font-bold px-4 py-2">Create a new account</h1>
<form class="p-4 space-y-4" action="/register?mode=register" method="POST">
    <?php if ($validations = flash()->get('validations_register')): ?>
        <div class="border-red-800 bg-red-900 text-red-400 px-4 py-1 rounded-md border-2 text-sm font-bold">
            <ul>
                <li>Error</li>
                <?php foreach ($validations as $validation): ?>
                    <li><?=$validation?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <div class="flex flex-col relative">
        <div class="absolute inset-y-0 left-2 flex items-center">
            <img src="icons/user.svg" alt="user icon" class="w-4 h-4">
        </div>
        <input 
            type="text"
            name="name" 
            class="form-control border-gray-900 border-2 bg-transparent rounded-md text-sm text-gray-400 focus:text-gray-400 focus:outline-none py-1 pl-8"
            placeholder="Name">
    </div>
    <div class="flex flex-col relative">
        <div class="absolute inset-y-0 left-2 flex items-center">
            <img src="icons/envelope.svg" alt="email icon" class="w-4 h-4">
        </div>
        <input 
            type="text"
            name="email" 
            class="form-control border-gray-900 border-2 bg-transparent rounded-md text-sm text-gray-400 focus:text-gray-400 focus:outline-none py-1 pl-8"
            placeholder="Login">
    </div>
    <div class="flex flex-col relative">
        <div class="absolute inset-y-0 left-2 flex items-center">
            <img src="icons/password.svg" alt="password icon" class="w-4 h-4">
        </div>
        <input 
            type="password"
            name="password" 
            placeholder="Password"
            class="form-control border-gray-900 border-2 bg-transparent rounded-md text-gray-400 focus:text-gray-400 text-sm focus:outline-none py-1 pl-8">
    </div>
    <button 
        class="border-purple-500 bg-purple-500 text-white px-4 py-1 rounded-md border-2 hover:bg-stone-800 w-full" 
        type="submit">
        Register
    </button>
</form>
