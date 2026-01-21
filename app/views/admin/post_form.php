<?php $isEdit = isset($post); ?>
<div class="max-w-2xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="bg-white shadow sm:rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4"><?= $isEdit ? 'Editar Post' : 'Crear Post' ?></h3>
            <form action="" method="POST">
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                    <input type="text" name="title" id="title" value="<?= $isEdit ? htmlspecialchars($post['title']) : '' ?>" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                </div>
                
                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-700">Contenido</label>
                    <textarea name="content" id="content" rows="4" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required><?= $isEdit ? htmlspecialchars($post['content']) : '' ?></textarea>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700">Precio</label>
                        <input type="number" step="0.01" name="price" id="price" value="<?= $isEdit ? $post['price'] : '' ?>" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                         <label for="category_id" class="block text-sm font-medium text-gray-700">Categoría</label>
                        <select name="category_id" id="category_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <?php foreach ($categories as $cat): ?>
                                <option value="<?= $cat['id'] ?>" <?= ($isEdit && $post['category_id'] == $cat['id']) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($cat['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                 <div class="mb-4">
                    <label for="specs" class="block text-sm font-medium text-gray-700">Especificaciones (JSON)</label>
                    <textarea name="specs" id="specs" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md font-mono text-xs" placeholder='{"battery": "5000mAh"}'><?= $isEdit ? htmlspecialchars($post['specs']) : '' ?></textarea>
                    <p class="mt-1 text-xs text-gray-500">Ejemplo: {"color": "Rojo", "peso": "10kg"}</p>
                </div>

                <?php if (!$isEdit): ?>
                <div class="mb-4 flex items-start">
                    <div class="flex items-center h-5">
                      <input id="is_active" name="is_active" type="checkbox" checked class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                      <label for="is_active" class="font-medium text-gray-700">Publicar inmediatamente</label>
                    </div>
                </div>
                <?php endif; ?>

                <div class="flex justify-end">
                    <a href="<?= BASE_URL ?>/public/admin/posts" class="bg-gray-200 py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-2">Cancelar</a>
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <?= $isEdit ? 'Guardar Cambios' : 'Crear Post' ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
