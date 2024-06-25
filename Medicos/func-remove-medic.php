<?php
include("../funcoes.php");

$conn = conexao();

$id_medico = $_GET['id_medico'];

// Para se ir buscar o nome para mostrar no erro
$nome = "SELECT nome FROM medicos WHERE id_medico = $id_medico ";

$pesquisa = mysqli_query($conn, $nome);

while ($linha = mysqli_fetch_assoc($pesquisa)) {
    $nomePessoa = $linha['nome'];
}

$del = "DELETE FROM medicos WHERE id_medico = $id_medico";

echo $del;

$func_del = mysqli_query($conn, $del);

if ($func_del) {
    $_SESSION['success'] = true;
    $_SESSION['notification-type'] = "Médico removido com sucesso!";
    $_SESSION['nome'] = $nomePessoa;
    header("Location: index.php");
} else {
    echo "<script> alert(\"Erro ao eliminar pessoa\") </script>";
    header("Location: index.php");
}
