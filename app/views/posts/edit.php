<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="max-w-2xl mx-auto px-4 py-8">
    <div class="bg-neutral-900 shadow-2xl rounded-2xl overflow-hidden border border-neutral-800">
        <div class="bg-neutral-950 px-8 py-6 border-b border-neutral-800 flex justify-between items-center">
            <h2 class="text-2xl font-black text-white tracking-tight">Editar Publicación</h2>
            <a href="index.php?action=show_post&id=<?= $post['id'] ?>"
                class="text-gray-400 hover:text-white text-sm transition-colors">Cancelar</a>
        </div>

        <div class="p-8">
            <form action="index.php?action=update_post&id=<?= $post['id'] ?>" method="POST"
                enctype="multipart/form-data" class="space-y-8">

                <div>
                    <label for="title"
                        class="block text-sm font-bold text-gray-300 mb-2 uppercase tracking-wide">Título</label>
                    <input type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>"
                        class="w-full bg-neutral-950 border border-neutral-700 rounded-lg shadow-sm focus:ring-2 focus:ring-orange-500 focus:border-transparent text-white p-4 transition-all"
                        required>
                </div>

                <div>
                    <label for="content"
                        class="block text-sm font-bold text-gray-300 mb-2 uppercase tracking-wide">Contenido</label>
                    <textarea name="content" rows="12"
                        class="w-full bg-neutral-950 border border-neutral-700 rounded-lg shadow-sm focus:ring-2 focus:ring-orange-500 focus:border-transparent text-white p-4 transition-all"
                        required><?= htmlspecialchars($post['content']) ?></textarea>
                </div>

                <div class="bg-neutral-950 p-6 rounded-lg border border-neutral-800">
                    <label class="block text-sm font-bold text-orange-500 mb-4 uppercase tracking-wide">Imagen
                        Destacada</label>

                    <?php if (!empty($post['image_url'])): ?>
                        <div class="mb-6 flex items-start gap-6">
                            <img src="/<?= htmlspecialchars($post['image_url']) ?>" alt="Imagen actual"
                                class="h-32 w-32 object-cover rounded-lg border border-neutral-700 shadow-md">
                            <div class="flex items-center pt-2">
                                <input type="checkbox" name="delete_image" id="delete_image" value="1"
                                    class="w-5 h-5 text-orange-600 bg-neutral-900 border-neutral-600 rounded focus:ring-orange-500">
                                <label for="delete_image"
                                    class="ml-3 text-sm font-medium text-red-400 cursor-pointer hover:text-red-300">
                                    Eliminar imagen actual
                                </label>
                            </div>
                        </div>
                    <?php endif; ?>

                    <label class="block text-sm text-gray-400 mb-3">Cambiar imagen (dejar vacío para mantener la
                        actual)</label>
                    <input type="file" name="image" accept="image/*"
                        class="block w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-white file:text-black hover:file:bg-gray-200 cursor-pointer border border-neutral-700 rounded-lg p-2 bg-neutral-900">
                </div>

                <div class="flex items-center justify-end pt-4 gap-4 border-t border-neutral-800">
                    <button type="submit"
                        class="bg-white text-black font-bold py-3 px-8 rounded-full hover:bg-gray-200 transition-all shadow-lg transform hover:-translate-y-1">
                        Guardar Cambios
                    </button>
                    <a href="index.php?action=show_post&id=<?= $post['id'] ?>"
                        class="py-3 px-6 text-gray-400 hover:text-white font-medium transition-colors">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include __DIR__ . '/../layout/footer.php'; ?>