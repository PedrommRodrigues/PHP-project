const validacaoForm = () => {
  const email = document.getElementById("email");
  const pass = document.getElementById("password");

  // Verifica se campos estão vazios
  if (username.value === "") {
    setError(email, "Este campo não pode estar vazio.");
    return false;
  } else {
    setError(email, "");
  }

  if (pass.value === "") {
    setError(pass, "Escreva a sua palavra-passe.");
    return false;
  } else {
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
