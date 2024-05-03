let sectionAllItems = document.querySelector('.section-all-items');
let sectionCountries = document.querySelector('.section-all-countries-details');
let toggleInputIcon = document.querySelector('.fa-plus');

sectionAllItems.addEventListener('click', function () {
    if (sectionCountries.style.display === "none" || sectionCountries.style.display === "") {
        sectionCountries.style.display = "block";
		toggleInputIcon.classList.remove('fa-plus');
        toggleInputIcon.classList.add('fa-minus');
    } else {
        sectionCountries.style.display = "none";
		toggleInputIcon.classList.remove('fa-minus');
        toggleInputIcon.classList.add('fa-plus');
    }
});

// const select = document.querySelector(".allCountry");
// const searchInput = document.querySelector(".search-all-countries");

// function getCountry() {
//     fetch("countries.json")
//         .then(res => {
//             if (!res.ok) {
//                 throw new Error(`Failed to fetch countries. Status: ${res.status}`);
//             }
//             return res.json();
//         })
//         .then(data => {
//             displayCountries(data);
//
//             searchInput.addEventListener('keyup', function() {
//                 const searchTerm = searchInput.value.toLowerCase();
//                 const filteredCountries = data.filter(country =>
//                     country.name.toLowerCase().includes(searchTerm)
//                 );
//                 displayCountries(filteredCountries);
//             });
//         })
//         .catch(error => console.error("Error fetching countries:", error));
// }
//
// function displayCountries(countries) {
//     select.innerHTML = "";
//     countries.forEach(element => {
//         const countryHtml = `
//             <div class="col-lg-3 mt-2 mb-2">
//                 <a href="countries-visa.html" class="color-item">
//                     <div class="d-flex">
//                         <figure>
//                             <img src="${element.flagPath}" alt="" class="countries-flag">
//                         </figure>
//                         <div>${element.name}</div>
//                     </div>
//                 </a>
//             </div>
//         `;
//
//         select.innerHTML += countryHtml;
//     });
// }
//
// getCountry();









