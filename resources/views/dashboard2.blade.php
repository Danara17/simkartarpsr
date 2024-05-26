<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Responsive Drawer with Tailwind CSS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 relative">

    <div class="flex">
        <!-- Sidebar -->
        <div id="sidebar"
            class="sidebar transform -translate-x-full lg:translate-x-0 transition-transform duration-300 bg-white w-64 h-screen fixed lg:relative z-20">
            <div class="p-4">
                <div class="flex items-center justify-between">
                    <a class="flex gap-2 items-center" href="#">
                        <div class="w-10">
                            <img src="{{ asset('asset/dist/kartar.png') }}" alt="Kartar Dashboard" class="">
                        </div>
                        <div class="">
                            <div class="font-medium lg:hidden">SIM Kartar</div>
                            <div class="hidden lg:block font-medium text-xs">Sistem Informasi Manajemen</div>
                            <div class="hidden lg:block text-xs">Karang Taruna Permata Safira Regency</div>
                        </div>
                    </a>
                    <button type="button" class="ml-3 lg:hidden" id="close-sidebar">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.2881 2.77374C16.9627 2.4483 16.435 2.4483 16.1096 2.77374L10.0309 8.8524L3.95229 2.77374C3.62686 2.4483 3.09922 2.4483 2.77378 2.77374C2.44834 3.09918 2.44834 3.62682 2.77378 3.95225L8.85242 10.0309L2.7738 16.1095C2.44836 16.435 2.44836 16.9626 2.7738 17.2881C3.09923 17.6135 3.62687 17.6135 3.95231 17.2881L10.0309 11.2094L16.1096 17.2881C16.435 17.6135 16.9627 17.6135 17.2881 17.2881C17.6135 16.9626 17.6135 16.435 17.2881 16.1096L11.2094 10.0309L17.2881 3.95225C17.6135 3.62682 17.6135 3.09918 17.2881 2.77374Z"
                                fill="#333333" />
                        </svg>
                    </button>
                </div>
                <nav class="mt-4">
                    <a href="#" class="block py-2 px-4 text-gray-700 hover:bg-gray-200">Dashboard</a>
                    <a href="#" class="block py-2 px-4 text-gray-700 hover:bg-gray-200">Rapat</a>
                    <a href="#" class="block py-2 px-4 text-gray-700 hover:bg-gray-200">Absensi</a>
                </nav>
            </div>
        </div>

        <!-- Dark overlay -->
        <div id="overlay" class="hidden lg:hidden fixed inset-0 bg-black opacity-50 z-10"></div>

        <!-- Main content -->
        <div class="flex-1">
            <div class="flex items-center justify-between lg:justify-end shadow-sm bg-white p-5">
                <button id="menu-button" class="lg:hidden">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.16669 10H16.6667" stroke="#333333" stroke-width="1.5" stroke-linecap="round" />
                        <path d="M4.16669 14.1667H16.6667" stroke="#333333" stroke-width="1.5" stroke-linecap="round" />
                        <path d="M4.16669 5.83337H16.6667" stroke="#333333" stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                </button>
                <div class="relative flex items-center space-x-4">
                    <button id="avatar-button" type="button" class="overflow-hidden rounded-full"
                        style="width: 40px; height: 40px">
                        <img src="https://via.placeholder.com/40" alt="Avatar" class="w-full h-full object-cover">
                    </button>
                    <!-- Dropdown Menu -->
                    <div id="dropdown-menu"
                        class="hidden absolute right-0 top-10 mt-2 w-48 bg-white rounded-md shadow-lg z-20 transition-all duration-200 ease-in-out opacity-0 transform scale-95">
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Profile</a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Logout</a>
                    </div>
                </div>
            </div>

            <!-- Main content area -->
            <div class="p-4">
                <h1 class="text-2xl font-bold">Dashboard Content</h1>
                <!-- Your dashboard content goes here -->
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuButton = document.getElementById('menu-button');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            const closeSideBar = document.getElementById('close-sidebar');
            const avatarButton = document.getElementById('avatar-button');
            const dropdownMenu = document.getElementById('dropdown-menu');

            menuButton.addEventListener('click', () => {
                sidebar.classList.toggle('translate-x-0');
                sidebar.classList.toggle('-translate-x-full');
                overlay.classList.toggle('hidden');
            });

            closeSideBar.addEventListener('click', () => {
                sidebar.classList.add('-translate-x-full');
                sidebar.classList.remove('translate-x-0');
                overlay.classList.add('hidden');
            });

            overlay.addEventListener('click', () => {
                sidebar.classList.add('-translate-x-full');
                sidebar.classList.remove('translate-x-0');
                overlay.classList.add('hidden');
            });

            avatarButton.addEventListener('click', () => {
                if (dropdownMenu.classList.contains('hidden')) {
                    dropdownMenu.classList.remove('hidden');
                    setTimeout(() => {
                        dropdownMenu.classList.add('opacity-100', 'scale-100');
                        dropdownMenu.classList.remove('opacity-0', 'scale-95');
                    }, 10);
                } else {
                    dropdownMenu.classList.add('opacity-0', 'scale-95');
                    dropdownMenu.classList.remove('opacity-100', 'scale-100');
                    dropdownMenu.addEventListener('transitionend', () => {
                        dropdownMenu.classList.add('hidden');
                    }, {
                        once: true
                    });
                }
            });

            document.addEventListener('click', (event) => {
                if (!avatarButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.add('opacity-0', 'scale-95');
                    dropdownMenu.classList.remove('opacity-100', 'scale-100');
                    dropdownMenu.addEventListener('transitionend', () => {
                        dropdownMenu.classList.add('hidden');
                    }, {
                        once: true
                    });
                }
            });
        });
    </script>
</body>

</html>
