(() => {
  const illustrations = [...document.querySelectorAll("[data-motion-visual]")];
  const replayButton = document.querySelector("[data-motion-replay]");
  const reducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)");

  if (!illustrations.length || !replayButton || reducedMotion.matches) {
    return;
  }

  const play = (illustration) => {
    illustration.classList.remove("is-playing");
    void illustration.offsetWidth;
    illustration.classList.add("is-playing");
  };

  replayButton.hidden = false;
  replayButton.addEventListener("click", () => {
    illustrations.forEach(play);
  });

  if ("IntersectionObserver" in window) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting && !entry.target.dataset.played) {
          entry.target.dataset.played = "true";
          play(entry.target);
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.35 });

    illustrations.forEach((illustration) => observer.observe(illustration));
  } else {
    illustrations.forEach(play);
  }
})();
