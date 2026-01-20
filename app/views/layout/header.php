<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Proyecto MVC</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
</head>
<body class="bg-gray-100 font-sans flex flex-col min-h-screen">
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="<?= BASE_URL ?>/public" class="flex items-center">
                            <svg class="h-8 w-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd" />
                            </svg>
                            <span class="ml-2 text-xl font-bold text-gray-900 tracking-tight">Tienda</span>
                        </a>
                    </div>
                    <div class="hidden sm:ml-8 sm:flex sm:space-x-8">
                        <a href="<?= BASE_URL ?>/public" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Home
                        </a>
                        <a href="#" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Categorías
                        </a>
                        <a href="#" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Support
                        </a>
                         <a href="<?= BASE_URL ?>/public/about" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            About Us
                        </a>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <button class="p-2 text-gray-400 hover:text-gray-500 focus:outline-none">
                        <span class="sr-only">Search</span>
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>

                    <button class="p-2 text-gray-400 hover:text-gray-500 focus:outline-none relative">
                        <span class="sr-only">View Cart</span>
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="absolute top-0 right-0 block h-2 w-2 rounded-full ring-2 ring-white bg-red-400"></span>
                    </button>

                    <div class="hidden md:flex items-center space-x-3 ml-2 border-l pl-4 border-gray-200">
                        <?php 
                        // SI EL USUARIO ESTÁ LOGUEADO:
                        if (isset($_SESSION['user_id'])): 
                        ?>
                            <div class="flex items-center space-x-2">
                                <span class="text-sm text-gray-700">Hola, <b><?= $_SESSION['username'] ?></b></span>
                                <a href="<?= BASE_URL ?>/public/auth/logout" class="text-xs bg-red-100 text-red-600 px-3 py-1 rounded-full hover:bg-red-200 transition">
                                    Salir
                                </a>
                            </div>

                        <?php 
                        // SI NO ESTÁ LOGUEADO (Visitante):
                        else: 
                        ?>
                            <a href="<?= BASE_URL ?>/public/auth/login" class="text-gray-500 hover:text-gray-900 text-sm font-medium">
                                Log In
                            </a>
                            <a href="<?= BASE_URL ?>/public/auth/register" class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-blue-700 shadow-sm transition">
                                Sign Up
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button type="button" class="bg-white inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="sm:hidden hidden" id="mobile-menu">
            <div class="pt-2 pb-3 space-y-1">
                <a href="<?= BASE_URL ?>/public" class="bg-blue-50 border-blue-500 text-blue-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Home</a>
                <a href="#" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Categorías</a>
                
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