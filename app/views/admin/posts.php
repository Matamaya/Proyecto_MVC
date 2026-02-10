<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-black text-white tracking-tight">Gestión de Publicaciones</h1>
        <a href="index.php?action=create_post"
            class="bg-gradient-to-r from-blue-600 to-red-600 text-white px-6 py-2 rounded-full hover:from-blue-700 hover:to-red-700 text-sm font-bold shadow-lg transform hover:-translate-y-1 transition-all">
            + Nuevo Post
        </a>
    </div>

    <div class="bg-neutral-900 shadow-2xl overflow-hidden border border-neutral-800 sm:rounded-2xl">
        <table class="min-w-full divide-y divide-neutral-800">
            <thead class="bg-neutral-950">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">Título</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">Autor</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">Fecha</th>
                    <th class="px-6 py-4 text-right text-xs font-bold text-gray-400 uppercase tracking-wider">Acciones
                    </th>
                </tr>
            </thead>
            <tbody class="bg-neutral-900 divide-y divide-neutral-800">
                <?php if (empty($posts)): ?>
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-500 italic">No hay posts registrados.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($posts as $post): ?>
                        <tr class="hover:bg-neutral-800/50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-mono"><?= $post['id'] ?></td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-bold text-white truncate max-w-xs">
                                    <?= htmlspecialchars($post['title']) ?>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                <?= htmlspecialchars($post['username'] ?? 'Desconocido') ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <?= date('d/m/Y', strtotime($post['created_at'] ?? 'now')) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="index.php?action=show_post&id=<?= $post['id'] ?>"
                                    class="text-blue-400 hover:text-white mr-4 transition-colors" target="_blank">Ver</a>
                                <a href="index.php?action=edit_post&id=<?= $post['id'] ?>"
                                    class="text-indigo-400 hover:text-white mr-4 transition-colors">Editar</a>
                                <a href="index.php?action=delete_post&id=<?= $post['id'] ?>"
                                    class="text-red-500 hover:text-red-400 font-bold transition-colors"
                                    onclick="return confirm('¿Estás seguro de borrar este post y sus comentarios?')">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>