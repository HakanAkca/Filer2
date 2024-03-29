<?php

require_once('model/user.php');

function login_action()
{
    $error = '';
    if(isset($_SESSION['user_id'])){
        header('Location: ?action=home');
        exit(0);
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (user_check_login($_POST)) {
            user_login($_POST['username']);
            header('Location: ?action=home');
            exit(0);
        } else {
            $error = "Invalid username or password";
            $date = take_date();
            $write = $date . ' -- ' . 'Invalid username or Password' . "\n";
            watch_action_log('security.log', $write);
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
            $date = take_date();
            $write = $date . ' -- ' . $_SESSION['user_name'] . ' Illegal data in register' . "\n";
            watch_action_log('security.log', $write);
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
        $date = take_date();
        $write = $date . ' -- ' . 'Illegal route Login to Home' . "\n";
        watch_action_log('security.log', $write);
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

        if (change_name()){
            exit(0);
        }
        $file = listFolders();
        $data = show_upload_img();

        require('views/profil.php');
    } else {
        $date = take_date();
        $write = $date . ' -- ' . $_SESSION['user_name'] . ' Illegal route Login to Profil' . "\n";
        watch_action_log('security.log', $write);
        header('Location: ?action=login');
    }
}