<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 h-[60vh] mt-12">
    <div class="max-w-md w-full space-y-8 bg-neutral-900 p-8 rounded-2xl shadow-2xl border border-neutral-800">
        <div>
            <h2 class="mt-6 text-center text-3xl font-black text-white tracking-tight">
                Crear una cuenta
            </h2>
            <p class="mt-2 text-center text-sm text-gray-400">
                ¿Ya tienes cuenta?
                <a href="index.php?action=login"
                    class="font-medium text-blue-500 hover:text-blue-400 transition-colors">
                    Inicia sesión aquí
                </a>
            </p>
        </div>

        <?php if (isset($error)): ?>
            <div class="bg-red-900/20 border-l-4 border-red-500 text-red-400 p-4 mb-4 rounded-r" role="alert">
                <p class="font-bold">Atención</p>
                <p><?= htmlspecialchars($error) ?></p>
            </div>
        <?php endif; ?>

        <form class="mt-8 space-y-6" action="index.php?action=register" method="POST">
            <div class="flex flex-col rounded-md shadow-sm -space-y-px gap-y-3">
                <div>
                    <label for="username" class="sr-only">Nombre de Usuario</label>
                    <input id="username" name="username" type="text" required
                        value="<?= htmlspecialchars($_POST['username'] ?? '') ?>"
                        class="appearance-none rounded-none relative block w-full px-3 py-3 border border-neutral-700 placeholder-gray-500 text-white bg-neutral-950 rounded-t-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm transition-colors"
                        placeholder="Nombre de Usuario">
                </div>
                <div>
                    <label for="email-address" class="sr-only">Email</label>
                    <input id="email-address" name="email" type="email" autocomplete="email" required
                        value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                        class="appearance-none rounded-none relative block w-full px-3 py-3 border border-neutral-700 placeholder-gray-500 text-white bg-neutral-950 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm transition-colors"
                        placeholder="Correo electrónico">
                </div>
                <div>
                    <label for="password" class="sr-only">Contraseña</label>
                    <input id="password" name="password" type="password" autocomplete="new-password" required
                        class="appearance-none rounded-none relative block w-full px-3 py-3 border border-neutral-700 placeholder-gray-500 text-white bg-neutral-950 rounded-b-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm transition-colors"
                        placeholder="Contraseña">
                </div>
            </div>

            <div>
                <button type="submit"
                    class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-full text-black bg-white hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all shadow-lg transform hover:-translate-y-1">
                    Registrarse
                </button>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>