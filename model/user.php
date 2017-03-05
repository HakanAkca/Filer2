<?php

require_once('model/db.php');

function get_user_by_id($id)
{
    $id = (int)$id;
    $data = find_one("SELECT * FROM users WHERE id = " . $id);
    return $data;
}

function get_user_by_username($username)
{
    $data = find_one_secure("SELECT * FROM users WHERE username = :username",
        ['username' => $username]);
    return $data;
}

function user_check_register($data)
{
    if (empty($data['username']) OR empty($data['email']) OR empty($data['password']))
        return false;
    $data = get_user_by_username($data['username']);
    if ($data !== false)
        return false;
    // TODO : Check valid email
    return true;
}

function user_hash($pass)
{
    $hash = password_hash($pass, PASSWORD_BCRYPT, ['salt' => 'saltysaltysaltysalty!!']);
    return $hash;
}

function user_register($data)
{
    $user['username'] = $data['username'];
    $user['password'] = user_hash($data['password']);
    $user['email'] = $data['email'];
    db_insert('users', $user);
    mkdir("uploads/" . $user['username']);
}

function user_check_login($data)
{
    if (empty($data['username']) OR empty($data['password']))
        return false;
    $user = get_user_by_username($data['username']);
    if ($user === false)
        return false;
    $hash = user_hash($data['password']);
    if ($hash !== $user['password']) {
        return false;
    }
    return true;
}

function user_login($username)
{
    $data = get_user_by_username($username);
    if ($data === false)
        return false;
    $_SESSION['user_id'] = $data['id'];
    $_SESSION['user_name'] = $data['username'];
    return true;
}

function check_upload()
{
    $exist_deja = true;
    $format_accepte = false;
    if (($_FILES['file']['type'] == 'image/jpeg') || ($_FILES['file']['type'] == 'image/png') || ($_FILES['file']['type'] == 'image/jpg') || $_FILES['file']['type'] == 'text/plain') {
        $format_accepte = true;
        if (file_exists('uploads/' . $_SESSION['user_name'] . '/' . $_FILES['file']['name'])) {
            $exist_deja = true;
        } else {
            $exist_deja = false;
            if ($_POST['add_name'] == '') {
                if (move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_SESSION['user_name'] . '/' . $_FILES['file']['name'])) {
                    $name['name'] = $_FILES['file']['name'];
                    $name['url'] = 'uploads/' . $_SESSION['user_name'] . '/' . $name['name'];
                    $name['id_user'] = $_SESSION['user_id'];
                    db_insert('image', $name);
                    $date = take_date();
                    $write = $date . ' -- ' . $_SESSION['user_name'] . " upload " . $_FILES['file']['name'] . "\n";
                    watch_action_log('access.log', $write);
                }
            } else {
                $name_file = $_FILES['file']['name'];
                $extension = strrchr($name_file, '.');
                $name['name'] = $_POST['add_name'] . $extension;
                $name['url'] = 'uploads/' . $_SESSION['user_name'] . '/' . $name['name'];
                $name['id_user'] = $_SESSION['user_id'];
                db_insert('image', $name);
                move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_SESSION['user_name'] . '/' . $name['name']);
                $date = take_date();
                $write = $date . ' -- ' . $_SESSION['user_name'] . " upload " . $_POST['add_name'] . $extension . "\n";
                watch_action_log('access.log', $write);
            }
        }
    }
}

function show_upload_img()
{
    $id_users = $_SESSION['user_id'];
    $data = find_all_secure("SELECT * FROM image WHERE id_user = :id_user", ['id_user' => $id_users]);
    return $data;
}

function show_upload_img2()
{
    $data = find_all_secure("SELECT * FROM image");
    return $data;
}

function delete_file()
{
    if ($_POST['delete_file']) {
        $url = $_POST['file_name'];
        $delete = find_one_secure("DELETE FROM image WHERE url = :url", ['url' => $url]);
        unlink("$url");
        $date = take_date();
        $write = $date . ' -- ' . $_SESSION['user_name'] . " " . $url . ' has deletted.' . "\n";
        watch_action_log('access.log', $write);
        return $delete;
    }
}

function rename_file()
{
    if (isset($_POST['change_url'])) {
        $id_users = $_SESSION['user_id'];
        $a = $_POST['changeurl'];
        $b = $_POST['changename'];
        $new_name = $_POST['change'] . strrchr($b, '.');
        $new_url = 'uploads/' . $_SESSION['user_name'] . '/' . $_POST['change'] . strrchr($a, '.');
        if (!find_one_secure("UPDATE image SET name = :new_name , url = :new_url  WHERE id_user = :id_user AND url = :a",
            ['new_name' => $new_name,
                'new_url' => $new_url,
                'a' => $a,
                'id_user' => $id_users])
        ) {
            rename($a, $new_url);
            $date = take_date();
            $write = $date . ' -- ' . $_SESSION['user_name'] . " change " . $b . ' to ' . $new_name . "\n";
            watch_action_log('access.log', $write);
            return true;
        }
    }
}

function file_replace()
{

    if (isset($_POST['send_replace'])) {
        $id_users = $_SESSION['user_id'];
        $new_file_name = $_FILES['add']['name'];
        $new_file_url = 'uploads/' . $_SESSION['user_name'] . "/" . $new_file_name;
        $file_name = $_POST['replace_img'];
        $file_url = 'uploads/' . $_SESSION['user_name'] . "/" . $file_name;
        $file_tmp_name = $_FILES['add']['tmp_name'];
        if (!find_one_secure("UPDATE image SET `name` = :new_file_name , `url` = :new_file_url WHERE `id_user` = :id_users AND `name` = :file_name",
            ['new_file_name' => $new_file_name,
                'new_file_url' => $new_file_url,
                'file_name' => $file_name,
                'id_users' => $id_users])
        ) {
            move_uploaded_file($file_tmp_name, $new_file_url);
            unlink($file_url);
            $date = take_date();
            $write = $date . ' -- ' . $_SESSION['user_name'] . " change " . $new_file_name . ' to ' . $file_name . "\n";
            watch_action_log('access.log', $write);
            return true;

        }
    }
}

function add_folder()
{
    if (isset($_POST['create_dir'])) {
        if (isset($_POST['name_dir']) AND $_POST['name_dir'] !== '') {
            $name_folder = $_POST['name_dir'];
            $url = 'uploads/' . $_SESSION['user_name'] . '/' . $name_folder;
            mkdir($url, 0700);
            $date = take_date();
            $write = $date . ' -- ' . $_SESSION['user_name'] . " create folder " . $name_folder . "\n";
            watch_action_log('access.log', $write);
        }
    }
}

function delete_dir()
{
    if ($_POST['delete_dir']) {
        $name_folder = $_POST['delete_name_dir'];
        $url = 'uploads/' . $_SESSION['user_name'] . '/' . $name_folder;
        unlink("$url");
        $date = take_date();
        $write = $date . ' -- ' . $_SESSION['user_name'] . " " . $url . ' folder has deletted.' . "\n";
        watch_action_log('access.log', $write);
    }
}
