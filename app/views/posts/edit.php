<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="max-w-4xl mx-auto mt-10 p-6 bg-card rounded-lg shadow-lg animate-fade-in">
    <h1 class="text-2xl font-bold mb-6 text-accent">Editar Publicación</h1>

    <form action="index.php?action=update_post&id=<?= $post['id'] ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
        
        <div>
            <label class="block text-sm font-medium text-gray-400 mb-2">Título</label>
            <input type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>" 
                   class="w-full p-3 bg-dark border border-gray-600 rounded text-white focus:border-accent focus:outline-none transition-colors" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-400 mb-2">Contenido</label>
            <textarea name="content" rows="10" 
                      class="w-full p-3 bg-dark border border-gray-600 rounded text-white focus:border-accent focus:outline-none transition-colors" required><?= htmlspecialchars($post['content']) ?></textarea>
        </div>

        <div class="bg-dark p-4 rounded border border-gray-700">
            <label class="block text-sm font-medium text-accent mb-4">Imagen Destacada</label>

            <?php if (!empty($post['image_url'])): ?>
                <div class="mb-4 flex items-center gap-4">
                    <img src="/<?= htmlspecialchars($post['image_url']) ?>" alt="Imagen actual" class="h-32 w-32 object-cover rounded border border-gray-600">
                    <div class="flex items-center">
                        <input type="checkbox" name="delete_image" id="delete_image" value="1" class="w-4 h-4 text-accent bg-gray-700 border-gray-600 rounded">
                        <label for="delete_image" class="ml-2 text-sm text-red-400 cursor-pointer hover:text-red-300">
                            Eliminar imagen actual
                        </label>
                    </div>
                </div>
            <?php endif; ?>

            <label class="block text-sm text-gray-400 mb-2">Cambiar imagen (dejar vacío para mantener la actual)</label>
            <input type="file" name="image" accept="image/*" 
                   class="block w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-accent file:text-white hover:file:bg-accent-hover cursor-pointer">
        </div>

        <div class="flex gap-4 pt-4">
            <button type="submit" class="px-6 py-2 bg-accent hover:bg-accent-hover text-white font-bold rounded transition-all shadow-lg hover:shadow-indigo-500/50">
                Guardar Cambios
            </button>
            <a href="index.php?action=show_post&id=<?= $post['id'] ?>" class="px-6 py-2 border border-gray-600 text-gray-300 hover:text-white hover:border-gray-400 rounded transition-colors">
                Cancelar
            </a>
        </div>
    </form>
</div>
<?php include __DIR__ . '/../layout/footer.php'; ?>