<?php

require_once __DIR__ . '/../Model/Model.php';
require_once __DIR__ . '/../Model/Category.php';

$id = $_GET["id"];
$category = new Category();
if (isset($id)) {
    $category = $category->delete($id);
    if ($category) {
        echo
        '<script>;
        window.location.href = "./../views/dashboard/index-kategori.php";</script>';
    }
}