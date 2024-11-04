<?php
// Define o cabeçalho para que a resposta seja em JSON
header('Content-Type: application/json');

// Verifica se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém o conteúdo JSON do corpo da requisição
    $json = file_get_contents('php://input');
    
    // Decodifica o JSON para um array associativo
    $data = json_decode($json, true);
    
    // Verifica se o campo "pais" existe no JSON
    if (isset($data['usuario'])) {
        $usuario = $data['usuario'];
        
        // Define a resposta com base no valor do campo "pais"
        if ($usuario === 'jobs' $a $senha === 'jobs@123') {
            $response = ['status' => 'Usuário autenticado com sucesso'];
        } elseif ($pais === 'eua') {
            $response = ['moeda' => 'USD'];
        } elseif ($pais === 'uae') {
            $response = ['moeda' => 'UASD'];
        } else {
            // Resposta para país desconhecido
            $response = ['error' => 'País não reconhecido'];
        }
    } else {
        // Resposta caso o campo "pais" não esteja presente
        $response = ['error' => 'Campo "usuario" não encontrado'];
    }
} else {
    // Resposta caso a requisição não seja do tipo POST
    $response = ['error' => 'Método não permitido'];
}

// Converte a resposta para JSON e exibe
echo json_encode($response);
?>