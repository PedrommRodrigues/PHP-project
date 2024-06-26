<?php
include('../../funcoes.php');

$conn = conexao();

$id_consulta = $_POST['id_consulta'];
$notas = $_POST['notas'];
$re = $_POST['re'];
$pam = $_POST['pam'];
$eeg = $_POST['eeg'];

$func_edit = "UPDATE consultas SET notas = '" . $notas . "', pressao = '" . $pam . "', exames = '" . $re . "', eeg = '" . $eeg . "', consultado = 1 WHERE id_consulta = '" . $id_consulta . "' ";

$edita = mysqli_query($conn, $func_edit);

if ($edita) {
    $_SESSION['success'] = true;
    $_SESSION['notification-type'] = "Consulta guardada com sucesso!";
    $_SESSION['nome'] = $nome;
    header("Location: ../index.php");
} else {
    echo "barracada";
};
