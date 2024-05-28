const validacaoForm = () => {
  const username = document.getElementById("utilizador");
  const pass = document.getElementById("password");

  // Verifica se campos estão vazios
  if (username.value === "") {
    // username.classList.add("input-error"); era a classe para adicionar border
    setError(username, "Este campo não pode estar vazio.");
    return false;
  } else {
    // username.classList.remove("input-error");
    setError(username, "");
  }

  if (pass.value === "") {
    // pass.classList.add("input-error");
    setError(pass, "Escreva a sua palavra-passe.");
    return false;
  } else {
    // password.classList.remove("input-error");
    setError(pass, "");
  }
  return true;
};

// Função que vai buscar o elemento e adiciona o texto de erro
const setError = (element, message) => {
  const inputControl = element.parentElement; // vou buscar o 'pai' do que lhe passo como element
  const errorDisplay = inputControl.querySelector(".error"); // vou ao 'pai' buscar o que tem a classe de error
  errorDisplay.innerText = message;
  element.focus();
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
