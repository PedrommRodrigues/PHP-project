<?php
include('../funcoes.php');

$conn = conexao();

$id_pessoa = $_POST['id_pessoa'];
$medico = $_POST['medic'];
$data_consulta = $_POST['date'];
$horario = $_POST['appt_time'];
$motivo = $_POST['motive'];
$tipo = $_POST['type_appt'];

$func_edit = "UPDATE consultas SET id_medico = '" . $medico . "', data = '" . $data_consulta . "', horario = '" . $horario . "', assunto = '" . $motivo . "', tipo_consulta = '" . $tipo . "' WHERE id_pessoa = '" . $id_pessoa . "' ";

$get_name_command = "SELECT nome_pessoa FROM pessoas WHERE id_pessoa = '" . $id_pessoa . "'";

$get_name = mysqli_query($conn, $get_name_command);

if ($get_name) {
    $linha = mysqli_fetch_assoc($get_name);
    $nome = $linha['nome_pessoa'];
}



$edita = mysqli_query($conn, $func_edit);

if ($edita) {
    $_SESSION['success'] = true;
    $_SESSION['notification-type'] = "Consulta editada com sucesso!";
    $_SESSION['nome'] = $nome;
    header("Location: index.php");
} else {
    echo "barracada";
};
