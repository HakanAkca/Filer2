<?php

require_once('model/user.php');

function login_action()
{
    $error = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (user_check_login($_POST)) {
            user_login($_POST['username']);
            header('Location: ?action=home');
            exit(0);
        } else {
            $error = "Invalid username or password";
        }
    }
    require('views/login.php');
}

function logout_action()
{
    session_destroy();
    header('Location: ?action=login');
    exit(0);
}


function register_action()
{
    $error = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (user_check_register($_POST)) {
            user_register($_POST);
            header('Location: ?action=login');
            exit(0);
        } else {
            $error = "Invalid data";
        }
    }
    require('views/register.php');
}

function home_action()
{

    if (!empty($_SESSION['user_id'])) {

        $data = show_upload_img2();

        require('views/home.php');
    } else {
        header('Location: ?action=login');
    }
}

function profil_action()
{
    $error = '';
    if (!empty($_SESSION['user_id'])) {
        if (check_upload()) {
            header("Refresh:0");
            exit(0);
        }

        if (delete_file()) {
            header("Refresh:0");
            exit(0);
        }

        if (rename_file()) {
            header("Refresh:0");
            exit(0);
        }

        if (file_replace()){
            header("Refresh:0");
            exit(0);
        }
        if (add_folder()){
            exit(0);
        }
        if (delete_dir()){
            exit(0);
        }
        $data = show_upload_img();

        require('views/profil.php');
    } else {
        header('Location: ?action=login');
    }
}