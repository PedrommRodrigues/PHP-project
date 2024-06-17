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
