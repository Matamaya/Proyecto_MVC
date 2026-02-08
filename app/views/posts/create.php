<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="max-w-2xl mx-auto px-4 py-8">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-gray-200">
        <div class="bg-gray-50 px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h2 class="text-xl font-bold text-gray-800">Nueva Publicación</h2>
            <a href="index.php?action=posts" class="text-gray-500 hover:text-gray-700 text-sm">Cancel</a>
        </div>
        
        <div class="p-6">
            <?php if (isset($error)): ?>
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6">
                    <p><?= htmlspecialchars($error) ?></p>
                </div>
            <?php endif; ?>

            <form action="index.php?action=store_post" method="POST" enctype="multipart/form-data" class="space-y-6">
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Imagen de Portada (Opcional)</label>
                    <input type="file" name="image" id="image" accept="image/*"
                        class="w-full border-gray-300 rounded-md shadow-sm p-2 border bg-white">
                    <p class="text-xs text-gray-500 mt-1">Formatos: JPG, PNG, WEBP. Máx: 2MB.</p>
                </div>
                
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Título del Artículo</label>
                    <input type="text" name="title" id="title" required 
                           class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3 border"
                           placeholder="Ej: Introducción a Docker">
                </div>

                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Contenido</label>
                    <textarea name="content" id="content" rows="10" required 
                              class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3 border"
                              placeholder="Escribe aquí el contenido de tu post..."></textarea>
                </div>

                <div class="flex items-center justify-end pt-4">
                    <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-6 rounded hover:bg-blue-700 transition shadow">
                        Publicar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>