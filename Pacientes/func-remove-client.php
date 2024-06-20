<?php
include("../funcoes.php");

$conn = conexao();

$id_pessoa = $_GET['id_pessoa'];

$del = "DELETE FROM pessoas WHERE id_pessoa = $id_pessoa";

$func_del = mysqli_query($conn, $del);

if ($func_del) {
    header("Location: index.php");
} else {
    echo "<script> alert(\"Erro ao eliminar pessoa\") </script>";
    header("Location: index.php");
}
