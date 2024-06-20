<?php

include("../funcoes.php");

$conn = conexao();

$id = $_POST['id_pessoa'];
$date = $_POST['date'];
$medic = $_POST['medic'];
$time = $_POST['appt_time'];
$motive = $_POST['motive'];

$insert_appointment = "INSERT INTO consultas (id_pessoa, id_medico, assunto, horario, data) VALUES ('" . $id . "','" . $medic . "','" . $motive . "','" . $time . "','" . $date . "')";

$inserir_consulta = mysqli_query($conn, $insert_appointment);

if ($inserir_consulta) {
    header("Location: index.php");
} else {
    echo "<script> alert(\"Falha ao adicionar consulta\")</script>";
};
