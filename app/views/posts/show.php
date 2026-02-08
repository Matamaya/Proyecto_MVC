<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="max-w-4xl mx-auto px-4 py-8">
    
    <article class="bg-white rounded-lg shadow-md overflow-hidden mb-8 border border-gray-100">
        <?php if (!empty($post['image_url'])): ?>
        <div class="mb-6">
            <img src="/<?= htmlspecialchars($post['image_url']) ?>" 
                 alt="Imagen del post" 
                 class="w-full h-96 object-cover rounded-lg shadow-md">
        </div>
        <?php endif; ?>
        
        <div class="p-8">
            <div class="mb-6 border-b border-gray-100 pb-4">
                <h1 class="text-4xl font-extrabold text-gray-900 mb-2"><?= htmlspecialchars($post['title']) ?></h1>
                <div class="flex items-center text-gray-500 text-sm">
                    <span class="font-medium text-blue-600 mr-2"><?= htmlspecialchars($post['username']) ?></span>
                    <span>&bull;</span>
                    <span class="ml-2"><?= date('d/m/Y', strtotime($post['created_at'] ?? 'now')) ?></span>
                </div>
            </div>

            <div class="prose max-w-none text-gray-700 leading-relaxed">
                <?= nl2br(htmlspecialchars($post['content'])) ?>
            </div>

            <?php if (isset($_SESSION['user_id']) && ($_SESSION['role'] === 'admin' || $_SESSION['user_id'] == $post['user_id'])): ?>
                <div class="mt-8 pt-4 border-t border-gray-100 flex gap-4">
                    <a href="index.php?action=edit_post&id=<?= $post['id'] ?>" class="text-blue-600 font-semibold hover:underline">Editar Post</a>
                    <a href="index.php?action=delete_post&id=<?= $post['id'] ?>" 
                       class="text-red-600 font-semibold hover:underline"
                       onclick="return confirm('¿Seguro que quieres borrar este post?')">Borrar Post</a>
                </div>
            <?php endif; ?>
        </div>
    </article>

    <div class="bg-gray-50 rounded-lg shadow-inner p-6 border border-gray-200">
        <h3 class="text-2xl font-bold text-gray-800 mb-6">Comentarios</h3>

        <?php if (isset($_SESSION['user_id'])): ?>
            <form action="index.php?action=store_comment" method="POST" class="mb-8">
                <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Deja tu opinión</label>
                    <textarea name="text" rows="3" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Escribe aquí..." required></textarea>
                </div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Publicar Comentario
                </button>
            </form>
        <?php else: ?>
            <div class="bg-blue-100 text-blue-800 p-4 rounded mb-6 text-center">
                <a href="index.php?action=login" class="font-bold underline">Inicia sesión</a> para participar en la conversación.
            </div>
        <?php endif; ?>

        <div class="space-y-4">
            <?php if (empty($comments)): ?>
                <p class="text-gray-500 italic text-center">No hay comentarios todavía. ¡Sé el primero!</p>
            <?php else: ?>
                <?php foreach ($comments as $comment): ?>
                    <div class="bg-white p-4 rounded shadow-sm border border-gray-200">
                        <div class="flex justify-between items-start mb-2">
                            <h4 class="font-bold text-gray-800"><?= htmlspecialchars($comment['username'] ?? 'Anónimo') ?></h4>
                            <span class="text-xs text-gray-400"><?= date('d/m/Y H:i', strtotime($comment['created_at'])) ?></span>
                        </div>
                        <p class="text-gray-600"><?= nl2br(htmlspecialchars($comment['text'])) ?></p>
                        
                        <?php if (isset($_SESSION['user_id']) && ($_SESSION['role'] === 'admin' || $_SESSION['user_id'] == $comment['user_id'])): ?>
                            <div class="mt-2 text-right">
                                <a href="index.php?action=delete_comment&id=<?= $comment['id'] ?>" class="text-red-500 text-xs hover:underline">Eliminar</a>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    
    <div class="mt-6 text-center">
        <a href="index.php?action=posts" class="text-blue-600 hover:text-blue-800 font-medium">&larr; Volver al inicio</a>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>