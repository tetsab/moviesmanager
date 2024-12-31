<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $validation = Validation::validate([
        'name' => ['required'],
        'email' => ['required', 'email', 'unique:users'],
        'password' => ['required', 'min:8', 'max:30', 'strong'],
    ], $_POST);

    if ($validation->notApproved('register')) {
        header('Location: /account?mode=register');
        exit();
    }

    $database->query(
        query: "INSERT INTO users (name, email, password) 
        VALUES (:name, :email, :password)",
        params: [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
        ]
    );

    flash()->push('message', 'Registered successfully!');
    header('Location: /account');
    exit();
}

header('Location: /account');
exit();
