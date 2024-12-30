<?php

$message = $_SESSION['message'] ?? '';

// 1. Receive the forms with e-mail and password
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $validation = Validation::validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ], $_POST);

    if ($validation->notApproved('account')) {
        header('Location: /account');
        exit();
    }

    // 2. Make an consult on db with e-mail and password
    $user = $database->query(query: "SELECT * FROM users 
                                WHERE email = :email",
                            class: User::class,
                            params: compact('email')
                            )->fetch();


    // 3. if exists, add on session the user and confirm authentication
    if ($user) {
        // Password validation
        $passwordPost = $_POST['password'];
        $passwordHash = $user->password;

        if (!password_verify($passwordPost, $passwordHash)) {
           flash()->push('validations_login', ['User or password incorrect. Try again.']);
           header('location: /account');
           exit(); 
        }

        $_SESSION['auth'] = $user;
        // 4. change info on navbar to show users name and info
        flash()->push('message', 'Welcome, '.$user->name.'!');
        header('Location: /');
        exit();
    }
}

view('account');