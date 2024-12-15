<?php
require_once __DIR__ . '/../../Model/Model.php';
require_once __DIR__ . '/../../Model/Category.php';

if (!isset($_SESSION["full_name"])) {
    header("Location: login.php");
    exit;
}

$id = $_GET["id"];
$category = new Category();
$category_find = $category->find($id);

if (isset($_POST["submit"])) {
    $datas = [
        "name_category" => $_POST["name_category"],
    ];

    $category = $category->update($id, $datas);

    if (gettype($category) == "string") {
        echo $category;
      }else{
        echo "<script>window.location.href = '../dashboard/index-kategori.php';</script>";
      }
}
?>


<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Kategori - Windmill Dashboard</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script
        src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
        defer></script>
    <script src="../../assets/js/init-alpine.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div
        class="flex h-screen bg-gray-50 dark:bg-gray-900"
        :class="{ 'overflow-hidden': isSideMenuOpen }">

        <!-- Sidebar -->
        <?php include('../../layouts/sidebar.php') ?>

        <!-- Main Content -->
        <div class="flex flex-col flex-1">
            <!-- Header -->
            <?php include('../../layouts/header.php') ?>

            <!-- Main Section -->
            <main class="h-full pb-16 overflow-y-auto">
                <div class="container px-6 mx-auto">
                    <!-- Page Title -->
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Tambah Kategori
                    </h2>

                    <!-- Form Section -->
                    <div class="flex flex-wrap items-center justify-between gap-6">
                        <!-- Image Section -->
                        <div class="w-full md:w-[40%]">
                            <img
                                src="./../../assets/img/create-account-office-dark.jpeg"
                                alt="Ilustrasi Kategori"
                                class="w-full h-auto rounded-lg shadow-md" />
                        </div>

                        <!-- Form Section -->
                        <div class="w-full md:w-[55%]">
                            <form
                                action=""
                                method="post"
                                class="bg-white p-6 rounded-lg shadow-md dark:bg-gray-800">

                                <!-- Input Group -->
                                <div class="space-y-4">
                                    <!-- Nama Kategori -->
                                    <div>
                                        <label
                                            for="name_category"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                            Nama Kategori
                                        </label>
                                        <input
                                            type="text"
                                            id="name_category"
                                            value="<?= $category_find[0]["name_category"] ?>"
                                            name="name_category"
                                            placeholder="Masukkan nama kategori"
                                            required
                                            class="mt-1 block w-full px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-purple-400 focus:ring-purple-300 focus:outline-none focus:ring focus:ring-opacity-40" />
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <button
                                    name="submit"
                                    type="submit"
                                    class="mt-6 w-full px-4 py-2 text-sm font-medium leading-5 text-white bg-purple-600 border border-transparent rounded-lg hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                    Tambah
                                </button>
                            </form>
                        </div>
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