<?php
include('../funcoes.php');
$conexao = conexao();

verificarLogin();

$consulta_sql = mysqli_query($conexao, "SELECT * FROM pessoas, consultas WHERE pessoas.id_pessoa = consultas.id_pessoa ORDER BY consultas.data, consultas.horario;");

$count = mysqli_query($conexao, "SELECT COUNT(*) AS count FROM consultas;");

if ($count) {
    // Fetch the result as an associative array
    $row = mysqli_fetch_assoc($count);
} else {
    echo "Error: " . mysqli_error($conexao);
}


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
    <!-- <link rel="stylesheet" href="../UI/search-menu.css"> -->


</head>

<body>
    <div class="container">
        <!-- ------------------------------- Sidebar ------------------------------- -->
        <div class="side-bar">
            <img src="../Images/logo-icon-trans 1.svg" alt="connected clinic" class="logo" />
            <div class="sb-menu text-medium">
                <div class="clicked">
                    <span class="bar active"></span>
                    <img src="../images/icons/appointments.svg" alt="Marcações">
                    <p>Consultas</p>
                </div>
                <div>
                    <a class="sb-a" href="../Pacientes/">
                        <span class="bar"></span>

                        <img src="../images/icons/patients.svg" alt="Pacientes">
                        <p>Pacientes</p>
                    </a>
                </div>
                <div>
                    <span class="bar"></span>
                    <img src="../images/icons/dashboard.svg" alt="Dashboard">
                    <p>Dashboard</p>
                </div>
                <div>
                    <span class="bar"></span>
                    <i class="bar"></i>
                    <img src="../images/icons/requests.svg" alt="">
                    <p>Definições</p>
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
                    <button>
                        <img src="../images/icons/chevron.svg" alt="" />
                    </button>
                </div>
                <div class="user">
                    <img src="../Images/icons/Bell.svg" alt="sino" />
                    <img class="picture" src="../Images/doctor.svg" alt="imagem do utilizador" />
                    <div class="user-info">
                        <p class="text-main">Margaret Lim</p>
                        <p class="spec">Cardiologist</p>
                    </div>
                </div>
            </div>

            <!-- ---------------------------- Fim de header ---------------------------- -->

            <!-- ---------------------------- Appointments ----------------------------- -->
            <div class="bottom-right">
                <div class="section">

                    <!-- ----------------------- Content on top of table ----------------------- -->

                    <div class="section-header">
                        <h1 class="text-h2">Consultas</h1>
                        <div class="menu">

                        </div>
                    </div>


                    <!-- ------------------------------ container ------------------------------ -->
                    <div class="card-section">
                        <div class="table-header">
                            <p class="counter text-h4">
                                <?php echo $row['count'] ?>
                                consultas
                            </p>

                            <!-- ------------------------- Trocar para select -------------------------- -->
                            <!-- ------------------------- Trocar para select -------------------------- -->
                            <!-- ------------------------- Trocar para select -------------------------- -->
                            <!-- ------------------------- Trocar para select -------------------------- -->
                            <!-- ------------------------- Trocar para select -------------------------- -->
                            <!-- ------------------------- Trocar para select -------------------------- -->
                            <div class="header-container">
                                <div class="header-menu">
                                    <div class="menu">
                                        <p class="text-main">Type: All</p>
                                        <img src="../images/icons/chevron.svg" />
                                    </div>
                                    <div class="menu">
                                        <p class="text-main">Legivel para: Tudo</p>
                                        <img src="../images/icons/chevron.svg" />
                                    </div>
                                    <div class="menu">
                                        <input class="text-main search-input"" type=" text" placeholder="Pesquisa">
                                        <img src="../images/icons/lupe.svg" />
                                    </div>
                                </div>
                            </div>
                            <!-- ------------------------- Trocar para select -------------------------- -->
                            <!-- ------------------------- Trocar para select -------------------------- -->
                            <!-- ------------------------- Trocar para select -------------------------- -->
                            <!-- ------------------------- Trocar para select -------------------------- -->
                            <!-- ------------------------- Trocar para select -------------------------- -->
                            <!-- ------------------------- Trocar para select -------------------------- -->
                        </div>
                        <div class="patient-list-container">
                            <table>
                                <thead class="text-semibold">
                                    <tr>
                                        <th>Paciente</th>
                                        <th>Assunto</th>
                                        <th>Data</th>
                                        <th>Estado de COVID</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <!--  ----------------- Line with each line of data on the list ----------------  -->

                                    <?php
                                    while ($linha = mysqli_fetch_assoc($consulta_sql)) {
                                        $nome = $linha['nome'];
                                        $assunto = $linha['assunto'];
                                        $data = $linha['data'];
                                        $covid = $linha['covid'];
                                        $id_consulta = $linha['id_consulta'];
                                        $time = $linha['horario'];
                                        $type = $linha['tipo_consulta'];
                                    ?>
                                        <tr class=" click-event">
                                            <th>
                                                <div class="united">
                                                    <h4 class="text-h4"><?php echo $nome; ?></h4>
                                                    <img class="hide check" src="../Images/icons/check-one.svg" />
                                                    <img class="hide double" src="../Images/icons/check-double.svg" />
                                                </div>
                                                <div class="united">
                                                    <img src="../Images/icons/United.svg" />
                                                    <p class="text-medium" style="color: #A1ACB1">
                                                        United Healthcare
                                                    </p>
                                                </div>
                                            </th>
                                            <td><?php echo $assunto ?></td>
                                            <td class="center">
                                                <div class="date-cell">
                                                    <div class="type">
                                                        <img src="../images/icons/<?php echo $type ?>.svg" alt="">
                                                    </div>
                                                    <div>
                                                        <p class="php_date"><?php echo $data; ?></p>
                                                        <strong> <?php echo $time; ?>h</strong>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="covid"><?php echo $covid; ?></p>
                                            </td>
                                            <td class="actions">
                                                <button onclick="checkIn(this)" class="call-blue text-medium check-btn">
                                                    Check In
                                                </button>
                                                <button onclick="chamar(this)" class="call-green text-medium double-btn"> Chamar </button>
                                            </td>
                                            <td>
                                                <div class="cancel-td">
                                                    <button class="details">
                                                        <div class="img">
                                                            <img src="../Images/icons/document.svg" />
                                                        </div>
                                                    </button>
                                                    <button class="message call-blue">
                                                        <div class="img">
                                                            <img src="../Images/icons/chat.svg" />
                                                        </div>
                                                    </button>
                                                    <img class="expand" src="../Images/icons/chevron.svg" alt="expand" />
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="hidden hide-row  border">
                                            <td class="hidden-line">
                                                <div class="exams">
                                                    <p>Consulta bem estar</p>
                                                    <p>RCP</p>
                                                    <p>CCM</p>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div class="delete-appointment delete_appt cancel-td">
                                                    <img class="cancelar-round-btn" src="../images/icons/close.svg" alt="Calcelar consulta" title="Cancelar consulta">
                                                    <p class="text-semibold testep">Cancelar consulta</p>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ---------------------------- Fim de Appointments ----------------------------- -->

        </div>


        <dialog id="dialog3">
            <div class="">
                <div class="dialog3-top">
                    <img src="../images/icons/atencao.svg" alt="" style="width: 50px;">
                    <div>
                        <p class="text-h4">Pretende cancelar esta consulta?</p>
                        <p class="dialog-gray-text">Não é possivel reverter esta ação!</p>
                    </div>
                </div>
                <div>
                    <button class="btn-cancel">Cancelar</button>
                    <a class="btn-red" href="func-remove-appointment.php?id_consulta= <?php echo $id_consulta; ?>">Confirmar</a>
                </div>
            </div>
        </dialog>

        <!-- ---------------------------- Notificação ----------------------------- -->

        <?php
        if (isset($_SESSION['success'])) {
            echo '<div id="success-message" class="notification-message">
                                            <div class="circle">
                                            </div>
                                            <div class="notification-text">
                                                <p class="text-atualizado">' . $_SESSION['notification-type'] . '</p>
                                                <p class="text-nome">' . $_SESSION['nome'] . '</p>
                                            </div>
                                            <div>
                                                <img id="close-notification" class="cross-notification" src="../images/icons/cross.svg" alt="">
                                            </div>
                                        </div>';
            unset($_SESSION['success']);
            unset($_SESSION['notification-type']);
            unset($_SESSION['nome']);
        }
        ?>

        <script src="functions.js"></script>
</body>

</html>