document.addEventListener("DOMContentLoaded", function () {
  const header = document.querySelector(".site-header");
  const toggleBtn = document.getElementById("menu-toggle");
  const nav = document.getElementById("main-nav");

  let isOpen = false;

  toggleBtn.addEventListener("click", () => {
    isOpen = !isOpen;
    toggleBtn.setAttribute("aria-expanded", isOpen);
    nav.classList.toggle("open");

    // Swap hamburger/close icons
    toggleBtn.innerHTML = isOpen
      ? '<img src="' + theme_vars.template_url + '/assets/icons/close.svg" alt="Close menu" />'
      : '<img src="' + theme_vars.template_url + '/assets/icons/hamburger.svg" alt="Open menu" />';
  });

  window.addEventListener("scroll", () => {
    if (window.scrollY > 50) {
      header.classList.add("scrolled");
    } else {
      header.classList.remove("scrolled");
    }
  });
});