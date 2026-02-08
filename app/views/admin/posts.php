<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Gestión de Publicaciones</h1>
        <a href="index.php?action=create_post" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 text-sm font-medium">
            + Nuevo Post
        </a>
    </div>

    <div class="bg-white shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Título</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Autor</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php if(empty($posts)): ?>
                    <tr><td colspan="5" class="px-6 py-4 text-center text-gray-500">No hay posts registrados.</td></tr>
                <?php else: ?>
                    <?php foreach ($posts as $post): ?>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $post['id'] ?></td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900 truncate max-w-xs"><?= htmlspecialchars($post['title']) ?></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <?= htmlspecialchars($post['username'] ?? 'Desconocido') ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <?= date('d/m/Y', strtotime($post['created_at'] ?? 'now')) ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="index.php?action=show_post&id=<?= $post['id'] ?>" class="text-blue-600 hover:text-blue-900 mr-3" target="_blank">Ver</a>
                            <a href="index.php?action=edit_post&id=<?= $post['id'] ?>" class="text-indigo-600 hover:text-indigo-900 mr-3">Editar</a>
                            <a href="index.php?action=delete_post&id=<?= $post['id'] ?>" 
                               class="text-red-600 hover:text-red-900" 
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