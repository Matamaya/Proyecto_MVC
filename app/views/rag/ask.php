<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="max-w-2xl mx-auto px-4 py-12">
    <div class="bg-neutral-900 p-8 rounded-2xl shadow-2xl border border-neutral-800">
        <h1 class="text-3xl font-black text-white mb-4 tracking-tight">Pregunta a la IA</h1>
        <p class="text-gray-400 mb-6">Nuestro sistema buscará en los artículos del blog para responderte.</p>

        <?php if (isset($error)): ?>
            <div class="bg-red-900/20 text-red-400 p-4 rounded-lg mb-6 border border-red-500/20"><?= $error ?></div>
        <?php endif; ?>

        <form action="index.php?action=rag_ask" method="POST" class="space-y-6">
            <div>
                <label for="question" class="block text-sm font-bold text-gray-300 mb-2 uppercase tracking-wide">Tu
                    pregunta</label>
                <textarea name="question" id="question" rows="4"
                    class="w-full bg-neutral-950 border border-neutral-700 rounded-lg shadow-sm focus:ring-2 focus:ring-orange-500 focus:border-transparent text-white p-4 placeholder-gray-600 transition-all"
                    placeholder="Ej: ¿Qué es el patrón MVC?"></textarea>
            </div>
            <button type="submit"
                class="w-full bg-gradient-to-r from-orange-600 to-purple-600 text-white font-bold py-3 px-4 rounded-full hover:from-orange-700 hover:to-purple-700 transition-all shadow-lg transform hover:-translate-y-1">
                Consultar
            </button>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>