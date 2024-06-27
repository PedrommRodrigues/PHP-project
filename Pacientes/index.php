<?php
include('../funcoes.php');
$conexao = conexao();

verificarLogin();

$consulta_sql = mysqli_query($conexao, "SELECT * FROM pessoas ORDER BY nome_pessoa;");

// Calculating the number of lines on patients table 

$count = mysqli_query($conexao, "SELECT COUNT(*) AS count FROM pessoas;");

if ($count) {
    // Fetch the result as an associative array
    $row = mysqli_fetch_assoc($count);
} else {
    echo "Error: " . mysqli_error($conexao);
}

$nome_utilizador = $_SESSION['nome_utilizador'];
$spec_utilizador = $_SESSION['spec'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connected</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="../UI/menu-create-client.css">
    <link rel="stylesheet" href="../UI/menu-create-appointment.css">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="../UI/header.css">
    <link rel="stylesheet" href="../UI/sidebar.css">
    <link rel="stylesheet" href="../UI/content-card.css">
    <link rel="stylesheet" href="../UI/table.css">

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
                <div class="phone-menu-item">
                    <a class="sb-a" href="../Consultas/">
                        <span class="bar "></span>
                        <i class="fa-solid fa-xl fa-calendar-days" style="margin: 10px 0px;"></i>
                        <p>Consultas</p>
                    </a>
                </div>
                <div class="clicked phone-menu-item">
                    <span class="bar active"></span>
                    <i class="fa-solid fa-xl fa-user" style="margin: 10px 0px;"></i>
                    <p>Pacientes</p>
                </div>
                <div class="phone-menu-item">
                    <a class="sb-a" href="../Medicos/">
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

            <!-- ---------------------------- Patients ----------------------------- -->
            <div class="bottom-right">
                <div class="section">

                    <!-- ----------------------- Content on top of table ----------------------- -->

                    <div class="section-header">
                        <h1 class="text-h2">Pacientes</h1>
                        <div id="openDialog1" class="add-menu">
                            <img class="add-btn" src="../images/icons/add.svg" alt="Adicionar" title="adicionar novo paciente">
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
                            <div class="header-container">
                                <div class="header-menu">
                                    <div class="menu phone">
                                        <p class="text-main phone">Type: All</p>
                                        <img class="phone" src="../images/icons/chevron.svg" />
                                    </div>
                                    <div class="menu phone">
                                        <p class="text-main phone">Médico: Todos</p>
                                        <img class="phone" src="../images/icons/chevron.svg" />
                                    </div>
                                    <div class="menu">
                                        <input id="pesquisa" class="text-main search-input"" type=" text" placeholder="Pesquisa">
                                        <img src="../images/icons/lupe.svg" />
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="patient-list-container">
                            <table>
                                <thead class="text-semibold">
                                    <tr>
                                        <th>Nome</th>
                                        <th>Última consulta</th>
                                        <th class="marcar-phone">Marcar consulta</th>
                                        <th class="phone">Exames executados</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <!--  ----------------- Line with each line of data on the list ----------------  -->

                                    <?php
                                    while ($linha = mysqli_fetch_assoc($consulta_sql)) {
                                        $nome = $linha['nome_pessoa'];
                                        $id_pessoa = $linha['id_pessoa'];
                                    ?>
                                        <tr data-pessoa-id="<?php echo $id_pessoa; ?>" class="linha-tabela">
                                            <th>
                                                <div class="united">
                                                    <h4 class="text-h4 nome spacing-phone"><?php echo $nome; ?></h4>
                                                </div>
                                                <div class="united phone">
                                                    <img class="phone" src="../images/icons/United.svg" />
                                                    <p class="text-medium phone" style="color: #A1ACB1">
                                                        United Healthcare
                                                    </p>
                                                </div>
                                            </th>
                                            <td class="spacing-phone ultima-consulta">Sem medico</td>
                                            <td class="center">
                                                <div class="type">
                                                </div>
                                                <div class="centered">
                                                    <button class="details text-medium openDialog2 details-phone spacing-phone" pessoa_id="<?php echo $id_pessoa; ?>">Marcar uma Consulta</button>
                                                </div>
                                            </td>
                                            <td class="phone">
                                                <div class="exams text-medium " style="padding-left: 0px">
                                                    <p class="eeg">Consulta estado geral</p>
                                                    <p class="pa">PAM</p>
                                                    <p class="re">RE</p>
                                                </div>
                                            </td>
                                            <td class="actions">
                                            </td>
                                            <td>
                                                <div class="cancel-td-specific cancel-td">
                                                    <a title="Ver consultas" href="../Pacientes/Detalhes?id_pessoa=<?php echo $id_pessoa; ?>" class="details">
                                                        <div class="img">
                                                            <img src="../images/icons/document.svg" />
                                                        </div>
                                                    </a>
                                                    <a title="Enviar email" href="mailto:<?php echo $email; ?>" class="message call-blue">
                                                        <div class="img">
                                                            <img src="../images/icons/chat.svg" />
                                                        </div>
                                                    </a>
                                                    <img id_pessoa="<?php echo $id_pessoa; ?>" class="expand" src="../images/icons/chevron.svg" alt="expand" />
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="hidden hide-row border">
                                            <td></td>
                                            <td class="phone"></td>
                                            <td class="phone"></td>
                                            <td class="phone"></td>
                                            <td>
                                                <div pessoa_id="<?php echo $id_pessoa; ?>" class=" hidden-buttons edit cancel-td">
                                                    <img src="../images/icons/edit.svg" alt="Apagar cliente" title="Apagar cliente">
                                                    <p class="text-semibold edit-patient">Editar cliente</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div id_pessoa="<?php echo $id_pessoa; ?>" class="cancel-td hidden-buttons delete-patient">
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
                        <input id="php_nome" class="inputs " name="name_pessoa" type="text" />
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
                        <select name="medic" class="inputs" value="">
                            <?php
                            $sql = "SELECT * FROM medicos ";
                            $consulta_sql = mysqli_query($conexao, $sql);


                            while ($linha = mysqli_fetch_assoc($consulta_sql)) {
                                $nome = $linha['nome'];
                                $id_medico = $linha['id_medico'];
                                $spec = $linha['especializacao'];

                            ?>
                                <option value="<?php if (isset($id_medico)) {
                                                    echo $id_medico;
                                                } ?>"><?php if (isset($nome)) {
                                                            echo $nome;
                                                        } ?> - <?php if (isset($nome)) {
                                                                    echo $spec;
                                                                } ?> </option>
                            <?php } ?>
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
                    <a id="remove-link" href="" class="btn-red">Confirmar</a>
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