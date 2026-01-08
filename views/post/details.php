<div class="container mx-auto px-4 py-12">
    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-2xl overflow-hidden flex flex-col md:flex-row">
        
        <div class="md:w-1/2">
            <img src="<?= $post['image_url'] ?>" alt="<?= $post['title'] ?>" class="w-full h-full object-cover">
        </div>

        <div class="md:w-1/2 p-8 flex flex-col justify-between">
            <div>
                <div class="flex justify-between items-center mb-4">
                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">
                        <?= $post['category_name'] ?? 'General' ?>
                    </span>
                    <span class="text-gray-500 text-sm">Ref: #00<?= $post['id'] ?></span>
                </div>

                <h1 class="text-3xl font-bold text-gray-900 mb-4"><?= $post['title'] ?></h1>
                
                <p class="text-gray-600 leading-relaxed mb-6">
                    <?= nl2br($post['content']) ?>
                </p>

                <div class="mb-6 border-t border-b border-gray-100 py-4">
                    <p class="text-sm text-gray-500"><strong>Vendedor:</strong> <?= $post['username'] ?></p>
                    <p class="text-sm text-gray-500"><strong>Garantía:</strong> 2 Años</p>
                    <p class="text-sm text-gray-500"><strong>Envío:</strong> Global (24h)</p>
                </div>
            </div>

            <div class="flex items-center justify-between mt-4">
                <span class="text-3xl font-bold text-gray-900">$<?= number_format($post['price'], 2) ?></span>
                <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300 shadow-lg transform hover:-translate-y-1">
                    Comprar Ahora
                </button>
            </div>
            
            <div class="mt-6 text-center">
                <a href="<?= BASE_URL ?>" class="text-blue-500 hover:underline text-sm">← Volver al catálogo</a>
            </div>
        </div>
    </div>
</div>