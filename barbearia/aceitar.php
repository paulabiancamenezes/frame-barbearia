<?php
$servername = "localhost";
$username = "root";
$password = "Sprtuoe243";
$dbname = "banco";

try {
    $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
    exit();
}

$id = $_GET['id'];

try {
    // Atualiza o status para 'confirmado'
    $stmt = $db->prepare("UPDATE agendamentos SET status_agendamento = 'Confirmado' WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
} catch (PDOException $e) {
    echo "Erro ao aceitar o agendamento: " . $e->getMessage();
    exit();
}

// Redireciona de volta para a página de horários pendentes
header("Location: horariopendente.php");
exit();
?>
