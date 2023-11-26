const checkboxes = document.querySelectorAll('input[type="checkbox"].ckbx-flt');
const currentValue = ""
document.getElementById("flts-apply").addEventListener('click', () => {

    checkboxes.forEach(checkbox => {
        if (!checkbox.checked && urlParams.has(checkbox.dataset.flt, checkbox.dataset.value)) {

            urlParams.delete(checkbox.dataset.flt, checkbox.dataset.value)
        } else if (checkbox.checked && !urlParams.has(checkbox.dataset.flt, checkbox.dataset.value)) {

            if (urlParams.has(checkbox.dataset.flt)) {
                // PROBLEME JUSTE ICI 
                currentValue = urlParams.get(checkbox.dataset.flt).split(",")
                console.log(currentValue)
                currentValue.forEach(value => {
                    if (checkbox.dataset.value !== value) {
                        urlParams.set(checkbox.dataset.flt, currentValue.join(",") + "," + checkbox.dataset.value)
                    }
                })
                // urlParams.set(checkbox.dataset.flt, urlParams.get(checkbox.dataset.flt) + "," + checkbox.dataset.value)
            } else {
                urlParams.set(checkbox.dataset.flt, checkbox.dataset.value)
            }
            // urlParams.append(checkbox.dataset.flt, checkbox.dataset.value)
        }
    })
    window.location.href = window.location.pathname + "?" + urlParams
});

// window.addEventListener('load', () => {

//     checkboxes.forEach(checkbox => {
//         if (urlParams.has(checkbox.dataset.flt, checkbox.dataset.value)) {
//             checkbox.checked = true;
//         }
//     });
// });