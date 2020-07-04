//Mobile Menu Toggle
function onClickMenu() {
  document.querySelector(".mobile-menu").classList.toggle("change");
  document.querySelector(".MobileNav").classList.toggle("change");
}

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