<?php

include('../funcoes.php');
$conexao = conexao();

$name = $_POST['name_pessoa'];
$birthday = $_POST['birthday'];
$address = $_POST['address'];
$location = $_POST['location'];
$postal = $_POST['postal-code'];
$contact = $_POST['contact'];
$email = $_POST['email'];

$insert_pessoa = "INSERT INTO pessoas (nome_pessoa, morada, localidade, cod_postal, telefone, email, data_nascimento)
 VALUES ('" . $name . "','" . $address . "','" . $location . "','" . $postal . "','" . $contact . "','" . $email . "','" . $birthday . "')";


$func_add_person = mysqli_query($conexao, $insert_pessoa);

if ($func_add_person) {
    $_SESSION['success'] = true;
    $_SESSION['notification-type'] = "Paciente adicionado com sucesso!";
    $_SESSION['nome'] = $name;
    header("Location: index.php");
} else {
    header("Location: index.php");
}
