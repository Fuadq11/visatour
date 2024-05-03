@extends('frontend.layout._layout')
@section('title', __('home_page'))
@section('content')

    <div id="popup-ad" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn close" data-bs-dismiss="modal">&times;</button>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="popup-ad-text">
                                {!! $popUp->title !!}
                                <p>{{ $popUp->description }}</p>
                                <a href="{{ route('user.service') }}" class="btn btn-orange">{{ $popUp->button_text }}</a>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="popup-ad-img">
                                <img src="{{ asset($popUp->image) }}" alt="{{ __('discount') }}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--========================= FLEX SLIDER =====================-->
    <section class="flexslider-container" id="flexslider-container-1">

        <div class="flexslider slider" id="slider-1">
            <ul class="slides">
                @foreach($sliders as $slider)
                    <li class="item-1"
                        style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url({{ asset($slider->image) }}) 50% 0%;">
                        <div class=" meta">
                            <div class="container">
                                <h1>{!! $slider->title !!} <h2>{!! $slider->sub_title !!}</h2></h1>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="container position-absolute visa-apply">
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
    </section>

    <!--================= FLIGHT OFFERS =============-->
    <section id="flight-offers" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-heading">
                        <h2>{{ __('travel_visa') }}</h2>
                        <hr class="heading-line">
                    </div>

                    <div class="row">
                        @foreach($offers as $offer)
                            <div class="col-md-6 col-lg-4 mb-3 card-item">
                                <div class="position-relative">
                                    <div class="card-title-custom ">
                                        <h3>{{ $offer->place }}</h3>

                                        <div class="card-underline"></div>

                                        <div class="mt-2 d-flex justify-content-between card_items_icons">
                                            <div class="d-flex">
                                                <figure>
                                                    <img src="{{ asset('frontend/images/direction.png') }}" alt="" class="card-icon_custom">
                                                </figure>

                                                <span class="direction_text">{{ $offer->direction }} {{ __('direction') }}</span>
                                            </div>

                                            <div class="d-flex ml-10">
                                                <figure>
                                                    <img src="{{ asset('frontend/images/car.png') }}" alt="" class="card-icon_custom">
                                                </figure>

                                                <span class="car_text">{{ $offer->transport }} {{ __('transport') }}</span>
                                            </div>

                                            <div class="d-flex ml-10">
                                                <figure>
                                                    <img src="{{ asset('frontend/images/night.png') }}" alt="" class="card-icon_custom">
                                                </figure>

                                                <span class="night_text">{{ $offer->nights }} {{ __('nights') }}</span>
                                            </div>
                                        </div>

                                        <div class="mt-3 card-package">
                                            <a href="{{ $offer->url }}">{{ $offer->package }}</a>
                                        </div>
                                    </div>

                                    <figure>
                                        <img src="{{ asset($offer->image) }}" alt="" class="card-img">
                                    </figure>

                                    <div class="card-subtitle-custom">
                                        <div class="card-custom-price">
                                            ₼{{ $offer->price }}
                                        </div>

                                        <div class="card-custom-person">
                                            {{ $offer->type }}
                                        </div>
                                    </div>

                                    <div class="offer-btn">
                                        <a href="https://wa.me/{{ $mainPhone }}" rel="noopener" target="_blank">{{ __('apply') }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div><!-- end row -->

                    <div class="view-all text-center">
                        <a href="{{ route('user.service') }}" class="btn btn-orange">{{ __('more_detail') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--==================== VIDEO BANNER ===================-->
    <section id="video-banner" class="banner-padding back-size">
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <h2>VISATOUR.AZ</h2>
                    <p>{{ __('learn_requirements') }}</p>
                    <div class="margin-small py-5 mt-5 m-sm-0 "></div>
                </div>
            </div>
        </div>
    </section>

    <!--======================= BEST FEATURES =====================-->
    <section id="best-features" class="banner-padding black-features">
        <div class="container">
            <div class="row">
                @foreach($features as $feature)
                    <div class="col-md-6 col-lg-3">
                        <div class="b-feature-block">
                            <span><i class="{{ $feature->icon }}"></i></span>
                            <h3>{{ $feature->title }}</h3>
                            <p>{{ $feature->description }}</p>
                        </div><!-- end b-feature-block -->
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div id="search-banner" class="innerpage-103-pd-tb back-size">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-6 col-xl-6 innerpage-left">
                    <p>{{ __('without_time') }}</p>
                    <h2>VISATOUR.AZ</h2>
                    <p>{{ __('ready') }}</p>
                    <a href="{{ route('user.service') }}" class="btn btn-black btn-lg">{{ __('apply') }}</a>
                </div><!-- end columns -->

                <div class="col-12 col-md-12 col-lg-6 col-xl-6 innerpage-right">
                    <figure>
                        <img src="{{ asset('frontend/images/cta.jpg') }}" class="cta" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </div>
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
@endsection