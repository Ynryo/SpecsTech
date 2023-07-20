document.getElementById("menu-icon").addEventListener("click", () => {
    document.getElementById("menu-icon").classList.toggle("change");
    document.getElementById("menu").classList.toggle("change");

    if (document.body.style.overflowY = 'auto' && document.getElementById("menu").classList.contains("change")) {
        document.body.style.overflowY = 'hidden';
    } else {
        document.body.style.overflowY = 'auto';
    }
})