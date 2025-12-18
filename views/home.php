<div class="mt-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Últimas Publicaciones</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php foreach($posts as $post): ?>
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                <h2 class="text-xl font-bold text-blue-600 mb-2">
                    <?= htmlspecialchars($post['title']) ?>
                </h2>
                <p class="text-gray-600 mb-4">
                    <?= htmlspecialchars($post['content']) ?>
                </p>
                <div class="text-sm text-gray-500 border-t pt-4 flex justify-between">
                    <span>Autor: <strong><?= htmlspecialchars($post['username']) ?></strong></span>
                    <span><?= $post['created_at'] ?></span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>