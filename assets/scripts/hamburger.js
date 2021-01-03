const burgerContainer = document.querySelector(".burgerContainer");
const hamburgerMenu = document.querySelector(".hamburgerMenu");

function toggleHamburger() {
  burgerContainer.classList.toggle("showNav");
  hamburgerMenu.classList.toggle("showClose");
}

hamburgerMenu.addEventListener("click", toggleHamburger);

const burgerLinks = document.querySelectorAll(".burgerLink");
burgerLinks.forEach(function (burgerLink) {
  burgerLink.addEventListener("click", toggleHamburger);
});
