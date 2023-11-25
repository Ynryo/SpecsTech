const sort = document.getElementById("cards-sort")
const urlParams = new URLSearchParams(window.location.search);

sort.addEventListener("change", () => {
    urlParams.set("sort", sort.value)
    window.location.href = window.location.pathname + "?" + urlParams
})