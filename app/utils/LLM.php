<?php
class LLM {
    // Genera una respuesta combinando la pregunta y el contexto encontrado
    public function generate($question, $context) {
        if (empty($context)) {
            return "Lo siento, no encontré información relevante en la base de datos para responder a: '$question'.";
        }

        // Simulamos una respuesta de IA concatenando la info
        $response = "Basado en la información de nuestra base de datos sobre: '$question'.\n\n";
        $response .= "Aquí tienes un resumen relevante extraído de nuestros artículos:\n";
        $response .= "--------------------------------------------------\n";
        $response .= $context;
        $response .= "\n--------------------------------------------------\n";
        $response .= "(Respuesta generada automáticamente por el módulo RAG local)";

        return $response;
    }
}
?>