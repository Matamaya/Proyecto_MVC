<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Moderación de Comentarios</h1>
        <a href="index.php?action=admin_dashboard" class="text-gray-500 hover:text-gray-700">&larr; Volver</a>
    </div>

    <div class="bg-white shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contenido</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Autor</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">En Post</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php if(empty($comments)): ?>
                    <tr><td colspan="5" class="px-6 py-4 text-center text-gray-500">No hay comentarios.</td></tr>
                <?php else: ?>
                    <?php foreach ($comments as $comment): ?>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $comment['id'] ?></td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900 max-w-sm truncate" title="<?= htmlspecialchars($comment['text']) ?>">
                                <?= htmlspecialchars($comment['text']) ?>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <?= htmlspecialchars($comment['username'] ?? 'Anónimo') ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600">
                            <a href="index.php?action=show_post&id=<?= $comment['post_id'] ?>">
                                Ver Post #<?= $comment['post_id'] ?>
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="index.php?action=admin_delete_comment&id=<?= $comment['id'] ?>" 
                               class="text-red-600 hover:text-red-900 font-bold" 
                               onclick="return confirm('¿Eliminar este comentario permanentemente?')">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>