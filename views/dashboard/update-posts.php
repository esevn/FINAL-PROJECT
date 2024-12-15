<?php
require_once __DIR__ . '/../../Model/Model.php';
require_once __DIR__ . '/../../Model/Category.php';
require_once __DIR__ . '/../../Model/Posts.php';
require_once __DIR__ . '/../../Model/Users.php';

if (!isset($_SESSION["full_name"])) {
    header("Location: login.php");
    exit;
}

$id = $_GET["id"];

$category = new Category();
$category_all = $category->all();
$users = new Users();
$users_all = $users->all();
$posts = new Posts();
$posts_find = $posts->find($id);



if (isset($_POST["submit"])) {
    $datas = [
        "post" => $_POST,
        "files" => $_FILES
    ];


    $posts = $posts->update($id, $datas);

    if (gettype($posts) == "string") {
        echo $posts;
      }else{
        echo "<script>window.location.href = '../dashboard/index-posts.php';</script>";
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
    <!-- <link rel="stylesheet" href="./../../assets/css/tailwind.output.css" /> -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script
        src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
        defer></script>
    <script src="./../../assets/js/init-alpine.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <div
        class="flex h-screen bg-gray-50 dark:bg-gray-900"
        :class="{ 'overflow-hidden': isSideMenuOpen }">


        <!-- Sidebar -->
        <?php include('./../../layouts/sidebar.php') ?>

        <!-- Main Content -->
        <div class="flex flex-col flex-1">
            <!-- Header -->
            <?php include('./../../layouts/header.php') ?>

            <!-- Main Section -->
            <main class="h-full pb-16 overflow-y-auto">

                <div class="container px-6 mx-auto">
                    <!-- Page Title -->
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Tambah Posts
                    </h2>

                    <!-- Form Section -->
                    <div class="flex flex-wrap items-center justify-between gap-6">
                        <!-- Image Section -->
                        <div class="w-full md:w-[40%] h-full">
                            <img
                                src="./../../assets/img/create-account-office.jpeg"
                                alt="Ilustrasi Kategori"
                                class="w-full h-full rounded-lg shadow-md" />
                        </div>

                        <!-- Form Section -->
                        <div class="w-full md:w-[55%]">
                            <form
                                action=""
                                method="post"
                                class="bg-white p-6 rounded-lg shadow-md dark:bg-gray-800" enctype="multipart/form-data">


                                <!-- Input Group -->
                                <div class="space-y-4">
                                    <!-- Nama Kategori -->
                                    <div>
                                        <label
                                            for="title"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                            Judul
                                        </label>
                                        <input
                                            type="text"
                                            id="title"
                                            name="title"
                                            value="<?= $posts_find[0]["title"] ?>"
                                            placeholder="Masukkan judul"
                                            required
                                            class="mt-1 block w-full px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-purple-400 focus:ring-purple-300 focus:outline-none focus:ring focus:ring-opacity-40" />
                                    </div>

                                    <!-- Total Artikel -->
                                    <div>
                                        <label
                                            for="content"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                            Konten
                                        </label>
                                        <textarea
                                            id="content"
                                            name="content"
                                            placeholder="Masukkan konten"
                                            required
                                            class="mt-1 h-52 block w-full px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-purple-400 focus:ring-purple-300 focus:outline-none focus:ring focus:ring-opacity-40"><?= $posts_find[0]["content"] ?></textarea>
                                    </div>
                                    <div>
                                        <label
                                            for="file_upload"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                            Upload Gambar
                                        </label>
                                        <div class="mt-2 flex items-center">
                                            <label
                                                for="file_upload"
                                                class="flex items-center justify-center px-4 py-2 bg-purple-600 text-white text-sm font-medium rounded-lg shadow-md cursor-pointer hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:ring-opacity-75">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5 mr-2"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M4 3a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V3zm3 0a1 1 0 000 2h6a1 1 0 100-2H7zM5 16h10v1a1 1 0 01-1 1H6a1 1 0 01-1-1v-1zm2-8a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                Pilih File
                                            </label>
                                            <input
                                                id="file_upload"
                                                name="attachment"
                                                type="file"
                                                class="hidden">
                                            <span id="file_name" class="ml-3 text-sm text-gray-600 dark:text-gray-400">
                                                Tidak ada file yang dipilih
                                            </span>
                                        </div>
                                    </div>


                                    <div class="mt-4">
                                            <label
                                                for="user_select"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                                Pilih Author
                                            </label>
                                            <select
                                                id="user_select"
                                                name="user_id"
                                                required
                                                class="mt-1 block w-full px-4 py-2 text-sm bg-white border border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-purple-400 focus:ring-purple-300 focus:outline-none focus:ring focus:ring-opacity-40">
                                                <?php foreach ($users_all as $users): ?>
                                                    <option value="<?= $users["id_user"] ?>" <?php echo ($users["id_user"] == $posts_find[0]["user_id"]) ? ' selected="selected"' : '' ?>><?= $users["full_name"] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                    </div>
                                    <div class="mt-4">
                                        <label
                                            for="category_select"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                            Pilih Kategori
                                        </label>
                                        <select
                                            id="category_select"
                                            name="category_id"
                                            required
                                            class="mt-1 block w-full px-4 py-2 text-sm bg-white border border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-purple-400 focus:ring-purple-300 focus:outline-none focus:ring focus:ring-opacity-40">
                                            <?php foreach ($category_all as $category): ?>
                                                <option value="<?= $category["id_category"] ?>" <?php echo ($category["id_category"] == $posts_find[0]["category_id"]) ? 'selected="selected"' : '' ?>><?= $category["name_category"] ?></option>
                                            <?php endforeach; ?>
                                        </select>
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
    <script src="./../node_modules/preline/dist/preline.js"></script>
    <script>
        const fileInput = document.getElementById('file_upload');
        const fileName = document.getElementById('file_name');

        fileInput.addEventListener('change', () => {
            fileName.textContent = fileInput.files[0].name
            if (fileInput == String) {
                fileName.textContent = "Tidak ada file yang dipilih"
            }
        });

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