//Title Stand For Button on About Page
const headerTextSwapButton = document.getElementById("HeaderTextSwapButton");

const websiteHeaderLink = document.querySelector("#HeaderLink");

function headerSwitchText() {
  if (websiteHeaderLink.textContent === "SeaFilmz") {
    websiteHeaderLink.textContent = "Seattle Filmz";
  }
  else {
    websiteHeaderLink.textContent = "SeaFilmz";
  }
}

headerTextSwapButton.addEventListener("click", headerSwitchText);