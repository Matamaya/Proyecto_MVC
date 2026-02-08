<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-xl shadow-lg border border-gray-100">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Crear una cuenta
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                ¿Ya tienes cuenta?
                <a href="index.php?action=login" class="font-medium text-blue-600 hover:text-blue-500 transition">
                    Inicia sesión aquí
                </a>
            </p>
        </div>
        
        <?php if (isset($error)): ?>
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded" role="alert">
                <p class="font-bold">Atención</p>
                <p><?= htmlspecialchars($error) ?></p>
            </div>
        <?php endif; ?>
        
        <form class="mt-8 space-y-6" action="index.php?action=register" method="POST">
            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="username" class="sr-only">Nombre de Usuario</label>
                    <input id="username" name="username" type="text" required 
                           value="<?= htmlspecialchars($_POST['username'] ?? '') ?>"
                           class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" 
                           placeholder="Nombre de Usuario">
                </div>
                <div>
                    <label for="email-address" class="sr-only">Email</label>
                    <input id="email-address" name="email" type="email" autocomplete="email" required 
                           value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                           class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" 
                           placeholder="Correo electrónico">
                </div>
                <div>
                    <label for="password" class="sr-only">Contraseña</label>
                    <input id="password" name="password" type="password" autocomplete="new-password" required 
                           class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" 
                           placeholder="Contraseña">
                </div>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition shadow-md">
                    Registrarse
                </button>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>