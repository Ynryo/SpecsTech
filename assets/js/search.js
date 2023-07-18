const searchBar = document.getElementById('search-bar');
var input, filter, ul, li, a, i, txtValue;


searchBar.addEventListener('keyup', (key) => {
    // if (key.key === "Enter") {
    //     if (window.location.host === "127.0.0.1:3000") {
    //         window.location.href = "http://127.0.0.1:3000/search/?search=" + searchBar.value
    //     } else if(window.location.host === "127.0.0.1:5000"){
    //         window.location.href = "http://127.0.0.1:5000/search/?search=" + searchBar.value
    //     } else if (window.location.host === "specstech.fr"){
    //         window.location.href = "https://specstech.fr/search/?search=" + searchBar.value
    //     }
    //     console.log(searchBar.value)
    // }

    // new URL(window.location.href).searchParams.forEach((value, key) => {
    //     if (key === "barcode") {
    //         barcode = value;
    //         if (barcode) {
    //             getNutritionInfos(barcode)
    //         }
    //     }
    // })



    // input = document.getElementById('search-bar');
    // filter = input.value.toUpperCase();
    // ul = document.getElementById("search-list");
    // li = ul.getElementsByTagName('li');

    // for (i = 0; i < li.length; i++) {
    //     a = li[i].getElementsByTagName("a")[0];
    //     txtValue = a.textContent || a.innerText;
    //     if (txtValue.toUpperCase().indexOf(filter) > -1) {
    //         li[i].style.display = "";
    //     } else {
    //         li[i].style.display = "none";
    //     }
    // }
})