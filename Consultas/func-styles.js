const covidElements = document.querySelectorAll(".covid");

covidElements.forEach(function (covid) {
  if (covid.textContent.trim().toLowerCase() === "no covid") {
    covid.classList.add("green-text");
  } else {
    covid.classList.add("red-text");
  }
});

const seachFunction = (e) => {};
