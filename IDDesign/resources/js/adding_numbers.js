
document.addEventListener("DOMContentLoaded", function () {
    const counters = document.querySelectorAll(".counter");

    const options = {
    threshold: 0.6,
};

    const animateCounter = (el) => {
    const target = +el.getAttribute("data-target");
    const duration = target*10;
    const startTime = performance.now();

    const update = (now) => {
    const elapsed = now - startTime;
    const progress = Math.min(elapsed / duration, 1);
    const current = Math.floor(progress * target);
    el.textContent = current;

    if (progress < 1) {
    requestAnimationFrame(update);
} else {
    el.textContent = target + "+";
}
};

    requestAnimationFrame(update);
};

    const observer = new IntersectionObserver((entries, obs) => {
    entries.forEach((entry) => {
    if (entry.isIntersecting) {
    animateCounter(entry.target);
    obs.unobserve(entry.target);
}
});
}, options);

    counters.forEach((counter) => {
    observer.observe(counter);
});
});
