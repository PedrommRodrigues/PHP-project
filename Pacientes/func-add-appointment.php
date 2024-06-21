<?php

include("../funcoes.php");

$conn = conexao();

$id = $_POST['id_pessoa'];
$date = $_POST['date'];
$medic = $_POST['medic'];
$time = $_POST['appt_time'];
$motive = $_POST['motive'];
$type = $_POST['type_appt'];

$get_name_command = "SELECT nome FROM pessoas WHERE id_pessoa = '" . $id . "'";

$get_name = mysqli_query($conn, $get_name_command);

if ($get_name) {
    $linha = mysqli_fetch_assoc($get_name);
    $nome = $linha['nome'];
}

$insert_appointment = "INSERT INTO consultas (id_pessoa, id_medico, assunto, horario, data, tipo_consulta) VALUES ('" . $id . "','" . $medic . "','" . $motive . "','" . $time . "','" . $date . "', '" . $type . "')";

$inserir_consulta = mysqli_query($conn, $insert_appointment);

if ($inserir_consulta) {
    $_SESSION['success'] = true;
    $_SESSION['notification-type'] = "Consulta marcada com sucesso!";
    $_SESSION['nome'] = $nome;
    header("Location: index.php");
} else {
    echo "<script> alert(\"Falha ao adicionar consulta\")</script>";
};
