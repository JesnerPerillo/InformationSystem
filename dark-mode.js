document.addEventListener("DOMContentLoaded", function () {
const body = document.querySelector("body"),
modeToggle = body.querySelector(".mode-toggle");

const isDarkMode = localStorage.getItem("darkMode") === "true";

if (isDarkMode) {
    body.classList.add("dark");
    }

modeToggle.addEventListener("click", () => {
body.classList.toggle("dark");
const currentMode = body.classList.contains("dark");
localStorage.setItem("darkMode", currentMode.toString());
});
});
