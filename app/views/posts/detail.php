<div class="container mx-auto px-4 py-12">
    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden flex flex-col md:flex-row">
        
        <div class="md:w-1/2 relative bg-gray-100">
            <img src="<?= $post['image_url'] ?>" alt="<?= $post['title'] ?>" class="w-full h-full object-cover">
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
                                <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z"/></svg>
                                <a href="#" class="ml-2 text-sm font-medium text-gray-400 hover:text-gray-900"><?= $post['category_name'] ?? 'Producto' ?></a>
                            </div>
                        </li>
                    </ol>
                </nav>

                <h1 class="text-3xl font-extrabold text-gray-900 mb-2"><?= $post['title'] ?></h1>
                
                <div class="flex items-center mb-6">
                    <div class="flex text-yellow-400">
                         <!-- TODO: añadir rating a la BD -->
                         <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                         <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                         <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                         <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                         <svg class="w-5 h-5 text-gray-300 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    </div>
                    <span class="text-gray-500 text-sm ml-2">(12 reviews)</span>
                </div>

                <p class="text-gray-600 leading-relaxed mb-6">
                    <?= nl2br($post['content']) ?>
                </p>

                <div class="space-y-3 mb-8">
                     <div class="flex items-center text-sm text-gray-500">
                        <svg class="h-5 w-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Stock disponible
                    </div>
                    <div class="flex items-center text-sm text-gray-500">
                        <svg class="h-5 w-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
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
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    Añadir al Carrito
                </button>
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
