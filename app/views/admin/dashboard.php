<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <h1 class="text-3xl font-bold text-gray-900 mb-8">Panel de Administración</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white overflow-hidden shadow rounded-lg border border-gray-100">
            <div class="px-4 py-5 sm:p-6">
                <dt class="text-sm font-medium text-gray-500 truncate">Usuarios Registrados</dt>
                <dd class="mt-1 text-3xl font-semibold text-gray-900"><?= $stats['users'] ?? 0 ?></dd>
            </div>
            <div class="bg-gray-50 px-4 py-4 sm:px-6">
                <a href="index.php?action=admin_users" class="text-sm font-medium text-blue-600 hover:text-blue-500">
                    Gestionar Usuarios &rarr;
                </a>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow rounded-lg border border-gray-100">
            <div class="px-4 py-5 sm:p-6">
                <dt class="text-sm font-medium text-gray-500 truncate">Total Publicaciones</dt>
                <dd class="mt-1 text-3xl font-semibold text-gray-900"><?= $stats['posts'] ?? 0 ?></dd>
            </div>
             <div class="bg-gray-50 px-4 py-4 sm:px-6">
                <a href="index.php?action=admin_posts" class="text-sm font-medium text-blue-600 hover:text-blue-500">
                    Gestionar Posts &rarr;
                </a>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow rounded-lg border border-gray-100">
            <div class="px-4 py-5 sm:p-6">
                <dt class="text-sm font-medium text-gray-500 truncate">Comentarios</dt>
                <dd class="mt-1 text-3xl font-semibold text-gray-900"><?= $stats['comments'] ?? 0 ?></dd>
            </div>
             <div class="bg-gray-50 px-4 py-4 sm:px-6">
                <a href="index.php?action=admin_comments" class="text-sm font-medium text-blue-600 hover:text-blue-500">
                    Moderación &rarr;
                </a>
            </div>
        </div>
    </div>

    <div class="bg-white shadow sm:rounded-lg border border-gray-100">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Acciones Rápidas</h3>
            <div class="mt-2 max-w-xl text-sm text-gray-500">
                <p>Gestiona el contenido de la plataforma directamente.</p>
            </div>
            <div class="mt-5">
                <a href="index.php?action=create_post" class="inline-flex items-center justify-center px-4 py-2 border border-transparent font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 sm:w-auto shadow-sm">
                    Escribir Nuevo Artículo
                </a>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>