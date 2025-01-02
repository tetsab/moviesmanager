<?php

if (!auth()) {
    header('Location: /');
    exit();
}

$categories = $database->query("SELECT * FROM categories")->fetchAll();

view('movies-create-screen', ['categories' => $categories]);
