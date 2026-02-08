<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-neutral-900 p-8 rounded-2xl shadow-2xl border border-neutral-800">
        <div>
            <h2 class="mt-6 text-center text-3xl font-black text-white tracking-tight">
                Iniciar Sesión
            </h2>
            <p class="mt-2 text-center text-sm text-gray-400">
                ¿Aún no tienes cuenta?
                <a href="index.php?action=register"
                    class="font-medium text-orange-500 hover:text-orange-400 transition-colors">
                    Regístrate aquí
                </a>
            </p>
        </div>

        <?php if (isset($error)): ?>
            <div class="bg-red-900/20 border-l-4 border-red-500 text-red-400 p-4 mb-4 rounded-r" role="alert">
                <p class="font-bold">Error</p>
                <p><?= htmlspecialchars($error) ?></p>
            </div>
        <?php endif; ?>

        <form class="mt-8 space-y-6" action="index.php?action=login" method="POST">
            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="email-address" class="sr-only">Email</label>
                    <input id="email-address" name="email" type="email" autocomplete="email" required
                        value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                        class="appearance-none rounded-none relative block w-full px-3 py-3 border border-neutral-700 placeholder-gray-500 text-white bg-neutral-950 rounded-t-md focus:outline-none focus:ring-orange-500 focus:border-orange-500 focus:z-10 sm:text-sm transition-colors"
                        placeholder="Correo electrónico">
                </div>
                <div>
                    <label for="password" class="sr-only">Contraseña</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required
                        class="appearance-none rounded-none relative block w-full px-3 py-3 border border-neutral-700 placeholder-gray-500 text-white bg-neutral-950 rounded-b-md focus:outline-none focus:ring-orange-500 focus:border-orange-500 focus:z-10 sm:text-sm transition-colors"
                        placeholder="Contraseña">
                </div>
            </div>

            <div>
                <button type="submit"
                    class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-full text-black bg-white hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition-all shadow-lg transform hover:-translate-y-1">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-gray-400 group-hover:text-black transition-colors"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                    Entrar
                </button>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>