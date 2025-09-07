//Title Stand For Button on About Page
document.getElementById("HeaderTextSwapButton").onclick = headerSwitchText;

const websiteHeaderLink = document.querySelector("#HeaderLink");

function headerSwitchText() {
  if (websiteHeaderLink.textContent === "SeaFilmz") {
    websiteHeaderLink.textContent = "Seattle Filmz";
  }
  else {
    websiteHeaderLink.textContent = "SeaFilmz";
  }
}