<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles-login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ------------------------------- Letras -------------------------------- -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


    <!-- ---------------------------- font awesome ----------------------------- -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="wrapper">

        <!-- --------------------------- Form de loggin ---------------------------- -->

        <div class="left-half">
            <form id="login-form" method="post" action="func_login.php" onsubmit="return validacaoLoginForm()">
                <img class="logo" src="images/company-logo.svg" alt="Logotipo" title="Logotipo connected clinic">
                <h1>Iniciar sessão</h1>
                <div class="input-control">
                    <div onchange="inputActive('email', 'userLabel')" class="input-section">
                        <i class="fa-solid fa-user"></i>
                        <input class="test_input" type="text" id="email" name="email" title="email">
                    </div>
                    <label for="email" id="userLabel" class="test_label">Email</label>
                    <div class="error"></div>
                </div>
                <div class="input-control">
                    <div onchange="inputActive('password', 'passLabel')" class="input-section">
                        <i class="fa-solid fa-lock"></i>
                        <input class="test_input" type="password" name="password" id="password" onchange="inputActive(this,'test_label')" title="password">
                    </div>
                    <label for="username" id="passLabel" class="test_label">Palavra-Passe</label>
                    <div class="error"></div>
                </div>
                <div class="checkbox-section">
                    <input type="checkbox" id="keep-logged">
                    <label for="keep-logged">Manter sessão aberta?</label>
                </div>
                <div class="btn-section">
                    <div>
                        <button type="submit" class="btn-blue">Entrar</button>
                        <a class="forgotPw" href="#">Esqueceu a palavra-pass?</a>
                    </div>
                    <p>Não tens uma conta? <a href="#" onclick="changeDisplay()">
                            Regista-te!</a></p>
                </div>
            </form>


            <!-- --------------------------- Form de registo --------------------------- -->


            <form id="signIn-form" class="disabled" action="func_registo.php" method="post" onsubmit="return validacaoSinginForm()">
                <img class="logo" src="images/company-logo.svg" alt="Logotipo" title="Logotipo connected clinic">
                <h1>Registar</h1>
                <div class="input-control">
                    <div onchange="inputActive('new-email', 'registerUserLabel')" class="input-section">
                        <i class="fa-solid fa-user"></i>
                        <input class="test_input" type="email" id="new-email" name="email" title="email">
                    </div>
                    <label for="new-email" id="registerUserLabel" class="test_label">Email</label>
                    <div class="error"></div>
                </div>
                <div class="input-control">
                    <div onchange="inputActive('new-password', 'registerPassLabel')" class="input-section">
                        <i class="fa-solid fa-lock"></i>
                        <input class="test_input" type="password" name="password" id="new-password" title="password">
                    </div>
                    <label for="new-password" id="registerPassLabel" class="test_label">Palavra-Passe</label>
                    <div class="error"></div>
                </div>
                <div class="input-control">
                    <div onchange="inputActive('repeat-password', 'repeatPassLabel')" class="input-section">
                        <i class="fa-solid fa-lock"></i>
                        <input class="test_input" type="password" name="password" id="repeat-password" title="password">
                    </div>
                    <label for="repeat-password" id="repeatPassLabel" class="test_label">Repita a Palavra-Passe</label>
                    <div class="error"></div>
                </div>
                <div class="btn-section">
                    <div>
                        <button type="submit" class="btn-blue">Registar</button>
                    </div>
                    <p class=" singin-link">Já tens uma conta? <a href="#" onclick="changeDisplay()">Ir para login!</a>
                    </p>
                </div>
            </form>
        </div>

        <!-- ----------------------------- Right half ------------------------------ -->

        <div class="right-half">
            <img class="login-img" src="images/loggin-img.png" alt="Imagem ilustrativa de Iniciar sessão" title="Iniciar sessão">
            <p id="registar">Não tens uma conta? <a href="#" onclick="changeDisplay()">Regista-te!</a></p>
        </div>
    </div>

    <script src="funcoes-login.js"></script>
</body>

</html>