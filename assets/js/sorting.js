const sort = document.getElementById("cards-sort")
const params = [];

sort.addEventListener("change", () => {
    // params.push(`sort=${sort.value}`);
    // window.location.href = `${window.location.pathname}?${params.join('&')}`;

    // Construire les paramètres de l'URL
    params.push(`${sort.value}=true`);

    // Mettre à jour l'URL avec les paramètres
    const newURL = `${window.location.pathname}?${params.join('&')}`;
    history.pushState({}, '', newURL);
})