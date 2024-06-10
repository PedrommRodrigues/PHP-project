<?php

include('funcoes.php');
$conexao = conexao();

session_start(); // Creates an ID and sends to client cookies

$email = $_POST['email'];
$password = $_POST['password'];

$verify_code = "SELECT * FROM medicos WHERE email = '" . $email . "' AND password = '" . $password . "' ";

$result =  mysqli_query($conexao, $verify_code);

if ($result) { // iff the search works and we get something as return 
    $result_data = mysqli_fetch_assoc($result);

    if ($result_data != 0) { // iff we get data its because the email and password match with a user
        $_SESSION['user'] = $email;
        redireciona('Consultas/', "", 0);
    } else {
        echo "<script> alert(\" Falha ao fazer login!\")</script>";
        redireciona("index.php", "", 0);
    }
}
