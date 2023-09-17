const sort = document.getElementById("cards-sort")
let url = window.location.origin + window.location.pathname

sort.addEventListener("change", () => {
    window.location.href = url + "?sort=" + sort.value
})