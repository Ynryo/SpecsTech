const checkboxes = document.querySelectorAll('input[type="checkbox"].ckbx-flt');

document.getElementById("flts-apply").addEventListener('click', () => {

    checkboxes.forEach(checkbox => {
        if (!checkbox.checked && urlParams.has(checkbox.dataset.flt, checkbox.dataset.value)) {
            urlParams.delete(checkbox.dataset.flt, checkbox.dataset.value)
        } else if (checkbox.checked && !urlParams.has(checkbox.dataset.flt, checkbox.dataset.value)) {
            urlParams.append(checkbox.dataset.flt, checkbox.dataset.value)
        }
    })
    window.location.href = window.location.pathname + "?" + urlParams
});

window.addEventListener('load', () => {

    checkboxes.forEach(checkbox => {
        if (urlParams.has(checkbox.dataset.flt, checkbox.dataset.value)) {
            checkbox.checked = true;
        }
    });
});