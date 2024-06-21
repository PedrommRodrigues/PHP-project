<?php
include("../funcoes.php");

$conn = conexao();

$id_pessoa = $_GET['id_pessoa'];

// Para se ir buscar o nome para mostrar no erro
$nome = "SELECT nome FROM pessoas WHERE id_pessoa = $id_pessoa ";

$pesquisa = mysqli_query($conn, $nome);

while ($linha = mysqli_fetch_assoc($pesquisa)) {
    $nomePessoa = $linha['nome'];
}

$del = "DELETE FROM pessoas WHERE id_pessoa = $id_pessoa";

$func_del = mysqli_query($conn, $del);

if ($func_del) {
    $_SESSION['success'] = true;
    $_SESSION['notification-type'] = "Paciente removido com sucesso!";
    $_SESSION['nome'] = $nomePessoa;
    header("Location: index.php");
} else {
    echo "<script> alert(\"Erro ao eliminar pessoa\") </script>";
    header("Location: index.php");
}
