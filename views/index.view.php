<form class="w-full flex justify-between space-x-2 mt-6">
    <div class="text-2xl">Explore</div>
    <div class="relative w-full max-w-sm">
        <input 
            type="text"
            class="form-control w-full pl-10 pr-4 py-2 ml-2 border border-purple-900 rounded-md bg-transparent text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 placeholder-gray-200" 
            placeholder="Search..." 
            name="search" 
        />
        <button 
            class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 focus:outline-none" 
            type="submit">
            <img src="/icons/magnifying-glass.svg" alt="" class="w-5 h-5">
        </button>
    </div>
</form>
<!-- Movie list -->
<section class="grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
    <!-- Movie -->
    <?php foreach ($movies as $movie) {
        require_once 'partials/_movie.php';
    } ?>
</section>
