/* JavaScript untuk memotong teks pada tampilan mobile */
document.addEventListener("DOMContentLoaded", function () {
    const paragraph = document.getElementById("organizationDescription");
    const words = paragraph.innerText.split(" ");
    const showMoreButton = document.getElementById("showMoreButton");

    if (window.innerWidth <= 600 || window.innerWidth <= 995) {
        if (words.length > 50) {
            const first50Words = words.slice(0, 50).join(" ") + "...";
            const remainingWords = words.slice(50).join(" ");

            paragraph.innerHTML = `${first50Words}<span class="more-text"> ${remainingWords}</span>`;
            showMoreButton.style.display = "inline";
        } else {
            showMoreButton.style.display = "none";
        }
    } else {
        if (words.length > 100) {
            const first100Words = words.slice(0, 100).join(" ") + "...";
            const remainingWords = words.slice(100).join(" ");

            paragraph.innerHTML = `${first100Words}<span class="more-text"> ${remainingWords}</span>`;
            showMoreButton.style.display = "inline";
        } else {
            showMoreButton.style.display = "none";
        }
    }

    showMoreButton.addEventListener("click", function () {
        const moreText = document.querySelector(".more-text");
        moreText.style.display =
            moreText.style.display === "none" ? "inline" : "none";
        showMoreButton.innerText =
            moreText.style.display === "none" ? "Selengkapnya" : "Sembunyikan";
    });
});
