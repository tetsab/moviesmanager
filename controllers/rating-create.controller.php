<?php

if (!auth()) {
    header('Location: /');
    exit();
}

view('rating-create');
