<?php

require_once __DIR__ . '/../Model/Model.php';
require_once __DIR__ . '/../Model/Posts.php';

$id = $_GET["id"];
$posts = new Posts();
if (isset($id)) {
    $posts = $posts->delete($id);
    if ($posts) {
        echo
        '<script>;
        window.location.href = "./../views/dashboard/index-posts.php";</script>';
    }
}