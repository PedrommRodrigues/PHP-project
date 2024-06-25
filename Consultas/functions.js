/* ------------------- Func to validate call and check in ------------------- */

const check = document.querySelectorAll(".check");
const double = document.querySelectorAll(".double");
const doubleBtn = document.querySelectorAll(".double-btn");
const checkBtn = document.querySelectorAll(".check-btn");

const checkIn = (clickedElement) => {
  clickedElement.classList.add("hide");
  const siblingImage =
    clickedElement.parentNode.parentNode.querySelector(".check");

  siblingImage.classList.remove("hide");
};

const chamar = (clickedElement) => {
  clickedElement.classList.add("hide");

  // Find the parent container of the button
  const parentContainer = clickedElement.closest(".click-event");
  console.log(parentContainer);

  if (parentContainer) {
    // Find the check and double images within the parent container
    const siblingCheckImage = parentContainer.querySelector(".check");
    const siblingChamarImage = parentContainer.querySelector(".double");

    if (siblingCheckImage) {
      siblingCheckImage.classList.add("hide");
    }
    if (siblingChamarImage) {
      siblingChamarImage.classList.remove("hide");
    }
  }
};

/* ----------------------- Func to change covid color ----------------------- */

const covidElements = document.querySelectorAll(".covid");

covidElements.forEach(function (covid) {
  if (covid.textContent.trim().toLowerCase() === "no covid") {
    covid.classList.add("green-text");
  } else {
    covid.classList.add("red-text");
  }
});

/* ----------------- Func to open details on clicked person ----------------- */

const expand = document.querySelectorAll(".expand");

expand.forEach((button) => {
  button.addEventListener("click", function () {
    const currentRotation = this.style.transform === "rotate(180deg)" ? 0 : 180;
    this.style.transform = `rotate(${currentRotation}deg)`;

    const hiddenRow = this.closest("tr").nextElementSibling;
    hiddenRow.classList.toggle("show-row");
    hiddenRow.classList.toggle("hide-row");
  });
});

/* -------------------------- Func to convert date -------------------------- */

const dateDisplayed = document.querySelectorAll(".php_date");

dateDisplayed.forEach((date) => {
  let dateToFormat = date.textContent;
  let year = dateToFormat.slice(0, 4);
  let month = dateToFormat.slice(5, 7);
  let day = dateToFormat.slice(8);
  let shortMonth;

  const months = [
    "Jan",
    "Fev",
    "Mar",
    "Abr",
    "Mai",
    "Jun",
    "Jul",
    "Ago",
    "Set",
    "Out",
    "Nov",
    "Dez"
  ];

  shortMonth = months[parseInt(month, 10) - 1];

  formatedDate = day + " " + shortMonth;

  date.textContent = formatedDate;

  console.log(formatedDate);
});

/* ---------------------------- Edit appointment ---------------------------- */

const editAppointment = document.querySelectorAll(".edit");
const dialog2 = document.getElementById("dialog2");
const closeModal = document.getElementById("close-modal");

editAppointment.forEach((btn) => {
  btn.addEventListener("click", () => {
    dialog2.showModal();
  });
});

closeModal.addEventListener("click", () => {
  dialog2.close();
});

/* --------------------------- Delete appointment --------------------------- */

const deleteAppt = document.querySelectorAll(".delete_appt");
const dialog3 = document.getElementById("dialog3");
const closeDialog = document.querySelector(".btn-cancel");

deleteAppt.forEach((button) => {
  button.addEventListener("click", () => {
    dialog3.showModal();
  });
});

closeDialog.addEventListener("click", () => {
  dialog3.close();
});

/* -------------------------- Notification handler -------------------------- */

// Função para remover a mensagem de sucesso após 5 segundos e com click na img
function hideSuccessMessage() {
  const successMessage = document.getElementById("success-message");
  const closeNotification = document.getElementById("close-notification");

  closeNotification.addEventListener("click", () => {
    successMessage.remove();
  });

  if (successMessage) {
    setTimeout(() => {
      successMessage.style.opacity = "0";
      setTimeout(() => {
        successMessage.remove();
      }, 500);
    }, 5000);
  }
}

// Chama a função quando a página é carregada
window.onload = hideSuccessMessage;
