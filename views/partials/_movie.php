<!-- List movies -->
<div class="p-2 rounded border-red-800 border-2 bg-red-950">
    <div class="flex gap-2">
        <div class="w-1/3 mr-4">
            <img src="<?=$movie->image?>" class="w-40 rounded" alt="movie image"/>
        </div>
        <div class="flex flex-col gap-1">
            <a href="/book?id=<?= $book->id ?>"
                class="font-semibold hover:underline"><?= htmlspecialchars($movie->title ?? 'Unknown Title') ?></a>
            <div class="text-xs italic"><?= htmlspecialchars($movie->writer ?? 'Unknown writer') ?></div>
            <div class="text-xs italic"><?= str_repeat("⭐", $movie->rating_analysis ?? 0) ?> (<?= $book->count_analysis ?? 0 ?> Ratings)</div>
        </div>
    </div>
    <div class="text-sm mt-2">
        <?= htmlspecialchars($movie->description ?? 'No description available.') ?>
    </div>
</div>
