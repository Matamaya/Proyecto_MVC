<div class="max-w-4xl mx-auto px-4 py-8">
    <div class="bg-white shadow-xl rounded-lg overflow-hidden">
        <div class="bg-gray-800 px-6 py-4 border-b border-gray-700 flex justify-between items-center">
            <h2 class="text-xl font-bold text-white">Nueva Publicación</h2>
            <a href="<?= BASE_URL ?>/public/post/manage" class="text-gray-300 hover:text-white text-sm">
                &larr; Volver
            </a>
        </div>
        
        <div class="p-6 md:p-8">
            <?php if (!empty($errors)): ?>
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                    <p class="font-bold">Por favor corrige los siguientes errores:</p>
                    <ul class="list-disc ml-5 mt-1">
                        <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?= BASE_URL ?>/public/post/store" method="POST" class="space-y-6">
                <!-- Título -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Título del Producto</label>
                    <input type="text" name="title" id="title" required 
                           value="<?= isset($old['title']) ? htmlspecialchars($old['title']) : '' ?>"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm p-2 border">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Categoría -->
                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-700">Categoría</label>
                        <select name="category_id" id="category_id" required 
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md border">
                            <option value="">Selecciona una categoría</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category['id'] ?>" 
                                    <?= (isset($old['category_id']) && $old['category_id'] == $category['id']) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($category['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Precio -->
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700">Precio (€)</label>
                        <input type="number" step="0.01" name="price" id="price" required 
                               value="<?= isset($old['price']) ? htmlspecialchars($old['price']) : '' ?>"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm p-2 border">
                    </div>
                </div>

                <!-- Contenido -->
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700">Descripción Detallada</label>
                    <textarea name="content" id="content" rows="6" required 
                              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm p-2 border"><?= isset($old['content']) ? htmlspecialchars($old['content']) : '' ?></textarea>
                </div>

                <!-- Botones -->
                <div class="flex items-center justify-end border-t border-gray-200 pt-6">
                    <button type="button" onclick="history.back()" class="bg-gray-200 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 mr-3">
                        Cancelar
                    </button>
                    <button type="submit" class="bg-blue-600 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Guardar Publicación
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
