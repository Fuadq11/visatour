const wrapper = document.querySelector(".wrapper-custom"),
  selectBtn = wrapper.querySelector(".select-btn-custom"),
  searchInp = wrapper.querySelector("input"),
  options = wrapper.querySelector(".options-custom");

async function fetchCountries() {
  try {
    const response = await fetch("countries.json");
    if (!response.ok) {
      throw new Error(`Failed to fetch countries. Status: ${response.status}`);
    }
    return response.json();
  } catch (error) {
    console.error('Error fetching countries:', error);
    return [];
  }
}

async function addCountry(selectedCountry) {
  options.innerHTML = "";
  const countries = await fetchCountries();
  countries.forEach(country => {
    let isSelected = country.name == selectedCountry ? "selected" : "";
    // let li = `<li onclick="updateName(this)" class="${isSelected}">${country.name}</li>`;
    let li = `
      <li onclick="updateName(this)" class="${isSelected}" data-flag="${country.flagPath}">
        <img src="${country.flagPath}" alt="${country.name}" class="countries-flag">
        <span>${country.name}</span>
      </li>`;
    options.insertAdjacentHTML("beforeend", li);
  });
}

async function updateName(selectedLi) {
  searchInp.value = "";
  const selectedCountryName = selectedLi.innerText.trim();
  await addCountry(selectedCountryName);
  wrapper.classList.remove("active");
  selectBtn.firstElementChild.value = selectedCountryName;
}

searchInp.addEventListener("keyup", async () => {
  let arr = [];
  const countries = await fetchCountries();
  let searchWord = searchInp.value.toLowerCase();
  arr = countries.filter(data => {
    return data.name.toLowerCase().startsWith(searchWord);
  }).map(data => {
    let isSelected = data.name == selectBtn.firstElementChild.value ? "selected" : "";
    return `<li onclick="updateName(this)" class="${isSelected}" data-flag="${data.flagPath}">
    <img src="${data.flagPath}" alt="${data.name}" class="countries-flag">
    <span>${data.name}</span>
  </li>`;
  }).join("");
  options.innerHTML = arr ? arr : `<p style="margin-top: 10px;">Oops! Country not found</p>`;
});

selectBtn.addEventListener("click", () => wrapper.classList.toggle("active"));


document.addEventListener("DOMContentLoaded", async () => {
  await addCountry();
});

document.addEventListener("click", (event) => {
    const isClickInsideDropdown = wrapper.contains(event.target) || selectBtn.contains(event.target);
    
    if (!isClickInsideDropdown) {
      wrapper.classList.remove("active");
    }
});