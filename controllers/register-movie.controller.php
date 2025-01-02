<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('location: /');
    exit();
}

if (!auth()) {
    abort(403);
}

$user_id = auth()->id;
$title = isset($_POST['title']) ? $_POST['title'] : null;
$description = isset($_POST['description']) ? $_POST['description'] : null;
$year_release = isset($_POST['year_release']) ? intval($_POST['year_release']) : null;

$validationMovie = Validation::validate([
    'title' => ['required', 'min:3'],
    'description' => ['required'],
    'categories' => ['required'],
    'year_release' => ['required'],
], $_POST);

if ($validationMovie->notApproved()) {
    header('Location: /movies-create');
    exit();
}


if (!!$_FILES) {
    $newName = md5(rand());
    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $image = "images/$newName.$ext";
    move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/../public/' . $image);
} else {
    $image = null;
}


$database->query(
"insert into movies (title, description, year_release, user_id, image)
values (:title, :description, :year_release, :user_id, :image)",
params: compact('title', 'description', 'year_release', 'user_id', 'image')
);

flash()->push('message', 'Movie registered successfully!');
header('Location: /my-movies');
exit();
