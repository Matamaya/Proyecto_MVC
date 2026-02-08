<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="max-w-3xl mx-auto px-4 py-12">
    <div class="mb-8">
        <h2 class="text-xl font-bold text-gray-500 uppercase tracking-wide text-sm mb-2">Tu Pregunta</h2>
        <p class="text-2xl text-gray-900 font-serif italic">"<?= htmlspecialchars($question) ?>"</p>
    </div>

    <div class="bg-white p-8 rounded-lg shadow-lg border-l-4 border-purple-500 mb-8">
        <h2 class="text-xl font-bold text-purple-700 mb-4">Respuesta Generada</h2>
        <div class="prose max-w-none text-gray-700 whitespace-pre-wrap leading-relaxed">
            <?= htmlspecialchars($answer) ?>
        </div>
    </div>

    <?php if (!empty($results)): ?>
    <div class="bg-gray-50 p-6 rounded border border-gray-200">
        <h3 class="font-bold text-gray-700 mb-3">Fuentes encontradas en la BD:</h3>
        <ul class="list-disc pl-5 text-sm text-gray-600 space-y-1">
            <?php foreach($results as $res): ?>
                <li>
                    <a href="index.php?action=show_post&id=<?= $res['id'] ?>" class="text-blue-600 hover:underline">
                        <?= htmlspecialchars($res['title']) ?>
                    </a> 
                    (Relevancia: <?= number_format($res['score'], 2) ?>)
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>

    <div class="mt-8 text-center">
        <a href="index.php?action=rag_ask" class="text-gray-500 hover:text-gray-900 font-medium">&larr; Hacer otra pregunta</a>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>