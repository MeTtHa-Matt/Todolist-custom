document.querySelectorAll(".btn.nb").forEach((link) => {
  if (!link.href) return;
  if (window.location.pathname === new URL(link.href).pathname) {
    link.classList.add("bg-secondary");
    link.classList.add("bg-opacity-25");
  }
});

