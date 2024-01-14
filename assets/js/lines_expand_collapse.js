const lines = document.querySelectorAll("#articles_lines")

lines.forEach(line => {
    lineTop = line.querySelector(".line-top")
    lineContent = line.querySelector(".line-content")
    lineTop.addEventListener("click", () => {
        if (!line.classList.contains("expand")) {
            // lineContent.style.display = "flex"
            line.classList.add("expand")
        } else {
            // lineContent.style.display = "none"
            line.classList.remove("expand")
        }
    })
})