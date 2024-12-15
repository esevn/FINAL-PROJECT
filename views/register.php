<?php
require_once __DIR__ . '/../Model/Model.php';
require_once __DIR__ . '/../Model/Users.php';

$user = new Users();
if (isset($_POST['submit'])) {
  $datas = [
    'post' => $_POST,
    'files' => $_FILES
  ];

  $result = $user->register($datas);

  if (gettype($result) == "string") {
    // Gagal: menampilkan SweetAlert
    echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '" . htmlspecialchars($result, ENT_QUOTES) . "',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Try Again'
            });
        </script>";
  } else {
    // Berhasil: menampilkan SweetAlert, kemudian redirect ke halaman login
    echo "<script>
              document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
                  icon: 'success',
                  title: 'Account Created!',
                  text: 'Your account has been successfully created.',
                  confirmButtonColor: '#3085d6',  
                  confirmButtonText: 'Go to Login'
              }).then((result) => {
                  if (result.isConfirmed) {
                      window.location.href = './login.php';
                  }
              });
  })
        </script>";
    exit;
  }
}
?>


<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Create account - Windmill Dashboard</title>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="../../assets/css/tailwind.output.css" />
  <script
    src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
    defer></script>
  <script src="../assets/js/init-alpine.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
    <div
      class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
      <div class="flex flex-col overflow-y-auto md:flex-row">
        <div class="h-32 md:h-auto md:w-1/2">
          <img
            aria-hidden="true"
            class="object-cover w-full h-full dark:hidden"
            src="../assets/img/create-account-office.jpeg"
            alt="Office" />
          <img
            aria-hidden="true"
            class="hidden object-cover w-full h-full dark:block"
            src="../assets/img/create-account-office-dark.jpeg"
            alt="Office" />
        </div>
        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
          <div class="w-full">
            <h1
              class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
              Create account
            </h1>
            <form action="" method="post" enctype="multipart/form-data">
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Full Name</span>
                <input
                  name="full_name"
                  type="text"
                  class="p-3 rounded-md block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="John Doe" />
              </label>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Email</span>
                <input
                  name="email"
                  type="email"
                  class="p-3 rounded-md block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Bio</span>
                <textarea name="bio"
                  class="rounded-md p-3 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-textarea"
                  rows="3"
                  placeholder="Tell us a little about yourself..."></textarea>
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Avatar</span>
                <input name="avatar"
                  type="file"
                  class=" p-3 rounded-md block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Phone Number</span>
                <input
                  name="phone"
                  type="tel"
                  class="p-3 rounded-md block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="+62 812-3456-7890" />
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Gender</span>
                <select
                  name="gender"
                  class="p-3 rounded-md block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-select">
                  <option value="l">Laki-Laki</option>
                  <option value="p">Perempuan</option>
                </select>
              </label>

              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Password</span>
                <input
                  name="password"
                  type="password"
                  class="p-3 rounded-md block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Enter your password" />
              </label>
              <!-- Other inputs remain here -->
              <button
                type="submit"
                name="submit"
                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Create account
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- SCRIPT SWEET ALERT -->
  <script>
    document.querySelector("form").addEventListener("submit", function(e) {
      const fullName = document.querySelector("input[name='full_name']").value.trim();
      const email = document.querySelector("input[name='email']").value.trim();
      const password = document.querySelector("input[name='password']").value.trim();

      if (!fullName || !email || !password) {
        e.preventDefault(); // Mencegah form submit jika input kosong
        Swal.fire({
          icon: "error",
          title: "Form Incomplete",
          text: "Please fill out all required fields before submitting.",
          confirmButtonColor: "#d33",
          confirmButtonText: "Okay"
        });
      }
    });
  </script>
</body>

</html>