<?php
include("../funcoes.php");

if (isset($_POST['id'])) {
    $id_pessoa = $_POST['id'];
    $conn = conexao();

    // Verificar conexão
    if (!$conn) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    // Consulta SQL
    // $sql = "SELECT * FROM pessoas, consultas WHERE id_pessoa = $id_pessoa";
    $sql = "SELECT * 
FROM pessoas 
JOIN consultas ON pessoas.id_pessoa = consultas.id_pessoa 
WHERE pessoas.id_pessoa = $id_pessoa 
ORDER BY consultas.data DESC 
LIMIT 1;";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row); // Retornar os dados no formato JSON
    } else {
        echo json_encode(['error' => 'Nenhuma consulta encontrada.']);
    }

    // Fechar conexão
    mysqli_close($conn);
} else {
    echo json_encode(['error' => 'ID não recebido.']);
}
