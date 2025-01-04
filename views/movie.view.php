<script src="/assets/js/movie.js"></script>
<div class="flex flex-col lg:flex-row gap-6">
    <div class="flex-shrink-0 w-full lg:w-1/3">
        <img 
            src="<?= $movie->image ?>" 
            alt="<?= $movie->title ?>" 
            class="w-full max-h-[400px] object-cover rounded-lg shadow-lg">
    </div>

    <div class="flex-grow w-full lg:w-1/2 flex flex-col space-y-6">
        <button 
            class="px-4 py-2 bg-transparent text-gray-600 rounded hover:bg-gray-800 w-max"
            onclick="history.back()">
            ← Back
        </button>

        <h1 class="text-3xl font-bold text-white"><?= $movie->title ?></h1>
        <p class="text-gray-400">
            <span class="font-semibold">Category:</span> <?= $movie->category ?? "None" ?><br>
            <span class="font-semibold">Year:</span> <?= $movie->year_release ?>
        </p>

        <div class="flex items-center space-x-2">
            <span class="font-semibold text-gray-400">Rating:</span>
            <div class="flex">
                <?php 
                    echo $movie->rating_analysis ? str_repeat("⭐", $movie->rating_analysis) : "⭐ "; 
                    echo $movie->rating_analysis;
                    echo " (".$movie->count_analysis.")";
                ?>
            </div>
        </div>

        <p class="text-gray-300"><?= "Description: ".$movie->description ?></p>

        <?php if(auth()): ?>
            <button 
                class="px-4 py-2 bg-purple-600 text-white font-bold rounded hover:bg-purple-700 w-max"
                onclick="openModal()">
                Rate Movie
            </button>
        <?php endif; ?>
    </div>
</div>

<h2 class="text-2xl font-bold text-white mt-8">Ratings</h2>
<div class="space-y-4">
    <?php foreach ($ratings as $rating): ?>
        <div class="flex items-center gap-4 border border-gray-800 rounded-lg p-4 bg-gray-900">
            <img 
                src="<?= $rating->image ?? '/default-user.png' ?>" 
                alt="<?= $rating->name ?>" 
                class="w-12 h-12 rounded-full shadow-md">
            
            <div class="flex flex-col flex-grow">
                <span class="font-bold text-white"><?= $rating->name ?></span>
                <span class="text-gray-400 text-sm">
                    Movies Rated: <?= $rating->count_analysis ?>
                </span>
            </div>
            
            <div class="flex flex-col text-right">
                <div class="text-yellow-400">
                    <?= str_repeat("⭐", $rating->rating) ?>
                </div>
                <p class="text-gray-300 text-sm mt-1"><?= $rating->review ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php require 'rating-create.view.php'; ?>