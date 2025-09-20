//Title Stand For Button on About Page
const headerTextSwapButton = document.getElementById("HeaderTextSwapButton");

const websiteHeaderLink = document.querySelector("#HeaderLink");

const WebsiteName = "SeaFilmz";

function headerSwitchText() {
  if (websiteHeaderLink.textContent === WebsiteName) {
    websiteHeaderLink.textContent = "Seattle Filmz";
  }
  else {
    websiteHeaderLink.textContent = WebsiteName;
  }
}

headerTextSwapButton.addEventListener("click", headerSwitchText);