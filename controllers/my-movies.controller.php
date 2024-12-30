<?php

if (!auth()) {
    header('Location: /');
    exit();
}

$movies = Movie::my(auth()->id);

view('my-movies', compact('movies'));
