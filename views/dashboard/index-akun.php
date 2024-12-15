<?php

require_once __DIR__ . '/../../Model/Model.php';
require_once __DIR__ . '/../../Model/Users.php';

if (!isset($_SESSION["full_name"])) {
    header("Location: login.php");
    exit;
}

$users = new Users();
$user = $users->find($_SESSION["id_user"]);


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
                        Info Akun
                    </h2>

                    <!-- Profile Section -->
                    <div class="bg-white rounded-lg shadow-md dark:bg-gray-800 p-6">
                        <!-- Avatar & Basic Info -->
                        <div class="flex flex-col items-center">
                            <img class="w-24 h-24 rounded-full" src="./../../public/img/users/<?= $user[0]['avatar'] ?>" alt="Avatar">
                            <h3 class="mt-4 text-lg font-semibold text-gray-800 dark:text-gray-200"><?= $user[0]['full_name'] ?></h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400"><?= $user[0]['bio'] ?></p>
                        </div>

                        <!-- Details Section -->
                        <div class="mt-6 space-y-4">
                            <div class="flex justify-between border-b pb-2">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-200">Email:</span>
                                <span class="text-sm text-gray-600 dark:text-gray-400"><?= $user[0]['email'] ?></span>
                            </div>
                            <div class="flex justify-between border-b pb-2">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-200">No HP:</span>
                                <span class="text-sm text-gray-600 dark:text-gray-400"><?= $user[0]['phone'] ?></span>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <!-- <div class="mt-6 flex space-x-4 justify-center">
                            <a href="update-akun.php">
                                <button
                                    class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none">
                                    Edit Profil
                                </button>
                            </a>
                            <button
                                class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none">
                                Logout
                            </button>
                        </div> -->
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        function logout(event) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "p-3 bg-green-500 text-white ml-2",
                    cancelButton: "p-3 bg-red-500 text-white mr-3"
                },
                buttonsStyling: false
            });
            swalWithBootstrapButtons.fire({
                title: "Apakah anda mau Logout??",
                text: "Klik YES jika ingin logout",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, of course!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire({
                        title: "Deleted!",
                        text: "Anda Berhasil Logout",
                        icon: "success"
                    });
                    setTimeout(() => {
                        window.location.href = 'logout.php';
                    }, 1200)
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelled",
                        text: "Anda Gagal Logout",
                        icon: "error"
                    });
                }
            });
        }
    </script>
</body>

</html>