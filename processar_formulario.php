<?php
// Credenciais do banco de dados (substitua pelas suas)
$servername = "sql305.infinityfree.com"; // Ex: sqlxxx.epizy.com
$username = "if0_40027621";
$password = "260772Jr";
$dbname = "if0_40027621_teste";

// Conectar ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obter os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

// Preparar e executar a query SQL para evitar injeção de SQL
$stmt = $conn->prepare("INSERT INTO usuarios (nome, email, mensagem) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nome, $email, $mensagem);

if ($stmt->execute()) {
    echo "Dados inseridos com sucesso!";
} else {
    echo "Erro ao inserir dados: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
