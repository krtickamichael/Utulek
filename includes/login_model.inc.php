<?php

declare(strict_types=1);

function get_user(string $username)
{
    $result = Db::getInstance()->setTable("user")->select(["*"], ["username_user" => $username])->results();
    return $result;
}
