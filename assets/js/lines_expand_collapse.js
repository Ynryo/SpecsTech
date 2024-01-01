const lines = document.querySelectorAll("#articles_lines")

lines.forEach(line => {
    line.addEventListener("click", () => {
        lineContent = line.querySelector(".line-content")
        if (!line.classList.contains("expand")) {
            // lineContent.style.display = "flex"
            line.classList.add("expand")
        } else {
            // lineContent.style.display = "none"
            line.classList.remove("expand")
        }
    })
})