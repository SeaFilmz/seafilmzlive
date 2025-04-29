//Title Stand For Button on About Page
const websiteHeader = document.querySelector("#headerStandFor");

function headerSwitchText() {
  if (websiteHeader.innerHTML === "SeaFilmz") {
    websiteHeader.innerHTML = "Seattle Filmz";
  }
  else {
    websiteHeader.innerHTML = "SeaFilmz";
  }
}