<?php
class HttpClient {
    public function post($url, $data) {
        $ch = curl_init($url);
        $payload = json_encode($data['json']);
        
        $headers = [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($payload)
        ];

        // Añadimos headers personalizados (ej: Token)
        if (isset($data['headers'])) {
            foreach ($data['headers'] as $key => $value) {
                $headers[] = "$key: $value";
            }
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}
?>