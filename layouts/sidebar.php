<aside class="hidden md:block w-64 bg-white dark:bg-gray-800">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="index.php">HSI NEWS</a>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                <span
                    class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                    aria-hidden="true"></span>
                <a
                    class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                    href="index.php">
                    <svg
                        class="w-5 h-5"
                        aria-hidden="true"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="ml-4">Dashboard</span>
                </a>
            </li>
        </ul>
        <ul class="mt-6">
            <!-- Dropdown Kategori -->
            <li class="relative px-6 py-3" x-data="{ isOpen: false }">
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    @click="isOpen = !isOpen"
                    aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <svg
                            class="w-5 h-5"
                            aria-hidden="true"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                        </svg>
                        <span class="ml-4">Kategori</span>
                    </span>
                    <svg
                        class="w-4 h-4"
                        aria-hidden="true"
                        fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isOpen">
                    <ul
                        class="mt-2 space-y-2 text-sm font-medium text-gray-500 bg-gray-50 rounded-md shadow-inner dark:bg-gray-900 dark:text-gray-400">
                        <li class="px-4 py-2 hover:text-gray-800 dark:hover:text-gray-200">
                            <a href="index-kategori.php">Kategori</a>
                        </li>
                        <li class="px-4 py-2 hover:text-gray-800 dark:hover:text-gray-200">
                            <a href="./../../views/dashboard/create-category.php">Tambah Kategori</a>
                        </li>

                    </ul>
                </template>
            </li>

            <!-- Dropdown Posts -->
            <li class="relative px-6 py-3" x-data="{ isOpen: false }">
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    @click="isOpen = !isOpen"
                    aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <div class="w-5 h-5 flex items-center">
                            <svg
                                class="lucide lucide-newspaper text-blue-400 dark:text-blue-600"
                                stroke-linejoin="round"
                                stroke-linecap="round"
                                stroke-width="2"
                                stroke="#60A5FA"
                                fill="none"
                                viewBox="0 0 24 24"
                                height="22"
                                width="22"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"></path>
                                <path d="M18 14h-8"></path>
                                <path d="M15 18h-5"></path>
                                <path d="M10 6h8v4h-8V6Z"></path>
                            </svg>
                        </div>
                        <span class="ml-4">Posts</span>
                    </span>
                    <svg
                        class="w-4 h-4"
                        aria-hidden="true"
                        fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isOpen">
                    <ul
                        class="mt-2 space-y-2 text-sm font-medium text-gray-500 bg-gray-50 rounded-md shadow-inner dark:bg-gray-900 dark:text-gray-400">
                        <li class="px-4 py-2 hover:text-gray-800 dark:hover:text-gray-200">
                            <a href="index-posts.php">Posts</a>
                        </li>

                        <li class="px-4 py-2 hover:text-gray-800 dark:hover:text-gray-200">
                            <a href="create-post.php">Tambah Posts</a>
                        </li>
                    </ul>
                </template>
            </li>
            <li class="relative px-6 py-3" x-data="{ isOpen: false }">
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    @click="isOpen = !isOpen"
                    aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <div class="w-5 h-5 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path fill="#0a74ff" d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464l349.5 0c-8.9-63.3-63.3-112-129-112l-91.4 0c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3z" />
                            </svg>
                        </div>
                        <span class="ml-4">Akun</span>
                    </span>
                    <svg
                        class="w-4 h-4"
                        aria-hidden="true"
                        fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isOpen">
                    <ul
                        class="mt-2 space-y-2 text-sm font-medium text-gray-500 bg-gray-50 rounded-md shadow-inner dark:bg-gray-900 dark:text-gray-400">
                        <li class="px-4 py-2 hover:text-gray-800 dark:hover:text-gray-200">
                            <a href="update-akun.php">Edit Akun</a>
                        </li>
                    </ul>
                </template>
            </li>

            <li class="relative px-6 py-3" x-data="{ isOpen: false }">
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    @click="isOpen = !isOpen"
                    aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <div class="w-5 h-5 flex items-center">
                            <svg
                                class="lucide lucide-rocket text-cyan-500 dark:text-cyan-400"
                                stroke-linejoin="round"
                                stroke-linecap="round"
                                stroke-width="2"
                                stroke="#06B6D4"
                                fill="none"
                                viewBox="0 0 24 24"
                                height="22"
                                width="22"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"></path>
                                <path
                                    d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"></path>
                                <path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"></path>
                                <path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"></path>
                            </svg>

                        </div>
                        <span class="ml-4">Blog Web</span>
                    </span>
                    <svg
                        class="w-4 h-4"
                        aria-hidden="true"
                        fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isOpen">
                    <ul
                        class="mt-2 space-y-2 text-sm font-medium text-gray-500 bg-gray-50 rounded-md shadow-inner dark:bg-gray-900 dark:text-gray-400">
                        <li class="px-4 py-2 hover:text-gray-800 dark:hover:text-gray-200">
                            <a href="../../myblog-website/index.php">IDN-HSI BLOG</a>
                        </li>
                    </ul>
                </template>
            </li>

        </ul>
    </div>
</aside>

<!-- Mobile sidebar -->
<!-- Backdrop -->
<div
    x-show="isSideMenuOpen"
    x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
<aside
    class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
    x-show="isSideMenuOpen"
    x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0 transform -translate-x-20"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0 transform -translate-x-20"
    @click.away="closeSideMenu"
    @keydown.escape="closeSideMenu">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a
            class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
            href="#">
            HSI NEWS
        </a>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                <span
                    class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                    aria-hidden="true"></span>
                <a
                    class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                    href="index.html">
                    <svg
                        class="w-5 h-5"
                        aria-hidden="true"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="ml-4">Dashboard</span>
                </a>
            </li>
        </ul>
        <ul class="mt-6">
            <!-- Dropdown Kategori -->
            <li class="relative px-6 py-3" x-data="{ isOpen: false }">
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    @click="isOpen = !isOpen"
                    aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <svg
                            class="w-5 h-5"
                            aria-hidden="true"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                        </svg>
                        <span class="ml-4">Kategori</span>
                    </span>
                    <svg
                        class="w-4 h-4"
                        aria-hidden="true"
                        fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isOpen">
                    <ul
                        class="mt-2 space-y-2 text-sm font-medium text-gray-500 bg-gray-50 rounded-md shadow-inner dark:bg-gray-900 dark:text-gray-400">
                        <li class="px-4 py-2 hover:text-gray-800 dark:hover:text-gray-200">
                            <a href="index-kategori.php">Kategori</a>
                        </li>
                        <li class="px-4 py-2 hover:text-gray-800 dark:hover:text-gray-200">
                            <a href="create-kategori.php">Tambah Kategori</a>
                        </li>
                    </ul>
                </template>
            </li>

            <!-- Dropdown Posts -->
            <li class="relative px-6 py-3" x-data="{ isOpen: false }">
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    @click="isOpen = !isOpen"
                    aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <div class="w-5 h-5 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 256 256" class="w-full fill-current">
                                <path d="M88,96a8,8,0,0,1,8-8h64a8,8,0,0,1,0,16H96A8,8,0,0,1,88,96Zm8,40h64a8,8,0,0,0,0-16H96a8,8,0,0,0,0,16Zm32,16H96a8,8,0,0,0,0,16h32a8,8,0,0,0,0-16ZM224,48V156.69A15.86,15.86,0,0,1,219.31,168L168,219.31A15.86,15.86,0,0,1,156.69,224H48a16,16,0,0,1-16-16V48A16,16,0,0,1,48,32H208A16,16,0,0,1,224,48ZM48,208H152V160a8,8,0,0,1,8-8h48V48H48Zm120-40v28.7L196.69,168Z"></path>
                            </svg>
                        </div>
                        <span class="ml-4">Posts</span>
                    </span>
                    <svg
                        class="w-4 h-4"
                        aria-hidden="true"
                        fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isOpen">
                    <ul
                        class="mt-2 space-y-2 text-sm font-medium text-gray-500 bg-gray-50 rounded-md shadow-inner dark:bg-gray-900 dark:text-gray-400">
                        <li class="px-4 py-2 hover:text-gray-800 dark:hover:text-gray-200">
                            <a href="index-posts.php">Posts</a>
                        </li>
                        <li class="px-4 py-2 hover:text-gray-800 dark:hover:text-gray-200">
                            <a href="create-posts.php">Tambah Posts</a>
                        </li>
                    </ul>
                </template>
            </li>
            <li class="relative px-6 py-3" x-data="{ isOpen: false }">
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    @click="isOpen = !isOpen"
                    aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <div class="w-5 h-5 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 256 256" class="w-full fill-current">
                                <path d="M88,96a8,8,0,0,1,8-8h64a8,8,0,0,1,0,16H96A8,8,0,0,1,88,96Zm8,40h64a8,8,0,0,0,0-16H96a8,8,0,0,0,0,16Zm32,16H96a8,8,0,0,0,0,16h32a8,8,0,0,0,0-16ZM224,48V156.69A15.86,15.86,0,0,1,219.31,168L168,219.31A15.86,15.86,0,0,1,156.69,224H48a16,16,0,0,1-16-16V48A16,16,0,0,1,48,32H208A16,16,0,0,1,224,48ZM48,208H152V160a8,8,0,0,1,8-8h48V48H48Zm120-40v28.7L196.69,168Z"></path>
                            </svg>
                        </div>
                        <span class="ml-4">Tags</span>
                    </span>
                    <svg
                        class="w-4 h-4"
                        aria-hidden="true"
                        fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isOpen">
                    <ul
                        class="mt-2 space-y-2 text-sm font-medium text-gray-500 bg-gray-50 rounded-md shadow-inner dark:bg-gray-900 dark:text-gray-400">
                        <li class="px-4 py-2 hover:text-gray-800 dark:hover:text-gray-200">
                            <a href="index-tags.php">Tags</a>
                        </li>
                        <li class="px-4 py-2 hover:text-gray-800 dark:hover:text-gray-200">
                            <a href="create-tags.php">Tambah Tags</a>
                        </li>
                    </ul>
                </template>
            </li>

            <li class="relative px-6 py-3" x-data="{ isOpen: false }">
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    @click="isOpen = !isOpen"
                    aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <div class="w-5 h-5 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 256 256" class="w-full fill-current">
                                <path d="M88,96a8,8,0,0,1,8-8h64a8,8,0,0,1,0,16H96A8,8,0,0,1,88,96Zm8,40h64a8,8,0,0,0,0-16H96a8,8,0,0,0,0,16Zm32,16H96a8,8,0,0,0,0,16h32a8,8,0,0,0,0-16ZM224,48V156.69A15.86,15.86,0,0,1,219.31,168L168,219.31A15.86,15.86,0,0,1,156.69,224H48a16,16,0,0,1-16-16V48A16,16,0,0,1,48,32H208A16,16,0,0,1,224,48ZM48,208H152V160a8,8,0,0,1,8-8h48V48H48Zm120-40v28.7L196.69,168Z"></path>
                            </svg>
                        </div>
                        <span class="ml-4">Tags</span>
                    </span>
                    <svg
                        class="w-4 h-4"
                        aria-hidden="true"
                        fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isOpen">
                    <ul
                        class="mt-2 space-y-2 text-sm font-medium text-gray-500 bg-gray-50 rounded-md shadow-inner dark:bg-gray-900 dark:text-gray-400">
                        <li class="px-4 py-2 hover:text-gray-800 dark:hover:text-gray-200">
                            <a href="update-akun.php">Akun</a>
                        </li>
                        <li class="px-4 py-2 hover:text-gray-800 dark:hover:text-gray-200">
                            <a href="update-password.php">Ganti Password</a>
                        </li>
                    </ul>
                </template>
            </li>

        </ul>

    </div>
</aside>