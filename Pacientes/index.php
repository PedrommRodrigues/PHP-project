<?php
include('../funcoes.php');
$conexao = conexao();

verificarLogin();

$consulta_sql = mysqli_query($conexao, "SELECT * FROM pessoas;");

// Calculating the number of lines on patients table 

$count = mysqli_query($conexao, "SELECT COUNT(*) AS count FROM pessoas;");

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
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="menu-create-client.css">
    <link rel="stylesheet" href="menu-create-appointment.css">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="../UI/header.css">
    <link rel="stylesheet" href="../UI/sidebar.css">
    <link rel="stylesheet" href="../UI/content-card.css">
    <link rel="stylesheet" href="../UI/table.css">

</head>

<body>
    <div class="container">
        <!-- ------------------------------- Sidebar ------------------------------- -->
        <div class="side-bar">
            <img src="../Images/logo-icon-trans 1.svg" alt="connected clinic" class="logo" />
            <div class="sb-menu text-medium">
                <div>
                    <a class="sb-a" href="../Consultas/">
                        <span class="bar "></span>
                        <img src="../images/icons/appointments.svg" alt="Marcações">
                        <p>Consultas</p>
                    </a>
                </div>
                <div class="clicked">
                    <span class="bar active"></span>
                    <img src="../images/icons/patients.svg" alt="Pacientes">
                    <p>Pacientes</p>
                </div>
                <div>
                    <span class="bar"></span>
                    <img src="../images/icons/dashboard.svg" alt="Dashboard">
                    <i class="bar"></i>
                    <p>Dashboard</p>
                </div>
                <div>
                    <span class="bar"></span>
                    <i class="bar"></i>
                    <img src="../images/icons/requests.svg" alt="">
                    <p>Requests</p>
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

            <!-- ---------------------------- Patients ----------------------------- -->
            <div class="bottom-right">
                <div class="section">

                    <!-- ----------------------- Content on top of table ----------------------- -->

                    <div class="section-header">
                        <h1 class="text-h2">Pacientes</h1>
                        <div id="openDialog1" class="add-menu">
                            <img class="add-btn" src="../images/icons/add.svg" alt="Adicionr" title="adicionar novo paciente">
                            <p class="add-text">Adicionar novo paciente</p>
                        </div>

                    </div>


                    <!-- ------------------------------ Container ------------------------------ -->
                    <div class="card-section">
                        <div class="table-header">
                            <p class="counter text-h4">
                                <?php echo $row['count'] ?>
                                <span style="font-weight: 400;">pacientes no total</span>

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
                                        <th>Nome</th>
                                        <th>Médico de familia</th>
                                        <th>Marcar consulta</th>
                                        <th>Exames executados</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <!--  ----------------- Line with each line of data on the list ----------------  -->

                                    <?php
                                    while ($linha = mysqli_fetch_assoc($consulta_sql)) {
                                        $nome = $linha['nome'];
                                        $id_pessoa = $linha['id_pessoa'];
                                    ?>
                                        <tr>
                                            <th>
                                                <div class="united">
                                                    <h4 class="text-h4"><?php echo $nome; ?></h4>
                                                </div>
                                                <div class="united">
                                                    <img src="../Images/icons/United.svg" />
                                                    <p class="text-medium" style="color: #A1ACB1">
                                                        United Healthcare
                                                    </p>
                                                </div>
                                            </th>
                                            <td>Sem medico</td>
                                            <td class="center">
                                                <div class="type">
                                                </div>
                                                <div class="centered">
                                                    <button class="details text-medium openDialog2" pessoa_id="<?php echo $id_pessoa; ?>">Marcar uma Consulta</button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="exams text-medium " style="padding-left: 0px">
                                                    <p>Consulta bem estar</p>
                                                    <p>RCP</p>
                                                    <p>CCM</p>
                                                </div>
                                            </td>
                                            <td class="actions">
                                            </td>
                                            <td class="last-td">
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
                                            </td>
                                        </tr>
                                        <tr class="hidden hide-row border">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div pessoa_id="<?php echo $id_pessoa; ?>" class=" hidden-buttons edit cancel-td">
                                                    <img src="../images/icons/edit.svg" alt="Apagar cliente" title="Apagar cliente">
                                                    <p class="text-semibold edit-patient">Editar cliente</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="cancel-td hidden-buttons delete-patient">
                                                    <img class="cancelar-round-btn-red delete-patient" src="../images/icons/close.svg" alt="Apagar cliente" title="Apagar cliente">
                                                    <p class="text-semibold delete-patient">Apagar cliente</p>
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
        </div>

        <!-- ---------------------------- Fim de Appointments ----------------------------- -->




        <!--  ------------------------------- create patient modal ------------------------------  -->

        <dialog id="dialog1">
            <div class="add-card">
                <div class="card-header">
                    <h2 id="form-title">Criar novo cliente</h2>
                </div>
                <div class="card-form">
                    <form action="func-add-client.php" method="post" id="create-edit">
                        <input id="php_id" class="php_id" name="id_pessoa" value=""></input>
                        <label>Nome</label>
                        <input id="php_nome" class="inputs " name="name" type="text" />
                        <label>Data de nascimento</label>
                        <input id="php_nascimento" class="inputs " name="birthday" type="date" value="" min="1950-01-01" max="2027-12-31" />
                        <label>Morada</label>
                        <input id="php_morada" class="inputs " name="address" type="text" value="" />
                        <label>Código postal</label>
                        <input id="php_postal" class="inputs" name="postal-code" type="text" value="" />
                        <label>Localidade</label>
                        <input id="php_localidade" class="inputs " name="location" type="text" value="" />
                        <label>Contacto</label>
                        <input id="php_contacto" class="inputs " name="contact" type="tel" value="" />
                        <label>Email</label>
                        <input id="php_email" class="inputs " name="email" type="email" />
                        <div class="submit-section">
                            <button type="reset" class="btn-cancel text-medium close-modal">
                                Cancelar
                            </button>
                            <button id="form-btn" type="submit" class="btn-accept text-medium">
                                Criar novo cliente
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </dialog>

        <!--  ------------------------------- create appointment modal ------------------------------  -->

        <dialog id="dialog2">
            <div class="add-card">
                <div class="card-header">
                    <h2>Criar nova consulta</h2>
                </div>
                <div class="client-details">
                    <p>Paciente</p>
                    <p class="text-h4 php_nome"></p>
                    <p class="text-medium text-gray php_nascimento"></p>
                </div>
                <div class="client-contacts">
                    <div>
                        <img src="../images/icons/phone.svg" alt="phone" title="telemovel">
                        <p class="php_contacto"></p>
                    </div>
                    <div>
                        <img src="../images/icons/email.svg" alt="envelope" title="envelope">
                        <p class="php_email"></p>
                    </div>
                    <div>
                        <img src="../images/icons/map.svg" alt="ponto no mapa" title="ponto no mapa">
                        <p class="php_morada"></p>
                    </div>
                </div>
                <div class="card-form">
                    <form method="post" metod="post" action="func-add-appointment.php">
                        <input class="php_id" name="id_pessoa" value=""></input>
                        <label for="medic">Médico</label>
                        <select name="medic" class="inputs">
                            <option value="1">Medico 1</option>
                            <option value="2">Medico 2</option>
                        </select>
                        <label for="date">Data da consulta</label>
                        <input class="inputs" name="date" type="date" value="" min="2000-01-01" max="2027-12-31" />
                        <label for="appt_time">Horário</label>
                        <input class="inputs" name="appt_time" type="time" value="" />
                        <label>Motivo</label>
                        <input class="inputs" name="motive" type="text" value="" />
                        <label for="type_appt">Tipo de consulta</label>
                        <select name="type_appt" id="" class="inputs">
                            <option value="presencial">Presencial</option>
                            <option value="teleconsulta">Teleconsulta</option>
                        </select>
                        <div class="submit-section">
                            <button type="reset" class="btn-cancel text-medium close-modal">
                                Cancelar
                            </button>
                            <button class="btn-accept text-medium ">
                                Criar nova consulta
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </dialog>

        <!-- ------------------------- delete patient  -------------------------- -->

        <dialog id="dialog3">
            <div class="">
                <div class="dialog3-top">
                    <img src="../images/icons/atencao.svg" alt="" style="width: 50px;">
                    <div>
                        <p class="text-h4">Pretende elimintar este paciente?</p>
                        <p class="dialog-gray-text">Não é possivel reverter esta ação!</p>
                    </div>
                </div>
                <div>
                    <button id="btn-close" class="btn-cancel">Cancelar</button>
                    <a href="func-remove-patient.php?id_pessoa=<?php echo $id_pessoa; ?>" class="btn-red">Confirmar</a>
                </div>
            </div>
        </dialog>

        <!-- ------------------------- notificaçao -------------------------- -->

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