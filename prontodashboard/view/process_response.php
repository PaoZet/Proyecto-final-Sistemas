<?php
header('Content-Type: application/json');
$input = json_decode(file_get_contents('php://input'), true);

$response = $input['response'] ?? '';

// Conectar a la base de datos
$conn = new mysqli('localhost', 'root', '', 'proyecto');

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Sanitizar la entrada
$response = $conn->real_escape_string($response);

// Guardar en la base de datos
$sql = "INSERT INTO feedback (user_response) VALUES ('$response')";
if ($conn->query($sql) === TRUE) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => $conn->error]);
}

$conn->close();
?>