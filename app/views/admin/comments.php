<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-black text-white tracking-tight">Moderación de Comentarios</h1>
        <a href="index.php?action=admin_dashboard" class="text-gray-400 hover:text-white transition-colors">&larr; Volver</a>
    </div>

    <div class="bg-neutral-900 shadow-2xl overflow-hidden border border-neutral-800 sm:rounded-2xl">
        <table class="min-w-full divide-y divide-neutral-800">
            <thead class="bg-neutral-950">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">Contenido</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">Autor</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">En Post</th>
                    <th class="px-6 py-4 text-right text-xs font-bold text-gray-400 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-neutral-900 divide-y divide-neutral-800">
                <?php if(empty($comments)): ?>
                    <tr><td colspan="5" class="px-6 py-8 text-center text-gray-500 italic">No hay comentarios para moderar.</td></tr>
                <?php else: ?>
                    <?php foreach ($comments as $comment): ?>
                    <tr class="hover:bg-neutral-800/50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-mono"><?= $comment['id'] ?></td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-300 max-w-sm truncate" title="<?= htmlspecialchars($comment['text']) ?>">
                                <?= htmlspecialchars($comment['text']) ?>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-white font-bold">
                            <?= htmlspecialchars($comment['username'] ?? 'Anónimo') ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-400">
                            <a href="index.php?action=show_post&id=<?= $comment['post_id'] ?>" class="hover:text-white transition-colors">
                                Ver Post #<?= $comment['post_id'] ?>
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="index.php?action=admin_delete_comment&id=<?= $comment['id'] ?>" 
                               class="text-red-500 hover:text-red-400 font-bold transition-colors" 
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