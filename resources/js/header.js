const toggleBtn = document.getElementById("dark-mode-toggle");
var htmlElement = document.querySelector("html");

toggleBtn.addEventListener("click", () => {
    changeDarkMode();
});

setDarkMode();

function changeDarkMode() {
    let darkModeStatus = localStorage.getItem("dark-mode");
    if (darkModeStatus === null) {
        darkModeStatus = false;
        localStorage.setItem("dark-mode", false);
    }
    console.log(darkModeStatus);
    if (darkModeStatus === "true") {
        localStorage.setItem("dark-mode", false);
        htmlElement.classList.remove("dark");
    } else {
        localStorage.setItem("dark-mode", true);
        htmlElement.classList.add("dark");
    }
}
function setDarkMode() {
    let darkModeStatus = localStorage.getItem("dark-mode");
    if (darkModeStatus === null) {
        darkModeStatus = false;
        localStorage.setItem("dark-mode", false);
    }
    if (darkModeStatus === "true") {
        htmlElement.classList.add("dark");
    } else {
        htmlElement.classList.remove("dark");
    }
}
