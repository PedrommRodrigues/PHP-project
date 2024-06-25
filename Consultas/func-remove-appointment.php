<?php
include("../funcoes.php");

$conn = conexao();

$id_consulta = $_GET['id_consulta'];


// Para se ir buscar o nome para mostrar no erro
$nome = "SELECT nome_pessoa FROM pessoas, consultas WHERE id_consulta = $id_consulta AND pessoas.id_pessoa = consultas.id_pessoa";

$pesquisa = mysqli_query($conn, $nome);

while ($linha = mysqli_fetch_assoc($pesquisa)) {
    $nomePessoa = $linha['nome_pessoa'];
}

$del = "DELETE FROM consultas WHERE id_consulta = $id_consulta";


$func_del = mysqli_query($conn, $del);

if ($func_del) {
    $_SESSION['success'] = true;
    $_SESSION['notification-type'] = "Consulta cancelada com sucesso!";
    $_SESSION['nome'] = $nomePessoa;
    header("Location: index.php");
} else {
    echo "<script> alert(\"Erro ao eliminar pessoa\") </script>";
    header("Location: index.php");
}
