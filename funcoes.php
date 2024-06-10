<?php
function redireciona($url, $mgs = "", $delay = 0)
{
    echo "<meta http-equiv='refresh' content='$delay; url=$url'>";
    if (!empty($mgs))
        echo "<h1> $mgs </h1>";
    die;
}

function conexao()
{
    $conexao = mysqli_connect("localhost", "root", "", "bd_connecta");

    if (!$conexao) {
        die("Falha na conexão: " . mysqli_connect_error());
    }

    return $conexao;
}


session_start();

function verificarLogin()
{
    if (!isset($_SESSION['user'])) {
        header("Location: ../index.php");
        exit();
    }
}
