<div class="max-w-4xl mx-auto px-4 py-8">
    <div class="bg-white shadow-xl rounded-lg overflow-hidden">
        <div class="bg-blue-800 px-6 py-4 border-b border-blue-700 flex justify-between items-center">
            <h2 class="text-xl font-bold text-white">Editar Publicación</h2>
            <a href="<?= BASE_URL ?>/public/post/manage" class="text-blue-100 hover:text-white text-sm">
                &larr; Volver
            </a>
        </div>
        
        <div class="p-6 md:p-8">
            <form action="<?= BASE_URL ?>/public/post/update/<?= $post['id'] ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
                <!-- Título -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Título del Producto</label>
                    <input type="text" name="title" id="title" required 
                           value="<?= htmlspecialchars($post['title']) ?>"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm p-2 border">
                </div>

                <!-- Imagen Actual y Subida -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Imagen del Producto</label>
                    <div class="mt-2 flex items-center space-x-6">
                        <?php if (!empty($post['image_url'])): ?>
                            <div class="shrink-0">
                                <img class="h-16 w-16 object-cover rounded-full border border-gray-300" src="<?= htmlspecialchars($post['image_url']) ?>" alt="Imagen actual">
                            </div>
                        <?php endif; ?>
                        <div class="flex-1">
                            <input type="file" name="image" id="image" accept="image/jpeg,image/png,image/webp"
                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                             <p class="mt-1 text-xs text-gray-500">Deja en blanco para mantener la imagen actual.</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Categoría -->
                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-700">Categoría</label>
                        <select name="category_id" id="category_id" required 
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md border">
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category['id'] ?>" 
                                    <?= ($post['category_id'] == $category['id']) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($category['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Precio -->
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700">Precio (€)</label>
                        <input type="number" step="0.01" name="price" id="price" required 
                               value="<?= htmlspecialchars($post['price']) ?>"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm p-2 border">
                    </div>
                </div>

                <!-- Contenido -->
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700">Descripción Detallada</label>
                    <textarea name="content" id="content" rows="6" required 
                              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm p-2 border"><?= htmlspecialchars($post['content']) ?></textarea>
                </div>

                <!-- Specs (JSON) -->
                 <div>
                    <label for="specs" class="block text-sm font-medium text-gray-700">Especificaciones Técnicas (JSON)</label>
                    <textarea name="specs" id="specs" rows="3" 
                              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm p-2 border font-mono"><?= htmlspecialchars($post['specs'] ?? '') ?></textarea>
                </div>

                <!-- Botones -->
                <div class="flex items-center justify-end border-t border-gray-200 pt-6">
                    <a href="<?= BASE_URL ?>/public/post/manage" class="bg-gray-200 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 mr-3">
                        Cancelar
                    </a>
                    <button type="submit" class="bg-blue-600 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Actualizar Publicación
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
