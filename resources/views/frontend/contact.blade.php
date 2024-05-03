@extends('frontend.layout._layout')
@section('title', __('contact'))
@section('meta')
    <meta name="title" content="{{ $contact->meta_title }}">
    <meta name="description" content="{{ $contact->meta_description }}">
@endsection
@section('content')
    @if($errors->all())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ __('error') }}! </strong> {{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    @endif
    <!--================ PAGE-COVER ===============-->
    <section class="page-cover" id="cover-contact-us"
             style="background:url({{ asset($contact->banner_image) }}) 50% 20%;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}">{{ __('home') }}</a></li>
                        <li class="breadcrumb-item">{{ __('contact') }}</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->

    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        <div id="contact-us" class="innerpage-section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-5 no-pd-r">
                        <div class="custom-form contact-form">
                            <h3>{{ __('how_help') }}</h3>
                            <p>{{ __('suggestions') }}</p>
                            <form name="frm_contact" method="post" action="{{ route('user.contact.store') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="{{ __('full_name') }} *"
                                           name="name" value="{{ old('name') }}" required>
                                    <span><i class="fa fa-user"></i></span>
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="{{ __('email_enter') }} *"
                                           name="email" value="{{ old('email') }}" required>
                                    <span><i class="fa fa-envelope"></i></span>
                                </div>

                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="{{ __('phone') }} *"
                                           name="subject" value="{{ old('subject') }}" required>
                                    <span><i class="fa fa-phone"></i></span>
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control" rows="4" placeholder="{{ __('enter_message') }} *"
                                              name="message" required>{{ old('message') }}</textarea>
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>
                                <div class="col-md-12 text-center" id="result_msg"></div>
                                <button name="submit" type="submit" id="submit"
                                        class="btn btn-orange btn-block">{{ __('send') }}</button>
                            </form>
                        </div><!-- end contact-form -->
                    </div><!-- end columns -->

                    <div class="col-md-12 col-lg-7 no-pd-l">
                        <div class="map">
                            <iframe src="{{ $contact->map }}" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"
                                    title="Google Maps - Vurgun Residence"></iframe>
                        </div><!-- end map -->
                    </div><!-- end columns -->

                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end contact-us -->
    </section><!-- end innerpage-wrapper -->


    <!--======================= BEST FEATURES =====================-->
    <section id="best-features" class="banner-padding black-features">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="b-feature-block">
                        <span><i class="fa fa-map-marker"></i></span>
                        <h3>{{ __('address') }}</h3>
                        <p>{{ $contact->address }}</p>
                    </div><!-- end b-feature-block -->
                </div><!-- end columns -->

                <div class="col-md-6 col-lg-3">
                    <div class="b-feature-block">
                        <span><i class="fa fa-envelope"></i></span>
                        <h3>{{ __('write_us') }}</h3>
                        <p class="mb-2">{{ $contact->main_email }}</p>
                        @if($contact->email)
                            <p class="mb-2">{{ $contact->email }}</p>
                        @endif
                    </div><!-- end b-feature-block -->
                </div><!-- end columns -->

                <div class="col-md-6 col-lg-3">
                    <div class="b-feature-block">
                        <span><i class="fa fa-phone"></i></span>
                        <h3>{{ __('call_us') }}</h3>
                        <p class="mb-2">{{ $contact->phone1 }}</p>
                        @if($contact->phone2)
                            <p class="mb-2">{{ $contact->phone2 }}</p>
                        @endif
                        @if($contact->phone3)
                            <p class="mb-2">{{ $contact->phone3 }}</p>
                        @endif
                        @if($contact->phone4)
                            <p class="mb-2">{{ $contact->phone4 }}</p>
                        @endif
                    </div><!-- end b-feature-block -->
                </div><!-- end columns -->

                <div class="col-md-6 col-lg-3">
                    <div class="b-feature-block">
                        <span><i class="fa fa-calendar"></i></span>
                        <h3>{{ __('work_hours') }}</h3>
                        <p>{{ $contact->work_hours }}</p>
                    </div><!-- end b-feature-block -->
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- end best-features -->


    <!--========================= NEWSLETTER-1 ==========================-->
    <section id="newsletter-1" class="section-padding back-size newsletter">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12 col-xl-12 text-center">
                    <h2>Yeniliklər var?</h2>
                    <p>Yeniliklərimizdən xəbərdar olmaq abunə olun</p>
                    <form method="POST" action="{{ route('user.subscribe') }}">
                        @csrf
                        <div class="form-group">
                            <div class="input-group">
                                <input type="email" class="form-control input-lg" value="{{ old('email') }}"
                                       placeholder="{{ __('email_enter') }}" required name="email">
                                <span class="input-group-btn">
                                    <button type="submit" title="submit email" class="btn btn-lg">
                                        <i class="fa fa-envelope"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- end newsletter-1 -->
@endsection