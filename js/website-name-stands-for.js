//Title Stand For Button on About Page
document.getElementById("HeaderTextSwapButton").onclick = headerSwitchText;

const websiteHeaderLink = document.querySelector("#HeaderLink");

function headerSwitchText() {
  if (websiteHeaderLink.innerHTML === "SeaFilmz") {
    websiteHeaderLink.innerHTML = "Seattle Filmz";
  }
  else {
    websiteHeaderLink.innerHTML = "SeaFilmz";
  }
}