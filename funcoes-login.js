const validacaoLoginForm = () => {
  const username = document.getElementById("utilizador");
  const pass = document.getElementById("password");

  // Verifica se campos estão vazios
  if (username.value === "") {
    setError(userLabel, "Este campo não pode estar vazio.");
    username.focus();
    return false;
  } else {
    setError(userLabel, "");
  }

  if (pass.value === "") {
    setError(passLabel, "Escreva a sua palavra-passe.");
    pass.focus();
    return false;
  } else {
    setError(passLabel, "");
  }
  return true;
};

const validacaoSinginForm = () => {
  const username = document.getElementById("new-utilizador");
  const pass = document.getElementById("new-password");
  const repeatPass = document.getElementById("repeat-password");

  // Verifica se campos estão vazios
  if (username.value === "") {
    setError(registerUserLabel, "Este campo não pode estar vazio.");
    username.focus();
    return false;
  } else {
    setError(registerUserLabel, "");
  }

  if (pass.value === "") {
    setError(registerPassLabel, "Escreva a sua palavra-passe.");
    pass.focus();
    return false;
  } else {
    setError(registerPassLabel, "");
  }

  if (repeatPass.value === "") {
    setError(repeatPassLabel, "Repita a sua palavra-passe.");
    repeatPass.focus();
    return false;
  } else if (pass.value != repeatPass.value) {
    // Both passwords need to be ==
    setError(repeatPassLabel, "As palavra-pass não são iguais!");
    repeatPass.focus();
    return false;
  } else {
    setError(repeatPassLabel, "");
  }

  return true;
};

const setError = (targetLabel, message) => {
  const inputControl = targetLabel.parentElement; // vou buscar o 'pai' do que lhe passo como element
  const errorDisplay = inputControl.querySelector(".error"); // vou ao 'pai' buscar o que tem a classe de error
  errorDisplay.innerText = message;
};

//Func to force the label to be on top

const inputActive = (target, labelID) => {
  const label = document.getElementById(labelID);
  const inputName = document.getElementById(target).value;

  if (inputName.trim() !== "") {
    label.classList.add("force_top_label");
  } else {
    label.classList.remove("force_top_label");
  }
};

//Func para registar pessoas

const signIn = document.getElementById("signIn-form");
const login = document.getElementById("login-form");
const haveAccountText = document.getElementById("registar");

const changeDisplay = () => {
  login.classList.toggle("disabled");
  signIn.classList.toggle("disabled");

  if (login.classList.contains("disabled")) {
    haveAccountText.innerHTML =
      '<p id="registar">Já tens uma conta? <a href="#" onclick="changeDisplay()">Faz o login.</a></p>';
    console.log("com disabled");
  } else {
    haveAccountText.innerHTML =
      '<p id="registar">Não tens uma conta? <a href="#" onclick="changeDisplay()">Regista-te!</a></p>';
    console.log("sem disabled");
  }
};
