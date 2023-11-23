// document.querySelectorAll(".ckbx-flt").forEach(item => {
//         item.addEventListener("change", () => {
//             console.log(item.getElementById())
//     })
// })
// Liste des cases à cocher, ajuste les identifiants selon ta structure HTML
// function updateURL() {

//     // Construire les paramètres de l'URL
//     const params = [];
//     checkboxes.forEach(checkbox => {
//         if (checkbox.checked) {
//             params.push(`${checkbox.id}=true`);
//         }
//     });

// Mettre à jour l'URL avec les paramètres
// const newURL = `${window.location.pathname}?${params.join('&')}`;
//     history.pushState({}, '', newURL);
// }


// const checkboxes = document.querySelectorAll('input[type="checkbox"].ckbx-flt');
// const urlParams = new URLSearchParams(window.location.search);

// // Écouter les changements dans les cases à cocher
// document.getElementById("flts-apply").addEventListener('click', () => {
//     console.log(params)
//     checkboxes.forEach(checkbox => {
//         if (checkbox.checked) {



//             params.push(`${checkbox.dataset.flt}=${checkbox.dataset.value}`)
//             console.log(params)
//         } else if (!checkbox.checked && urlParams.get(checkbox.dataset.flt)) {
//             params
//             console.log("present")
//         }
//     })
// });

// Charger les paramètres de l'URL au chargement de la page
// window.addEventListener('load', function () {
//     const urlParams = new URLSearchParams(window.location.search);

//     checkboxes.forEach(checkbox => {
//         const paramValue = urlParams.get(checkbox.id);
//         if (paramValue === 'true') {
//             checkbox.checked = true;
//         }
//     });
// });

// Fonction pour mettre à jour l'URL en fonction des cases à cocher
function updateURL() {
    // Liste des cases à cocher, ajuste les identifiants selon ta structure HTML
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');

    // Construire les paramètres de l'URL
    const params = [];
    checkboxes.forEach(checkbox => {
        if (checkbox.checked) {
            params.push(`${checkbox.id}=true`);
        }
    });

    // Mettre à jour l'URL avec les paramètres
    const newURL = `${window.location.pathname}?${params.join('&')}`;
    history.pushState({}, '', newURL);
}

// Écouter les changements dans les cases à cocher
document.addEventListener('change', function (event) {
    if (event.target.type === 'checkbox') {
        updateURL();
    }
});

// Charger les paramètres de l'URL au chargement de la page
window.addEventListener('load', function () {
    const urlParams = new URLSearchParams(window.location.search);
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');

    checkboxes.forEach(checkbox => {
        const paramValue = urlParams.get(checkbox.id);
        if (paramValue === 'true') {
            checkbox.checked = true;
        }
    });
});
