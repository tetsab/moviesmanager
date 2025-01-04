<?php

if (!auth()) {
    header('Location: /');
    exit();
}

$user_id = auth()->id;
$movie_id = $_POST['movie_id'];
$rating = $_POST['rating'];
$review = $_POST['review'];

$validation = Validation::validate([
    'rating' => ['required'],
    'review' => ['required'],
], $_POST);

if ($validation->notApproved()) {
    header('Location: /movie?id='.$movie_id);
    exit();
}

$database->query("
    insert into ratings (user_id, movie_id, review, rating)
    values (:user_id, :movie_id, :review, :rating)
", params: compact('user_id', 'movie_id', 'review', 'rating'));

flash()->push('message', 'Rating successfully added!');
header('Location: /movie?id='.$movie_id);
exit();
