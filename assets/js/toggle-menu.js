document.addEventListener("DOMContentLoaded", function () {
  const header = document.querySelector(".site-header");
  const toggleBtn = document.getElementById("menu-toggle");
  const nav = document.getElementById("main-nav");

  let isOpen = false;

  toggleBtn.addEventListener("click", () => {
    isOpen = !isOpen;
    toggleBtn.setAttribute("aria-expanded", isOpen);
    nav.classList.toggle("open");

    toggleBtn.classList.add("icon-fade");
    setTimeout(() => {
      toggleBtn.innerHTML = isOpen
        ? '<img src="' + theme_vars.template_url + '/assets/icons/close.svg" alt="Close menu" />'
        : '<img src="' + theme_vars.template_url + '/assets/icons/hamburger.svg" alt="Open menu" />';
      toggleBtn.classList.remove("icon-fade");
    }, 150);
  });

  window.addEventListener("scroll", () => {
    header.classList.toggle("scrolled", window.scrollY > 50);
  });
});