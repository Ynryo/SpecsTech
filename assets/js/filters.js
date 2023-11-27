const checkboxes = document.querySelectorAll('input[type="checkbox"].ckbx-flt');
let currentValue = ""

document.getElementById("flts-apply").addEventListener('click', () => {
    let currentFilter = ""
    let currentValue = ""
    // let alreadyIn = ""
    checkboxes.forEach(checkbox => {
        const checkboxName = checkbox.dataset.flt
        const checkboxValue = checkbox.dataset.value
        if (currentFilter !== checkboxName && urlParams.get(checkboxName) !== null) {
            currentFilter = checkboxName
            currentValue = urlParams.get(checkboxName).split(",")
        }
        // checkbox checked ?
        if (checkbox.checked) {
            if (!urlParams.has(checkboxName)) {
                urlParams.set(checkboxName, checkboxValue)
            } else if (urlParams.has(checkboxName)) {
                if (!currentValue.includes(checkboxValue)) {
                    currentValue.push(checkboxValue)
                    urlParams.set(checkboxName, currentValue.join(","))
                }
            }
        } else if (!checkbox.checked) {
            alreadyIn = "pas coché"
            if (urlParams.has(checkboxName)) {
                if (currentValue.includes(checkboxValue)) {
                    currentValue.splice(currentValue.indexOf(checkboxValue), 1)
                    urlParams.set(checkboxName, currentValue.join(","))
                }
            }
        }
        // delete flt if empty
        if (urlParams.get(checkboxName) == "") {
            urlParams.delete(checkboxName)
        }
    })
    // delete "?" if params size = 0
    if (urlParams.size !== 0) {

        window.location.href = window.location.pathname + "?" + urlParams
    } else {

        window.location.href = window.location.pathname
    }
});