<?php
include('../funcoes.php');

$conn = conexao();

$id_medico = $_POST['id_medico'];
$name = $_POST['name'];
$address = $_POST['address'];
$location = $_POST['location'];
$postal = $_POST['postal-code'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$spec = $_POST['espec'];

$func_edit = "UPDATE medicos SET nome = '" . $name . "', morada = '" . $address . "', cod_postal = '" . $postal . "', localidade = '" . $location . "', email = '" . $email . "', contacto = '" . $contact . "', especializacao = '" . $spec . "' WHERE id_medico = '" . $id_medico . "' ";

echo $func_edit;

$edita = mysqli_query($conn, $func_edit);

if ($edita) {
    $_SESSION['success'] = true;
    $_SESSION['notification-type'] = "Médico editado com sucesso!";
    $_SESSION['nome'] = $name;
    header("Location: index.php");
} else {
    echo "barracada";
};
