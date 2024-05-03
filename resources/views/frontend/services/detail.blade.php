@extends('frontend.layout._layout')
@section('title', __('services'))
@section('content')
    <section class="page-cover" id="cover-about-us">
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}">{{ __('home_page') }}</a></li>
                        <li class="breadcrumb-item">{{ $visaOption->country->name }} {{ __('visasi') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="innerpage-wrapper">
        <div id="byf-guidelines" class="innerpage-section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-9 content-side byf-info">
                        <div class="space-right">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a href="#airport-info" class="nav-link active" data-bs-toggle="tab">
                                        <span><i class="fa fa-passport"></i></span> {{ __('visa_details') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#visa-passport" class="nav-link" data-bs-toggle="tab">
                                        <span><i class="fa fa-cogs"></i></span>{{ __('process_details') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#check-in" class="nav-link" data-bs-toggle="tab">
                                        <span><i class="fa fa-info-circle"></i></span> {{ __('general_info') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#baggage-info" class="nav-link" data-bs-toggle="tab">
                                        <span><i class="fa fa-file-text"></i></span>{{ __('required_documents') }}
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div id="airport-info" class="tab-pane active">
                                    <div class="byf-info-wrap">
                                        <h3 class="byf-info-heading">{{ __('visa_details') }}</h3>
                                    </div>

                                    <div class="us-product-attr-item d-flex justify-content-between">
                                        <span>{{ __('visa_type') }}</span>
                                        <span>{{ $visaOption->visaType->name }}</span>
                                    </div>

                                    <div class="us-product-attr-item d-flex justify-content-between">
                                        <span>{{ __('visa_fee') }}</span>
                                        <span>{{ $visaOption->visa_fee ? $visaOption->visa_fee : '' }}</span>
                                    </div>
                                    <!-- New addings -->
                                    <div class="us-product-attr-item d-flex justify-content-between">
                                        <span>{{ __('visa_department_fee') }}</span>
                                        <span>{{ $visaOption->visa_department_fee ? $visaOption->visa_department_fee : '' }}</span>
                                    </div>
                                    <div class="us-product-attr-item d-flex justify-content-between">
                                        <span>{{ __('administration_fee') }}</span>
                                        <span>{{ $visaOption->administration_fee ? $visaOption->administration_fee : '' }}</span>
                                    </div>
                                    <div class="us-product-attr-item d-flex justify-content-between">
                                        <span>{{ __('courier_fee') }}</span>
                                        <span>{{ $visaOption->courier_fee ? $visaOption->courier_fee: '' }}</span>
                                    </div>
                                    <!-- end of new addings -->
                                    <div class="us-product-attr-item d-flex justify-content-between">
                                        <span>{{ __('service_fee') }}</span>
                                        <span>{{ $visaOption->price ? $visaOption->price : '' }}</span>
                                    </div>

                                    <div class="us-product-attr-item d-flex justify-content-between">
                                        <span>{{ __('total_service_fee') }}</span>
                                        <span>{{ $visaOption->price ? $visaOption->price : '' }}</span>
                                    </div>
                                </div>

                                <div id="visa-passport" class="tab-pane">
                                    <div class="byf-info-wrap">
                                        <h3 class="byf-info-heading">{{ __('process_details') }}</h3>
                                    </div>

                                    <div class="us-product-attr-item d-flex justify-content-between">
                                        <span>{{ __('citizenship') }}</span>
                                        <span>{{ __('azerbaijan') }}</span>
                                    </div>
                                    <div class="us-product-attr-item d-flex justify-content-between">
                                        <span>{{ __('travel_country') }}</span>
                                        <span>{{ $visaOption->country->name }}</span>
                                    </div>

                                    <div class="us-product-attr-item d-flex justify-content-between">
                                        <span>{{ __('visa_period') }}</span>
                                        <span>{{ $visaOption->visa_period }}</span>
                                    </div>

                                    <div class="us-product-attr-item d-flex justify-content-between">
                                        <span>{{ __('stay_duration') }}</span>
                                        <span>{{ $visaOption->stay_duration }}</span>
                                    </div>
                                </div>

                                <div id="check-in" class="tab-pane">
                                    <div class="byf-info-wrap">
                                        <h3 class="byf-info-heading">{{ __('general_info') }}</h3>
                                        <p>{{ $visaOption->visaOptionDetail?->details }}</p>
                                    </div>
                                </div>

                                <div id="baggage-info" class="tab-pane">
                                    <div class="byf-info-wrap">
                                        <h3 class="byf-info-heading">{{ __('required_documents') }}</h3>
                                        <ul class="gray-300-color fs-14 pl-0">
                                            @foreach($visaOption->documents as $document)
                                                <li class="fs-14 d-flex align-items-center">
                                                    <span class="fs-14 font-w-400 gray-400-color">
                                                       - {{ $document->name }}
                                                    </span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-3 side-bar blog-sidebar right-side-bar">
                        <div class="side-bar-block booking-form-block text-center">
                            <div class="booking-form">
                                <h3>{{ __('how_help') }}</h3>
                                <p>{{ __('any_question') }}</p>

                                <form name="frm_contact" method="post" action="{{ route('user.contact.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="{{ __('full_name') }} *"
                                               name="name" value="{{ old('name') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="{{ __('email_enter') }} *"
                                               name="email" value="{{ old('email') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="number" class="form-control" placeholder="{{ __('phone') }} *"
                                               name="subject" value="{{ old('subject') }}" required>
                                    </div>

                                    <div class="form-group">
                                    <textarea class="form-control" rows="4" placeholder="{{ __('enter_message') }} *"
                                              name="message" required>{{ old('message') }}</textarea>
                                    </div>
                                    <div class="col-md-12 text-center" id="result_msg"></div>
                                    <button name="submit" type="submit" id="submit"
                                            class="btn btn-orange btn-block">{{ __('send') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection