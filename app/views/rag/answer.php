<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="max-w-3xl mx-auto px-4 py-12">
    <div class="mb-8 p-6 bg-neutral-900 rounded-2xl border border-neutral-800">
        <h2 class="text-xs font-bold text-orange-500 uppercase tracking-widest mb-3">Tu Pregunta</h2>
        <p class="text-2xl text-white font-serif italic leading-relaxed">"<?= htmlspecialchars($question) ?>"</p>
    </div>

    <div
        class="bg-neutral-900 p-8 rounded-2xl shadow-2xl border-l-4 border-orange-500 mb-8 border-y border-r border-neutral-800">
        <h2 class="text-xl font-bold text-orange-400 mb-6 flex items-center">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z">
                </path>
            </svg>
            Respuesta Generada
        </h2>
        <div class="prose max-w-none text-gray-300 whitespace-pre-wrap leading-relaxed prose-invert">
            <?= htmlspecialchars($answer) ?>
        </div>
    </div>

    <?php if (!empty($results)): ?>
        <div class="bg-neutral-950 p-6 rounded-2xl border border-neutral-800">
            <h3 class="font-bold text-white mb-4 uppercase tracking-wide text-sm">Fuentes encontradas en la BD</h3>
            <ul class="space-y-3">
                <?php foreach ($results as $res): ?>
                    <li class="flex items-start">
                        <span class="text-orange-500 mr-2 mt-1">•</span>
                        <div>
                            <a href="index.php?action=show_post&id=<?= $res['id'] ?>"
                                class="text-blue-400 hover:text-white transition-colors font-medium text-lg">
                                <?= htmlspecialchars($res['title']) ?>
                            </a>
                            <div class="text-xs text-gray-500 mt-1">Relevancia: <span
                                    class="text-gray-300"><?= number_format($res['score'], 2) ?></span></div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="mt-8 text-center">
        <a href="index.php?action=rag_ask" class="text-gray-500 hover:text-gray-900 font-medium">&larr; Hacer otra
            pregunta</a>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>