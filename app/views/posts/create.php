<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="max-w-2xl mx-auto px-4 py-8 h-[100vh] mt-12">
    <div class="bg-neutral-900 shadow-2xl rounded-2xl overflow-hidden border border-neutral-800">
        <div class="bg-neutral-950 px-8 py-6 border-b border-neutral-800 flex justify-between items-center">
            <h2 class="text-2xl font-black text-white tracking-tight">Nueva Publicación</h2>
            <a href="index.php?action=posts"
                class="text-gray-400 hover:text-white text-sm transition-colors">Cancelar</a>
        </div>

        <div class="p-8">
            <?php if (isset($error)): ?>
                <div class="bg-red-900/20 border-l-4 border-red-500 text-red-400 p-4 mb-8 rounded-r">
                    <p><?= htmlspecialchars($error) ?></p>
                </div>
            <?php endif; ?>

            <form action="index.php?action=store_post" method="POST" enctype="multipart/form-data" class="space-y-8">
                <div>
                    <label for="image" class="block text-sm font-bold text-gray-300 mb-2 uppercase tracking-wide">Imagen
                        de Portada (Opcional)</label>
                    <input type="file" name="image" id="image" accept="image/*"
                        class="w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-white file:text-black hover:file:bg-gray-200 cursor-pointer border border-neutral-700 rounded-lg bg-neutral-950 p-2">
                    <p class="text-xs text-gray-500 mt-2">Formatos: JPG, PNG, WEBP. Máx: 2MB.</p>
                </div>

                <div>
                    <label for="title" class="block text-sm font-bold text-gray-300 mb-2 uppercase tracking-wide">Título
                        del Artículo</label>
                    <input type="text" name="title" id="title" required
                        class="w-full bg-neutral-950 border border-neutral-700 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white p-4 placeholder-gray-600 transition-all"
                        placeholder="Ej: Introducción a Docker">
                </div>

                <div>
                    <label for="content"
                        class="block text-sm font-bold text-gray-300 mb-2 uppercase tracking-wide">Contenido</label>
                    <textarea name="content" id="content" rows="12" required
                        class="w-full bg-neutral-950 border border-neutral-700 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white p-4 placeholder-gray-600 transition-all"
                        placeholder="Escribe aquí el contenido de tu post..."></textarea>
                </div>

                <div class="flex items-center justify-end pt-4 border-t border-neutral-800">
                    <button type="submit"
                        class="bg-white text-black font-bold py-3 px-8 rounded-full hover:bg-gray-200 transition-all shadow-lg transform hover:-translate-y-1">
                        Publicar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>