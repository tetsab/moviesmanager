<?php if(auth()): ?>
<div class="flex justify-between items-center">
    <h1 class="mt-6 font-bold text-lg">My Movies</h1>
    <div class="flex items-center space-x-4">
        <div class="relative w-full max-w-sm">
            <input 
                type="text"
                class="form-control w-full pl-10 pr-4 py-2 rounded-md bg-transparent border border-gray-900 text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 placeholder-gray-200" 
                placeholder="Search..." 
                name="search"/>
            <button 
                class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 focus:outline-none" 
                type="submit">
                <img src="/icons/magnifying-glass.svg" alt="magnifying glass icon" class="w-5 h-5">
            </button>
        </div>
        <button 
            type="button" 
            class="px-4 py-2 rounded-md bg-purple-500 text-white font-bold hover:bg-purple-600 flex items-center space-x-2"
            style="height: 42px;"
            onclick="window.location.href='/movies-create'" >
            <span class="text-xl font-bold">+</span>
            <span>Add</span>
        </button>
    </div>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-6">
    <?php foreach ($movies as $movie): ?>
        <div class="movie-container">
            <?php require 'partials/_movie.php'; ?>
        </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>
