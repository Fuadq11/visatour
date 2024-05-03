@extends('frontend.layout._layout')
@section('title', __('services'))
@section('content')
    <section class="innerpage-wrapper">
        <div id="search-banner_custom" class="innerpage-103-pd-tb-services back-size">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 col-xl-7">
                        <h2>{{ __('apply_visa') }}</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="travel-banner">
                            <div action="" class="searcbox_container-form">
                                <div class="position-relative searcbox_container">
                                    <div class="wrapper-custom">
                                        <div class="select-btn-custom">
                                            <input type="text" class="default-input"
                                                   placeholder="{{ __('plan_travel') }}">
                                            <i class="uil uil-angle-down"></i>
                                        </div>
                                        <div class="content-custom">
                                            <div class="search-custom">
                                                <i class="uil uil-search"></i>
                                                <input spellcheck="false" class="services-search" type="text"
                                                       placeholder="{{ __('search') }}">
                                            </div>
                                            <ul class="options-custom"></ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="ml-20" id="searcbox_container_button">
                                    <a id="apply" href="#" class="btn btn-black btn-lg">{{ __('to_travel') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5 pb-5">
            <div class="container position-relative section-all">
                <div class="d-flex justify-content-between align-items-center section-all-items">
                    <span class="all-text">{{ __('all_directions') }}</span>
                    <i class="fa-solid plus fa-minus"></i>
                </div>

                <div class="section-all-countries pb-5">
                    <form action="" class="position-relative">
                        <input type="text" placeholder="{{ __('search') }}" class="form-control search-all-countries">
                        <i class="fa-solid fa-search"></i>
                    </form>

                    <div class="mt-3">
                        <div class="row allCountry">
                            @foreach($countries as $country)
                                <div class="col-lg-3 mt-2 mb-2">
                                    <a href="{{ route('user.services.show', $country) }}" class="color-item">
                                        <div class="d-flex">
                                            <figure>
                                                <img src="{{ asset('frontend/flag/' . $country->code . '.png') }}"
                                                     alt="" class="countries-flag">
                                            </figure>
                                            <div>{{ $country->name }}</div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        const wrapper = document.querySelector(".wrapper-custom"),
            selectBtn = wrapper.querySelector(".select-btn-custom"),
            searchInp = wrapper.querySelector(".services-search"),
            options = wrapper.querySelector(".options-custom");

        async function fetchCountries() {
            return {!! json_encode($countries) !!};
        }

        async function addCountry(selectedCountry) {
            const locale = "{{ app()->getLocale() }}";

            options.innerHTML = "";
            const countries = {!! json_encode($countries) !!};
            countries.forEach(country => {
                let isSelected = country.name[locale] === selectedCountry ? "selected" : "";
                let li = `
                      <li onclick="updateName('${country.name[locale]}', '${country.id}')" class="${isSelected}" data-flag="${country.code}">
                        <img src="{{ asset('frontend/flag/') }}/${country.code}.png" alt="${country.name[locale]}" class="countries-flag">
                        <span>${country.name[locale]}</span>
                      </li>`;
                options.insertAdjacentHTML("beforeend", li);
            });
        }

        async function updateName(selectedLi, id) {
            searchInp.value = "";
            await addCountry(selectedLi);
            wrapper.classList.remove("active");
            selectBtn.firstElementChild.value = selectedLi;
            document.getElementById('apply').href = `/services/show/${id}`;
        }

        searchInp.addEventListener("keyup", async () => {

            const countries = {!! json_encode($countries) !!};
            const locale = "{{ app()->getLocale() }}";

            let searchWord = searchInp.value.toLowerCase();
            arr = countries.filter(data => {
                return data.name[locale].toLowerCase().startsWith(searchWord);
            }).map(data => {
                let isSelected = data.name[locale] === selectBtn.firstElementChild.value ? "selected" : "";
                return `<li onclick="updateName('${data.name[locale]}', '${data.id}')" class="${isSelected}" class="${isSelected}" data-flag="${data.code}">
                        <img src="{{ asset('frontend/flag/') }}/${data.code}.png" alt="${data.name[locale]}" class="countries-flag">
                        <span>${data.name[locale]}</span>
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
    </script>

    {{--    /////////////////////////////////////////--}}
    <script>
        let sectionAllItems1 = document.querySelector('.section-all-items');
        let sectionCountries1 = document.querySelector('.section-all-countries');
        let toggleInputIcon1 = document.querySelector('.plus');

        sectionAllItems1.addEventListener('click', function () {

            console.log(sectionCountries1.style.display);

            if (sectionCountries1.style.display === "none" || sectionCountries1.style.display === "") {
                sectionCountries1.style.display = "block";
                toggleInputIcon1.classList.remove('fa-plus');
                toggleInputIcon1.classList.add('fa-minus');
            } else {
                sectionCountries1.style.display = "none";
                toggleInputIcon1.classList.remove('fa-minus');
                toggleInputIcon1.classList.add('fa-plus');
            }
        });

        const select = document.querySelector(".allCountry");
        const searchInput = document.querySelector(".search-all-countries");

        function getCountry() {
            const data = {!! json_encode($countries) !!};
            const locale = "{{ app()->getLocale() }}";
            displayCountries(data);

            searchInput.addEventListener('keyup', function () {
                const searchTerm = searchInput.value.toLowerCase();
                const filteredCountries = data.filter(country =>
                    country.name[locale].toLowerCase().includes(searchTerm)
                );
                displayCountries(filteredCountries);
            });
        }

        function displayCountries(countries) {
            const locale = "{{ app()->getLocale() }}";

            select.innerHTML = "";
            countries.forEach(element => {
                const countryHtml = `
            <div class="col-lg-3 mt-2 mb-2">
                <a href="/services/show/${element.id}" class="color-item">
                    <div class="d-flex">
                        <figure>
                            <img src="{{ asset('frontend/flag/') }}/${element.code}.png" alt="" class="countries-flag">
                        </figure>
                        <div>${element.name[locale]}</div>
                    </div>
                </a>
            </div>
        `;
                select.innerHTML += countryHtml;
            });
        }

        getCountry();
    </script>
@endsection