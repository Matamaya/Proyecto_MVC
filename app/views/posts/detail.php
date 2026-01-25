<div class="container mx-auto px-4 py-12">
    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden flex flex-col md:flex-row">

        <div class="md:w-1/2 relative bg-gray-100">
            <img src="<?= !empty($post['image_url']) ? htmlspecialchars($post['image_url']) : 'https://placehold.co/800x600?text=No+Image' ?>" alt="<?= htmlspecialchars($post['title']) ?>" class="w-full h-full object-cover">
        </div>

        <div class="md:w-1/2 p-8 flex flex-col justify-between">
            <div>
                <nav class="flex mb-4" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="<?= BASE_URL ?>" class="text-sm font-medium text-gray-400 hover:text-gray-900">
                                Home
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                                </svg>
                                <a href="#" class="ml-2 text-sm font-medium text-gray-400 hover:text-gray-900"><?= htmlspecialchars($post['category_name'] ?? 'Producto') ?></a>
                            </div>
                        </li>
                    </ol>
                </nav>

                <h1 class="text-3xl font-extrabold text-gray-900 mb-2"><?= htmlspecialchars($post['title']) ?></h1>

                <div class="flex items-center mb-6">
                    <div class="flex text-yellow-400">
                        <!-- TODO: añadir rating a la BD -->
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg class="w-5 h-5 text-gray-300 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                    </div>
                    <span class="text-gray-500 text-sm ml-2">(12 reviews)</span>
                </div>

                <p class="text-gray-600 leading-relaxed mb-6">
                    <?= nl2br(htmlspecialchars($post['content'])) ?>
                </p>

                <div class="space-y-3 mb-8">
                    <div class="flex items-center text-sm text-gray-500">
                        <svg class="h-5 w-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Stock disponible
                    </div>
                    <div class="flex items-center text-sm text-gray-500">
                        <svg class="h-5 w-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                        Garantía oficial de 2 años
                    </div>
                </div>
            </div>

            <div>
                <div class="flex items-end justify-between mb-4">
                    <div>
                        <span class="text-gray-500 text-sm block">Precio total</span>
                        <span class="text-4xl font-extrabold text-gray-900">$<?= number_format($post['price'], 2) ?></span>
                    </div>
                </div>

                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-lg transition duration-300 shadow flex justify-center items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    Añadir al Carrito
                </button>
            </div>
        </div>
    </div>

    <div class="max-w-4xl mx-auto mt-10">
        <h3 class="text-2xl font-bold text-gray-900 mb-6">Comentarios</h3>

        <?php if (isset($_SESSION['user_id'])): ?>
            <div class="bg-gray-50 p-6 rounded-lg shadow-sm mb-8 border border-gray-200">
                <form action="<?= BASE_URL ?>/public/comment/store" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Deja tu opinión</label>
                        <textarea name="content" rows="3" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Escribe aquí..." required></textarea>
                    </div>
                    <!-- Image Upload -->
                    <div class="mb-4">
                         <label class="block text-gray-700 text-sm font-bold mb-2">Adjuntar imagen (opcional)</label>
                         <input type="file" name="image" accept="image/jpeg,image/png,image/webp" class="text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                        Publicar Comentario
                    </button>
                </form>
            </div>
        <?php else: ?>
            <div class="bg-yellow-50 p-4 rounded-md border border-yellow-200 mb-8 text-center">
                <p class="text-yellow-700">
                    Debes <a href="<?= BASE_URL ?>/public/auth/login" class="font-bold underline">iniciar sesión</a> para comentar.
                </p>
            </div>
        <?php endif; ?>

        <div class="space-y-4">
            <?php if (empty($comments)): ?>
                <p class="text-gray-500 italic">No hay comentarios todavía. ¡Sé el primero!</p>
            <?php else: ?>
                <?php foreach ($comments as $comment): ?>
                    <div class="bg-white p-4 rounded-lg shadow border border-gray-100">
                        <div class="flex justify-between items-start">
                            <h4 class="font-bold text-gray-800"><?= htmlspecialchars($comment['username']) ?></h4>
                            <span class="text-xs text-gray-500"><?= date('d/m/Y', strtotime($comment['created_at'])) ?></span>
                        </div>
                        <p class="text-gray-600 mt-2"><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
                        <?php if (!empty($comment['image_url'])): ?>
                            <div class="mt-3">
                                <img src="<?= htmlspecialchars($comment['image_url']) ?>" alt="Imagen adjunta" class="max-h-48 rounded border border-gray-200">
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
</div>

<!-- Related or Back Link -->
<div class="max-w-4xl mx-auto mt-8">
    <a href="<?= BASE_URL ?>/public" class="text-blue-600 hover:text-blue-800 font-medium">
        &larr; Volver a la tienda
    </a>
</div>
</div>