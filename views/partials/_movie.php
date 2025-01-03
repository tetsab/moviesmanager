<head>
    <link rel="stylesheet" href="assets/css/_movies.css">
</head>
<body>
    <div class="grid">
        <?php foreach ($movies as $movie): ?>
            <div class="movie-container">
                <div class="rating-badge">
                    <span class="rating-number"><?= htmlspecialchars($movie->rating_analysis ?? '0') ?></span>
                    <span class="rating-out-of">/5</span>
                    <img src="icons/star.svg" alt="icon star">
                </div>

                <img src="<?= $movie->image ? htmlspecialchars($movie->image) : 'images/upload/default-image.jpg'; ?>" alt="Movie image">
                <div class="movie-title">
                    <a href="/movie?id=<?= $movie->id ?>" class="font-semibold hover:underline">
                        <?= htmlspecialchars($movie->title ?? 'Unknown Title') ?>
                    </a>
                    <br>
                    <small>
                        <?= htmlspecialchars($movie->category ?? 'None') ?> • <?= htmlspecialchars($movie->year_release) ?>
                    </small>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
