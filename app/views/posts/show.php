<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="max-w-4xl mx-auto px-4 py-8 h-full mt-12">

    <article class="bg-neutral-900 rounded-lg shadow-xl overflow-hidden mb-8 border border-neutral-800">
        <?php if (!empty($post['image_url'])): ?>
            <div class="mb-6 relative">
                <img src="/<?= htmlspecialchars($post['image_url']) ?>" alt="Imagen del post"
                    class="w-full h-96 object-cover rounded-none shadow-md">
                <div class="absolute inset-0 bg-gradient-to-t from-neutral-900 via-transparent to-transparent"></div>
            </div>
        <?php endif; ?>

        <div class="p-8">
            <div class="mb-6 border-b border-neutral-800 pb-4">
                <h1 class="text-4xl font-black text-white mb-2 tracking-tight"><?= htmlspecialchars($post['title']) ?>
                </h1>
                <div class="flex items-center text-gray-400 text-sm">
                    <span
                        class="font-bold text-blue-500 mr-2 uppercase tracking-wide"><?= htmlspecialchars($post['username']) ?></span>
                    <span>&bull;</span>
                    <span class="ml-2"><?= date('d/m/Y', strtotime($post['created_at'] ?? 'now')) ?></span>
                </div>
            </div>

            <div class="prose max-w-none text-gray-300 leading-relaxed prose-invert">
                <?= nl2br(htmlspecialchars($post['content'])) ?>
            </div>

            <?php if (isset($_SESSION['user_id']) && ($_SESSION['role'] === 'admin' || $_SESSION['user_id'] == $post['user_id'])): ?>
                <div class="mt-8 pt-4 border-t border-neutral-800 flex gap-4">
                    <a href="index.php?action=edit_post&id=<?= $post['id'] ?>"
                        class="text-blue-400 font-semibold hover:text-white transition-colors">Editar Post</a>
                    <a href="index.php?action=delete_post&id=<?= $post['id'] ?>"
                        class="text-red-500 font-semibold hover:text-red-400 transition-colors"
                        onclick="return confirm('¿Seguro que quieres borrar este post?')">Borrar Post</a>
                </div>
            <?php endif; ?>
        </div>
    </article>

    <div class="bg-neutral-900 rounded-lg shadow-inner p-6 border border-neutral-800">
        <h3 class="text-2xl font-bold text-white mb-6">Comentarios</h3>

        <?php if (isset($_SESSION['user_id'])): ?>
            <form action="index.php?action=store_comment" method="POST" class="mb-8">
                <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
                <div class="mb-4">
                    <label class="block text-gray-400 text-sm font-bold mb-2">Deja tu opinión</label>
                    <textarea name="text" rows="3"
                        class="w-full p-3 bg-neutral-950 border border-neutral-800 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                        placeholder="Escribe aquí..." required></textarea>
                </div>
                <button type="submit"
                    class="bg-white text-black font-bold px-6 py-2 rounded-full hover:bg-gray-200 transition shadow-lg">
                    Publicar Comentario
                </button>
            </form>
        <?php else: ?>
            <div class="bg-neutral-950 border border-neutral-800 text-gray-300 p-6 rounded-lg mb-6 text-center">
                <a href="index.php?action=login" class="font-bold text-blue-500 hover:text-blue-400">Inicia sesión</a>
                para participar en la conversación.
            </div>
        <?php endif; ?>

        <div class="space-y-4">
            <?php if (empty($comments)): ?>
                <p class="text-gray-500 italic text-center">No hay comentarios todavía. ¡Sé el primero!</p>
            <?php else: ?>
                <?php foreach ($comments as $comment): ?>
                    <div class="bg-neutral-950 p-4 rounded-lg shadow-sm border border-neutral-800">
                        <div class="flex justify-between items-start mb-2">
                            <h4 class="font-bold text-white"><?= htmlspecialchars($comment['username'] ?? 'Anónimo') ?></h4>
                            <span
                                class="text-xs text-gray-500"><?= date('d/m/Y H:i', strtotime($comment['created_at'])) ?></span>
                        </div>
                        <p class="text-gray-400"><?= nl2br(htmlspecialchars($comment['text'])) ?></p>

                        <?php if (isset($_SESSION['user_id']) && ($_SESSION['role'] === 'admin' || $_SESSION['user_id'] == $comment['user_id'])): ?>
                            <div class="mt-2 text-right">
                                <form action="index.php?action=delete_comment" method="POST" class="inline" onsubmit="return confirm('¿Eliminar comentario?');">
    <input type="hidden" name="id" value="<?= $comment['id'] ?>">
    <button type="submit" class="text-red-500 text-xs hover:text-red-400 transition-colors bg-transparent border-0 cursor-pointer p-0 underline">
        Eliminar
    </button>
</form>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="mt-6 text-center">
        <a href="index.php?action=posts" class="text-blue-600 hover:text-blue-800 font-medium">&larr; Volver al
            inicio</a>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>