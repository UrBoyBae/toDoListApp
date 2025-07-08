import "./bootstrap";
const themeToggle = document.getElementById("theme");
const ball = document.getElementById("ball");
const iconBall = document.getElementById("icon-ball");
const savedTheme = localStorage.getItem("theme");

if (savedTheme === "dark") {
    document.documentElement.classList.add("dark");
    themeToggle.checked = true;
    ball.style.transform = "translateX(35px)";
    iconBall.setAttribute("name", "moon-outline");
}

themeToggle.addEventListener("change", () => {
    iconBall.classList.remove("opacity-100", "scale-100");
    iconBall.classList.add("opacity-0", "scale-75");

    setTimeout(() => {
        document.documentElement.classList.toggle("dark");

        if (document.documentElement.classList.contains("dark")) {
            localStorage.setItem("theme", "dark");
            ball.style.transform = "translateX(35px)";
            iconBall.setAttribute("name", "moon-outline");
        } else {
            localStorage.setItem("theme", "light");
            ball.style.transform = "translateX(0)";
            iconBall.setAttribute("name", "sunny-outline");
        }

        iconBall.classList.remove("opacity-0", "scale-75");
        iconBall.classList.add("opacity-100", "scale-100");
    }, 150);
});
