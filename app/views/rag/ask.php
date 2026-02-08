<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="max-w-2xl mx-auto px-4 py-12">
    <div class="bg-white p-8 rounded-lg shadow-md border border-gray-200">
        <h1 class="text-3xl font-bold text-gray-900 mb-4">Pregunta a la IA</h1>
        <p class="text-gray-600 mb-6">Nuestro sistema buscará en los artículos del blog para responderte.</p>

        <?php if(isset($error)): ?>
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4"><?= $error ?></div>
        <?php endif; ?>

        <form action="index.php?action=rag_ask" method="POST" class="space-y-4">
            <div>
                <label for="question" class="block text-sm font-medium text-gray-700 mb-2">Tu pregunta</label>
                <textarea name="question" id="question" rows="4" 
                          class="w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 p-3 border"
                          placeholder="Ej: ¿Qué es el patrón MVC?"></textarea>
            </div>
            <button type="submit" class="w-full bg-purple-600 text-white font-bold py-3 px-4 rounded hover:bg-purple-700 transition shadow">
                Consultar
            </button>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>