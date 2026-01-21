<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Panel de Administración</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Stats Cards -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <dt class="text-sm font-medium text-gray-500 truncate">Usuarios Registrados</dt>
                <dd class="mt-1 text-3xl font-semibold text-gray-900"><?= $stats['users'] ?></dd>
            </div>
            <div class="bg-gray-50 px-4 py-4 sm:px-6">
                <a href="<?= BASE_URL ?>/public/admin/users" class="text-sm font-medium text-blue-600 hover:text-blue-500">Ver todos &rarr;</a>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <dt class="text-sm font-medium text-gray-500 truncate">Total Publicaciones</dt>
                <dd class="mt-1 text-3xl font-semibold text-gray-900"><?= $stats['posts'] ?></dd>
            </div>
             <div class="bg-gray-50 px-4 py-4 sm:px-6">
                <a href="<?= BASE_URL ?>/public/admin/posts" class="text-sm font-medium text-blue-600 hover:text-blue-500">Gestionar Posts &rarr;</a>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <dt class="text-sm font-medium text-gray-500 truncate">Comentarios</dt>
                <dd class="mt-1 text-3xl font-semibold text-gray-900"><?= $stats['comments'] ?></dd>
            </div>
             <div class="bg-gray-50 px-4 py-4 sm:px-6">
                <a href="<?= BASE_URL ?>/public/admin/comments" class="text-sm font-medium text-blue-600 hover:text-blue-500">Moderación &rarr;</a>
            </div>
        </div>
    </div>

    <!-- Quick Links -->
    <div class="bg-white shadow sm:rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Acciones Directas</h3>
            <div class="mt-5 max-w-xl text-sm text-gray-500">
                <p>Gestiona rápidamente el contenido de la plataforma desde aquí.</p>
            </div>
            <div class="mt-5">
                <a href="<?= BASE_URL ?>/public/admin/createPost" class="inline-flex items-center justify-center px-4 py-2 border border-transparent font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 sm:w-auto">
                    Crear Nueva Publicación
                </a>
            </div>
        </div>
    </div>
</div>
