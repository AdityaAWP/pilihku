document.addEventListener("DOMContentLoaded", function () {
    const observerOptions = {
        root: null,
        rootMargin: "0px",
        threshold: 0.6,
    };

    const observerCallback = (entries, observer) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible");
            }
        });
    };

    const observer = new IntersectionObserver(
        observerCallback,
        observerOptions
    );

    const elements = document.querySelectorAll(".box-content-animate");
    elements.forEach((element) => observer.observe(element));
});
