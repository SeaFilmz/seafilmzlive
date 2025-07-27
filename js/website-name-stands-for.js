//Title Stand For Button on About Page
document.getElementById("HeaderTextSwapButton").onclick = headerSwitchText;

const websiteHeader = document.querySelector("#HeaderStandFor");

function headerSwitchText() {
  if (websiteHeader.innerHTML === "SeaFilmz") {
    websiteHeader.innerHTML = "Seattle Filmz";
  }
  else {
    websiteHeader.innerHTML = "SeaFilmz";
  }
}