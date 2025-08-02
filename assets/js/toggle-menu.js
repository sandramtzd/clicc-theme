document.addEventListener("DOMContentLoaded", function () {
  const header = document.querySelector(".site-header");
  const toggleBtn = document.getElementById("menu-toggle");
  const menuIcon = document.getElementById("menu-icon");
  const nav = document.getElementById("main-nav");

  let isOpen = false;

  toggleBtn.addEventListener("click", () => {
    isOpen = !isOpen;
    toggleBtn.setAttribute("aria-expanded", isOpen);
    nav.classList.toggle("open");

    // Toggle a class on body
  document.body.classList.toggle("menu-open", isOpen);


    toggleBtn.classList.add("icon-fade");

    setTimeout(() => {
      menuIcon.src = isOpen
        ? theme_vars.template_url + "/assets/icons/close.svg"
        : theme_vars.template_url + "/assets/icons/hamburger.svg";
      menuIcon.alt = isOpen ? "Close menu" : "Open menu";

      toggleBtn.classList.remove("icon-fade");
    }, 150);
  });

  window.addEventListener("scroll", () => {
    header.classList.toggle("scrolled", window.scrollY > 50);
  });
});