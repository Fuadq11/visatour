@extends('frontend.layout._layout')
@section('title', __('visa'))
@section('meta')
    <meta name="title" content="{{ $country->name }} . 'Visa'">
    <meta name="description" content="{{ $country->name }} . 'Visa'">
@endsection
@section('content')
    <section class="page-cover" id="cover-services_details">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('user.index') }}">{{ __('home_page') }}</a>
                        </li>
                        <li class="breadcrumb-item">{{ $country->name }} {{ __('visasi') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section-details-visa">
        <div class="container">
            <div class="row">
                @forelse($country->visas as $visa)
                    <div class="col-md-6 col-lg-4">
                        <div class="service-card">
                            <div class="d-flex align-items-center">
                                <div><span><i class="{{ $visa->icon }} fa-2x"></i></span></div>

                                <div class="visa-status_required px-2 py-1 fs-12 text-uppercase"
                                     id="visa-status_required_{{ $visa->id }}">
                                    {{ $visa->visaOptions->first()?->visaType?->name }}
                                </div>
                            </div>

                            <div
                                class="fs-24 m-bottom-30 m-top-16 gray-900-color font-w-600 font-spacing-140 visa-name">
                                {{ $visa->name }}
                            </div>

                            <div class="w-100">
                                <div class="main-form-group m-bottom-30">
                                    <div class="default-select">
                                        <select class="visa_type_select main-form_input select-bg"
                                                id="travel_visa.{{ $visa->id }}"
                                                name="travel_visa" aria-label="Choose an option">
                                            @foreach($visa->visaOptions as $type)
                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="p-bottom-22 {{ $visa->visaOptions->first()?->price ? 'm-bottom-30 gray-100-border_bottom' : '' }}">
                                <div id="price_area_{{ $visa->id }}"
                                     style="display: {{ $visa->visaOptions->first()?->price ? 'block' : 'none' }}">
                                    <div class="d-flex mb-3 align-items-center">
                                        <div class="fs-24 mr-2 gray-900-color font-w-400">
                                            <span class="currency"></span>
                                            <span class="price">{{ $visa->visaOptions->first()?->price }} AZN</span>
                                        </div>
                                        <div class="fs-12 gray-300-color">{{ __('total_payment') }}</div>
                                    </div>

                                    <div class="fs-12 d-flex align-items-center">
                                            <span> *
                                                @if($visa->visaOptions->first()?->fee_types)
                                                    @foreach($visa->visaOptions->first()?->fee_types as $type)
                                                        {{ $type->name }}{{ !$loop->last ? ',' : ''}}
                                                    @endforeach
                                                @endif
                                            </span>
                                    </div>
                                </div>
                                <div id="general_area_{{ $visa->id }}"
                                     style="display: {{ !$visa->visaOptions->first()?->price ? 'block' : 'none' }}">
                                    <div class="gray-900-color fs-14 font-w-600">
                                        {{ __('general_info') }}
                                    </div>
                                    <div class="fs-12 d-flex align-items-center">
                                        <span>{{ $visa->visaOptions->first()?->general_info }}</span>
                                    </div>
                                    @if($visa->visaOptions->first()?->additional_note)
                                        <div class="gray-900-color fs-14 font-w-600 mt-3">
                                            {{ __('additional_note') }}
                                        </div>
                                        <div class="fs-12 d-flex align-items-center">
                                            <span>{{ $visa->visaOptions->first()?->additional_note }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div id="process_details_{{ $visa->id }}">
                                @if($visa->visaOptions->first()?->price)
                                    <div>
                                        <div class="gray-900-color fs-14 font-w-600">
                                            {{ __('process_details') }}
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between m-top-24">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('frontend/images/as_fast_as.svg') }}"
                                                     alt="{{ __('visa_period') }}"
                                                     class="m-right-10">
                                                <span class="gray-600-color fs-14 width-max-content">
                                          {{ __('visa_period') }}
                                        </span>
                                            </div>

                                            <div class="gray-900-color fs-14 font-w-400">
                                                {{ $visa->visaOptions->first()?->visa_period }}
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between m-top-24">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('frontend/images/duration_of_stay.svg') }}"
                                                     alt="{{ __('stay_duration') }}" class="m-right-10">
                                                <span class="gray-600-color fs-14 width-max-content">
                                          {{ __('stay_duration') }}
                                        </span>
                                            </div>

                                            <div class="gray-900-color fs-14 font-w-400">
                                                {{ $visa->visaOptions->first()?->stay_duration }}
                                            </div>
                                        </div>
                                        <div class="w-100 m-top-40">
                                            <a href="{{ route('user.services.detail', $visa->visaOptions->first()?->id) }}" target="_blank"
                                               class="apply-service-button button-primary btn btn-small w-100 text-center">
                                                <span>{{ __('apply_visa') }}</span>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <section class="gray-50-bg services-list">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 mx-auto">
                                    <div class="d-flex flex-column align-items-center justify-content-center">
                                        <img src="{{ asset('frontend/images/unavailable_service.jpeg') }}"
                                             class="m-bottom-16"
                                             alt="{{ __('unavailable') }}">

                                        <div
                                            class="gray-900-color fs-20 m-bottom-10 font-w-600 font-spacing-140 services-not-found_title text-center">
                                            {{ __('unavailable') }}
                                        </div>

                                        <div
                                            class="gray-600-color fs-14 m-bottom-24 text-center font-w-400 font-spacing-160">
                                            {{ __('resmi') }}
                                        </div>
                                    </div>

                                    <div class="d-flex services_unavailable flex-column flex-md-row">

                                        <div class="d-flex align-items-center justify-content-between flex-column">

                                            <div class="m-bottom-10">
                                                <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.2"
                                                          d="M23.5547 43.9996C34.6004 43.9996 43.5547 35.0453 43.5547 23.9996C43.5547 12.9539 34.6004 3.99963 23.5547 3.99963C12.509 3.99963 3.55469 12.9539 3.55469 23.9996C3.55469 35.0453 12.509 43.9996 23.5547 43.9996Z"
                                                          fill="#ADA0EA"></path>
                                                    <path
                                                        d="M21.4393 19.9674L15.3627 19.9033C13.2337 19.8808 11.4896 21.5884 11.4671 23.7174L11.4146 28.6909C11.3921 30.8199 13.0998 32.5641 15.2288 32.5865L21.3053 32.6507C23.4343 32.6732 25.1784 30.9655 25.2009 28.8365L25.2534 23.863C25.2759 21.734 23.5683 19.9899 21.4393 19.9674Z"
                                                        fill="#9179E8"></path>
                                                    <path
                                                        d="M12.9393 35.1879L24.5136 24.8879L12.8887 24.7653L12.9393 35.1879Z"
                                                        fill="#9179E8"></path>
                                                    <path
                                                        d="M31.4524 14.5569L19.2513 14.4281C17.1385 14.4058 15.4077 16.1005 15.3854 18.2133L15.309 25.4511C15.2866 27.5639 16.9813 29.2947 19.0941 29.317L31.2952 29.4459C33.408 29.4682 35.1389 27.7735 35.1612 25.6607L35.2376 18.4229C35.2599 16.3101 33.5652 14.5792 31.4524 14.5569Z"
                                                        fill="#784DEF"></path>
                                                    <path
                                                        d="M31.0247 33.5255L17.4141 20.889L31.3487 21.0361L31.0247 33.5255Z"
                                                        fill="#784DEF"></path>
                                                    <path
                                                        d="M21.3329 21.7918C21.3407 21.0555 20.7501 20.4523 20.0138 20.4445C19.2774 20.4367 18.6742 21.0273 18.6664 21.7637C18.6586 22.5 19.2493 23.1032 19.9856 23.111C20.7219 23.1188 21.3252 22.5282 21.3329 21.7918Z"
                                                        fill="white"></path>
                                                    <path
                                                        d="M26.2216 21.7918C26.2294 21.0555 25.6388 20.4523 24.9024 20.4445C24.1661 20.4367 23.5629 21.0273 23.5551 21.7637C23.5473 22.5 24.1379 23.1032 24.8743 23.111C25.6106 23.1188 26.2138 22.5282 26.2216 21.7918Z"
                                                        fill="white"></path>
                                                    <path
                                                        d="M31.1103 21.7918C31.1181 21.0555 30.5274 20.4523 29.7911 20.4445C29.0548 20.4367 28.4515 21.0273 28.4438 21.7637C28.436 22.5 29.0266 23.1032 29.7629 23.111C30.4993 23.1188 31.1025 22.5282 31.1103 21.7918Z"
                                                        fill="white"></path>
                                                </svg>
                                            </div>

                                            <div
                                                class="gray-600-color fs-14 m-bottom-24 text-center font-w-400 font-spacing-160">
                                                {{ __('more_info') }}
                                            </div>

                                            <a href="{{ route('user.index') }}" class="button-secondary_services">
                                                {{ __('visa_policies') }}
                                            </a>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between flex-column">
                                            <div class="m-bottom-10">
                                                <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.2"
                                                          d="M23.5547 44.4448C34.6004 44.4448 43.5547 35.4905 43.5547 24.4448C43.5547 13.3991 34.6004 4.44482 23.5547 4.44482C12.509 4.44482 3.55469 13.3991 3.55469 24.4448C3.55469 35.4905 12.509 44.4448 23.5547 44.4448Z"
                                                          fill="#47B9F3"></path>
                                                    <path
                                                        d="M33.1064 18.411L14.5226 18.2148C13.2416 18.2013 12.1922 19.2288 12.1786 20.5097L12.0657 31.2038C12.0522 32.4848 13.0797 33.5342 14.3606 33.5477L32.9445 33.744C34.2255 33.7575 35.2749 32.73 35.2884 31.449L35.4013 20.755C35.4149 19.474 34.3874 18.4246 33.1064 18.411Z"
                                                        fill="#1274C6"></path>
                                                    <path
                                                        d="M28.4893 15.4884C28.4893 15.4884 24.084 15.1506 24.0413 19.2306C23.9987 23.3106 24 30.2244 24 30.2244C24 30.2244 26.1436 28.8715 27.9071 28.8893L34.7533 28.9617C34.8577 28.9628 34.9612 28.9433 35.0581 28.9043C35.1549 28.8653 35.2431 28.8077 35.3176 28.7346C35.3921 28.6616 35.4516 28.5746 35.4925 28.4786C35.5334 28.3825 35.555 28.2794 35.556 28.1751L35.6809 16.3524C35.682 16.2489 35.6627 16.1462 35.6242 16.0502C35.5856 15.9541 35.5285 15.8667 35.4561 15.7927C35.3837 15.7187 35.2974 15.6598 35.2023 15.6191C35.1071 15.5785 35.0048 15.557 34.9013 15.5559L28.4893 15.4884Z"
                                                        fill="#309EF9"></path>
                                                    <path
                                                        d="M19.5427 15.1811C19.5427 15.1811 24.0804 14.9309 24.036 19.1016C23.9916 23.2722 23.9991 30.2224 23.9991 30.2224C23.9991 30.2224 21.6658 28.9082 19.852 28.8891L12.7911 28.8136C12.5807 28.8129 12.3793 28.7287 12.2309 28.5795C12.0826 28.4303 11.9995 28.2284 12 28.018L12.128 15.8909C12.1299 15.7866 12.1522 15.6838 12.1938 15.5882C12.2354 15.4926 12.2955 15.4061 12.3705 15.3337C12.4455 15.2613 12.5341 15.2044 12.6311 15.1663C12.7282 15.1281 12.8318 15.1095 12.936 15.1113L19.5427 15.1811Z"
                                                        fill="#0D84FD"></path>
                                                </svg>
                                            </div>

                                            <div
                                                class="gray-600-color fs-14 m-bottom-24 text-center font-w-400 font-spacing-160">
                                                {{ __('search_embassy') }}
                                            </div>

                                            <a href="{{ route('user.index') }}" class="button-secondary_services">
                                                {{ __('visa_policies') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @endforelse
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('select[id^="travel_visa."]').change(function () {
                var selectedOption = $(this).val();
                var url = '{{ route('user.get.option.details') }}';

                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {option: selectedOption},
                    success: function (response) {

                        locale = "{{ app()->getLocale() }}";
                        $('#visa-status_required_' + response['visaId']).text(response['data'].visa_type.name[locale]); // okay

                        if (response['data'].price) {
                            var html = `
                            <div>
                                <div class="gray-900-color fs-14 font-w-600">{{ __('process_details') }}</div>

                            <div class="d-flex align-items-center justify-content-between m-top-24">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('frontend/images/as_fast_as.svg') }}"
                                                     alt="{{ __('visa_period') }}"
                                                     class="m-right-10">
                                                <span class="gray-600-color fs-14 width-max-content">
                                          {{ __('visa_period') }}
                            </span>
                                </div>

                                <div class="gray-900-color fs-14 font-w-400">
                                    ${response['data'].visa_period[locale]}
                                </div>
                            </div>

                        <div class="d-flex align-items-center justify-content-between m-top-24">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('frontend/images/duration_of_stay.svg') }}"
                                                     alt="Qalma müddəti" class="m-right-10">
                                                <span class="gray-600-color fs-14 width-max-content">
                                          {{ __('stay_duration') }}
                            </span>
                                </div>

                                <div class="gray-900-color fs-14 font-w-400">
                                ${response['data'].stay_duration[locale]}
                            </div>
                        </div>
                        <div class="w-100 m-top-40">
                            <a href="/services/detail/${response['data'].id}" target="_blank"
                               class="apply-service-button button-primary btn btn-small w-100 text-center">
                                <span>Viza üçün müraciət</span>
                            </a>
                        </div>
                    </div>
`;

                            var price_area_html = `
                                    <div class="d-flex mb-3 align-items-center">
                                        <div class="fs-24 mr-2 gray-900-color font-w-400">
                                            <span class="currency"></span>
                                            <span class="price">${response['data'].price} AZN</span>
                                        </div>
                                        <div class="fs-12 gray-300-color">{{ __('total_payment') }}</div>
                                    </div>

                                    <div class="fs-12 d-flex align-items-center">
                                        <span> *

                                        ${response['data'].fee_types.map(type => type.name[locale]).join(', ')}
                            </span>
                        </div>
`

                            $('#process_details_' + response['visaId']).html(html).show();
                            $('#price_area_' + response['visaId']).html(price_area_html).show();
                            $('#general_area_' + response['visaId']).html('').hide();
                        } else {
                            var general_area_html =
                                `
                                <div class="gray-900-color fs-14 font-w-600">
                                    {{ __('general_info') }}
                                </div>
                                <div class="fs-12 d-flex align-items-center">
                                    <span>${response['data'].general_info[locale]}</span>
                                </div>
                                ${response['data'].additional_note[locale] != null ? `<div class="gray-900-color fs-14 font-w-600 mt-3">
                                    {{ __('additional_note') }}
                                </div>
                                <div class="fs-12 d-flex align-items-center">
                                    <span>${response['data'].additional_note[locale]}</span>
                                    </div>` : ''}
                                `

                            $('#process_details_' + response['visaId']).html('').hide();
                            $('#general_area_' + response['visaId']).html(general_area_html).show();
                            $('#price_area_' + response['visaId']).html('').hide();
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            })
            ;
        });
    </script>
@endsection