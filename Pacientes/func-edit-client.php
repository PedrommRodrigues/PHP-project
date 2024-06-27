<?php
include('../funcoes.php');

$conn = conexao();

$id_pessoa = $_POST['id_pessoa'];
$name = $_POST['name_pessoa'];
$birthday = $_POST['birthday'];
$address = $_POST['address'];
$location = $_POST['location'];
$postal = $_POST['postal-code'];
$contact = $_POST['contact'];
$email = $_POST['email'];

$func_edit = "UPDATE pessoas SET nome_pessoa = '" . $name . "', morada = '" . $address . "', cod_postal = '" . $postal . "', localidade = '" . $location . "', email = '" . $email . "', telefone = '" . $contact . "', data_nascimento = '" . $birthday . "' WHERE id_pessoa = '" . $id_pessoa . "' ";

// echo $func_edit;

$edita = mysqli_query($conn, $func_edit);

if ($edita) {
    $_SESSION['success'] = true;
    $_SESSION['notification-type'] = "Paciente editado com sucesso!";
    $_SESSION['nome'] = $name;
    header("Location: index.php");
} else {
    echo "barracada";
};
