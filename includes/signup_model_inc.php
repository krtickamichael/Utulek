<?php

declare(strict_types=1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);




function get_username(string $username)
{
    $result = Db::getInstance()->setTable("user")->select(["*"], ["username_user" => $username])->results();
    return $result;
}


function get_email(string $email)
{
    $result = Db::getInstance()->setTable("user")->select(["*"], ["email_user" => $email])->results();
    return $result;
}

function set_user(string $username, string $pwd, string $email)
{

    $options = ["cost" => 12];
    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);
    $result = Db::getInstance()->setTable("user")->insert(["username_user" => $username, "password_user" => $hashedPwd, "email_user" => $email]);
}
