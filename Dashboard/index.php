<?php
include('../funcoes.php');
$conexao = conexao();

verificarLogin();

$count = mysqli_query($conexao, "SELECT COUNT(*) AS count FROM consultas WHERE consultado = 0;");

if ($count) {

    $row = mysqli_fetch_assoc($count);
    $pendentes = $row['count'];
} else {
    echo "Error: " . mysqli_error($conexao);
}

$countQuery = mysqli_query($conexao, "SELECT COUNT(*) AS count FROM consultas ;");

if ($countQuery) {

    $row = mysqli_fetch_assoc($countQuery);
    $total =  $row['count'];
} else {
    echo "Erro: " . mysqli_error($conexao);
}

$countTele = mysqli_query($conexao, "SELECT COUNT(*) AS count FROM consultas WHERE tipo_consulta = 'teleconsulta';");

if ($countTele) {

    $row = mysqli_fetch_assoc($countTele);
    $teleconsulta =  $row['count'];
} else {
    echo "Erro: " . mysqli_error($conexao);
}

/* ---------------------------------- Dados do usuario --------------------------------- */

$nome_utilizador = $_SESSION['nome_utilizador'];
$spec_utilizador = $_SESSION['spec'];

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connected</title>
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="../UI/header.css">
    <link rel="stylesheet" href="../UI/sidebar.css">
    <link rel="stylesheet" href="../UI/content-card.css">
    <link rel="stylesheet" href="../UI/table.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="../UI/menu-create-client.css">
    <link rel="stylesheet" href="../UI/menu-create-appointment.css">


    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="container">
        <!-- ------------------------------- Sidebar ------------------------------- -->
        <div id="sb" class="side-bar phone">
            <img src="../images/logotipo.svg" alt="connected clinic" class="logo" />
            <i id="close-sb" class="fa-solid fa-xl fa-x close"></i>
            <div class="sb-menu text-medium">
                <div class="clicked phone-menu-item">
                    <a class="sb-a clicked" href="#">
                        <span class="bar active"></span>
                        <i class="fa-solid fa-xl fa-table" style="margin: 10px 0px"></i>
                        <p>Dashboard</p>
                    </a>
                </div>
                <div class="phone-menu-item">
                    <a class="sb-a" href="../Consultas/">
                        <span class="bar"></span>
                        <i class="fa-solid fa-xl fa-calendar-days" style="margin: 10px 0px;"></i>
                        <p>Consultas</p>
                    </a>
                </div>
                <div class="phone-menu-item">
                    <a class="sb-a" href="../Pacientes/">
                        <span class="bar"></span>
                        <i class="fa-solid fa-xl fa-user" style="margin: 10px 0px;"></i>
                        <p>Pacientes</p>
                    </a>
                </div>
                <div class="phone-menu-item">
                    <a class="sb-a" href="../Medicos">
                        <span class="bar"></span>
                        <i class="fa-solid fa-xl fa-stethoscope" style="margin: 10px 0px;"></i>
                        <p>Médicos</p>
                    </a>
                </div>
            </div>
            <div class="logout text-medium">
                <a class="sb-a" href="../logout.php">
                    <span class="bar"></span>
                    <img src="../images/icons/log-out.svg" alt="">
                    <p>Log Out</p>
                </a>
            </div>
        </div>

        <!-- --------------------------- Fim de Sidebar ---------------------------- -->


        <!-- ------------------------------- Header -------------------------------- -->
        <div class="right-part">
            <div class="header">
                <div class="hospital text-main">
                    <img src="../images/icons/home.svg" alt="" style="color: #A1ACB1;">
                    <p>Kansas City Family Medical Care</p>
                </div>
                <div class="user">
                    <img class="phone" src="../images/icons/Bell.svg" alt="sino" />
                    <img class="picture phone" src="../images/icons/patient.svg" alt="imagem do utilizador" />
                    <div class="user-info">
                        <p class="text-main"><?php echo $nome_utilizador; ?></p>
                        <p class="spec"><?php echo $spec_utilizador; ?></p>
                    </div>
                    <i id="open-sb" class="fa-solid fa-xl fa-bars hamburger"></i>
                </div>
            </div>

            <!-- ---------------------------- Fim de header ---------------------------- -->

            <!-- ---------------------------- Appointments ----------------------------- -->
            <div class="bottom-right">
                <div class="section">

                    <!-- ----------------------- Content on top of table ----------------------- -->

                    <div class="section-header">
                        <h1 class="text-h2">Bem vindo, Dr(a) <?php echo $nome_utilizador; ?></h1>
                        <div class="menu">
                        </div>
                    </div>


                    <!-- ------------------------------ container ------------------------------ -->
                    <div class="card-section dashboard-section">
                        <div class="cartoes-top">
                            <div class="cartao">
                                <img class="cartao-img" src="../images/dashboard/requests.svg" alt="Patient Icon">
                                <div>
                                    <p class="cartao-big-text"><?php echo $total; ?></p>
                                    <p class="cartao-small-text">Total de consultas</p>
                                </div>
                            </div>
                            <div class="cartao">
                                <img class="cartao-img" src="../images/dashboard/Patiens.svg" alt="Patient Icon">
                                <div>
                                    <p class="cartao-big-text"><?php echo $pendentes; ?></p>
                                    <p class="cartao-small-text">Consultas pendentes</p>
                                </div>
                            </div>
                            <div class="cartao">
                                <img class="cartao-img" src="../images/dashboard/video.svg" alt="Patient Icon">
                                <div>
                                    <p class="cartao-big-text"><?php echo $teleconsulta; ?></p>
                                    <p class="cartao-small-text">Teleconsulta</p>
                                </div>
                            </div>
                            <div class="cartao">
                                <img class="cartao-img" src="../images/dashboard/rating.svg" alt="Patient Icon">
                                <div>
                                    <p class="cartao-big-text">4,6</p>
                                    <p class="cartao-small-text">Classificação média</p>
                                </div>
                            </div>
                        </div>
                        <div class="cartoes-bottom">
                            <div class="cartao-baixo one">
                                <p class="bottom-big-text">84%</p>
                                <p class="bottom-small-text">Visitas anuais</p>
                            </div>
                            <div class="cartao-baixo two">
                                <p class="bottom-big-text">99%</p>
                                <p class="bottom-small-text">Consultas com exames</p>
                            </div>
                            <div class="cartao-baixo three">
                                <p class="bottom-big-text">4,920 €</p>
                                <p class="bottom-small-text">Lucro resultante de exames</p>
                            </div>
                            <div class="cartao-baixo four">
                                <p class="bottom-big-text">35,700 €</p>
                                <p class="bottom-small-text">Lucro anual estimado</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ---------------------------- Fim de Appointments ----------------------------- -->

        </div>








        <script src="functions.js"></script>
</body>

</html>