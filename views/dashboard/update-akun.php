<?php
require_once __DIR__ . '/../../Model/Model.php';
require_once __DIR__ . '/../../Model/Users.php';

if (!isset($_SESSION['full_name'])) {
    header("Location: ../login.php");
    exit;
}

$id = $_SESSION['id_user'];

$users = new Users();
$user = $users->find($id); 

// echo '/public/img/users/' . $user[0]["avatar"];

// echo "<pre>";
// var_dump($user[0]["avatar"]);
// echo "</pre>";
// die();

if (isset($_POST["submit"])) {
    $datas = [
        "files" => $_FILES,
        "post" => $_POST
    ];

    $users = $users->update($id, $datas);

    if (gettype($users) == "string") {
        echo $users;
      }else{
        echo "<script>window.location.href = '../dashboard/index-akun.php';</script>";
      }

}

?>


<!DOCTYPE html>
<html lang="en" :class="{ 'theme-dark': dark }" x-data="data()">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Info Akun</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script
        src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
        defer></script>
    <script src="./../../assets/js/init-alpine.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-50 dark:bg-gray-900">

    <div class="flex h-screen" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Sidebar -->
        <?php include('./../../layouts/sidebar.php') ?>

        <!-- Main Content -->
        <div class="flex flex-col flex-1">
            <!-- Header -->
            <?php include('./../../layouts/header.php') ?>

            <!-- Main Section -->
            <main class="h-full pb-16 overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    <!-- Page Title -->
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Edit Profil
                    </h2>

                    <!-- Edit Profile Form -->
                    <div class="bg-white rounded-lg shadow-md dark:bg-gray-800 p-6">
                        <form action="" method="POST" enctype="multipart/form-data" class="space-y-6">
                            <!-- Avatar -->
                            <div class="flex flex-col items-center">
                                <img id="avatarPreview" class="w-24 h-24 rounded-full" src="../../public/img/users/<?= $user[0]["avatar"] ?>" alt="Avatar">
                                <label
                                    for="avatar"
                                    class="mt-4 px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 cursor-pointer">
                                    Ganti Foto
                                </label>
                                <input id="avatar" type="file" name="avatar" class="hidden" accept="image/*" onchange="previewAvatar(event)">
                            </div>

                            <!-- Full Name -->
                            <div>
                                <label for="full_name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                    Nama Lengkap
                                </label>
                                <input
                                    id="full_name"
                                    type="text"
                                    name="full_name"
                                    placeholder="Masukkan nama lengkap"
                                    required
                                    value="<?= $user[0]["full_name"] ?>"
                                    class="mt-1 block w-full px-4 py-2 text-sm border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                    Email
                                </label>
                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    placeholder="Masukkan email"
                                    required
                                    value="<?= $user[0]["email"] ?>"
                                    class="mt-1 block w-full px-4 py-2 text-sm border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                            </div>

                            <!-- Phone Number -->
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                    No HP
                                </label>
                                <input
                                    id="phone"
                                    type="text"
                                    name="phone"
                                    placeholder="Masukkan nomor HP"
                                    required
                                    value="<?= $user[0]["phone"] ?>"
                                    class="mt-1 block w-full px-4 py-2 text-sm border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                            </div>

                            <!-- Bio -->
                            <div>
                                <label for="bio" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                    Bio
                                </label>
                                <textarea
                                    id="bio"
                                    name="bio"
                                    placeholder="Ceritakan tentang dirimu"
                                    class="mt-1 block w-full h-40 px-4 py-2 text-sm border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50"><?= $user[0]["bio"] ?></textarea>
                            </div>

                            <!-- Submit Button -->
                            <button
                                name="submit"
                                type="submit"
                                class="w-full px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Simpan Perubahan
                            </button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>