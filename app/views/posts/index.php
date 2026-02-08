<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    
    <div class="flex justify-between items-center mb-10">
        <div>
            <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">Últimas Publicaciones</h1>
            <p class="mt-2 text-lg text-gray-500">Explora nuestros artículos sobre tecnología y desarrollo.</p>
        </div>
        
        <?php if (isset($_SESSION['role']) && in_array($_SESSION['role'], ['admin', 'writer'])): ?>
            <a href="index.php?action=create_post" class="bg-blue-600 text-white px-5 py-3 rounded-lg shadow hover:bg-blue-700 transition flex items-center font-medium">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Crear Nuevo Post
            </a>
        <?php endif; ?>
    </div>

    <?php if (empty($posts)): ?>
        <div class="text-center py-20 bg-gray-50 rounded-lg border border-gray-200 border-dashed">
            <p class="text-xl text-gray-500">No hay publicaciones disponibles.</p>
            <?php if (isset($_SESSION['role']) && in_array($_SESSION['role'], ['admin', 'writer'])): ?>
                <p class="mt-2 text-blue-600">¡Sé el primero en escribir algo!</p>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($posts as $post): ?>
                <article class="flex flex-col bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow duration-300">
                    <?php if (!empty($post['image_url'])): ?>
                        <div class="h-48 w-full overflow-hidden">
                            <img src="<?= htmlspecialchars($post['image_url']) ?>" alt="<?= htmlspecialchars($post['title']) ?>" class="w-full h-full object-cover">
                        </div>
                    <?php endif; ?>    
                    <div class="p-6 flex-1 flex flex-col">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <span><?= date('M d, Y', strtotime($post['created_at'] ?? 'now')) ?></span>
                            <?php if(isset($post['username'])): ?>
                                <span class="mx-2">&bull;</span>
                                <span class="text-blue-600 font-medium"><?= htmlspecialchars($post['username']) ?></span>
                            <?php endif; ?>
                        </div>
                        
                        <a href="index.php?action=show_post&id=<?= $post['id'] ?>" class="block mt-2">
                            <h2 class="text-xl font-bold text-gray-900 hover:text-blue-600 transition-colors">
                                <?= htmlspecialchars($post['title']) ?>
                            </h2>
                            <p class="mt-3 text-base text-gray-500 line-clamp-3">
                                <?= htmlspecialchars(substr($post['content'], 0, 150)) ?>...
                            </p>
                        </a>
                        
                        <div class="mt-6 pt-4 border-t border-gray-100 flex items-center justify-between">
                            <a href="index.php?action=show_post&id=<?= $post['id'] ?>" class="text-blue-600 font-semibold hover:text-blue-800 text-sm">
                                Leer artículo &rarr;
                            </a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>