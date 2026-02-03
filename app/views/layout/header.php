<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Mi Proyecto MVC</title>
    <script type="module" src="http://localhost:5173/@vite/client"></script>
    <link rel="stylesheet" href="http://localhost:5173/public/css/app.css">
</head>

<body class="bg-white font-sans flex flex-col min-h-screen">
    <nav class="bg-blue-500 shadow-md sticky top-0 z-50 ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex flex-row justify-between h-16 items-center">

                <div class="flex items-center align-middle">
                    <a href="<?= BASE_URL ?>/public" class="flex items-center">
                        <span class="text-2xl font-extrabold text-slate-700 tracking-tight">Robotiz</span>
                    </a>
                </div>

                <div class="flex justify-between hidden sm:ml-16 sm:flex sm:space-x-5">
                    <a href="#" class="text-sm font-medium text-gray-700 hover:text-gray-900">Drones</a>
                    <a href="#" class="text-sm font-medium text-gray-700 hover:text-gray-900">Productos portátiles</a>
                    <a href="#" class="text-sm font-medium text-gray-700 hover:text-gray-900">Robotica</a>
                    <a href="#" class="text-sm font-medium text-gray-700 hover:text-gray-900">Accesorios</a>
                    <a href="#" class="text-sm font-medium text-gray-700 hover:text-gray-900">Reacondicionados oficiales</a>
                    <a href="<?= BASE_URL ?>/public/about" class="text-sm font-medium text-gray-700 hover:text-gray-900">Sobre Nosotros</a>

                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                        <a href="<?= BASE_URL ?>/public/admin" class="text-red-600 hover:text-red-800 text-sm font-medium">Panel General</a>
                        <a href="<?= BASE_URL ?>/public/post/manage" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Gestionar Posts</a>
                    <?php endif; ?>
                </div>


                <div class="flex items-center gap-8">
                    <button class="text-gray-400 hover:text-gray-600 focus:outline-none">
                        <span class="sr-only">Buscar</span>
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>

                    <button class="text-gray-400 hover:text-gray-600 focus:outline-none relative">
                        <span class="sr-only">Carrito</span>
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </button>

                    <div class="flex items-center gap-4 border-l pl-6 border-gray-200 relative">
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <!-- Logged In Dropdown -->
                            <div class="relative">
                                <button type="button" class="flex items-center gap-2 focus:outline-none" id="user-menu-button" aria-expanded="false" aria-haspopup="true" onclick="const menu = document.getElementById('user-menu-dropdown'); menu.classList.toggle('hidden');">
                                    <span class="text-sm text-gray-700 hidden lg:block font-medium hover:text-gray-900"><?= htmlspecialchars($_SESSION['username']) ?></span>
                                    <div class="text-gray-400 hover:text-gray-600 transition-colors">
                                        <span class="sr-only">Abrir menú de usuario</span>
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                </button>

                                <!-- Dropdown panel, hidden by default -->
                                <div id="user-menu-dropdown" class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                    <div class="px-4 py-2 border-b border-gray-100">
                                        <p class="text-xs text-gray-500">Conectado como</p>
                                        <p class="text-sm font-bold text-gray-900 truncate"><?= htmlspecialchars($_SESSION['username']) ?></p>
                                    </div>
                                    <a href="<?= BASE_URL ?>/public/auth/logout" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-50" role="menuitem" tabindex="-1">
                                        Cerrar Sesión
                                    </a>
                                </div>
                            </div>

                            <!-- Click outside listener (Optional but good for UX, implemented simply) -->
                            <script>
                                document.addEventListener('click', function(event) {
                                    const button = document.getElementById('user-menu-button');
                                    const menu = document.getElementById('user-menu-dropdown');
                                    if (button && menu && !button.contains(event.target) && !menu.contains(event.target)) {
                                        menu.classList.add('hidden');
                                    }
                                });
                            </script>

                        <?php else: ?>
                            <!-- Guest -->
                            <a href="<?= BASE_URL ?>/public/auth/login" class="text-gray-400 hover:text-gray-600 focus:outline-none" title="Iniciar Sesión">
                                <span class="sr-only">Iniciar Sesión</span>
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="sm:hidden hidden" id="mobile-menu">
            <div class="pt-2 pb-3 space-y-1">
                <a href="<?= BASE_URL ?>/public" class="bg-blue-50 border-blue-500 text-blue-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Home</a>
                <a href="#" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Categorías</a>

                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <a href="<?= BASE_URL ?>/public/admin" class="border-transparent text-red-600 hover:bg-red-50 hover:border-red-300 hover:text-red-800 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Admin Panel</a>
                <?php endif; ?>

                <?php if (isset($_SESSION['user_id'])): ?>
                    <div class="border-t border-gray-200 pt-4 pb-3">
                        <div class="flex items-center px-4">
                            <div class="ml-3">
                                <div class="text-base font-medium text-gray-800">Hola, <?= $_SESSION['username'] ?></div>
                            </div>
                        </div>
                        <div class="mt-3 space-y-1">
                            <a href="<?= BASE_URL ?>/public/auth/logout" class="block px-4 py-2 text-base font-medium text-red-600 hover:text-red-800 hover:bg-gray-100">Cerrar Sesión</a>
                        </div>
                    </div>
                <?php else: ?>
                    <a href="<?= BASE_URL ?>/public/auth/login" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Iniciar Sesión</a>
                    <a href="<?= BASE_URL ?>/public/auth/register" class="border-transparent text-blue-600 font-bold hover:bg-gray-50 hover:border-gray-300 block pl-3 pr-4 py-2 border-l-4 text-base">Registrarse</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <main class="flex-grow">
        <div class="container mx-auto px-4 py-6">