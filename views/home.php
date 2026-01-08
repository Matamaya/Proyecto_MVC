<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-center mb-10 text-gray-800">Catálogo de Robótica</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <?php foreach($posts as $post): ?>
            <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition-shadow duration-300">
                <img src="<?= $post['image_url'] ?>" alt="<?= $post['title'] ?>" class="w-full h-48 object-cover">
                
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2"><?= $post['title'] ?></h2>
                    <p class="text-gray-600 mb-4 text-sm"><?= substr($post['content'], 0, 100) ?>...</p>
                    
                    <div class="flex justify-between items-center mt-4">
                        <span class="text-xl font-bold text-blue-600">$<?= number_format($post['price'], 2) ?></span>
                        <a href="<?= BASE_URL ?>/public/post/show/<?= $post['id'] ?>" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                            Ver Detalles
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>