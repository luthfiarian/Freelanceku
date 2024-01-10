const hamburger = document.querySelector("#hamburger"),
  navMenu = document.querySelector("#nav-menu");
hamburger.addEventListener("click", function () {
  hamburger.classList.toggle("hamburger-active"),
    navMenu.classList.toggle("hidden");
});
