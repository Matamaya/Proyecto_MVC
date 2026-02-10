<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 h-[70vh] mt-12">
    <h1 class="text-3xl font-black text-white mb-8 tracking-tight">Panel de Administración</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-neutral-900 overflow-hidden shadow-2xl rounded-2xl border border-neutral-800">
            <div class="px-6 py-6 sm:p-8">
                <dt class="text-sm font-bold text-gray-500 uppercase tracking-wide truncate">Usuarios Registrados</dt>
                <dd class="mt-2 text-4xl font-black text-white"><?= $stats['users'] ?? 0 ?></dd>
            </div>
            <div class="bg-neutral-950 px-6 py-4 border-t border-neutral-800">
                <a href="index.php?action=admin_users"
                    class="text-sm font-bold text-blue-500 hover:text-blue-400 transition-colors flex items-center">
                    Gestionar Usuarios <span class="ml-1">&rarr;</span>
                </a>
            </div>
        </div>

        <div class="bg-neutral-900 overflow-hidden shadow-2xl rounded-2xl border border-neutral-800">
            <div class="px-6 py-6 sm:p-8">
                <dt class="text-sm font-bold text-gray-500 uppercase tracking-wide truncate">Total Publicaciones</dt>
                <dd class="mt-2 text-4xl font-black text-white"><?= $stats['posts'] ?? 0 ?></dd>
            </div>
            <div class="bg-neutral-950 px-6 py-4 border-t border-neutral-800">
                <a href="index.php?action=admin_posts"
                    class="text-sm font-bold text-blue-500 hover:text-blue-400 transition-colors flex items-center">
                    Gestionar Posts <span class="ml-1">&rarr;</span>
                </a>
            </div>
        </div>

        <div class="bg-neutral-900 overflow-hidden shadow-2xl rounded-2xl border border-neutral-800">
            <div class="px-6 py-6 sm:p-8">
                <dt class="text-sm font-bold text-gray-500 uppercase tracking-wide truncate">Comentarios</dt>
                <dd class="mt-2 text-4xl font-black text-white"><?= $stats['comments'] ?? 0 ?></dd>
            </div>
            <div class="bg-neutral-950 px-6 py-4 border-t border-neutral-800">
                <a href="index.php?action=admin_comments"
                    class="text-sm font-bold text-purple-500 hover:text-purple-400 transition-colors flex items-center">
                    Moderación <span class="ml-1">&rarr;</span>
                </a>
            </div>
        </div>
    </div>

    <div class="bg-neutral-900 shadow-2xl sm:rounded-2xl border border-neutral-800">
        <div class="px-6 py-6 sm:p-8">
            <h3 class="text-xl leading-6 font-bold text-white mb-2">Acciones Rápidas</h3>
            <div class="mt-2 max-w-xl text-sm text-gray-400">
                <p>Gestiona el contenido de la plataforma directamente.</p>
            </div>
            <div class="mt-6">
                <a href="index.php?action=create_post"
                    class="inline-flex items-center justify-center px-6 py-3 border border-transparent font-bold rounded-full text-white bg-blue-600 hover:bg-blue-700 sm:w-auto shadow-lg transition-all transform hover:-translate-y-1">
                    Escribir Nuevo Artículo
                </a>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>