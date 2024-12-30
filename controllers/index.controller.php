<?php

if (auth()) {
    require_once '../database.php';

    $search = isset($_REQUEST['search']) ? $_REQUEST['search'] : null;

    $movies = Movie::all($search);

    view('index', compact('movies'));
} else {
    view('account');
}

?>