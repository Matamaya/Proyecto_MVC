<?php
require_once __DIR__ . '/../models/Retriever.php';

class RagController {

    protected function render($view, $data = []) {
        extract($data);
        include __DIR__ . '/../views/' . $view;
    }

    public function ask() {
        // Si venimos del formulario (POST)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $question = trim($_POST['question'] ?? '');

            if (empty($question)) {
                $error = "Por favor escribe una pregunta.";
                return $this->render('rag/ask.php', compact('error'));
            }

            // 1. Recuperar info relevante (Retrieval)
            $retriever = new Retriever();
            $results = $retriever->search($question);

            // 2. Construir contexto (Juntar los textos encontrados) [cite: 1214-1222]
            $context = "";
            foreach ($results as $r) {
                $context .= "Título: " . $r['title'] . "\n";
                $context .= "Contenido: " . substr($r['content'], 0, 300) . "...\n\n"; // Tomamos un fragmento
            }

            // 3. Generar respuesta (Generation)
            $llm = new LLM();
            $answer = $llm->generate($question, $context);

            // 4. Mostrar resultado
            return $this->render('rag/answer.php', compact('question', 'answer', 'results'));
        }

        // Si entramos por primera vez, mostrar formulario vacío
        return $this->render('rag/ask.php');
    }
}
?>