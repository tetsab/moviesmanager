<?php

$movie = Movie::get($_GET['id']);

$ratings = $database
    ->query("
        SELECT 
        r.*,
        u.*,
            COUNT(r.id) AS count_analysis
        FROM ratings r
        LEFT JOIN users u ON u.id = r.user_id
        WHERE r.movie_id = :id
        GROUP BY r.id, u.id", 
    Rating::class, 
    ['id' => $_GET['id']])->fetchAll();
   
view('movie', compact('movie', 'ratings'));
