<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog MVC - Práctica</title>

    <link rel="stylesheet" href="http://localhost:5173/public/css/app.css">
</head>

<body class="bg-black text-white font-sans flex flex-col min-h-screen selection:bg-orange-500 selection:text-white">

    <nav id="main-navbar" class="fixed w-full z-50 transition-colors duration-300 bg-transparent">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">

                <div class="flex-shrink-0 flex items-center">
                    <a href="index.php?action=posts" class="text-2xl font-bold text-blue-400 tracking-tighter">
                        BlogMVC
                    </a>
                </div>

                <div class="hidden sm:ml-6 sm:flex sm:items-center sm:space-x-8">
                    <a href="index.php?action=posts"
                        class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        Inicio
                    </a>
                    <a href="index.php?action=rag_ask"
                        class="text-gray-300 hover:text-purple-400 px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        IA RAG
                    </a>

                    <?php if (isset($_SESSION['user_id'])): ?>
                        <?php if (($_SESSION['role'] ?? '') === 'admin'): ?>
                            <a href="index.php?action=admin_dashboard"
                                class="text-red-600 hover:text-red-800 px-3 py-2 rounded-md text-sm font-medium border border-red-100 bg-red-50">
                                Admin
                            </a>
                        <?php endif; ?>

                        <span class="text-gray-500 text-sm">|</span>
                        <span class="text-gray-900 font-semibold text-sm">
                            <?= htmlspecialchars($_SESSION['username']) ?>
                        </span>
                        <a href="index.php?action=logout"
                            class="text-gray-500 hover:text-red-600 px-3 py-2 rounded-md text-sm font-medium">
                            Salir
                        </a>
                    <?php else: ?>
                        <a href="index.php?action=login"
                            class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors">Login</a>
                        <a href="index.php?action=register"
                            class="bg-blue-600 text-white hover:bg-blue-700 px-4 py-2 rounded-md text-sm font-medium shadow-sm transition-transform hover:-translate-y-0.5">Registro</a>
                    <?php endif; ?>

                    <!-- Dark Mode Toggle (Invert) -->
                    <button id="mode-toggle"
                        class="ml-4 p-2 rounded-full text-gray-300 hover:text-white hover:bg-white/10 transition-colors"
                        title="Toggle Mode">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow container mx-auto px-4 sm:px-6 lg:px-8 py-8">